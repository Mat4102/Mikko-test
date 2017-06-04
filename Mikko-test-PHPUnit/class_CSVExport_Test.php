<?php

//require_once('class_CSV_Test.php');
 class CSVExport {
 
 
 


 function fillCSV(CSV $fichier,$listData,$listDataPyment,$listDataBonus){
$i=0;

 if (  $fichier === null || $listData === null || $listDataPyment === null || $listDataBonus === null){
			throw new Exception("Error:Invalid data!");
			}
			
			foreach($listData as $list ){
			
					
					 $fichier->Insertion( $listData[$i].";".$listDataPyment[$i].";".$listDataBonus[$i] );
					   
						$i++;
			}
}

}

?>