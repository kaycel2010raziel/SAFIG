<?php
require('fpdf.php');

class PDF_MC_Table extends FPDF
{
var $widths;
var $aligns;
var $vertical_aligns;
var $line_height;
var $headers_fillcolor_r;
var $headers_fillcolor_g;
var $headers_fillcolor_b;
var $headers_textcolor_r;
var $headers_textcolor_g;
var $headers_textcolor_b;



function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function SetVerticalAligns($v)
{
	//Set the array of column vertical aligments
	$this->vertical_aligns=$v;
}

function SetLineHeight($l)
{
	//Set the array of column vertical aligments
	$this->line_height=$l;
}

function SetHeaderFillColor($r,$g,$b){
	$this->headers_fillcolor_r = $r;
	$this->headers_fillcolor_g = $g;
	$this->headers_fillcolor_b = $b;
}

function SetHeaderTextColor($r,$g,$b){
	$this->headers_textcolor_r = $r;
	$this->headers_textcolor_g = $g;
	$this->headers_textcolor_b = $b;	
}

function Head($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=$this->line_height*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        $v=isset($this->vertical_aligns[$i]) ? $this->get_valign_pos($this->vertical_aligns[$i],$h) : $this->line_height;
        $fc_r=isset($this->headers_fillcolor_r[$i]) ? $this->headers_fillcolor_r[$i] : 255;
        $fc_g=isset($this->headers_fillcolor_g[$i]) ? $this->headers_fillcolor_g[$i] : 255;
        $fc_b=isset($this->headers_fillcolor_b[$i]) ? $this->headers_fillcolor_b[$i] : 255;
		
        $tc_r=isset($this->headers_textcolor_r[$i]) ? $this->headers_textcolor_r[$i] : 0;
        $tc_g=isset($this->headers_textcolor_g[$i]) ? $this->headers_textcolor_g[$i] : 0;
        $tc_b=isset($this->headers_textcolor_b[$i]) ? $this->headers_textcolor_b[$i] : 0;
		//Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
		$this->SetFillColor($fc_r,$fc_g,$fc_b);
		$this->SetTextColor($tc_r,$tc_g,$tc_b);
		$this->MultiCell($w,$v,$data[$i],0,$a,true);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function Row($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=$this->line_height*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        $v=isset($this->vertical_aligns[$i]) ? $this->get_valign_pos($this->vertical_aligns[$i],$h) : $this->line_height;
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
		//$this->SetFillColor($fc_r,$fc_g,$fc_b);
		$this->SetTextColor(0,0,0);
		$this->MultiCell($w,$v,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function get_valign_pos($va, $h){
	switch($va){
		case 'C':
			return $h;
		case 'N':
			return $this->line_height;
	}
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}

function MultiCellBltArray($w, $h, $blt_array, $border=0, $align='J', $fill=false)
{
	if (!is_array($blt_array))
	{
		die('MultiCellBltArray requires an array with the following keys: bullet,margin,text,indent,spacer');
		exit;
	}
			
	//Save x
	$bak_x = $this->x;
	
	for ($i=0; $i<sizeof($blt_array['text']); $i++)
	{
		//Get bullet width including margin
		$blt_width = $this->GetStringWidth($blt_array['bullet'] . $blt_array['margin'])+$this->cMargin*2;
		
		// SetX
		$this->SetX($bak_x);
		
		//Output indent
		if ($blt_array['indent'] > 0)
			$this->Cell($blt_array['indent']);
		
		//Output bullet
		$this->Cell($blt_width,$h,$blt_array['bullet'] . $blt_array['margin'],0,'',$fill);
		
		//Output text
		$this->MultiCell($w-$blt_width,$h,$blt_array['text'][$i],$border,$align,$fill);
		
		//Insert a spacer between items if not the last item
		if ($i != sizeof($blt_array['text'])-1)
			$this->Ln($blt_array['spacer']);
		
		//Increment bullet if it's a number
		if (is_numeric($blt_array['bullet']))
			$blt_array['bullet']++;
	}

	//Restore x
	$this->x = $bak_x;
}

}
?>