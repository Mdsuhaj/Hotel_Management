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
 
    <div class="auth-visual" style="background-image:url('https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=1400&q=80&auto=format');">
        <div class="auth-visual-text">
            <div class="brand gold-text" style="font-size:22px; margin-bottom:18px;">LUXE <span style="color:#f6f1e7;">STAY</span></div>
            <h1>Begin Your Luxury Escape</h1>
            <p>Create an account to unlock exclusive rates on our finest suites, villas and presidential residences.</p>
        </div>
    </div>
 
    <div class="auth-form-side">
        <div class="auth-card">
            <h2>Create Account</h2>
            <p class="sub">Join Luxe Stay and book your perfect room in minutes.</p>
 
            <?php if ($this->session->flashdata('Error_Msg')) { ?>
                <div class="alert alert-error"><?php echo $this->session->flashdata('Error_Msg'); ?></div>
            <?php } ?>
            <?php if ($this->session->flashdata('Success_Msg')) { ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('Success_Msg'); ?></div>
            <?php } ?>
 
            <form action="<?php echo base_url('Registration/Save_Registration'); ?>" method="post">
 
                <div class="ls-row-2">
                    <div>
                        <label class="ls-label">First Name</label>
                        <input type="text" name="FirstName" class="ls-input" required>
                    </div>
                    <div>
                        <label class="ls-label">Last Name</label>
                        <input type="text" name="LastName" class="ls-input" required>
                    </div>
                </div>
 
                <label class="ls-label">Email Address</label>
                <input type="email" name="Email" class="ls-input" required>
 
                <label class="ls-label">Mobile Number</label>
                <input type="text" name="MobileNo" class="ls-input" required>
 
                <label class="ls-label">Password</label>
                <input type="password" name="Password" class="ls-input" required>
 
                <button type="submit" class="ls-btn ls-btn-solid ls-btn-block" style="margin-top:28px;">Create Account</button>
            </form>
 
            <div class="auth-foot">
                Already have an account? <a href="<?php echo base_url('Login'); ?>">Sign in</a>
            </div>
        </div>
    </div>
 
</div>
 
</body>
</html>