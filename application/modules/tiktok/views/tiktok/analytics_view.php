
<section class="section">
    <div class="section-header">
        <h1>TikTok Analytics</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <?php foreach ($analytics_data as $data): ?>
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4><?php echo $data['video_title']; ?></h4>
                            <p>Views: <?php echo $data['views']; ?></p>
                            <p>Likes: <?php echo $data['likes']; ?></p>
                            <p>Comments: <?php echo $data['comments']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>