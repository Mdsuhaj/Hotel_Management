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

    <div class="auth-visual" style="background-image:url('https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=1400&q=80&auto=format');">
        <div class="auth-visual-text">
            <div class="brand gold-text" style="font-size:22px; margin-bottom:18px;">LUXE <span style="color:#f6f1e7;">STAY</span></div>
            <h1>Welcome Back</h1>
            <p>Sign in to manage your bookings and discover our finest rooms and suites.</p>
        </div>
    </div>

    <div class="auth-form-side">
        <div class="auth-card">
            <h2>Sign in</h2>
            <p class="sub">Enter your details to access your account.</p>

            <?php if ($this->session->flashdata('Error_Msg')) { ?>
                <div class="alert alert-error"><?php echo $this->session->flashdata('Error_Msg'); ?></div>
            <?php } ?>
            <?php if ($this->session->flashdata('Success_Msg')) { ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('Success_Msg'); ?></div>
            <?php } ?>

            <form action="<?php echo base_url('Login/Login_Submit'); ?>" method="post">

                <label class="ls-label">Email Address</label>
                <input type="email" name="Email" class="ls-input" required>

                <label class="ls-label">Password</label>
                <input type="password" name="Password" class="ls-input" required>

                <button type="submit" class="ls-btn ls-btn-solid ls-btn-block" style="margin-top:28px;">Sign In</button>
            </form>

            <div class="auth-foot">
                New to Luxe Stay? <a href="<?php echo base_url('Registration'); ?>">Create an account</a>
                <br><br>
                <a href="<?php echo base_url('Admin_Login'); ?>">Staff / Admin Login &rarr;</a>
            </div>
        </div>
    </div>

</div>

</body>
</html>
