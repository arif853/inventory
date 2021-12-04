<?php
session_start();
include("../db_con/database_con.php");
include_once("../fpdf/fpdf.php");


if (isset($_GET["order_date"]) AND isset($_GET["cust_name"])) {
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->setFont("Arial","B",16);
	$pdf->Cell(190,10,"Company Name",0,1,"C");
	$pdf->setFont("Arial",NULL,12);
	$pdf->Cell(190,6,"26/A/2 Topkhana Road, Segunbagicha, Dhaka 100.",0,1,"C");
	$pdf->Cell(50,10,"",0,1);
	$pdf->Cell(50,10,"",0,1);
	$pdf->setFont("Arial",null,12);
	$pdf->Cell(50,10,"Date",0,0);
	$pdf->Cell(50,10,": ".$_GET["order_date"],0,1);

					 	$cus_id = $_GET['cust_name'];
						$cus_query = "SELECT * FROM customer where id = '$cus_id'";
						$res_cus = mysqli_query($conn,$cus_query);
						$row_cus = mysqli_fetch_array($res_cus);

	$pdf->Cell(50,10,"Customer Name",0,0);
	$pdf->Cell(50,10,": ".$row_cus["name"],0,1);

	$pdf->Cell(50,10,"",0,1);


	$pdf->Cell(10,10,"#",1,0,"C");
	$pdf->Cell(70,10,"Product Name",1,0,"C");
	$pdf->Cell(30,10,"Quantity",1,0,"C");
	$pdf->Cell(40,10,"Price",1,0,"C");
	$pdf->Cell(40,10,"Total (Tk)",1,1,"C");

	for ($i=0; $i < count($_GET["pid"]) ; $i++) { 
		$pdf->Cell(10,10, ($i+1) ,1,0,"C");
		$pdf->Cell(70,10, $_GET["pro_name"][$i],1,0,"C");
		$pdf->Cell(30,10, $_GET["qty"][$i],1,0,"C");
		$pdf->Cell(40,10, $_GET["price"][$i],1,0,"C");
		$pdf->Cell(40,10, ($_GET["qty"][$i] * $_GET["price"][$i]) ,1,1,"C");
	}

	$pdf->Cell(50,10,"",0,1);

	$pdf->Cell(50,10,"Sub Total",0,0);
	$pdf->Cell(50,10,": ".$_GET["sub_total"],0,1);
	


	$pdf->Cell(180,10,"Signature",0,0,"R");


	$pdf->Output("../PDF_INVOICE/INVOICE_".$row_cus["name"].".pdf", "F");
	$pdf->Output($row_cus["name"].".pdf","D");	

}





?>