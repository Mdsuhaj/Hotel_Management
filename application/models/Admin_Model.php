<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function Get_Admin_By_Username($Username)
    {
        $sql = "SELECT * FROM Admin_Mst WHERE Username = '$Username'";

        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }

    public function Get_Room_Stats()
    {
        $Stats = new stdClass();

        $sql_total = "SELECT COUNT(*) AS Total FROM Room_Mst";
        $Stats->TotalRooms = $this->db->query($sql_total)->row()->Total;

        $sql_available = "SELECT COUNT(*) AS Total FROM Room_Mst WHERE Status = 'Available'";
        $Stats->AvailableRooms = $this->db->query($sql_available)->row()->Total;

        $sql_booked = "SELECT COUNT(*) AS Total FROM Room_Mst WHERE Status = 'Booked'";
        $Stats->BookedRooms = $this->db->query($sql_booked)->row()->Total;

        $sql_checkedin = "SELECT COUNT(*) AS Total FROM Room_Mst WHERE Status = 'CheckedIn'";
        $Stats->CheckedInRooms = $this->db->query($sql_checkedin)->row()->Total;

        return $Stats;
    }

    public function Get_Recent_Bookings()
    {
        $sql = "SELECT TOP 10 B.BookingID, U.FirstName, U.LastName, RT.RoomTypeName,
                       B.CheckInDate, B.CheckOutDate, B.NoOfGuests, B.TotalAmount, B.BookingStatus
                FROM Booking_Mst B
                INNER JOIN Users_Mst U ON U.UserID = B.UserID
                INNER JOIN RoomType_Mst RT ON RT.RoomTypeID = B.RoomTypeID
                ORDER BY B.BookingID DESC";

        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
}
