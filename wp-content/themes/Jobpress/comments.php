<hr/>
<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->
<div class="row">
    <div id="commentsbox" class="span5">
    <?php if ( have_comments() ) : ?>
        <h3>Comments</h3>
            <ul class="commentlist">
            <?php wp_list_comments(); ?>
            </ul>

            <div class="comment-nav">
                    <div class="alignleft"><?php previous_comments_link() ?></div>
                    <div class="alignright"><?php next_comments_link() ?></div>

            </div>
    <?php endif; ?>

    <?php if ( comments_open() ) : ?>

    <div id="comment-form">
    <div id="respond">

    <h3>Leave a Reply</h3>

    <div class="cancel-comment-reply">
            <small><?php cancel_comment_reply_link(); ?></small>
    </div>

    <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
    <p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
    <?php else : ?>

    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

    <?php if ( is_user_logged_in() ) : ?>

    <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

    <?php else : ?>
    <label for="author">Name <small><?php if ($req) echo "(required)"; ?></small></label>
    <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />

    <label for="email">Mail <small><?php if ($req) echo "(required)"; ?></small></label>
    <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />

    <label for="url">Website</label>
    <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />


    <?php endif; ?>

    <textarea name="comment" id="comment" cols="100%" rows="5" tabindex="4" class="span8"></textarea><br />

    <input name="submit" type="submit" id="commentSubmit" tabindex="5" value="Submit" />
    <?php comment_id_fields(); ?>
    <?php do_action('comment_form', $post->ID); ?>

    </form>

    <?php endif; // If registration required and not logged in ?>
    </div>
    </div>

    <?php endif; // if you delete this the sky will fall on your head ?>
    </div>
    <div class="span3">
    </div>
</div>