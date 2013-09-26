<div id="three-column" class="container">
    

   
        
      <a href=<?php echo base_url().'Client'; ?> class="button_logout_client">korak nazad</a> 
       <br /> <br /> 
       <?php echo validation_errors();  ?>
                 <div id="form_uplata_licni">
                     
        <?php echo form_open('Client/validation_uplata_licni'); ?>
        <?php foreach ($records as $rec): ?>
       <div>
<h1>Uplata na sopstven račun:</h1><br /><br />
<label>
<span>Uplatilac:</span> <?php echo $rec->ime.' '.$rec->prezime; ?>
</label>
<br /> <br />
<label>
    <span>Račun uplatioca</span>: <?php echo $rec->brracuna; ?>
</label>
<?php endforeach; ?>
<br />
<br />
<label>
<span>Iznos</span>:<input div id="input" id="email" type="text" name="iznos" /> 
</label>
<br />

<label>
<span>Komentar:</span><textarea class="message" id="comment" name="svrha_isplate"></textarea>

</label>


<input class="button_submit" type="submit" value="Uplati" />

</div>
        <?php echo form_close(); ?>
   
</div>
        
       
</div>

<div id="three-column" class="container">
     
      <a href=<?php echo base_url().'Client'; ?> class="button_logout_client">korak nazad</a> 

</div>

</div>
