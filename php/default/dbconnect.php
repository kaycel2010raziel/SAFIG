<?PHP
	define("DB_HOST", "localhost");
	define("DB_ADMIN", "root"); 
	define("DB_PASSWORD", "");
	define("DB_SAFIG_DATA", "safigdb");

	try{
		$Safigdb = new PDO("mysql:host=".DB_HOST.";dbname=".DB_SAFIG_DATA.";charset=utf8", DB_ADMIN, DB_PASSWORD);
	} catch(Exception $e){
		error_log($e->getMessage(), 0);
		echo "Error".$e;
	}

	function write($query, $conn){$stmt = $conn->prepare($query);$result = $stmt->execute(); $msn=$stmt->errorInfo(); return $msn[2];}
	function write_return($query, $conn){$stmt = $conn->prepare($query);$result = $stmt->execute();return $conn->lastInsertId();}
	function read($query, $conn){$stmt = $conn->query($query);$rows = array();while($r = $stmt->fetch(PDO::FETCH_ASSOC)){$rows[] = $r;}return $rows;}
?>