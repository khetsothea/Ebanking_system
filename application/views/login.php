
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
    <h1 align="center"><span class="icon icon-lock icon-size"></span><a href=<?php echo base_url(); ?>>online<span> banking</span></a></h1>
	<p align="center"> Created by Vladimir Radovanović</p>
</div>
    
  
    
    <div id="three-column" class="container">


        <div style="margin-top: 10px">
    
    <?php echo validation_errors(); ?>
    <?php echo form_open('LoginController/provera'); ?>
    
    
    
    <table cellspacing="5"  style="display: inline-block; none: 1px solid; float: center; ">
        <tr><td>
                Korisničko ime:
            </td>
            <td>
                <input type="text" name="username">
            </td>
        </tr>
        <tr>
            <td>
                Lozinka:
            </td>
            <td>
                <input type="password" name="password">
            </td>
        </tr>
      
    </table>
            <br />
            
    
    <input type="submit" name="submit" class="button_loggin" value="Prijavi me">
        
        <?php echo form_close(); ?>
        </div>
    </div>

</body>
</html>