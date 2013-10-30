<?php

class Api extends CI_Controller
{

    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------

    private function _require_login()
    {
        if ($this->session->userdata('user_id') == false) {
            $this->output->set_output(json_encode(array('result' => 0, 'error' => 'You are not authorized')));
            return false;
        }
    }

    // ------------------------------------------------------------------------

    public function login()
    {
        $this->output->set_content_type('application_json');

        $login = $this->input->post('login');
        $password = $this->input->post('password');

        $this->load->model('user_model');
        $result = $this->user_model->get(array(
            'login' => $login,
            'password' => hash('sha256', $password . SALT)
        ));

        if ($result) {
            $this->session->set_userdata(array('user_id' => $result[0]['user_id']));
            $this->output->set_output(json_encode(array('result' => 1)));
            return false;
        }

        $this->output->set_output(json_encode(array('result' => 0)));

    }

    // ------------------------------------------------------------------------

    public function register()
    {
        $this->output->set_content_type('application_json');

        $this->form_validation->set_rules('login', 'Login', 'required|min_length[4]|max_length[16]|is_unique[user.login]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|matches[confirm_password]');

        if ($this->form_validation->run() == false) {
            $this->output->set_output(json_encode(array('result' => 0, 'error' => $this->form_validation->error_array())));
            return false;
        }

        $login = $this->input->post('login');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');

        $this->load->model('user_model');
        $user_id = $this->user_model->insert(array(
            'login' => $login,
            'password' => hash('sha256', $password . SALT),
            'email' => $email
        ));

        if ($user_id) {
            $this->session->set_userdata(array('user_id' => $user_id));
            $this->output->set_output(json_encode(array('result' => 1)));
            return false;
        }

        $this->output->set_output(json_encode(array('result' => 0, 'error' => 'User not created')));

    }

    // ------------------------------------------------------------------------

    public function get_todo()
    {
        $this->_require_login();
    }

    // ------------------------------------------------------------------------

    public function create_todo()
    {
        $this->_require_login();

        $this->form_validation->set_rules('content', 'Content', 'required|max_length[255]');

        if ($this->form_validation->run() == false) {
            $this->output->set_output(json_encode(array(
                'result' => 0,
                'error' => $this->form_validation->error_array()
            )));

            return false;
        }

        $result = $this->db->insert('todo', array(
            'content' => $this->input->post('content'),
            'user_id' => $this->session->userdata('user_id')
        ));

        if ($result) {
            $this->output->set_output(json_encode(array('result' => 1)));
            return false;
        }

        $this->output->set_output(json_encode(array(
            'result' => 0,
            'error' => 'Could not insert record'
        )));
    }

    // ------------------------------------------------------------------------

    public function update_todo()
    {
        $this->_require_login();
        $todo_id = $this->input->post('todo_id');
    }

    // ------------------------------------------------------------------------

    public function delete_todo()
    {
        $this->_require_login();
        $todo_id = $this->input->post('todo_id');
    }

    // ------------------------------------------------------------------------

    public function get_note()
    {
        $this->_require_login();
    }

    // ------------------------------------------------------------------------

    public function create_note()
    {
        $this->_require_login();
    }

    // ------------------------------------------------------------------------

    public function update_note()
    {
        $this->_require_login();
        $note_id = $this->input->post('note_id');
    }

    // ------------------------------------------------------------------------

    public function delete_note()
    {
        $this->_require_login();
        $note_id = $this->input->post('note_id');
    }
}

?>
