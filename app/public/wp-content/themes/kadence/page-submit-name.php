<?php
/*
Template Name: Submit Name
*/
get_header(); ?>

<div class="submission-form">
    <?php if (isset($_GET['message'])): ?>
        <?php if ($_GET['message'] == 'already_submitted'): ?>
            <p>You have already submitted a post.</p>
        <?php elseif ($_GET['message'] == 'success'): ?>
            <p>Your post has been submitted successfully.</p>
        <?php endif; ?>
    <?php endif; ?>

    <form id="user-submission-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
        <?php wp_nonce_field('user_submission_nonce'); ?>
        <input type="hidden" name="action" value="handle_user_submission">

        <label for="user_name">Your Name</label>
        <input type="text" name="user_name" id="user_name" required>

        <label for="color_selection">Select Color</label>
        <select name="color_selection" id="color_selection" required>
            <option value="red">Red</option>
            <option value="yellow">Yellow</option>
            <option value="blue">Blue</option>
            <!-- Add more options as needed -->
        </select>

        <input type="submit" name="submit_form" value="Submit">
    </form>
</div>

<?php get_footer(); ?>


