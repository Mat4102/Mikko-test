<?php
require_once('class_Payment_Test.php');
require_once('class_CSVExport_Test.php');
require_once('class_CSV_Test.php');
require_once('class_PayInterface_Test.php');

class PaymentTest extends PHPUnit_Framework_TestCase implements PayInterface {

public function setUp(){}
public function tearDown(){}

	public function testValidObject(){
		// test pour s’assurer que l’objet à un Valeur valide
				
		$currentDate       = new DateTime();
		$endDate           = new DateTime('+ 1 years');
		$PaymentTest  	   = new Payment();
		$CSVExportTest     = new CSVExport();
		$fichier		   = new CSV();
		$lastMonth 		   =new DateTime('Dec');
		
		$arryMonth         =array();
		$arryPyment_Date   =array();
		$arryBonus_Date    =array();
		
		
		$currentDate_Bonus =clone $currentDate;
		$endDate_Bonus     =clone $endDate;
		$currentDate_ 	   =clone $currentDate;
		$endDate_          =clone $endDate;
		
		$arryMonth         = $PaymentTest->fillDataPayment_Month($currentDate,$endDate,$lastMonth);
		$arryPyment_Date   = $PaymentTest->fillDataPayment_Date($currentDate_,$endDate_,$lastMonth);
		$arryBonus_Date    = $PaymentTest->fillData_BonusDate($currentDate_Bonus,$endDate_Bonus,$lastMonth);
		
		$this->assertTrue($fichier->Colonne(PaymentTest::CONST_MONTH_LABEL .";". PaymentTest::CONST_PAYMENT_DATE_LABEL .";". PaymentTest::CONST_BONUS_DATE_LABEL) !== false);
		$this->assertTrue($CSVExportTest->fillCSV($fichier,$arryMonth,$arryPyment_Date,$arryBonus_Date) !== false);
		
		
		$this->assertTrue($PaymentTest->fillDataPayment_Month($currentDate,$endDate,$lastMonth) !== false);
		$this->assertTrue($PaymentTest->fillDataPayment_Date($currentDate,$endDate,$lastMonth) !== false);
		$this->assertTrue($PaymentTest->fillData_BonusDate($currentDate,$endDate,$lastMonth) !== false);
	}
}
?>