<?php

class Client extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('BankModel');
    }
    
    function index()
    {
        if ($this->session->userdata('logged'))
        {
             if ($this->session->userdata('logged_client'))
        {
            $temp = $this->session->userdata('logged_client');
            $obj['id'] = $temp['id'];
            
            $records = $this->BankModel->getData($obj);
           
            $other_records = $this->BankModel->getAccount($obj);
              
                $this->load->view('header_logged_client', array ('records' => $records, 'other_records' => $other_records, 'obj' => $obj));
                $this->load->view('content_client');
                $this->load->view('footer');   
  
        }
        else {
            $this->load->view('restricted_client');
            $this->load->view('footer');
 }
        }
 else {
            $this->load->view('restricted');
            $this->load->view('footer');
 }
  
    
    }

    function logout()
    {
        $this->session->unset_userdata('logged_client');
        redirect('Home', 'refresh');
    }
    
    function uplata()
    {
        
        if ($this->session->userdata('logged'))
        {
             if ($this->session->userdata('logged_client'))
        {
        $temp = $this->session->userdata('logged_client');
            $obj['id'] = $temp['id'];
            
            $records = $this->BankModel->getData($obj);
           
            $other_records = $this->BankModel->getAccount($obj);
              
                $this->load->view('header_logged_client', array ('records' => $records, 'other_records' => $other_records, 'obj' => $obj));
                $this->load->view('payment', array('records' => $records, 'obj' => $obj));
                $this->load->view('footer'); 
  
        }
        else {
            $this->load->view('restricted_client');
            $this->load->view('footer');
 }
        }
 else {
            $this->load->view('restricted');
            $this->load->view('footer');
 }
        
        
    }
    
    function validation_uplata()
    {
        $this->form_validation->set_rules('primalac', 'Primalac', 'trim|required|xss_clean');
        $this->form_validation->set_rules('svrha_uplate', 'Svrha uplate', 'trim|required|xss_clean');
        $this->form_validation->set_rules('racun_primaoca', 'Račun primaoca', 'trim|required|xss_clean');
        $this->form_validation->set_rules('iznos', 'Iznos', 'trim|required|xss_clean|callback_check_uplata');
 
        if ($this->form_validation->run())
        {
                       
           redirect(site_url().'Client', 'refresh');
            
        }
 else {
      $temp = $this->session->userdata('logged_client');
            $obj['id'] = $temp['id'];
            
            $records = $this->BankModel->getData($obj);
           
            $other_records = $this->BankModel->getAccount($obj);
              
                $this->load->view('header_logged_client', array ('records' => $records, 'other_records' => $other_records, 'obj' => $obj));
                $this->load->view('payment', array('records' => $records, 'obj' => $obj));
                $this->load->view('footer'); 
 }
    }
    
    function check_uplata()
    {
            $temp = $this->session->userdata('logged_client');
            $obj['id'] = $temp['id'];
            $iznos = $this->input->post('iznos');
            $records = $this->BankModel->getData($obj);
            $trenutno_stanje = $this->BankModel->getTrenutnoStanje($obj);
            
           if ($trenutno_stanje <= '0')
           {
               $this->load->view('no_money');
                 $this->load->view('footer');
               return FALSE;
           }
            
           elseif ($this->BankModel->uplati($records,  $iznos))
         {
             
             $novo_stanje = $trenutno_stanje - $iznos;
             
             if ($novo_stanje < '0')
             {
                 $this->load->view('no_overdraft');
                 $this->load->view('footer');
                 return FALSE;
             }
             
                 elseif ($this->BankModel->oduzmi_stanje($novo_stanje, $trenutno_stanje, $obj))
             {
                   return TRUE;
             }
else    return FALSE;           
         }
             else                 return FALSE;
             
            }

    function isplata()
    {
         if ($this->session->userdata('logged'))
        {
             if ($this->session->userdata('logged_client'))
        {
        $temp = $this->session->userdata('logged_client');
            $obj['id'] = $temp['id'];
            
            $records = $this->BankModel->getData($obj);
           
            $other_records = $this->BankModel->getAccount($obj);
              
                $this->load->view('header_logged_client', array ('records' => $records, 'other_records' => $other_records, 'obj' => $obj));
                $this->load->view('payout', array('records' => $records, 'obj' => $obj));
                $this->load->view('footer'); 
  
        }
        else {
            $this->load->view('restricted_client');
            $this->load->view('footer');
 }
        }
 else {
            $this->load->view('restricted');
            $this->load->view('footer');
 }
    }
    
    function validation_isplata()
    {
        {
        $this->form_validation->set_rules('primalac', 'Primalac', 'trim|required|xss_clean');
        $this->form_validation->set_rules('svrha_isplate', 'Svrha isplate', 'trim|required|xss_clean');
        
        $this->form_validation->set_rules('iznos', 'Iznos', 'trim|required|xss_clean|callback_check_isplata');
 
        if ($this->form_validation->run())
        {
                       
           redirect(site_url().'Client', 'refresh');
            
        }
 else {
      $temp = $this->session->userdata('logged_client');
            $obj['id'] = $temp['id'];
            
            $records = $this->BankModel->getData($obj);
           
            $other_records = $this->BankModel->getAccount($obj);
              
                $this->load->view('header_logged_client', array ('records' => $records, 'other_records' => $other_records, 'obj' => $obj));
                $this->load->view('payout', array('records' => $records, 'obj' => $obj));
                $this->load->view('footer'); 
 }
    }
    }
    
    function check_isplata()
    {
            $temp = $this->session->userdata('logged_client');
            $obj['id'] = $temp['id'];
            $iznos = $this->input->post('iznos');
            $records = $this->BankModel->getData($obj);
            $trenutno_stanje = $this->BankModel->getTrenutnoStanje($obj);
            
         if ($trenutno_stanje <= '0')
           {
               $this->load->view('no_money');
                 $this->load->view('footer');
               return FALSE;
           }
            
           elseif ($this->BankModel->isplati($records,  $iznos))
         {
             
             $novo_stanje = $trenutno_stanje - $iznos;
             
             if ($novo_stanje < '0')
             {
                 $this->load->view('no_overdraft');
                 $this->load->view('footer');
                 return FALSE;
             }
             
                 elseif ($this->BankModel->oduzmi_stanje($novo_stanje, $trenutno_stanje, $obj))
             {
                   return TRUE;
             }
else    return FALSE;           
         }
             else                 return FALSE;
    }
    
    function uplata_licni()
    {
         if ($this->session->userdata('logged'))
        {
             if ($this->session->userdata('logged_client'))
        {
        $temp = $this->session->userdata('logged_client');
            $obj['id'] = $temp['id'];
            
            $records = $this->BankModel->getData($obj);
           
            $other_records = $this->BankModel->getAccount($obj);
              
                $this->load->view('header_logged_client', array ('records' => $records, 'other_records' => $other_records, 'obj' => $obj));
                $this->load->view('payment_personal', array('records' => $records, 'obj' => $obj));
                $this->load->view('footer'); 
  
        }
        else {
            $this->load->view('restricted_client');
            $this->load->view('footer');
 }
        }
 else {
            $this->load->view('restricted');
            $this->load->view('footer');
 }
    }
    
    function validation_uplata_licni()
   {
        {
        
        $this->form_validation->set_rules('iznos', 'Iznos', 'trim|required|xss_clean|callback_check_uplata_licni');
 
        if ($this->form_validation->run())
        {
                       
           redirect(site_url().'Client', 'refresh');
            
        }
 else {
      $temp = $this->session->userdata('logged_client');
            $obj['id'] = $temp['id'];
            
            $records = $this->BankModel->getData($obj);
           
            $other_records = $this->BankModel->getAccount($obj);
              
                $this->load->view('header_logged_client', array ('records' => $records, 'other_records' => $other_records, 'obj' => $obj));
                $this->load->view('payment_personal', array('records' => $records, 'obj' => $obj));
                $this->load->view('footer'); 
 }
    }
    }
    
    function check_uplata_licni()
    {
            $temp = $this->session->userdata('logged_client');
            $obj['id'] = $temp['id'];
            $iznos = $this->input->post('iznos');
            $records = $this->BankModel->getData($obj);
            $trenutno_stanje = $this->BankModel->getTrenutnoStanje($obj);
            
        if ($this->BankModel->uplati_licni($records,  $iznos))
         {
             
             $novo_stanje = $trenutno_stanje + $iznos;
             
             if ($this->BankModel->oduzmi_stanje($novo_stanje, $trenutno_stanje, $obj))
             {
                   return TRUE;
             }
else    return FALSE;           
         }
             else                 return FALSE;
    }


    function uvid()
    {
        if ($this->session->userdata('logged'))
        {
             if ($this->session->userdata('logged_client'))
        {
            $temp = $this->session->userdata('logged_client');
            $obj['id'] = $temp['id'];
            
            $records = $this->BankModel->getData($obj);
           
            $other_records = $this->BankModel->getAccount($obj);
            
            $payment = $this->BankModel->getPayment($obj);
            $payoff = $this->BankModel->getPayoff($obj);
            $payment_personal = $this->BankModel->getPaymentPersonal($obj);
              
                $this->load->view('header_logged_client', array ('records' => $records, 'other_records' => $other_records, 'obj' => $obj));
                $this->load->view('access', array('records' => $records, 'payment' => $payment, 'payoff' => $payoff,
                    'payment_personal' => $payment_personal,'obj' => $obj));
                $this->load->view('footer'); 
  
        }
        else {
            $this->load->view('restricted_client');
            $this->load->view('footer');
 }
        }
 else {
            $this->load->view('restricted');
            $this->load->view('footer');
 }
    }
    


    function edit_client()
    {
        
        if ($this->session->userdata('logged'))
            
        {
             if ($this->session->userdata('logged_client'))
        {
            $temp = $this->session->userdata('logged_client');
            $obj['id'] = $temp['id'];
            
            $records = $this->BankModel->getBodyData();

                $this->load->view('edit_client_data', array ('records' => $records,  'obj' => $obj));
                
                $this->load->view('footer'); 
        }
        
        else {
            $this->load->view('restricted_client');
            $this->load->view('footer');
 }
        }
 else {
            $this->load->view('restricted');
            $this->load->view('footer');
 }
    }
    
    function edit_account()
    {
        
        if ($this->session->userdata('logged'))
            
        {
             if ($this->session->userdata('logged_client'))
        {
            $temp = $this->session->userdata('logged_client');
            $obj['id'] = $temp['id'];
            
            $records = $this->BankModel->getAccountData();

                $this->load->view('edit_account_data', array ('records' => $records,  'obj' => $obj));
                
                $this->load->view('footer'); 
        }
        
        else {
            $this->load->view('restricted_client');
            $this->load->view('footer');
 }
        }
 else {
            $this->load->view('restricted');
            $this->load->view('footer');
 }
    }
    
    function verify_edit_client()
    {
        $this->form_validation->set_rules('ime', 'Ime', 'trim|required|xss_clean');
        $this->form_validation->set_rules('prezime', 'Prezime', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ulica', 'Ulica', 'trim|required|xss_clean');
        $this->form_validation->set_rules('mesto', 'Mesto', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telefon', 'Telefon', 'trim|required|xss_clean');
        
        if ($this->form_validation->run() == TRUE)
        {
            $id = $this->uri->segment(3);
            $this->BankModel->edit_client($id);
            
            redirect(site_url().'Client', 'refresh');
        }
 else     echo 'error';
    }
    
    function verify_edit_account()
    {
        $this->form_validation->set_rules('broj_racuna', 'Broj računa', 'trim|required|xss_clean');
        $this->form_validation->set_rules('vrsta', 'Vrsta', 'trim|required|xss_clean');
        $this->form_validation->set_rules('banka', 'Banka', 'trim|required|xss_clean');
       
        
        if ($this->form_validation->run() == TRUE)
        {
            $id = $this->uri->segment(3);
            $this->BankModel->edit_account($id);
            
            redirect(site_url().'Client', 'refresh');
        }
 else     echo 'error';
    }
    
}
?>