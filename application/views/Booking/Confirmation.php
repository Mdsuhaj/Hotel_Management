<div class="page-hero">
    <h1>Booking <span class="gold-text">Confirmed</span></h1>
    <p>Thank you for choosing Luxe Stay. A confirmation has been recorded against your account.</p>
</div>

<div class="container" style="max-width:680px;">
    <div class="summary-card">
        <div class="summary-img" style="background-image:url('<?php echo $Booking_Detail->ImagePath; ?>');"></div>
        <div class="summary-body">
            <h3 class="gold-text" style="margin-top:0;"><?php echo $Booking_Detail->RoomTypeName; ?></h3>

            <div class="summary-row"><span>Booking ID</span><span>#<?php echo $Booking_Detail->BookingID; ?></span></div>
            <div class="summary-row"><span>Status</span><span><span class="status-pill status-<?php echo $Booking_Detail->BookingStatus; ?>"><?php echo $Booking_Detail->BookingStatus; ?></span></span></div>
            <div class="summary-row"><span>Check-In</span><span><?php echo date('d M Y', strtotime($Booking_Detail->CheckInDate)); ?></span></div>
            <div class="summary-row"><span>Check-Out</span><span><?php echo date('d M Y', strtotime($Booking_Detail->CheckOutDate)); ?></span></div>
            <div class="summary-row"><span>Guests</span><span><?php echo $Booking_Detail->NoOfGuests; ?></span></div>
            <div class="summary-row"><span>Nights</span><span><?php echo $Booking_Detail->NoOfNights; ?></span></div>

            <div class="summary-total"><span>Amount Paid</span><span>&#8377;<?php echo number_format($Booking_Detail->TotalAmount, 2); ?></span></div>

            <a href="<?php echo base_url('Dashboard'); ?>" class="ls-btn ls-btn-solid ls-btn-block" style="margin-top:26px;">Back to Rooms</a>
        </div>
    </div>
</div>
