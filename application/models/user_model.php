<?php

class User_model extends CI_Model
{

    /**
     * @usage
     *  Single: $this->user_model->get(2);
     *  All:    $this->user_model->get();
     */
    public function get($user_id = null)
    {

        if ($user_id === null) {
            $q = $this->db->get('user');
        } else {
            $q = $this->db->get_where('user', array('user_id' => $user_id));
        }

        return $q->result_array();
    }

    /**
     * @param array $data
     *
     * @usage $result = $this->user_model->insert(['login' => 'Jethro']);
     */
    public function insert($data)
    {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    /**
     * @usage $result = $this->user_model->update(['login' => 'Peggy'], 3);
     */
    public function update($data, $user_id)
    {
        $this->db->where(array('user_id' => $user_id));
        $this->db->update('user', $data);
        return $this->db->affected_rows();
    }

    /**
     * @usage $this->user_model->delete(6);
     */
    public function delete($user_id)
    {
        $this->db->delete('user', array('user_id' => $user_id));
        return $this->db->affected_rows();
    }

}
?>
