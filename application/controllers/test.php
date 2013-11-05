<?php

class Test extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');

        $result = $this->user_model->get();
        /* $result = $this->user_model->insert(array('login' => 'Markus')); */
        /* $result = $this->user_model->delete(array('login' => 'Markus')); */
        /* $result = $this->user_model->update(array('password' => 'Test'), array('login' => 'Markus')); */
        /* $result = $this->user_model->insertUpdate(array( */
        /*     'login' => 'Donny' */
        /* ), 6); */

        echo '<pre>';
        print_r($result);
    }

    public function test_get()
    {
        $data = $this->user_model->get();
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
