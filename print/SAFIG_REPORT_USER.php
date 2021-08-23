<?php
	require('../plugins/fpdf/fpdf_mc_tables_Safig.php');
	include '../php/default/login_functions.php';
	$monthNames = array("","ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV", "DEC");
	$pdf = new PDF_MC_Table('L', 'mm', 'Letter');
	include('../plugins/fpdf/SAFIGfonts.php');
	$response = array(); 
	$Indice = 0;
	$USUARIOS = read("SELECT US.idusuario,concat(US.nombre,' ',US.apellido) as nombre,US.usuario,US.dpi,US.nit,US.genero,US.foto,US.fecha_nacimiento,rol.nombre as rol, estado.nombre as estado,US.fkestado FROM usuario as US join rol on rol.idrol=US.fkrol join estado on estado.idestado=US.fkestado WHERE US.fkestado IN(2,3,4)", $Safigdb);
	foreach($USUARIOS AS $US){
		$response[]= array(
			'USUARIO'=>$US['nombre'],
			'CORREO'=>$US['usuario'],
			'ROL'=>$US['rol'],
			'ESTADO'=>$US['estado'],
			'INDICE'=>$Indice +=1,
		);
		
	}
	$pdf->AddPage();

	//BANNER GOBIERNO
	$pdf->Image('../img/logos/LOGO_SAFIG.png',10,8,40);
	//TITULO DOCUMENTO
	$pdf->SetTextColor(19,41,75);
	$pdf->SetXY(197,15);
	$pdf->SetFont('MontserratSEMIBOLD','U',16);
	$pdf->Cell(75,7,'LISTADO DE USUARIOS REGISTRADOS',0,2,'R');
	$pdf->SetFont('MontserratSEMIBOLD','U',12);
	$pdf->Cell(75,7,'SAFIG',0,2,'R');
	//$pdf->Cell(75,7,'Del '.$Del.' Al '.$Al,0,2,'R');

	$pdf->SetY(35);
	//DIVISOR
	$currY = $pdf->GetY();
	$pdf->SetDrawColor(19,41,75);
	$pdf->SetLineWidth(2);
	$pdf->Line(10,$currY+1,270,$currY+1);
	$pdf->Ln();

	//LISTADO DE ACTIVIDADES
	$currY = $pdf->GetY();
	$pdf->SetY($currY+2);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetLineWidth(0.2);

	$pdf->SetWidths(array(10,75,75,70,30,30));
	$pdf->SetAligns(array('C','C','C','C','C','C'));
	$pdf->SetVerticalAligns(array('N','N','N','N','N','N'));
	$pdf->SetLineHeight(6);
	$pdf->SetFont('DINProMEDIUM','',11);

	$pdf->SetHeaderFillColor(array(19,19,19,19,19,19),array(41,41,41,41,41,41),array(75,75,75,75,75,75));
	$pdf->SetHeaderTextColor(array(255,255,255,255,255,255),array(255,255,255,255,255,255),array(255,255,255,255,255,255));
	$pdf->Head(array("NO","NOMBRE","USUARIO","ROL","ESTADO"));

	foreach($response AS $E){
		$pdf->Row(array($E['INDICE'],utf8_decode($E['USUARIO']),utf8_decode($E['CORREO']),utf8_decode($E['ROL']),utf8_decode($E['ESTADO'])));
	}

$pdf->Output();