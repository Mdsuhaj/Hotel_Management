<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function Add_Payment($data)
    {
        $this->db->insert('Payment_Mst', $data);
        return TRUE;
    }
}