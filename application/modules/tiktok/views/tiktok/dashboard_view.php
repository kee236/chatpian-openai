<section class="section">
    <div class="section-header">
        <h1><i class="fab fa-tiktok"></i> TikTok Dashboard</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Connected Accounts</h2>
        <div class="row">
            <?php foreach ($account_list as $account): ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4><?php echo $account['user_id_tiktok']; ?></h4>
                        </div>
                        <div class="card-body">
                            <p>Access Token: <?php echo $account['access_token']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="<?php echo base_url('tiktok_automation/connect_account'); ?>" class="btn btn-primary">Connect TikTok Account</a>
    </div>
</section>