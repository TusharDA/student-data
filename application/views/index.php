<?php //if(!empty($files)){ foreach($files as $frow){ 
  //  print_r($files); 
	
   
    ?>
<div class="file-box">
    <div class="box-content">
        <h5></h5>
        
        <div class="preview">
            <embed src="<?php echo base_url().'uploads/'.$files['doc']; ?>">
        </div>
        <a href="<?php echo base_url().'files/download/'.$files['doc']; ?>" class="dwn">Download</a>
    </div>
</div>
<?php   ?>