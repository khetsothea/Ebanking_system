<div id="three-column" class="container">

      <a href=<?php echo base_url().'Client'; ?> class="button_logout_client">korak nazad</a> 
    
    
   
        <div style="margin-top: 10px">
            
            Broj računa:
            <?php foreach ($other_records as $row) {
     echo ' <b>'.$row->broj_racuna. '</b>';
            } ?>
            
           <br /> 
           &nbsp;&nbsp;&nbsp;Korisnik:
           
           <?php foreach ($records as $row) {
     echo ' <b>'.$row->ime.' '.$row->prezime. '</b>';
            } ?>
            
        </div>
        <div class="separator_thin">
            
        </div>
      
      <b> UPLATE KORISNIKA: </b>
   <br />
      <div class="separator_thin">
            
        </div>
      
        <table cellspacing="5"  style="display: inline-block; none: 1px solid; float: center; ">
            
            <thead>
                <tr>
                    <th>
                        Datum i vreme uplate
                    </th>
                
                    
                    <th>Iznos</th>
                    <th>Primalac</th>
                    <th>Račun primaoca</th>
                    <th>Svrha uplate</th>
                </tr>
            </thead>
            
            <tbody>
                
               
                    
                <tr>
                <?php foreach ($payment as $pay):
                    ?>
                  
 
                    <td>
                        <?php echo date("d.m.Y - H:i:s", strtotime($pay->datum)); ?>
                    </td>
                    
                    
                    <td><?php echo $pay->iznos; ?></td>
                    <td><?php echo $pay->primalac; ?></td>
                    <td><?php echo $pay->racun_primaoca; ?></td>
                    <td><?php echo $pay->svrha; ?></td>
                    
                </tr>
                
                <?php endforeach; ?>
            </tbody>
        </table>
     
        
        <div class="separator_thin"> </div>
        <br />
        <b> ISPLATE KORISNIKA: </b>
        <br />
      <div class="separator_thin">
            
        </div>
  
        <table cellspacing="5"  style="display: inline-block; none: 1px solid; float: center; ">
            <tbody>
                
                <tr>
                    <th>
                        Datum i vreme isplate
                    </th>
                    
                    
                    
                    <th>Iznos</th>
                    <th>Isplatilac</th>
                    <th>Primalac</th>
                    <th>Svrha isplate</th>
                </tr>
                <?php foreach ($payoff as $pad):
                    ?>
                   <tr>
 
                    <td>
                        <?php echo date("d.m.Y H:i:s", strtotime($pad->datum)); ?>
                    </td>
                    
                   
                    
                    <td><?php echo $pad->iznos; ?></td>
                    <td><?php echo $pad->isplatilac; ?></td>
                    
                    <td><?php echo $pad->primalac; ?></td>
                    
                    <td><?php echo $pad->svrha; ?></td>
                    
                </tr>
                
                <?php endforeach; ?>
            </tbody>
        </table>
        
        
        
        <div class="separator_thin"> </div>
        <br />
        <b> UPLATE NA LIČNI RAČUN: </b>
        <br />
      <div class="separator_thin">
            
        </div>
  
        <table cellspacing="5"  style="display: inline-block; none: 1px solid; float: center; ">
            <tbody>
                
                <tr>
                    <th>
                        Datum i vreme uplate
                    </th>
                    
                    
                    
                    <th>Iznos</th>
                   
                </tr>
                <?php foreach ($payment_personal as $psv):
                    ?>
                   <tr>
 
                    <td>
                        <?php echo date("d.m.Y H:i:s", strtotime($psv->datum)); ?>
                    </td>
                    
                   
                    
                    <td><?php echo $psv->iznos; ?></td>
                   
                </tr>
                
                <?php endforeach; ?>
            </tbody>
        </table>
        
        
        
        <div class="separator_thin">
            
        </div>
        <br />
        <a href=<?php echo base_url().'Client'; ?> class="button_logout_client">korak nazad</a>
        <div style="margin-top: 10px">
             
           
            Broj računa:
            <?php foreach ($other_records as $row) {
     echo ' <b>'.$row->broj_racuna. '</b>';
            } ?>
            
           <br /> 
           &nbsp;&nbsp;&nbsp;Korisnik:
           
           <?php foreach ($records as $row) {
     echo ' <b>'.$row->ime.' '.$row->prezime. '</b>';
            } ?>
    
        </div>

    </div>
</div>