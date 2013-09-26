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
        
        <a href=<?php echo base_url()."Home/logout"; ?> class="button_logout" >odjava</a>
</div>
        </div>