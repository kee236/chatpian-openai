<section class="section">
    <div class="section-header">
        <h1>TikTok Account Management</h1>
    </div>

    <div class="section-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Account ID</th>
                    <th>User Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accounts as $account): ?>
                    <tr>
                        <td><?php echo $account['id']; ?></td>
                        <td><?php echo $account['user_name']; ?></td>
                        <td>
                            <a href="<?php echo base_url('tiktok_automation/delete_account/'.$account['id']); ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>