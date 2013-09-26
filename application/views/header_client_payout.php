<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ebanking</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

<link href=<?php echo base_url()."css/default.css"; ?> rel="stylesheet" type="text/css" media="all" />
<link href=<?php echo base_url()."css/fonts.css"; ?> rel="stylesheet" type="text/css" media="all" />

</head>
    <body>
        
        <div id="logo" class="container">
    <h2 align="center"><span class="icon icon-lock icon-size"></span>
        
        <?php $temp = $this->session->userdata('logged');
        $users['username'] = $temp['username'];
        
        echo 'dobrodošli: <span>'.$users['username'].'</span>';
        ?>
      </h2>
	<p align="center"> Created by Vladimir Radovanović</p> <br /><br />
        
        <p align="center"> Unesite podatke za pristup korisničkim podacima</p>
        <div id="hrl"></div>
        <br />
         <div id="three-column" class="container">


        <div style="margin-top: 10px">
            
            <?php echo validation_errors(); ?>
        
    
       <?php echo form_open('Home/validation_isplata'); ?>
    
    <table cellspacing="5"  style="display: inline-block; none: 1px solid; float: center; ">
        <tr><td>
                Broj računa:
            </td>
            <td>
                <input type="text" name="brracuna">
            </td>
        </tr>
        <tr>
            <td>
                Broj lične karte:
            </td>
            <td>
                <input type="text" name="brojlk">
            </td>
        </tr>
      
    </table>
            <br />
    <input type="submit" name="submit" class="button_loggin" value="Prijavi klijenta">
        
        <?php echo form_close(); ?>
        
</div>
             </div>
        </div>