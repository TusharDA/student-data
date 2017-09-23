<?php


//foreach($stock as $stk)
//{
//    echo $stk->item_id;
//}

$filename = "StudentReport".date('d/m/Y');         //File Name

$file_ending = "xls";
////header info for browser
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$filename.xls");
header("Pragma: no-cache");
header("Expires: 0");
$flag=false;
//print_r($result);
echo "\t\t\t"."Student All Report"."\t\t\n\n";
$cnt=1;
 foreach ($result as $stock) {
//var_dump($result);
    if(!$flag)
    {
        echo "Sr.No."."\t"."stud id"."\t"."Student Name"."\t"."Student Standerd"."\t"."Student Contact No."."\t"."Student Email"."\t"."Student Address"."\n";
//    echo implode("\t", array_keys($stock)) . "\r\n";
        $flag = true;
    }
    // echo implode("\t", array_values($stock) ) . "\r\n";
	
    echo $cnt++."\t".$stock->stud_id."\t".$stock->first_name."\t".$stock->standard."\t".$stock->contact_no."\t".$stock->email_address."\t".$stock->padress."\n";

} 

?>