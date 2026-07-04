<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booking_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Room_Model');
    }

  public function Add_Booking($data)
    {
    $this->db->insert('Booking_Mst', $data);

    $query = $this->db->query("SELECT SCOPE_IDENTITY() AS BookingID");
    $result = $query->row();
    return $result->BookingID;
    }

    public function Get_Booking($BookingID)
    {
        $sql = "SELECT B.*, RT.RoomTypeName, RT.PricePerNight, RT.ImagePath
                FROM Booking_Mst B
                INNER JOIN RoomType_Mst RT ON RT.RoomTypeID = B.RoomTypeID
                WHERE B.BookingID = '$BookingID'";

        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }

    public function Update_Booking_Status($BookingID, $Status)
    {
        $this->db->where('BookingID', $BookingID);
        $this->db->update('Booking_Mst', array('BookingStatus' => $Status));
        return TRUE;
    }

    public function Assign_Room($BookingID, $RoomTypeID)
    {
        $Available_Room = $this->Room_Model->Get_Available_Room($RoomTypeID);

        if (!empty($Available_Room)) {

            $this->db->where('RoomID', $Available_Room->RoomID);
            $this->db->update('Room_Mst', array('Status' => 'Booked'));

            $this->db->where('BookingID', $BookingID);
            $this->db->update('Booking_Mst', array('RoomID' => $Available_Room->RoomID));
        }

        return TRUE;
    }
}