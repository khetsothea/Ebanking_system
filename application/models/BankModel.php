<?php

class BankModel extends CI_Model
{
    function proveri($user, $pass)
    {
        $this->db->where('username', $user);
        $this->db->where('password', md5($pass));
        
        $query = $this->db->get('korisnici');
        if ($query->num_rows() == 1)
        {
            return $query->result();
            return TRUE;
        }
        else            return FALSE;
    }
    
    function proveri_korisnika($br_racuna, $br_licne_karte)
    {
        $this->db->where('brracuna', $br_racuna);
        $this->db->where('brojlk', $br_licne_karte);
        
        $query = $this->db->get('klijenti');
        if ($query->num_rows() == 1)
        {
            return $result = $query->result();
            return TRUE;
        }
        else            return FALSE;
    }
    
    function getPayment($obj)
    {
        $this->db->select('t1.id_klijenta, t1.datum, t1.iznos, t1.primalac, t1.racun_primaoca, t1.svrha, t2.id');
        $this->db->from('nalog_uplata AS t1, klijenti AS t2');
        $this->db->where('t1.id_klijenta = t2.id');
        $this->db->where('t2.id', $obj['id']);
        $this->db->order_by('datum', 'desc');
        
        
        $query = $this->db->get();
        
        if ($query->num_rows >= 0)
        {
            return $result = $query->result();
         
        }
        else            return FALSE;
    }
    
    function getPayoff($obj)
    {
        $this->db->select('t1.id_klijenta, t1.datum, t1.iznos, t1.isplatilac, t1.primalac,  t1.svrha, t2.id');
        $this->db->from('nalog_isplata AS t1, klijenti AS t2');
        $this->db->where('t1.id_klijenta = t2.id');
        $this->db->where('t2.id', $obj['id']);
        $this->db->order_by('datum', 'desc');
        
        
        $query = $this->db->get();
        
        if ($query->num_rows >= 0)
        {
            return $result = $query->result();
         
        }
        else            return FALSE;
    }
    
    function getPaymentPersonal($obj)
    {
        $this->db->select('t1.id_klijenta, t1.datum, t1.iznos, t2.id');
        $this->db->from('uplata_licni AS t1, klijenti AS t2');
        $this->db->where('t1.id_klijenta = t2.id');
        $this->db->where('t2.id', $obj['id']);
        $this->db->order_by('datum', 'desc');
        
        
        $query = $this->db->get();
        
        if ($query->num_rows >= 0)
        {
            return $result = $query->result();
         
        }
        else            return FALSE;
    }




    function getData($obj)
    {
        $this->db->select('*');
        $this->db->from('klijenti');
        $this->db->where('id', $obj['id']);
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        if ($query->num_rows == 1)
        {
            return $result = $query->result();
         
        }
        else            return FALSE;
    }
    
    function getAccount($obj)
    {
        $this->db->select('t1.broj_racuna, t1.JMBG, t1.vrsta, t1.banka, t1.prethodno_stanje, t1.trenutno_stanje, t2.JMBG');
        $this->db->from('racun AS t1, klijenti AS t2');
        $this->db->where('t1.JMBG = t2.JMBG');
        $this->db->where('t2.id', $obj['id']);
        $this->db->limit(1);
        
        
        $query = $this->db->get();
        
        if ($query->num_rows == 1)
        {
            return $result = $query->result();
         
        }
        else            return FALSE;
    }
    
    function edit_client($id)
    {
        $data = array ('ime' => $this->input->post('ime'), 
            'prezime' => $this->input->post('prezime'),
            'ulica' => $this->input->post('ulica'),
            'mesto' => $this->input->post('mesto'),
            'telefon' => $this->input->post('telefon'));
        
       $this->db->where('id', $id);
    $update = $this->db->update('klijenti', $data);
    return $update;
    }
    
    function edit_account($id)
    {
        $data = array ('broj_racuna' => $this->input->post('broj_racuna'), 
            'vrsta' => $this->input->post('vrsta'),
            'banka' => $this->input->post('banka')
            );
        
       $this->db->where('id', $id);
    $update = $this->db->update('racun', $data);
    return $update;
    }
    
    function getBodyData()
    {
        $this->db->select('ime, prezime, ulica, mesto, telefon');
        $this->db->from('klijenti');
        $this->db->where('id', $this->uri->segment(3));
       
        $upit = $this->db->get();
        
        if ($upit->num_rows > 0)
        {
            return $upit->result();
            return TRUE;
        }
        else            return FALSE;
    }
    
    function getAccountData()
    {
        $this->db->select('*');
        $this->db->from('racun');
        $this->db->where('id', $this->uri->segment(3));
       
        $upit = $this->db->get();
        
        if ($upit->num_rows > 0)
        {
            return $upit->result();
            return TRUE;
        }
        else            return FALSE;
    }
    
    function getTrenutnoStanje($obj)
    {
        
        
        $this->db->where('id', $obj['id']);
        $query = $this->db->get('racun');
        
        foreach ($query->result() as $row) {
            return $row->trenutno_stanje;
       
    }
    }


    function uplati($records, $iznos)
    {
        foreach ($records as $rec) {
            
        $data = array('uplatilac' => $rec->ime.' '.$rec->prezime,
            'JMBG' => $rec->JMBG,
            'primalac' => $this->input->post('primalac'),
       'svrha' => $this->input->post('svrha_uplate'),
        'racun_primaoca' => $this->input->post('racun_primaoca'),
        'iznos' => $iznos,
            'id_klijenta' => $rec->id,
       'poziv_na_broj' => $this->input->post('poziv_na_broj'),
        'komentar' => $this->input->post('komentar'));
 
    }
    
    $query = $this->db->insert('nalog_uplata', $data);
    if ($query)
    {
        return TRUE;
    }
    else        return FALSE;

    }
    
    function isplati($records, $iznos)
    {
        foreach ($records as $rec) {
            
        $data = array('isplatilac' => $rec->ime.' '.$rec->prezime,
            'JMBG' => $rec->JMBG,
            'primalac' => $this->input->post('primalac'),
       'svrha' => $this->input->post('svrha_isplate'),
        'brracuna' => $rec->brracuna,
        'iznos' => $iznos,
            'id_klijenta' => $rec->id,
       'poziv_na_broj' => $this->input->post('poziv_na_broj'),
        'komentar' => $this->input->post('komentar'));
 
    }
    
    $query = $this->db->insert('nalog_isplata', $data);
    if ($query)
    {
        return TRUE;
    }
    else        return FALSE;

    }
    
    function uplati_licni($records, $iznos)
            {
        foreach ($records as $rec) {
            
        $data = array(
            'JMBG' => $rec->JMBG,
            'iznos' => $iznos,
            'id_klijenta' => $rec->id,
            'komentar' => $this->input->post('komentar'));
 
    }
    
    $query = $this->db->insert('uplata_licni', $data);
    if ($query)
    {
        return TRUE;
    }
    else        return FALSE;

    }




    function oduzmi_stanje($novo_stanje, $trenutno_stanje, $obj)
    {
        $data = array('prethodno_stanje' => $trenutno_stanje,
            'trenutno_stanje' => $novo_stanje);
        
        $this->db->where('id', $obj['id']);
        $update = $this->db->update('racun', $data);
        return $update;
    }
   
}
?>