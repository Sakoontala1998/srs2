<?php

include_once('../config/config.inc.php');
include_once('../config/connectdb.php');
include_once('../lib/fpdf/fpdf.php');
class PDF extends FPDF
{
function Footer()
{
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('sarabun','',16);
    // Print current and total page numbers
    $this->Cell(0,20,''.$this->PageNo().'',0,0,'R');
}
}
$pdf = new PDF();
$pdf->SetMargins(20,20,10);
$pdf->AddPage();
$pdf->AddFont('sarabun','','THSarabun.php');
$pdf->AddFont('sarabun','B','THSarabunB.php');

		$id_pj = isset($_GET['id']) == true ? $_GET['id']: null;
		// $stmt = $con->prepare('SELECT * FROM project WHERE id_pj = :id_pj');
        $stmt = Database::query("SELECT * FROM project as pr INNER JOIN model_pj as mo ON pr.model_pj = mo.id_model_pj INNER JOIN systemsanalyst as sy ON sy.id_sa = pr.id_sa WHERE pr.id_pj  = '$id_pj'",PDO::FETCH_ASSOC);
		// $stmt->execute(array(':id_pj'=>$id_pj));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		date_default_timezone_set('Asia/Bangkok');
		function DateThai($strDate)
		{
			$strYear = date("Y",strtotime($strDate))+543;
			$strMonth= date("n",strtotime($strDate));
			$strDay= date("j",strtotime($strDate));
			$strHour= date("H",strtotime($strDate));
			$strMinute= date("i",strtotime($strDate));
			$strSeconds= date("s",strtotime($strDate));
			$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
			$strMonthCutthai = Array("","มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน","พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม","กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
			$strMonthCutzreo = Array("","01","02","03","04","05","06","07","08","09","10","11","12");
			$strMonthThai=$strMonthCut[$strMonth];
			$strMonthThailand=$strMonthCutthai[$strMonth];
			$strMonthzreo=$strMonthCutzreo[$strMonth];
			return "$strDay $strMonthThailand $strYear";
		}				
// if($row['model_pj']== 1){$row['model_pj']='เว็ปไซต์'; 
// }  
// if($row['model_pj'] == 2){$row['model_pj']='เว็ปแอปพลิเคชัน'; 
// }
// if($row['model_pj'] == 3){$row['model_pj'] ='แอปพลิเคชัน'; 
// }                              

$pdf->Cell(0,30,iconv('utf-8','cp874',''),0,1,'L');
$pdf->SetFont('sarabun','B',60);
$pdf->Cell(0,25,iconv('utf-8','cp874','Software Requirements'),0,1,'R');
$pdf->Cell(0,25,iconv('utf-8','cp874','Specification'),0,1,'R');
$pdf->SetFont('sarabun','B',30);
$pdf->Cell(0,25,iconv('utf-8','cp874','For'),0,1,'R');
$pdf->SetFont('sarabun','B',50);
$pdf->Cell(0,25,iconv('utf-8','cp874',$row ['title_pj']),0,1,'R');
$pdf->SetFont('sarabun','B',25);
$pdf->Cell(0,25,iconv('utf-8','cp874','Version 1.0 approved'),0,1,'R');
$pdf->SetFont('sarabun','B',25);
$pdf->Cell(115,25,iconv('utf-8','cp874','Prepared by'),0,0,'R');
$pdf->SetFont('sarabun','B',25);
$pdf->Cell(21,25,iconv('utf-8','cp874',$row ['natitle_sa']),0,0,'R');
$pdf->Cell(0,25,iconv('utf-8','cp874',$row ['name_sa']),0,1,'R');
$pdf->SetFont('sarabun','B',25);
$pdf->Cell(0,25,iconv('utf-8','cp874','มหาวิทยาลัยราชภัฏอุบลราชธานี'),0,1,'R');
$pdf->SetFont('sarabun','B',25);
$pdf->Cell(0,25,iconv('utf-8','cp874',DateThai($row ['date_pj'])),0,1,'R');

$pdf->AliasNbPages();
$pdf->SetMargins(20,20,10);
$pdf->AddPage();
$pdf->SetFont('sarabun','B',20);
$pdf->Cell(0,18,iconv('utf-8','cp874','บทนำ'),0,1,'C');
$pdf->SetFont('sarabun','',18);
$pdf->MultiCell(0,8,iconv('utf-8','cp874',$row ['introduction_con']),'','L',false);
$pdf->SetMargins(20,20,10);
$pdf->AddPage();
$pdf->SetFont('sarabun','B',20);
$pdf->Cell(0,18,iconv('utf-8','cp874','ความต้องการ'),0,1,'C');
$pdf->SetFont('sarabun','',18);
$pdf->MultiCell(0,8,iconv('utf-8','cp874',$row ['need_con']),'','L',false);
$pdf->SetMargins(20,20,10);
$pdf->AddPage();
$pdf->SetFont('sarabun','B',20);
$pdf->Cell(0,18,iconv('utf-8','cp874','คำอธิบาย'),0,1,'C');
$pdf->SetFont('sarabun','',18);
$pdf->MultiCell(0,8,iconv('utf-8','cp874',$row ['description_con']),'','L',false);

$pdf->Output('',$row['title_pj'].'.pdf',true);
?>