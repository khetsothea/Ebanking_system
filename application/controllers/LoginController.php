<?php

class LoginController extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('BankModel');
    }


    function index()
    {
        $this->load->view('login');
    }
    
    function provera()
    {
        $this->form_validation->set_rules('username', 'Korisničko ime', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Lozinka', 'trim|required|xss_clean|callback_proveri_lozinku');
        
        if ($this->form_validation->run())
        {
            redirect('Home', 'refresh');
        }
 else {
            $this->load->view('login');    
        }   
    
    }
    
    function proveri_lozinku($user, $pass)
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        
        if ($result = $this->BankModel->proveri($user, $pass))
        {
            $sess_array = array();
            foreach ($result as $rec) {
                $sess_array = array(
                    'username' => $rec->username,
                );
            }
            $this->session->set_userdata('logged', $sess_array);
            return TRUE;
        }
 else {
            $this->form_validation->set_message('proveri_lozinku', 'GREŠKA! Uneli ste pogrešno korisničko ime
                ili lozinku. Pokušajte ponovo!');
            return FALSE;
 }
    }
}

?>
