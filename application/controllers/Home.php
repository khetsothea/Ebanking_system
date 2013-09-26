<?php

class Home extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('BankModel');
    }
    
    function index()
    {
        if ($this->session->userdata('logged'))
        {
            $this->load->view('header');
            $this->load->view('menu');
            $this->load->view('content');
            $this->load->view('footer');
        }
        
 else {
            $this->load->view('restricted');
 }
    }
    
    function logout()
    {
        $this->session->unset_userdata('logged');
        redirect(base_url());
    }   
    
    function clients_payment()
    {
        
       
            $this->load->view('header_client_payment');
            
            $this->load->view('footer');   
    }
    
    function clients_payout()
    {
            $this->load->view('header_client_payout');
            
            $this->load->view('footer'); 
    }
    
    function payment_personal()
    {
        $this->load->view('header_payment_personal');
            
            $this->load->view('footer');
    }


    function clients_history()
    {
            $this->load->view('header_client_history');
            
            $this->load->view('footer');
    }


    function clients_access()
    {
            $this->load->view('clients_access');
            
            $this->load->view('footer'); 
    }


    function validation_uplata()
    {
        $this->form_validation->set_rules('brracuna', 'Broj računa', 'trim|required|xss_clean');
        $this->form_validation->set_rules('brojlk', 'Broj lične karte', 'trim|required|xss_clean|callback_provera_korisnika');
        
        if ($this->form_validation->run())
        {
            redirect(site_url().'Client/uplata', 'refresh');
        }
        
 else {
     
            $this->load->view('header_client_payment');
            
            $this->load->view('footer');
 }
    }
    
     function validation_isplata()
    {
        $this->form_validation->set_rules('brracuna', 'Broj računa', 'trim|required|xss_clean');
        $this->form_validation->set_rules('brojlk', 'Broj lične karte', 'trim|required|xss_clean|callback_provera_korisnika');
        
        if ($this->form_validation->run())
        {
            redirect(site_url().'Client/isplata', 'refresh');
        }
        
 else {
     
            $this->load->view('header_client_payment');
            
            $this->load->view('footer');
 }
    }
    
    function validation_uplata_licni()
      {
        $this->form_validation->set_rules('brracuna', 'Broj računa', 'trim|required|xss_clean');
        $this->form_validation->set_rules('brojlk', 'Broj lične karte', 'trim|required|xss_clean|callback_provera_korisnika');
        
        if ($this->form_validation->run())
        {
            redirect(site_url().'Client/uplata_licni', 'refresh');
        }
        
 else {
     
            $this->load->view('header_payment_personal');
            
            $this->load->view('footer');
 }
    }


    function validation_access()
    {
        $this->form_validation->set_rules('brracuna', 'Broj računa', 'trim|required|xss_clean');
        $this->form_validation->set_rules('brojlk', 'Broj lične karte', 'trim|required|xss_clean|callback_provera_korisnika');
        
        if ($this->form_validation->run())
        {
            redirect(site_url().'Client', 'refresh');
        }
        
 else {
     
            $this->load->view('clients_access');
            
            $this->load->view('footer');
 }
    }
    
    function validation_istorija()
    {
        {
        $this->form_validation->set_rules('brracuna', 'Broj računa', 'trim|required|xss_clean');
        $this->form_validation->set_rules('brojlk', 'Broj lične karte', 'trim|required|xss_clean|callback_provera_korisnika');
        
        if ($this->form_validation->run())
        {
            redirect(site_url().'Client/uvid', 'refresh');
        }
        
 else {
     
            $this->load->view('header_client_history');
            
            $this->load->view('footer');
 }
    }
    }
    
    function kontakt()
    {
        if ($this->session->userdata('logged'))
        {
            $this->load->view('header');
            $this->load->view('menu');
            $this->load->view('contact');
            $this->load->view('footer');
        }
        
 else {
            $this->load->view('restricted');
 }
      
    }
    
    function o_meni()
    {
        if ($this->session->userdata('logged'))
        {
            $this->load->view('header');
            $this->load->view('menu');
            $this->load->view('about_me');
            $this->load->view('footer');
        }
 else {
            $this->load->view('restricted');
 }
    }
    
    function o_aplikaciji()
    {
        if ($this->session->userdata('logged'))
        {
            $this->load->view('header');
            $this->load->view('menu');
            $this->load->view('about_app');
            $this->load->view('footer');
        }
 else {
            $this->load->view('restricted');
 }
    }


    function validation_contact()
    {
        $this->form_validation->set_rules('ime', 'Ime', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('poruka', 'Poruka', 'trim|required|xss_clean');
         
        if ($this->form_validation->run())
        {
            $this->load->helper('email');
            $this->load->library('email');
             
            $this->email->from(set_value("email"), set_value("ime"));
            $this->email->to("vl.radovanovic@gmail.com");
            $this->email->subject('Pitanje u vezi aplikacije ebanking');
            $this->email->message(set_value("poruka"));
             
            $mail = $this->email->send();          
            if ($mail)
            {
                 $this->load->view('header');
                 $this->load->view('success');
                 $this->load->view('footer');
            }
                 
            else show_404();
        }
         
        else {
            
            $this->load->view('header');
            $this->load->view('menu');
            $this->load->view('contact');
            $this->load->view('footer');
        }
    }

    function provera_korisnika()
    {
        $br_racuna = $this->input->post('brracuna');
        $br_licne_karte = $this->input->post('brojlk');
        
        if ($redovi = $this->BankModel->proveri_korisnika($br_racuna, $br_licne_karte))
        {
            $sess_array = array();
            foreach ($redovi as $red) {
                $sess_array = array(
                    'ime' =>$red->ime,
                    'id' => $red->id
                        );
            }
            
            return $this->session->set_userdata('logged_client', $sess_array);
           
        }
 else {
     
            $this->form_validation->set_message('provera_korisnika','
            GREŠKA. Uneli ste pogrešan broj računa ili lične karte, Pokušajte ponovo');
            
            return FALSE;
 }
        
    }
}
?>