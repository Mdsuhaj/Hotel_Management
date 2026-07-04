<div class="page-hero">
    <h1>Complete Your <span class="gold-text">Booking</span></h1>
    <p>Choose your dates and the number of guests joining you.</p>
</div>

<div class="container">
    <div class="booking-grid">

        <div class="summary-card">
            <div class="summary-img" style="background-image:url('<?php echo $Room_Type->ImagePath; ?>');"></div>
            <div class="summary-body">
                <h3 class="gold-text" style="margin-top:0;"><?php echo $Room_Type->RoomTypeName; ?></h3>
                <p style="color:var(--text-muted); font-size:14px;"><?php echo $Room_Type->Description; ?></p>

                <div class="summary-row"><span>Price per night</span><span>&#8377;<?php echo number_format($Room_Type->PricePerNight, 2); ?></span></div>
                <div class="summary-row"><span>Maximum occupancy</span><span><?php echo $Room_Type->MaxOccupancy; ?> guests</span></div>
            </div>
        </div>

        <div class="form-card">
            <h3>Stay Details</h3>

            <form action="<?php echo base_url('Booking/Save_Booking'); ?>" method="post">

                <input type="hidden" name="RoomTypeID" value="<?php echo $Room_Type->RoomTypeID; ?>">

                <div class="ls-row-2">
                    <div>
                        <label class="ls-label">Check-In Date</label>
                        <input type="date" name="CheckInDate" class="ls-input" required min="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div>
                        <label class="ls-label">Check-Out Date</label>
                        <input type="date" name="CheckOutDate" class="ls-input" required min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
                    </div>
                </div>

                <label class="ls-label">Number of Guests</label>
                <select name="NoOfGuests" class="ls-select" required>
                    <?php for ($i = 1; $i <= $Room_Type->MaxOccupancy; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?> Guest<?php echo ($i > 1) ? 's' : ''; ?></option>
                    <?php } ?>
                </select>

                <button type="submit" class="ls-btn ls-btn-solid ls-btn-block" style="margin-top:28px;">Proceed to Payment</button>
            </form>
        </div>

    </div>
</div>
