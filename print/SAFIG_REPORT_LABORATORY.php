<?php
	require('../plugins/fpdf/fpdf_mc_tables_Safig.php');
	include '../php/default/login_functions.php';
	$monthNames = array("","ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV", "DEC");
	$pdf = new PDF_MC_Table('L', 'mm', 'Letter');
	include('../plugins/fpdf/SAFIGfonts.php');
	$response = array(); 
	$Indice = 0;
	$LABORATORIOS = read("SELECT lab.idlaboratorio,lab.nombre,lab.direccion,lab.telefono,lab.correo,lab.fkestado,estado.nombre as estado,municipio.nombre as municipio,municipio.idmunicipio,departamento.nombre as departamento,departamento.iddepartamento,lab.foto FROM laboratorio as lab join estado on estado.idestado=lab.fkestado join municipio on municipio.idmunicipio=lab.fkmunicipio join departamento on departamento.iddepartamento=municipio.fkdepartamento where lab.fkestado in(2)", $Safigdb);
	foreach($LABORATORIOS AS $US){
		$response[]= array(
			'nombre'=>$US['nombre'],
			'direccion'=>$US['direccion'],
			'telefono'=>$US['telefono'],
			'correo'=>$US['correo'],
			'departamento'=>$US['departamento'],
			'municipio'=>$US['municipio'],
			'estado'=>$US['estado'],
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
	$pdf->Cell(75,7,'LISTADO DE LABORATORIOS REGISTRADOS',0,2,'R');
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

	$pdf->SetWidths(array(10,45,50,35,40,30,30,20));
	$pdf->SetAligns(array('C','C','C','C','C','C','C','C'));
	$pdf->SetVerticalAligns(array('N','N','N','N','N','N','N','N'));
	$pdf->SetLineHeight(6);
	$pdf->SetFont('DINProMEDIUM','',10);

	$pdf->SetHeaderFillColor(array(19,19,19,19,19,19,19,19),array(41,41,41,41,41,41,41,41),array(75,75,75,75,75,75,75,75));
	$pdf->SetHeaderTextColor(array(255,255,255,255,255,255,255,255),array(255,255,255,255,255,255,255,255),array(255,255,255,255,255,255,255,255));
	$pdf->Head(array("NO","LABORATORIO","DIRECCION","TELEFONO","CORREO","DEPARTAMENTO","MUNICIPIO","ESTADO"));

	foreach($response AS $E){
		$pdf->Row(array(utf8_decode($E['INDICE']),utf8_decode($E['nombre']),utf8_decode($E['direccion']),utf8_decode($E['telefono']),utf8_decode($E['correo']),utf8_decode($E['departamento']),utf8_decode($E['municipio']),utf8_decode($E['estado'])));
	}

$pdf->Output();