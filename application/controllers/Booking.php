<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Room_Model');
        $this->load->model('Booking_Model');
        $this->load->model('Payment_Model');
    }

    public function Select_Room($RoomTypeID)
    {
        $Session = $this->session->userdata('sess_array');

        if (!empty($Session) && isset($Session['IsOnLogin']) && $Session['IsOnLogin'] === TRUE && $Session['UserRole'] === 'User') {

            $this->data['Page_Title'] = 'Luxe Stay - Book Your Stay';
            $this->data['Login_User'] = $Session['Name'];

            $this->data['Room_Type'] = $this->Room_Model->Get_RoomType($RoomTypeID);

            $this->load->view('Layout/Header', $this->data);
            $this->load->view('Booking/Select_Room', $this->data);
            $this->load->view('Layout/Footer');

        } else {
            redirect(base_url('Login'));
        }
    }

    public function Save_Booking()
    {
        $Session = $this->session->userdata('sess_array');

        if (!empty($Session) && isset($Session['IsOnLogin']) && $Session['IsOnLogin'] === TRUE && $Session['UserRole'] === 'User') {

            $RoomTypeID = $this->input->post('RoomTypeID');
            $CheckInDate = $this->input->post('CheckInDate');
            $CheckOutDate = $this->input->post('CheckOutDate');
            $NoOfGuests = $this->input->post('NoOfGuests');

            $Room_Type = $this->Room_Model->Get_RoomType($RoomTypeID);

            $NoOfNights = (strtotime($CheckOutDate) - strtotime($CheckInDate)) / 86400;
            if ($NoOfNights < 1) {
                $NoOfNights = 1;
            }

            $TotalAmount = $NoOfNights * $Room_Type->PricePerNight;

            $data = array(
                "UserID" => $Session['UserID'],
                "RoomTypeID" => $RoomTypeID,
                "RoomID" => NULL,
                "CheckInDate" => $CheckInDate,
                "CheckOutDate" => $CheckOutDate,
                "NoOfGuests" => $NoOfGuests,
                "NoOfNights" => $NoOfNights,
                "TotalAmount" => $TotalAmount,
                "BookingStatus" => 'Pending',
                "CreatedDate" => date('Ymd H:i:s')
            );

            $BookingID = $this->Booking_Model->Add_Booking($data);

            redirect(base_url('Booking/Payment/' . $BookingID));

        } else {
            redirect(base_url('Login'));
        }
    }

    public function Payment($BookingID)
    {
        $Session = $this->session->userdata('sess_array');

        if (!empty($Session) && isset($Session['IsOnLogin']) && $Session['IsOnLogin'] === TRUE && $Session['UserRole'] === 'User') {

            $this->data['Page_Title'] = 'Luxe Stay - Payment';
            $this->data['Login_User'] = $Session['Name'];

            $this->data['Booking_Detail'] = $this->Booking_Model->Get_Booking($BookingID);

            $this->load->view('Layout/Header', $this->data);
            $this->load->view('Booking/Payment', $this->data);
            $this->load->view('Layout/Footer');

        } else {
            redirect(base_url('Login'));
        }
    }

    public function Save_Payment()
    {
        $Session = $this->session->userdata('sess_array');

        if (!empty($Session) && isset($Session['IsOnLogin']) && $Session['IsOnLogin'] === TRUE && $Session['UserRole'] === 'User') {

            $BookingID = $this->input->post('BookingID');
            $CardNumber = $this->input->post('CardNumber');

            $Booking_Detail = $this->Booking_Model->Get_Booking($BookingID);

            $data = array(
                "BookingID" => $BookingID,
                "CardName" => $this->input->post('CardName'),
                "CardNumberLast4" => substr($CardNumber, -4),
                "Amount" => $Booking_Detail->TotalAmount,
                "PaymentStatus" => 'Success',
                "TransactionRef" => 'TXN' . strtoupper(uniqid()),
                "PaymentDate" => date('Y-m-d H:i:s')
            );

            $this->Payment_Model->Add_Payment($data);

            $this->Booking_Model->Update_Booking_Status($BookingID, 'Confirmed');

            $this->Booking_Model->Assign_Room($BookingID, $Booking_Detail->RoomTypeID);

            redirect(base_url('Booking/Confirmation/' . $BookingID));

        } else {
            redirect(base_url('Login'));
        }
    }

    public function Confirmation($BookingID)
    {
        $Session = $this->session->userdata('sess_array');

        if (!empty($Session) && isset($Session['IsOnLogin']) && $Session['IsOnLogin'] === TRUE && $Session['UserRole'] === 'User') {

            $this->data['Page_Title'] = 'Luxe Stay - Booking Confirmed';
            $this->data['Login_User'] = $Session['Name'];

            $this->data['Booking_Detail'] = $this->Booking_Model->Get_Booking($BookingID);

            $this->load->view('Layout/Header', $this->data);
            $this->load->view('Booking/Confirmation', $this->data);
            $this->load->view('Layout/Footer');

        } else {
            redirect(base_url('Login'));
        }
    }
}