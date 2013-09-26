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
    <h2 align="center"><span class="icon icon-unlock icon-size"></span>
        
        <?php $temp = $this->session->userdata('logged');
        $users['username'] = $temp['username'];
        
        echo 'dobrodošli: <span>'.$users['username'].'</span>';
        ?>
      </h2>
	<p align="center"> Created by Vladimir Radovanović</p>
        <div id="hrl"></div>
        <div id="three-column" class="container">
  <a href=<?php echo base_url().'Client/logout'; ?> class="button_logout_client">odjava korisnika</a>
            <br />
            <br />
             
             <?php foreach ($records as $rec): ?>
            
           <table border="0" width="400" height="340" bgcolor="#FFFFFF" cellspacing="10" style="display: inline-block; none: 1px solid; float: left; ">
             
                 <tr>
                     <td colspan="2" align="center" style="display: inline-block; none: 0px solid;">
                         <b>Podaci o klijentu:</b>
                     </td>
                     
                 </tr>
                 <tr>
                     <td>
                         Ime:
                     </td>
                     <td>
                         <b> <?php echo $rec->ime; ?> </b>
                     </td>
                 </tr>
                 
                  <tr>
                     <td>
                         Prezime:
                     </td>
                     <td>
                         <b> <?php echo $rec->prezime; ?> </b>
                     </td>
                 </tr>
                 
                  <tr>
                     <td>
                         Ulica:
                     </td>
                     <td>
                         <b><?php echo $rec->ulica; ?></b>
                     </td>
                 </tr>
                 
                  <tr>
                     <td>
                         mesto:
                     </td>
                     <td>
                         <b><?php echo $rec->mesto; ?></b>
                     </td>
                 </tr>
                 
                  <tr>
                     <td>
                         telefon:
                     </td>
                     <td>
                         <b><?php echo $rec->telefon; ?></b>
                     </td>
                 </tr>
                 <tr>
                     <td colspan="2" align="center" style="display: inline-block; none: 0px solid;">
                         <a href="<?php echo site_url(). 'Client/edit_client/'.$rec->id; ?>" class="button_back" align="right">izmena podataka</a>
                     </td>
                 </tr>
    
             </table>
            <?php endforeach; ?>
            

<?php foreach ($other_records as $red): ?>
    <table border="0" width="400" height="340" bgcolor="#FFFFFF" cellspacing="10" style="display: inline-block; none: 1px solid; float: right; ">
             
                 <tr>
                     <td colspan="2" align="center" style="display: inline-block; none: 1px solid;">
                         <b>Podaci o računima:</b>
                     </td>
                     
                 </tr>
                 <tr>
                     <td>
                         Broj računa:
                     </td>
                     <td>
                         <b> <?php echo $red->broj_racuna; ?> </b>
                     </td>
                 </tr>
                 
                  <tr>
                     <td>
                         Vrsta:
                     </td>
                     <td>
                         <b> <?php echo $red->vrsta; ?> </b>
                     </td>
                 </tr>
                 
                  <tr>
                     <td>
                         Banka:
                     </td>
                     <td>
                         <b> <?php echo $red->banka; ?> </b>
                     </td>
                 </tr>
                 
                  <tr>
                     <td>
                         Prethodno stanje:
                     </td>
                     <td>
                         <b> <?php echo number_format($red->prethodno_stanje, 2, ',', ' '); ?> </b>
                     </td>
                 </tr>
                 
                  <tr>
                     <td>
                         Trenutno stanje:
                     </td>
                     <td>
                         <b> <?php echo number_format($red->trenutno_stanje, 2, ',', ' '); ?> </b>
                     </td>
                 </tr>
                 <tr>
                     <td colspan="2" align="center" style="display: inline-block; none: 0px solid;">
                         <a href="<?php echo site_url(). 'Client/edit_account/'.$rec->id; ?>" class="button_back" align="right">izmena podataka</a>
                     </td>
                 </tr>
    
             </table>
           
            <?php endforeach; ?>
</div>
        </div>