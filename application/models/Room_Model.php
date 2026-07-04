<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Room_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function Room_List()
    {
        $sql = "SELECT RT.RoomTypeID, RT.RoomTypeName, RT.Description,
                       RT.PricePerNight, RT.MaxOccupancy, RT.ImagePath, RT.TotalRooms,
                       (SELECT COUNT(*) FROM Room_Mst R
                        WHERE R.RoomTypeID = RT.RoomTypeID
                        AND   R.Status     = 'Available') AS AvailableCount
                FROM RoomType_Mst RT
                ORDER BY RT.PricePerNight ASC";

        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function Get_RoomType($RoomTypeID)
    {
        $sql = "SELECT * FROM RoomType_Mst WHERE RoomTypeID = '$RoomTypeID'";

        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }

    public function Get_Available_Room($RoomTypeID)
    {
        $sql = "SELECT TOP 1 * FROM Room_Mst
                WHERE RoomTypeID = '$RoomTypeID'
                AND   Status     = 'Available'";

        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
}