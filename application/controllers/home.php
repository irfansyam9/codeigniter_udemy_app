<?php

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->view('home/inc/header_view');
        $this->load->view('home/home_view');
        $this->load->view('home/inc/footer_view');
    }

    /* public function code() */
    /* { */
        /* $this->load->library('encrypt'); */
        /* echo $this->encrypt->encode('My Secret Password'); */
        /* echo $this->encrypt->decode('ENCODED_PASSWORD'); */
        /* echo hash('sha256', 'My Secret Password' . SALT); */
    /* } */

    /* public function test() */
    /* { */
        /* $this->db->where(array('user_id' => 1)); */
        /* $this->db->select('user_id, login'); */
        /* $this->db->order_by('user_id DESC'); */
        /* $q = $this->db->get('user'); */
        /* print_r($q->result()); */

        /*** Add Stuff ***/
        /* $this->db->insert('user', array( */
        /*     'login' => 'jenkins' */
        /* )); */

        /*** Update Stuff ***/
        /* $this->db->where('user_id', 2); */
        /* $this->db->update('user', array( */
        /*     'login' => 'sammy' */
        /* )); */

        /*** Delete Stuff ***/
        /* $this->db->where('user_id', 2); */
        /* $this->db->delete('user'); */
    /* } */
}

?>
