<div id="three-column" class="container">
    
    
    <div id="tbox1">
        <span class="icon icon-wrench"></span>
        <div class="title">
            <h2>uplata na račun</h2>
        </div>
        <p> Ovaj servis omogućuje sve vidove uplata na račun poverioca. Mogu se izvršiti i oslali  
        vidovi plaćanja putem opšte uplatnice.</p>
<?php if (!$this->session->userdata('logged_client'))
{

?>
        <a href=<?php echo base_url()."Home/clients_payment";  ?> class="button">Izvrši uplatu</a>
        <?php
}
else {
    
?>
        <a href=<?php echo base_url()."Client/uplata";  ?> class="button">Izvrši uplatu</a>
        <?php
}
        ?>
 
    </div>

    <div id="tbox2">
        <span class="icon icon-cogs"></span>
        <div class="title">
            <h2>isplata gotovine</h2>
        </div>
        <p> Ovaj servis omogućuje sve isplatu novca u gotovom. Neophodno je imati sredstva na računu za uspešnu za uspešnu realizaciju.</p>
       
        
        <?php if (!$this->session->userdata('logged_client'))
{

?>
        <a href=<?php echo base_url()."Home/clients_payout";  ?> class="button">Izvrši isplatu</a>
        <?php
}
else {
    
?>
        <a href=<?php echo base_url()."Client/isplata";  ?> class="button">Izvrši isplatu</a>
        <?php
}
        ?>
        
    </div>
  
    <div id="tbox3">
        <span class="icon icon-legal"></span>
        <div class="title">
            <h2>Uplata na sopstven račun</h2>
        </div>
        <p> Ovim servisom možete izvršiti uplate na sopstven račun.</p>
         <?php if (!$this->session->userdata('logged_client'))
{

?>
        <a href=<?php echo base_url()."Home/payment_personal";  ?> class="button">Uplati na račun</a>
        <?php
}
else {
    
?>
        <a href=<?php echo base_url()."Client/uplata_licni";  ?> class="button">Uplati na račun</a>
        <?php
}
        ?>
    </div>

   </div>
</div>