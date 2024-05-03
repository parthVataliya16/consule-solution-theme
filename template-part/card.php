<?php
$thumbnail_url = get_the_post_thumbnail_url();
$post_time = get_the_date();
$title = get_the_title();

?>
<div class="card">
    <a href="#">
        <?php if (!empty($thumbnail_url)) ?>
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="blog-home" width="760" height="550" />
        <div class="overlay-text">
            <?php if (!empty($post_time)) ?>
            <div class="date"><?php echo $post_time; ?></div>
            <?php if (!empty($title)) ?>
            <h3 class="h4 blog-title"><?php echo $title; ?></h3>
        </div>
    </a>
</div>
