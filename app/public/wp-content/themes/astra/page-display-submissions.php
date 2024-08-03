<?php
/*
Template Name: Display Submissions
*/
get_header(); ?>

<div class="submissions-list">
    <?php
    $args = array(
        'post_type' => 'post', // Or custom post type if you're using one
        'posts_per_page' => -1,
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $user_name = get_field('user_name');
            $page_selection = get_field('page_selection');
            ?>
            <div class="submission">
                <p><strong>Name:</strong> <?php echo esc_html($user_name); ?></p>
                <p><strong>Page:</strong> <a href="<?php echo get_permalink($page_selection); ?>"><?php echo get_the_title($page_selection); ?></a></p>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No submissions found.</p>';
    endif;
    ?>
</div>

<?php get_footer(); ?>
