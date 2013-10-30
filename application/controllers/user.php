<?php

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function login()
    {
        $login = $this->input->post('login');
        $password = $this->input->post('password');

        $result = $this->user_model->get(array(
            'login' => $login,
            'password' => hash('sha256', $password . SALT)
        ));

        $this->output->set_content_type('application_json');

        if ($result) {
            $this->session->set_userdata(array('user_id' => $result[0]['user_id']));
            $this->output->set_output(json_encode(array('result' => 1)));
            return false;
        }

        $this->output->set_output(json_encode(array('result' => 0)));

    }

    public function test_get()
    {
        $data = $this->user_model->get(8);
        print_r($data);
    }

    public function test_insert()
    {
        $result = $this->user_model->insert(array(
            'login' => 'Jethro'
        ));
        print_r($result);
    }

    public function test_update()
    {
        $result = $this->user_model->update(array(
            'login' => 'Peggy'
        ), 8);
        print_r($result);
    }

    public function test_delete($user_id)
    {
        $result = $this->user_model->delete($user_id);
        print_r($result);
    }

}
?>
