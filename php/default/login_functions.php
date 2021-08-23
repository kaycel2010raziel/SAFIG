<?phpinclude 'dbconnect.php';function sec_session_start() {	date_default_timezone_set('America/Guatemala');		$session_name = 'SAFIG_SESSION';	$secure = false;	$httponly = true;	$expiration_time = 43200;	ini_set('session.use_only_cookies', 1);	$cookieParams = session_get_cookie_params();	session_set_cookie_params($expiration_time, $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 	session_name($session_name);	session_start();    }function login($username, $password, $conn) {	if ($stmt = $conn->query("SELECT us.idusuario,us.usuario,us.password,fkrol,us.fkestado,us.password_change FROM usuario as us WHERE usuario='$username' and us.fkestado in(2) limit 1;")) {   		if($stmt->rowCount() == 1) {			$result = $stmt->fetch(PDO::FETCH_ASSOC);			$user_id = $result['idusuario'];			$username = $result['usuario'];			$db_password = $result['password'];			$active = $result['fkestado'];			$ROL = $result['fkrol'];			$PASSWORD_CHANGE = $result['password_change'];			$Pages = ($PASSWORD_CHANGE =='1') ? 4 : $ROL;			if(checkbrute($user_id, $conn) == true) { 				// Account is locked				return false;			} else {								if(password_verify($password, $db_password)) {					//if($active == 1){					if(true){						$ip_address = $_SERVER['REMOTE_ADDR'];						$user_browser = $_SERVER['HTTP_USER_AGENT'];						$_SESSION['user_id'] = $user_id; 						$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);						$_SESSION['username'] = $username;						$_SESSION['fkrol'] = $ROL;						$_SESSION['login_string'] = hash('sha512', $db_password.$ip_address.$user_browser);						$conn->query("insert into login_access (user_id,remote_ip,status,login_string)values('$user_id', '$ip_address', 1, '".$_SESSION['login_string']."')");										#VERIFICADO EL USUARIO REDIRIGIMOS SEGUN SU ROL						return intval($Pages); 					} else {						// User is not active						// We record this attempt in the database						$ip_address = $_SERVER['REMOTE_ADDR']; // Get the IP address of the user. 						$conn->query("insert into login_access (user_id,remote_ip,status) values ('$user_id', '$ip_address', 2)");						return -1;									}									} else {					// Password is not correct					// We record this attempt in the database					$ip_address = $_SERVER['REMOTE_ADDR']; // Get the IP address of the user. 					$conn->query("insert into login_access (user_id,remote_ip,status) values ('$user_id', '$ip_address', 3)");					return -2;				}			}		} else {			// No user exists.			// We record this attempt in the database			$ip_address = $_SERVER['REMOTE_ADDR']; // Get the IP address of the user. 			$conn->query("insert into login_access (user_id,remote_ip,status) values ('$username', '$ip_address', 4)");			return -3;		}	} else {		return -4;	}}function checkbrute($user_id, $conn) {				/////////TODO	return false;}function get_webbrowser(){	if(isset($_SERVER['HTTP_USER_AGENT'])){		return $_SERVER['HTTP_USER_AGENT'];	}	}function get_username() {	if(isset($_SESSION['username'])){		return $_SESSION['username'];	}}function get_uid() {	if(isset($_SESSION['user_id'])){		return $_SESSION['user_id'];	}}function get_rol_id() {	if(isset($_SESSION['fkrol'])){		return $_SESSION['fkrol'];	}}function get_eid() {	global $Safigdb;	if(isset($_SESSION['user_id'])){		$eid = read("SELECT idusuario  FROM usuario where idusuario='".$_SESSION['user_id']."'", $Safigdb);		if(sizeof($eid) > 0){			return $eid[0]['idusuario'];		} else {			return 0;		}	} else {		return -1;	}}function login_check() {	global $siedb;	// Check if all session variables are set	if(isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {		$user_id = $_SESSION['user_id'];		$login_string = $_SESSION['login_string'];		$username = $_SESSION['username'];		$ip_address = $_SERVER['REMOTE_ADDR']; // Get the IP address of the user. 		$user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.		if ($stmt = $siedb->query("SELECT PASSWORD, ACTIVE FROM GENERAL_MEMBER WHERE USER_ID = '$user_id' LIMIT 1")) {			if($stmt->rowCount() == 1) { // If the user exists				$result = $stmt->fetch(PDO::FETCH_ASSOC);				$password = $result['PASSWORD']; // get variables from result.				$active = $result['ACTIVE'];				if($active == 1){					$stmt->fetch();					$login_check = hash('sha512', $password.$ip_address.$user_browser);					if($login_check == $login_string) {					// Logged In!!!!						return 1;					} else {						// Login string doesnt match						return -10;					}				} else {					// User not active					return -20;				}			} else {				// User doesnt exist				return -30;			}		} else {			// System error			return -40;		}	} else {		// Session not set		return -50;	}}function authorization_check($area){	global $siedb;	if(isset($_SESSION['user_id'])){		$user_id = $_SESSION['user_id'];				if ($stmt = $siedb->query("SELECT COUNT(*) AS AUTHORIZED FROM GENERAL_MEMBER_ACCESS_LEVEL WHERE USER_ID = '$user_id' AND AREA_ID = '$area'")) {   			if($stmt->rowCount() == 1) { // if user has permission				$line = $stmt->fetch(PDO::FETCH_ASSOC);				$auth = $line['AUTHORIZED'];				if($auth == 1){					return 1;				} else {					if($area == '2bd12aee0b7316bcc49a'){						return 1;					//	write("INSERT INTO GENERAL_MEMBER_ACCESS_LEVEL (USER_ID, AREA_ID) VALUES ('$user_id', '$area')", $siedb);					} else {						return 0;					}				}			} else {				return -1;			}		} else {			return -4;		}	} else {		return -10;	}}function pwd_change_check(){	global $siedb;	if(isset($_SESSION['user_id'])){		$user_id = $_SESSION['user_id'];		$info = read("SELECT PWD_CHANGE FROM GENERAL_MEMBER WHERE USER_ID = '$user_id'", $siedb);		return $info[0]['PWD_CHANGE'];	} else {		return -1;	}}function get_default_page(){	global $siedb;	if(isset($_SESSION['user_id'])){		$user_id = $_SESSION['user_id'];		$info = read("SELECT DEFAULT_PAGE FROM GENERAL_MEMBER WHERE USER_ID = '$user_id'", $siedb);		return $info[0]['DEFAULT_PAGE'];	} else {		return '2bd12aee0b7316bcc49a';	}	}function has_cascade_permission($area_id){	global $siedb;	$has = false;	if(isset($_SESSION['user_id'])){		$user_id = $_SESSION['user_id'];		$has_children = read("SELECT AREA_ID FROM GENERAL_AREA WHERE PARENT_NODE = '$area_id'", $siedb);		if(sizeof($has_children) > 0){			foreach($has_children AS $hc){				if(!$has){					$has = has_cascade_permission($hc['AREA_ID']);				}			}		} else {			$perm = read("SELECT AREA_ID FROM GENERAL_MEMBER_ACCESS_LEVEL WHERE AREA_ID = '$area_id' AND USER_ID = '$user_id'", $siedb);			if(sizeof($perm) > 0){				$has = true;			} else {				$has = false;			}		}	}	return $has;}function get_menu_data($parent_id){	global $siedb;	$temp = array();	$tier_data = read("SELECT * FROM GENERAL_AREA WHERE PARENT_NODE = '$parent_id' ORDER BY MENU_ORDER ASC, MENU_NAME ASC", $siedb);	if(sizeof($tier_data) > 0){			foreach($tier_data AS $md){			if(has_cascade_permission($md['AREA_ID'])){				$children = get_menu_data($md['AREA_ID']);				$temp[] = array(					'name' => $md['MENU_NAME'],					'icon' => $md['MENU_ICON'],					'id' => $md['AREA_ID'],					'children' => $children				);			}		}	}	return $temp;}function get_menu_data_old($parent_id){	global $siedb;	$temp = array();	$tier_data = read("SELECT * FROM GENERAL_AREA WHERE PARENT_NODE = '$parent_id' ORDER BY MENU_ORDER ASC, MENU_NAME ASC", $siedb);	if(sizeof($tier_data) > 0){			foreach($tier_data AS $md){			$children = get_menu_data($md['AREA_ID']);			$temp[] = array(				'name' => $md['MENU_NAME'],				'icon' => $md['MENU_ICON'],				'id' => $md['AREA_ID'],				'children' => $children			);		}	}	return $temp;}function get_tree_data($parent_id){	global $siedb;	$temp = array();	$tier_data = read("SELECT * FROM GENERAL_AREA WHERE PARENT_NODE = '$parent_id' ORDER BY MENU_ORDER ASC, MENU_NAME ASC", $siedb);	if(sizeof($tier_data) > 0){			foreach($tier_data AS $md){			$children = get_tree_data($md['AREA_ID']);			$temp[] = array(				'id' => $md['AREA_ID'],				'text' => $md['MENU_NAME']." - <span class='text-success'>".$md['AREA_ID']."</span>",				'state' => array('opened' => true),				'children' => $children			);		}	}	return $temp;}function print_menu_data($node, $lvl = 1){	global $page;	$lvl_str = "lvl_$lvl";	echo "<ul class='nav".($lvl == 1 ? ' nav-pills nav-sidebar flex-column' : ' nav-treeview')."' ".($lvl == 1 ? 'data-widget="treeview" role="menu" data-accordion="false"' : '').">\n";	foreach($node AS $n){		echo "<li class='nav-item".(sizeof($n['children']) > 0 ? ' has-treeview' : '').(is_parent($n['id'], $page) ? ' menu-open' : '')."'>\n";		echo "<a href='#' class='nav-link $lvl_str".(sizeof($n['children']) == 0 ? ' navigation-button' : '').($page == $n['id'] ? ' active' : '')."' data-id='".$n['id']."'><i class='fa ".$n['icon']." nav-icon'></i><p>".$n['name'].(sizeof($n['children']) > 0 ? "<i class='right fa fa-angle-left'></i>" : "")."</p></a>\n";		if(isset($n['children'])){print_menu_data($n['children'], $lvl + 1);}		echo "</li>\n";	}	echo "</ul>\n";}function is_parent($id, $active){	global $siedb;	$parent_query = read("SELECT PARENT_NODE FROM GENERAL_AREA WHERE AREA_ID = '$active'", $siedb);	if(sizeof($parent_query) > 0){		$parent = $parent_query[0]['PARENT_NODE'];		if($parent == $id){			return true;		} else {			if($parent == '0'){				return false;			} else {				return is_parent($id, $parent);			}		}	}	return false;}?>