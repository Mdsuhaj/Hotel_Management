<h1>Admin <span class="gold-text">Dashboard</span></h1>

<!-- STAT CARDS - keep this part -->
<div class="stat-grid">
    <div class="stat-card">
        <div class="label">Total Rooms</div>
        <div class="value"><?php echo $Room_Stats->TotalRooms; ?></div>
    </div>
    <div class="stat-card">
        <div class="label">Available Rooms</div>
        <div class="value"><?php echo $Room_Stats->AvailableRooms; ?></div>
    </div>
    <div class="stat-card">
        <div class="label">Booked Rooms</div>
        <div class="value"><?php echo $Room_Stats->BookedRooms; ?></div>
    </div>
    <div class="stat-card">
        <div class="label">Checked-In Rooms</div>
        <div class="value"><?php echo $Room_Stats->CheckedInRooms; ?></div>
    </div>
</div>

<!-- RECENT BOOKINGS TABLE - add this below -->
<h3 style="color:#f6f1e7; margin-bottom:16px;">Recent Bookings</h3>

<table class="ls-table">
    <thead>
        <tr>
            <th>Booking ID</th>
            <th>Guest</th>
            <th>Room Type</th>
            <th>Check-In</th>
            <th>Check-Out</th>
            <th>Guests</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($Recent_Bookings)) { ?>
            <?php foreach ($Recent_Bookings as $Booking) { ?>
                <tr>
                    <td>#<?php echo $Booking->BookingID; ?></td>
                    <td><?php echo $Booking->FirstName . ' ' . $Booking->LastName; ?></td>
                    <td><?php echo $Booking->RoomTypeName; ?></td>
                    <td><?php echo date('d M Y', strtotime($Booking->CheckInDate)); ?></td>
                    <td><?php echo date('d M Y', strtotime($Booking->CheckOutDate)); ?></td>
                    <td><?php echo $Booking->NoOfGuests; ?></td>
                    <td>&#8377;<?php echo number_format($Booking->TotalAmount, 2); ?></td>
                    <td>
                        <span class="status-pill status-<?php echo $Booking->BookingStatus; ?>">
                            <?php echo $Booking->BookingStatus; ?>
                        </span>
                    </td>
                    <td>
                        <?php if ($Booking->BookingStatus === 'Confirmed') { ?>
                            <a href="<?php echo base_url('Admin/CheckIn/' . $Booking->BookingID); ?>"
                               class="ls-btn ls-btn-solid"
                               style="padding:6px 14px; font-size:12px;">
                               Check In
                            </a>
                        <?php } else if ($Booking->BookingStatus === 'CheckedIn') { ?>
                            <a href="<?php echo base_url('Admin/CheckOut/' . $Booking->BookingID); ?>"
                               class="ls-btn"
                               style="padding:6px 14px; font-size:12px;">
                               Check Out
                            </a>
                        <?php } else { ?>
                            <span style="color:#b9b0a0; font-size:12px;">
                                <?php echo $Booking->BookingStatus; ?>
                            </span>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr><td colspan="9">No bookings yet.</td></tr>
        <?php } ?>
    </tbody>
</table>