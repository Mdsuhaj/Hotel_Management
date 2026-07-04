<?php $Current = $this->uri->segment(2); ?>

<div class="admin-layout">
    <div class="admin-sidebar">
        <a href="<?php echo base_url('Admin'); ?>" class="<?php echo (empty($Current)) ? 'active' : ''; ?>">
            Dashboard
        </a>
        <a href="<?php echo base_url('Admin/Manage_Users'); ?>" class="<?php echo ($Current === 'Manage_Users' || $Current === 'Edit_User') ? 'active' : ''; ?>">
            Manage Users
        </a>
        <a href="<?php echo base_url('Admin_Login/Logout'); ?>">
            Logout
        </a>
    </div>

    <div class="admin-content">
