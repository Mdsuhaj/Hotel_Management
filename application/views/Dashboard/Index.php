<div class="page-hero">
    <h1>Our <span class="gold-text">Rooms &amp; Suites</span></h1>
    <p>Browse our exclusive collection of rooms and suites, each crafted for comfort and elegance.</p>
</div>

<div class="container">
    <div class="room-grid">

        <?php if (!empty($Room_List)) { ?>
            <?php foreach ($Room_List as $Room) {
                $available = (int)$Room->AvailableCount;
            ?>
                <div class="room-card">

                    <div class="img-wrap" style="background-image:url('<?php echo $Room->ImagePath; ?>');">

                        <?php if ($available === 0) { ?>
                            <span class="badge" style="background:rgba(192,70,60,0.90); color:#fff; font-weight:700;">
                                Unavailable
                            </span>

                        <?php } elseif ($available <= 3) { ?>
                            <span class="badge" style="background:rgba(160,90,0,0.90); color:#fff; font-weight:700;">
                                Only <?php echo $available; ?> left!
                            </span>

                        <?php } else { ?>
                            <span class="badge" style="background:rgba(20,17,15,0.78); color:#e6c878; font-weight:700;">
                                <?php echo $available; ?> Available
                            </span>
                        <?php } ?>

                    </div>

                    <div class="room-card-body">
                        <h3><?php echo $Room->RoomTypeName; ?></h3>
                        <p class="desc"><?php echo $Room->Description; ?></p>

                        <div class="room-price">
                            <span class="amt">&#8377;<?php echo number_format($Room->PricePerNight, 2); ?></span>
                            <span class="per">/ night</span>
                        </div>

                        <p style="font-size:12px; color:#b9b0a0; margin:0 0 16px;">
                            Max <?php echo $Room->MaxOccupancy; ?> guests
                        </p>

                        <?php if ($available === 0) { ?>
                            <button class="ls-btn ls-btn-block"
                                    style="opacity:0.45; cursor:not-allowed; border-radius:30px;"
                                    disabled>
                                Currently Unavailable
                            </button>

                        <?php } else { ?>
                            <a href="<?php echo base_url('Booking/Select_Room/' . $Room->RoomTypeID); ?>"
                               class="ls-btn ls-btn-solid ls-btn-block">
                                Book Now
                            </a>
                        <?php } ?>

                    </div>
                </div>

            <?php } ?>
        <?php } else { ?>
            <p style="color:#b9b0a0; text-align:center; grid-column:1/-1;">
                No rooms are listed at the moment.
            </p>
        <?php } ?>

    </div>
</div>