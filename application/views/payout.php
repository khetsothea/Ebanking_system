<div id="three-column" class="container">
    

   
        
      <a href=<?php echo base_url().'Client'; ?> class="button_logout_client">korak nazad</a> 
       <br /> <br /> 
       <?php echo validation_errors();  ?>
                 <div id="form_isplata">
                     
        <?php echo form_open('Client/validation_isplata'); ?>
        <?php foreach ($records as $rec): ?>
       <div>
<h1>Isplata gotovine:</h1><br /><br />
<label>
<span>Isplatilac:</span> <?php echo $rec->ime.' '.$rec->prezime; ?>
</label>

<br /> <br />
<label>
<span>Primalac:</span><input div id="input" id="email" type="text" name="primalac" /> 
</label>

<br />
<label>
<span>Svrha isplate:</span><textarea class="message" id="feedback" name="svrha_isplate"></textarea>

</label>
<br />
<label>
    <span>Račun isplatioca</span>: <?php echo $rec->brracuna; ?>
</label>
<?php endforeach; ?>
<br />
<br />
<label>
<span>Iznos</span>:<input div id="input" id="email" type="text" name="iznos" /> 
</label>
<br />
<label>
<span>Poziv na broj (zaduženje):</span><input div id="input" id="email" type="text" name="poziv_na_broj" /> 
</label>
<br />
<label>
<span>Komentar:</span><textarea class="message" id="comment" name="svrha_isplate"></textarea>

</label>


<input class="button_submit" type="submit" value="Isplata" />

</div>
        <?php echo form_close(); ?>
   
</div>
        
       
</div>

<div id="three-column" class="container">
     
      <a href=<?php echo base_url().'Client'; ?> class="button_logout_client">korak nazad</a> 

</div>

</div>
