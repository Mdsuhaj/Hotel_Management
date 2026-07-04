<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $Page_Title; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Lato:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>

<div class="auth-wrapper">

    <div class="auth-visual" style="background-image:url('https://images.unsplash.com/photo-1564501049412-61c2a3083791?w=1400&q=80&auto=format');">
        <div class="auth-visual-text">
            <div class="brand gold-text" style="font-size:22px; margin-bottom:18px;">LUXE <span style="color:#f6f1e7;">STAY</span></div>
            <h1>Administrator Access</h1>
            <p>Manage room availability, guest check-ins and reservations from the admin console.</p>
        </div>
    </div>

    <div class="auth-form-side">
        <div class="auth-card">
            <h2>Admin Sign In</h2>
            <p class="sub">Restricted access for hotel staff only.</p>

            <?php if ($this->session->flashdata('Error_Msg')) { ?>
                <div class="alert alert-error"><?php echo $this->session->flashdata('Error_Msg'); ?></div>
            <?php } ?>

            <form action="<?php echo base_url('Admin_Login/Login_Submit'); ?>" method="post">

                <label class="ls-label">Username</label>
                <input type="text" name="Username" class="ls-input" required>

                <label class="ls-label">Password</label>
                <input type="password" name="Password" class="ls-input" required>

                <button type="submit" class="ls-btn ls-btn-solid ls-btn-block" style="margin-top:28px;">Sign In</button>
            </form>

            <div class="auth-foot">
                <a href="<?php echo base_url('Login'); ?>">&larr; Back to guest login</a>
            </div>
        </div>
    </div>

</div>

</body>
</html>
