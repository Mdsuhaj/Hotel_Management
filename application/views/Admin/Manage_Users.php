<h1>Manage <span class="gold-text">Users</span></h1>

<table class="ls-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile No</th>
            <th>Status</th>
            <th>Joined</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($User_List)) { ?>
            <?php foreach ($User_List as $User) { ?>
                <tr>
                    <td>#<?php echo $User->UserID; ?></td>
                    <td><?php echo $User->FirstName . ' ' . $User->LastName; ?></td>
                    <td><?php echo $User->Email; ?></td>
                    <td><?php echo $User->MobileNo; ?></td>
                    <td>
                        <span class="status-pill <?php echo ($User->IsActive === 'Yes') ? 'status-Available' : 'status-Cancelled'; ?>">
                            <?php echo ($User->IsActive === 'Yes') ? 'Active' : 'Inactive'; ?>
                        </span>
                    </td>
                    <td><?php echo date('d M Y', strtotime($User->CreatedDate)); ?></td>
                    <td>
                        <a class="icon-link" href="<?php echo base_url('Admin/Edit_User/' . $User->UserID); ?>">Edit</a>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr><td colspan="7">No registered users yet.</td></tr>
        <?php } ?>
    </tbody>
</table>
