
<div id="three-column" class="container">
    
      <a href=<?php echo base_url().'Client'; ?> class="button_logout_client">korak nazad</a>  
      <br /> <br /> 
      <?php echo validation_errors(); ?>
                 <div id="form_uplata">
                     
                     
        <?php echo form_open('Client/validation_uplata'); ?>
                     <?php foreach ($records as $rec): ?>
        
       <div>
<h1>Uplata na račun:</h1><br /><br />
<label>
    <span>Uplatilac: </span>  <?php echo $rec->ime.' '.$rec->prezime; ?> 
</label>
<?php endforeach; ?>
<br /> <br />
<label>
<span>Primalac:</span><input div id="input" id="email" type="text" name="primalac" /> 
</label>

<br />
<label>
<span>Svrha uplate:</span><textarea class="message" id="feedback" name="svrha_uplate"></textarea>

</label>
<br />
<label>
<span>Račun primaoca</span>:<input div id="input" id="email" type="text" name="racun_primaoca" /> 
</label>
<br />
<label>
<span>Iznos</span>:<input div id="input" id="email" type="text" name="iznos" /> 
</label>
<br />
<label>
<span>Poziv na broj:</span><input div id="input" id="email" type="text" name="poziv_na_broj" /> 
</label>
<br />
<label>
<span>Komentar:</span><textarea class="message" id="comment" name="komentar"></textarea>

</label>


<input class="button_submit" type="submit" value="Uplata" />

</div>
        <?php echo form_close(); ?>
  </div>
        
       
</div>

<div id="three-column" class="container">
     
      <a href=<?php echo base_url().'Client'; ?> class="button_logout_client">korak nazad</a> 

</div>

</div>


