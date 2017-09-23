<html xmlns="http://www.w3.org/1999/xhtml">  
   <head>  
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
      <title>Untitled Document</title>  
   </head>  
   <table border="1">  
      <tbody>  
         <tr>  
							  <th>Srr.No</th>
                              <th>Student Id</th>
                              <th>Student Name</th>
                              <th>Student Roll no</th>
                              <th>Student Standard</th>
                              <th>Student DOB</th>
                              <th>Country</th>
                              <th>State</th>
                              <th>City</th>
                              <th>Student Local Address</th>
                              <th>Student permanant Address</th>
                              <th>Student Email</th>
                              <th>Student Contact</th>
         </tr>  
         <?php  
            for ($i = 0; $i < count($deptlist); ++$i) 
         {  
            ?><tr>  
            <td><?php echo ($i+1); ?></td>
                                   <td><?php echo $deptlist[$i]->stud_id; ?></td>
                                   <td><?php echo $deptlist[$i]->stud_name; ?></td>
                                   <td><?php echo $deptlist[$i]->stud_rollno; ?></td>
                                   <td><?php echo $deptlist[$i]->stud_standard; ?></td>
                                   <td><?php echo $deptlist[$i]->stud_DOB; ?></td>
                                   <td><?php echo $deptlist[$i]->country; ?></td>
                                   <td><?php echo $deptlist[$i]->state; ?></td>
                                   <td><?php echo $deptlist[$i]->city; ?></td>
                                   <td><?php echo $deptlist[$i]->address; ?></td>
                                   <td><?php echo $deptlist[$i]->paddress; ?></td>
                                   <td><?php echo $deptlist[$i]->email; ?></td>
                                   <td><?php echo $deptlist[$i]->contact; ?></td> 
								   <td width="40" align="left" ><a href="#" onClick="show_confirm('edit',<?php ?>)">Edit</a></td>
            </tr>  					
         <?php }  
         ?>  
      </tbody>  
   </table>  
<body>  
</body>  
</html>  



































































