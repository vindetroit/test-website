<?php
/*
Template Name: Display Submissions
*/
get_header(); ?>

<div class="submissions-list">
    <?php
    $current_page_id = get_the_ID();

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => 'page_selection',
                'value' => $current_page_id,
                'compare' => '='
            )
        )
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $user_name = get_field('user_name');
            ?>
            <div class="submission">
                <p><strong>Name:</strong> <?php echo esc_html($user_name); ?></p>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No submissions found for this page.</p>';
    endif;
    ?>
</div>

<div class="gallery-container">
    <div class="gallery">
        <?php
        $image = get_field('gallery_images');
        
        if ($image && is_array($image)):
            $url = isset($image['url']) ? esc_url($image['url']) : '';
            $alt = isset($image['alt']) ? esc_attr($image['alt']) : 'Gallery image';
            for ($i = 0; $i < 10; $i++): ?>
                <div class="gallery-item">
                    <?php if ($url): ?>
                        <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" class="front">
                        <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" class="back">
                    <?php else: ?>
                        <p>Image not available</p>
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        <?php
        else:
            echo '<p>No image found for this page.</p>';
        endif;
        ?>
    </div>
</div>

<?php
$random_start = rand(0, 359);
?>

<style>
.gallery-container {
    perspective: 1000px;
    width: 100%;
    height: 500px;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}
.gallery {
    width: 200px;
    height: 200px;
    position: relative;
    transform-style: preserve-3d;
    animation: rotate 30s infinite linear; /* Slowed down animation speed */
    transform: rotateY(<?php echo $random_start; ?>deg);
}
.gallery-item {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    transform-style: preserve-3d;
}
.gallery-item .front {
    transform: translateZ(400px); /* Increase this value for more space between images */
}
.gallery-item .back {
    display: none;
}
.gallery-item img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}
/* Adjusted rotations for 10 items */
.gallery-item:nth-child(1) .front { transform: rotateY(0deg) translateZ(400px); }
.gallery-item:nth-child(2) .front { transform: rotateY(36deg) translateZ(400px); }
.gallery-item:nth-child(3) .front { transform: rotateY(72deg) translateZ(400px); }
.gallery-item:nth-child(4) .front { transform: rotateY(108deg) translateZ(400px); }
.gallery-item:nth-child(5) .front { transform: rotateY(144deg) translateZ(400px); }
.gallery-item:nth-child(6) .front { transform: rotateY(180deg) translateZ(400px); }
.gallery-item:nth-child(7) .front { transform: rotateY(216deg) translateZ(400px); }
.gallery-item:nth-child(8) .front { transform: rotateY(252deg) translateZ(400px); }
.gallery-item:nth-child(9) .front { transform: rotateY(288deg) translateZ(400px); }
.gallery-item:nth-child(10) .front { transform: rotateY(324deg) translateZ(400px); }
@keyframes rotate {
    from { transform: rotateY(<?php echo $random_start; ?>deg); }
    to { transform: rotateY(<?php echo $random_start + 360; ?>deg); }
}
</style>

<?php get_footer(); ?>
