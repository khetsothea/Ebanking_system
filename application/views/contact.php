
<div id="three-column" class="container">
    
      <a href=<?php echo base_url().'Home'; ?> class="button_logout_client">korak nazad</a>  
      <br /> <br /> 
      <?php echo validation_errors(); ?>
                 <div id="form_kontakt">
           
        <?php echo form_open('Home/validation_contact'); ?>

       <div>
<label>
<span>Ime:</span><input div id="input" id="email" type="text" name="ime" /> 
</label>

<br />
<br />
<label>
<span>Email:</span><input div id="input" id="email" type="text" name="email" /> 
</label>
<br /><br />
<label>

<label>
    <span>Kratka poruka:</span>
   <textarea class="message"  id="comment" name="poruka"></textarea>

</label>
     za:  vl.radovanovic [et] gmail.com


<input class="button_submit" type="submit" value="Pošalji" />

</div>
        <?php echo form_close(); ?>
  </div>
        
       
</div>

<div id="three-column" class="container">
     
</div>

</div>


