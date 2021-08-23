<?php
	require('../plugins/fpdf/fpdf_mc_tables_Safig.php');
	include '../php/default/login_functions.php';
	$monthNames = array("","ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV", "DEC");
	$pdf = new PDF_MC_Table('L', 'mm', 'Letter');
	include('../plugins/fpdf/SAFIGfonts.php');
	$response = array(); 
	$Indice = 0;
	$FARMACIAS = read("SELECT fa.idfarmacia,fa.foto,fa.nombre,fa.direccion,fa.fkmunicipio,fa.fkestado,estado.nombre as estado, municipio.nombre as municipio,departamento.nombre as departamento FROM farmacia as fa join estado on estado.idestado=fa.fkestado join municipio on municipio.idmunicipio=fa.fkmunicipio join departamento on departamento.iddepartamento=municipio.fkdepartamento where fa.fkestado in(2,4)", $Safigdb);
	foreach($FARMACIAS AS $US){
		$response[]= array(
			'nombre'=>$US['nombre'],
			'direccion'=>$US['direccion'],
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
	$pdf->Cell(75,7,'LISTADO DE FARMACIAS REGISTRADAS',0,2,'R');
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

	$pdf->SetWidths(array(10,60,85,35,40,30));
	$pdf->SetAligns(array('C','C','C','C','C','C'));
	$pdf->SetVerticalAligns(array('N','N','N','N','N','N'));
	$pdf->SetLineHeight(6);
	$pdf->SetFont('DINProMEDIUM','',11);

	$pdf->SetHeaderFillColor(array(19,19,19,19,19,19),array(41,41,41,41,41,41),array(75,75,75,75,75,75));
	$pdf->SetHeaderTextColor(array(255,255,255,255,255,255),array(255,255,255,255,255,255),array(255,255,255,255,255,255));
	$pdf->Head(array("NO","FARMACIA","DIRECCION","DEPARTAMENTO","MUNICIPIO","ESTADO"));

	foreach($response AS $E){
		$pdf->Row(array(utf8_decode($E['INDICE']),utf8_decode($E['nombre']),utf8_decode($E['direccion']),utf8_decode($E['departamento']),utf8_decode($E['municipio']),utf8_decode($E['estado'])));
	}

$pdf->Output();