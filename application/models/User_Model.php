<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function Get_User_By_Email($Email)
    {
        $sql = "SELECT * FROM Users_Mst WHERE Email = '$Email'";

        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }

    public function Get_User_By_ID($UserID)
    {
        $sql = "SELECT * FROM Users_Mst WHERE UserID = '$UserID'";

        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }

    public function Get_All_Users()
    {
        $sql = "SELECT * FROM Users_Mst ORDER BY UserID DESC";

        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function Add_User($data)
    {
        $this->db->insert('Users_Mst', $data);
        return TRUE;
    }

    public function Update_User($UserID, $data)
    {
        $this->db->where('UserID', $UserID);
        $this->db->update('Users_Mst', $data);
        return TRUE;
    }
}
