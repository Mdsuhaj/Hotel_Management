<div class="page-hero">
    <h1>Secure <span class="gold-text">Payment</span></h1>
    <p>Review your reservation and complete payment to confirm your stay.</p>
</div>

<div class="container">
    <div class="booking-grid">

        <div class="summary-card">
            <div class="summary-img" style="background-image:url('<?php echo $Booking_Detail->ImagePath; ?>');"></div>
            <div class="summary-body">
                <h3 class="gold-text" style="margin-top:0;"><?php echo $Booking_Detail->RoomTypeName; ?></h3>

                <div class="summary-row"><span>Check-In</span><span><?php echo date('d M Y', strtotime($Booking_Detail->CheckInDate)); ?></span></div>
                <div class="summary-row"><span>Check-Out</span><span><?php echo date('d M Y', strtotime($Booking_Detail->CheckOutDate)); ?></span></div>
                <div class="summary-row"><span>Guests</span><span><?php echo $Booking_Detail->NoOfGuests; ?></span></div>
                <div class="summary-row"><span>Nights</span><span><?php echo $Booking_Detail->NoOfNights; ?></span></div>
                <div class="summary-row"><span>Price / night</span><span>&#8377;<?php echo number_format($Booking_Detail->PricePerNight, 2); ?></span></div>

                <div class="summary-total"><span>Total Amount</span><span>&#8377;<?php echo number_format($Booking_Detail->TotalAmount, 2); ?></span></div>
            </div>
        </div>

        <div class="form-card">
            <h3>Card Details</h3>

            <form action="<?php echo base_url('Booking/Save_Payment'); ?>" method="post">

                <input type="hidden" name="BookingID" value="<?php echo $Booking_Detail->BookingID; ?>">

                <label class="ls-label">Name on Card</label>
                <input type="text" name="CardName" class="ls-input" required>

                <label class="ls-label">Card Number</label>
                <input type="text" name="CardNumber" class="ls-input" maxlength="16" pattern="[0-9]{16}" placeholder="1234567812345678" required>

                <div class="ls-row-2">
                    <div>
                        <label class="ls-label">Expiry (MM/YY)</label>
                        <input type="text" name="Expiry" class="ls-input" placeholder="MM/YY" required>
                    </div>
                    <div>
                        <label class="ls-label">CVV</label>
                        <input type="text" name="CVV" class="ls-input" maxlength="3" pattern="[0-9]{3}" required>
                    </div>
                </div>

                <button type="submit" class="ls-btn ls-btn-solid ls-btn-block" style="margin-top:28px;">
                    Pay &#8377;<?php echo number_format($Booking_Detail->TotalAmount, 2); ?>
                </button>
            </form>
        </div>

    </div>
</div>
