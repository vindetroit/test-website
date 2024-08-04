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
            ?>
            <div class="gallery-item">
                <?php if ($url): ?>
                    <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" class="front">
                    <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" class="back">
                <?php else: ?>
                    <p>Image not available</p>
                <?php endif; ?>
            </div>
        <?php
        else:
            echo '<p>No image found for this page.</p>';
        endif;
        ?>
    </div>
</div>

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
    width: 150px; /* Smaller width */
    height: 150px; /* Smaller height */
    position: relative;
    transform-style: preserve-3d;
    animation: rotate 15s infinite linear;
}

.gallery-item {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    transform-style: preserve-3d;
}

.gallery-item .front {
    transform: rotateY(0deg) translateZ(175px);
}

.gallery-item .back {
    display: none;
}

.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

@keyframes rotate {
    from { transform: rotateY(0deg) translateZ(175px); }
    to { transform: rotateY(360deg) translateZ(175px); }
}
</style>

<?php get_footer(); ?>
