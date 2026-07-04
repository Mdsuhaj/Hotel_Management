<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($Page_Title) ? $Page_Title : 'Luxe Stay Hotel'; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Lato:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>

<?php $Session = $this->session->userdata('sess_array'); ?>

<nav class="ls-navbar">
    <a class="brand" href="<?php echo base_url(); ?>">LUXE <span>STAY</span></a>

    <div class="ls-nav-links">
        <?php if (!empty($Session) && $Session['UserRole'] === 'User') { ?>
            <a href="<?php echo base_url('Dashboard'); ?>">Room Availability</a>
            <span class="gold-text">Welcome, <?php echo htmlspecialchars($Session['Name']); ?></span>
            <a class="ls-btn" href="<?php echo base_url('Login/Logout'); ?>">Logout</a>

        <?php } else if (!empty($Session) && $Session['UserRole'] === 'Admin') { ?>
            <span class="gold-text">Admin: <?php echo htmlspecialchars($Session['Name']); ?></span>
            <a class="ls-btn" href="<?php echo base_url('Admin_Login/Logout'); ?>">Logout</a>

        <?php } ?>
    </div>
</nav>
