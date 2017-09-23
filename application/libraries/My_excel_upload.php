<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_excel_upload{
	
	public function exportToExcelTemplate($filename,$result,$coloumnarray)
	{
		$CI = & get_instance();
		$excelcoloumns=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","U","V","W","X","Y","z");
		//$result=$CI->db->query($query)->result_array();
		$CI->load->library("PHPExcel");
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("www.mysocietyportal.com")
						 ->setLastModifiedBy("My Society Portal")
						 ->setTitle("My Society Portal Excel Document")
						 ->setSubject("My Society Portal Excel Document")
						 ->setDescription("My Society Portal Excel Document")
						 ->setKeywords("My Society Portal Excel Document")
						 ->setCategory("My Society Portal Excel Document");
		$i=0;
		foreach($coloumnarray as $coloumnrow)
		{
			$currentexcelcoloumn=$excelcoloumns[$i];
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($currentexcelcoloumn.'1', $coloumnrow["title"]);
			$i++;
		}
		
		$rowcount=2;//start of data row
		foreach($result as $result_row)
		{
			$i=0;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rowcount, $rowcount-1);
			foreach($result_row as $colval)
			{
				$currentexcelcoloumn=$excelcoloumns[$i+1];
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue($currentexcelcoloumn.$rowcount, $colval);
				
				if($coloumnarray[$i+1]["validation"]!="")
				{
					$objValidation = $objPHPExcel->getActiveSheet()->getCell($currentexcelcoloumn.$rowcount)->getDataValidation();
					if($coloumnarray[$i+1]["validation"]=="TYPE_LIST")
					$objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
					if($coloumnarray[$i+1]["validation"]=="TYPE_WHOLE")
					{
						$objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_WHOLE );
						switch($coloumnarray[$i+1]["operator"])
						{
							case 'OPERATOR_BETWEEN':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_BETWEEN);
										break;
							case 'OPERATOR_EQUAL':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_EQUAL);
										break;	
							case 'OPERATOR_GREATERTHAN':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_GREATERTHAN);
										break;	
							case 'OPERATOR_GREATERTHANOREQUAL':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_GREATERTHANOREQUAL);
										break;
							case 'OPERATOR_LESSTHAN':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_LESSTHAN);
										break;
							case 'OPERATOR_LESSTHANOREQUAL':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_LESSTHANOREQUAL);
										break;
							case 'OPERATOR_NOTBETWEEN':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_NOTBETWEEN);
										break;
							case 'OPERATOR_NOTEQUAL':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_NOTEQUAL);
										break;
							default:
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_GREATERTHAN);
										break;
														
						}
					}
					if($coloumnarray[$i+1]["validation"]=="TYPE_DECIMAL")
					{	
						$objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_DECIMAL );
						switch($coloumnarray[$i+1]["operator"])
						{
							case 'OPERATOR_BETWEEN':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_BETWEEN);
										break;
							case 'OPERATOR_EQUAL':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_EQUAL);
										break;	
							case 'OPERATOR_GREATERTHAN':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_GREATERTHAN);
										break;	
							case 'OPERATOR_GREATERTHANOREQUAL':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_GREATERTHANOREQUAL);
										break;
							case 'OPERATOR_LESSTHAN':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_LESSTHAN);
										break;
							case 'OPERATOR_LESSTHANOREQUAL':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_LESSTHANOREQUAL);
										break;
							case 'OPERATOR_NOTBETWEEN':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_NOTBETWEEN);
										break;
							case 'OPERATOR_NOTEQUAL':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_NOTEQUAL);
										break;
							default:
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_GREATERTHAN);
										break;
														
						}
					}
					if($coloumnarray[$i+1]["validation"]=="TYPE_DATE")
					{	//OPERATOR_GREATERTHANOREQUAL
						$objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_DATE );
						switch($coloumnarray[$i+1]["operator"])
						{
							case 'OPERATOR_BETWEEN':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_BETWEEN);
										break;
							case 'OPERATOR_EQUAL':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_EQUAL);
										break;	
							case 'OPERATOR_GREATERTHAN':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_GREATERTHAN);
										break;	
							case 'OPERATOR_GREATERTHANOREQUAL':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_GREATERTHANOREQUAL);
										break;
							case 'OPERATOR_LESSTHAN':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_LESSTHAN);
										break;
							case 'OPERATOR_LESSTHANOREQUAL':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_LESSTHANOREQUAL);
										break;
							case 'OPERATOR_NOTBETWEEN':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_NOTBETWEEN);
										break;
							case 'OPERATOR_NOTEQUAL':
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_NOTEQUAL);
										break;
							default:
										$objValidation->setOperator( PHPExcel_Cell_DataValidation::OPERATOR_GREATERTHAN);
										break;
														
						}
							
					}
					
					$objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
					$objValidation->setAllowBlank(false);
					$objValidation->setShowInputMessage(true);
					$objValidation->setShowErrorMessage(true);
					if($coloumnarray[$i+1]["validation"]=="TYPE_LIST")
						$objValidation->setShowDropDown(true);
					$objValidation->setErrorTitle('Input error');
					$objValidation->setError($coloumnarray[$i+1]["error_message"]);
					$objValidation->setPromptTitle($coloumnarray[$i+1]["promptTitle"]);
					$objValidation->setPrompt($coloumnarray[$i+1]["prompt"]);
					foreach($coloumnarray[$i+1]["formule"] as $validationformule)
						$objValidation->setFormula1($validationformule);
					
					
				}
				$i++;
			}
			$rowcount++;
		}
		
		$i=0;
		foreach($coloumnarray as $coloumnrow)
		{
			$currentexcelcoloumn=$excelcoloumns[$i];
			$objPHPExcel->getActiveSheet()->getStyle($currentexcelcoloumn.'1')->getFont()->setBold(true);
			$i++;
		}
		
		$i=0;
		foreach($coloumnarray as $coloumnrow)
		{
			$currentexcelcoloumn=$excelcoloumns[$i];
			if($coloumnrow['width']!="")
			{
				
				$objPHPExcel->getActiveSheet()->getColumnDimension($currentexcelcoloumn)->setWidth($coloumnrow['width']);
				
			}
			if($coloumnrow['alignment']!="")
			{
				$coloumnrow['alignment']=="LEFT"?$objPHPExcel->getActiveSheet()->getStyle($currentexcelcoloumn)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT) : $objPHPExcel->getActiveSheet()->getStyle($currentexcelcoloumn)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
			}
			$i++;
		}
		    header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
			header('Cache-Control: max-age=0');

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save('php://output');
			exit;
		
	}
	
	public function validate_excel($filename,$coloumns,$max_entries,$min_entries,$unique_array=NULL)
	{
		$CI = & get_instance();
		$max_entries++; // This Did +1 for Column header 
		$result_array=array('success'=>true,'errors'=>array());
		$error_array=array();
		$success=true;
		
		$CI->load->library('PHPExcel');
		$inputFileName = $filename;
		
		/**************check file type*************/
		$reader = PHPExcel_IOFactory::createReaderForFile($inputFileName);
		if(get_class($reader)!='PHPExcel_Reader_Excel5' && get_class($reader)!='PHPExcel_Reader_Excel2007'  && get_class($reader)!='PHPExcel_Reader_Excel2003XML')
		{
			$success=false;
			$error_array[]="Invalid file type, make sure that your are uploading file with extension '.xls' or '.xlsx'";
			$result_array=array('success'=>$success,'errors'=>$error_array);
			return $result_array;	
		}
		/**************check file type ends*************/
		
		$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
		$objWorksheet = $objPHPExcel->getActiveSheet();
		
		
		//$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		//var_dump($sheetData);

		//echo "<hr />No of Rows: ".$objWorksheet->getHighestRow()."<br>";

		$rowcount=1;
		
		if($objWorksheet->getHighestRow() < $min_entries )
		{
			$success=false;	
			$error_array[]="You must enter at least ".$min_entries." number of rows";
			$result_array=array('success'=>$success,'errors'=>$error_array);
			return $result_array;
		}
		if($objWorksheet->getHighestRow() > $max_entries )
		{
			$success=false;	
			$error_array[]="You can enter maximum ".($max_entries-1)." number of rows";
			$result_array=array('success'=>$success,'errors'=>$error_array);
			return $result_array;			
		}

		$blank_row_found=false;
		$correct_num_rows = -1; // Taken -1 for skipping headers
		
		if($unique_array!=NULL)
		{
		  //$column_alpha_array=array(0=>'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		  foreach($unique_array as $uniqe_column)
		  {
			  for($i=2;$i<=$objWorksheet->getHighestRow();$i++)
			  {
				  $unique_value=$objWorksheet->getCellByColumnAndRow($uniqe_column-1,$i)->getValue();	
				  
				  if($unique_value!='')
				  {
					for($j=2;$j<=$objWorksheet->getHighestRow();$j++)
					{
						if($i==$j)
							continue;
							
						if(strcasecmp ($unique_value,$objWorksheet->getCellByColumnAndRow($uniqe_column-1,$j)->getValue())==0)
						{	
							$success=false;
							$error_array[]="Value of coloumn ".$coloumns[$uniqe_column]['name']." is not unique";
							$result_array=array('success'=>$success,'errors'=>$error_array);
							return $result_array;
							break;	
						}
					}
				  }
			  }		
		  }
		}
		foreach ($objWorksheet->getRowIterator() as $row) 
		{				  
			$cellIterator = $row->getCellIterator();
			// This loops all cells, even if it is not set.By default, only cells that are set will be iterated.
			$cellIterator->setIterateOnlyExistingCells(false); 
			$all_cells_empty=true;
			
			// Checking for correct column names
			if($rowcount==1)
			{
				$colcount=1;
				$current_coloumn='A';				   
				foreach ($cellIterator as $cell) //this loop checks the column names
				{
					if($cell->getValue()!="")
					{
						$all_cells_empty=false;	
					}
					
					if($coloumns[$colcount]['name']!=$cell->getValue())
					{
						$success=false;
						$error_array[]="Invalid title of coloumn ".$current_coloumn;
						$result_array=array('success'=>$success,'errors'=>$error_array);
						return $result_array;	
					}
					$colcount++;
					$current_coloumn++;
				}
				
			}
			$error_array_temp=array(); 
			if($rowcount>1)
			{
				$colcount=1;
				$current_coloumn='A';
				//echo "<br>";
			   
				foreach ($cellIterator as $cell)//this loop checks the row values 
				{
					//echo "-".$cell->getValue();
					if($cell->getValue()!="")
					{
						$all_cells_empty=false;	
					}
					if($blank_row_found===false)
					{
						//validation checks
						if($coloumns[$colcount]["required"]==true && $cell->getValue()=="")//this checks the required fields 
						{
							$error_array_temp[]="Value of coloumn ".$current_coloumn." in row ".$rowcount." Required";
						}
						
						if($coloumns[$colcount]["datatype"]=='int' && $cell->getValue()!="")//this checks the integer fields 
						{
							if(!filter_var($cell->getValue(), FILTER_VALIDATE_INT))
							{  
							  $error_array_temp[]="Value of coloumn ".$current_coloumn." in row ".$rowcount." must be Number";
							}
						}
						//this checks the float fields 
						elseif($coloumns[$colcount]["datatype"]=='float' && $cell->getValue()!="")
						{
							if(!filter_var($cell->getValue(), FILTER_VALIDATE_FLOAT))
							{  
							  $error_array_temp[]="Value of coloumn ".$current_coloumn." in row ".$rowcount." must be Number";
							}
						}
						//this checks the email fields 
						elseif($coloumns[$colcount]["datatype"]=='email' && $cell->getValue()!="")
						{
							if(!filter_var($cell->getValue(), FILTER_VALIDATE_EMAIL))
							{  
							  $error_array_temp[]="Value of coloumn ".$current_coloumn." in row ".$rowcount." must be valid Email";
							}
						}
						elseif($coloumns[$colcount]["datatype"]=='mobile' && $cell->getValue()!="")
						{
							if(!filter_var($cell->getValue(), FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^[0-9]{10}/"))))
							{  
							  $error_array_temp[]="Value of coloumn ".$current_coloumn." in row ".$rowcount." must be 10 Digit Mobile No";
							}
							//$error_array_temp[]="Value of coloumn".strlen($cell->getValue())."ds";
						}
						
						if(is_array($coloumns[$colcount]["allowstring"]))//this checks the allowed strings fields 
						{
							if(array_search($cell->getValue(),$coloumns[$colcount]["allowstring"])===FALSE)
							{
								
								$error_array_temp[]="Value of coloumn ".$current_coloumn." in row ".$rowcount." is Invalid";
								
							}
						}
					}
					else
					{
						if($cell->getValue()!="")
						{
							$success=false;
							$error_array=array();
							$error_array[]="Some blank intermediate row(s) no(s): ".implode(', ',$blank_row_found_array)." found.";
							$result_array=array('success'=>$success,'errors'=>$error_array);
							return $result_array;
								
						}	
					}
					$colcount++;
					$current_coloumn++;
				}
			
			}
			if($all_cells_empty==true)
			{
				//echo "<br>Blank row found, row No.".$rowcount;
				$blank_row_found=true;
				$blank_row_found_array[]=$rowcount;	
			}
			else
			{
				if(count($error_array_temp)>0)
				{
					$success = false;
					$error_array=array_merge($error_array,$error_array_temp);
					
					if(count($error_array)>25)
					{
						$result_array=array('success'=>$success,'errors'=>NULL,'lots_of_errors'=>true);
						return $result_array;
					}
				}
				elseif(count($error_array_temp)==0)
				{
					$correct_num_rows++;
				}
			}
			
			$rowcount++;
			
			
		}
		

		$result_array=array('success'=>$success,'errors'=>$error_array,'correct_num_rows'=>$correct_num_rows);
		return $result_array;	}
	
	public function read_excel($input_file_name)
	{
		/** PHPExcel_IOFactory */
		$CI = & get_instance();
		$CI->load->library('PHPExcel');
		// Reading excel Started
		$objPHPExcel = PHPExcel_IOFactory::load($input_file_name);
		$objWorksheet = $objPHPExcel->getActiveSheet();
		
		$sheet_array=$objPHPExcel->getSheetNames();
		
	for($k=0;$k<count($sheet_array);$k++)
	{
		echo $sheet_array[$k];
		
	
		
		
		
	  $objWorksheet = $objPHPExcel->setActiveSheetIndex($k); 
                $highestRow = $objWorksheet->getHighestRow(); 
                $highestColumn = $objWorksheet->getHighestColumn();  
                $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);  
                for ($row = 1; $row <= $highestRow;++$row) 
                {  
                    for ($col = 0; $col <$highestColumnIndex;++$col)
                    {  
                        $value=$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();  

                              $arraydata[$row-1][$col]=$value; 


                    }  

                }

     
		
				for($i=0;$i<=count($arraydata);$i++)
				{
					if($i==count($arraydata)-1)
					{
						print_r($arraydata[$i]);	
					}
					
				}
				$arraydata=array();
		

	}
	

		
		
	/*
		$i=0;
		
		
		foreach ($objWorksheet->getRowIterator() as $row) 
		{
		  $cellIterator = $row->getCellIterator();
		  // This loops all cells, even if it is not set.By default, only cells that are set will be iterated.
		  $cellIterator->setIterateOnlyExistingCells(true); 
		  
		  if($i>0)
		  {		
			  foreach ($cellIterator as $cell) 
			  {
				  $records[$i-1][]=$cell->getValue();
			  }
		  }
		  if($correct_num_rows==$i)
			  break;
		  
		  $i++;
		}	*/
		return $sheet_array;
	}
	
	public function read_date($datestring,$format="M/D/YYYY")
	{
		$CI = & get_instance();
		$CI->load->library('PHPExcel');
		$formated_date = PHPExcel_Style_NumberFormat::toFormattedString($datestring, $format);
		return $formated_date;
	}
	public function upload_excel()
	{
		$CI = & get_instance();
		$CI->load->library("qqfileuploader"); 
		$uploader = new Qqfileuploader($CI->config->item('bulk_excel_allowed_extns'), 
									   $CI->config->item('bulk_excel_max_size'));
		$result = $uploader->handleUpload($CI->config->item('temp_upload_dir'));

		$CI->session->set_userdata("latest_upload_file", $result['my_file']);	

		echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);	
	}
	
	public function upload_document($upload_directory,$doc_allowed_extns)
	{
		$CI = & get_instance();
		$CI->load->library("qqfileuploader");
		$doc_max_size = 10*1024*1024;
//		$doc_allowed_extns = array('jpg','jpeg'); currently taking as you wish
		
		$uploader = new Qqfileuploader($doc_allowed_extns, $doc_max_size);
		$result = $uploader->handleUpload($upload_directory);
        $result['uploadedfile'] = $result['my_file'];
		$CI->session->set_userdata("latest_upload_file", $result['my_file']);	
        echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);	
	}
} 


?>