<h1>Edit <span class="gold-text">User</span></h1>

<div class="form-card" style="max-width:520px;">

    <form action="<?php echo base_url('Admin/Update_User'); ?>" method="post">

        <input type="hidden" name="UserID" value="<?php echo $User_Detail->UserID; ?>">

        <div class="ls-row-2">
            <div>
                <label class="ls-label">First Name</label>
                <input type="text" name="FirstName" class="ls-input" value="<?php echo htmlspecialchars($User_Detail->FirstName); ?>" required>
            </div>
            <div>
                <label class="ls-label">Last Name</label>
                <input type="text" name="LastName" class="ls-input" value="<?php echo htmlspecialchars($User_Detail->LastName); ?>" required>
            </div>
        </div>

        <label class="ls-label">Email Address</label>
        <input type="email" class="ls-input" value="<?php echo htmlspecialchars($User_Detail->Email); ?>" disabled>

        <label class="ls-label">Mobile Number</label>
        <input type="text" name="MobileNo" class="ls-input" value="<?php echo htmlspecialchars($User_Detail->MobileNo); ?>" required>

        <label class="ls-label">Account Status</label>
        <select name="IsActive" class="ls-select">
            <option value="Yes" <?php echo ($User_Detail->IsActive === 'Yes') ? 'selected' : ''; ?>>Active</option>
            <option value="No" <?php echo ($User_Detail->IsActive === 'No') ? 'selected' : ''; ?>>Inactive</option>
        </select>

        <div style="display:flex; gap:14px; margin-top:28px;">
            <button type="submit" class="ls-btn ls-btn-solid">Save Changes</button>
            <a href="<?php echo base_url('Admin/Manage_Users'); ?>" class="ls-btn">Cancel</a>
        </div>
    </form>
</div>
