<!-- sidebar -->
<aside role="complementary" class="sidebar medium-3 columns">

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
	</div>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
	</div>

	<?php if( current_user_can('administrator')) { ?>
	<p>
		Queries on this page: <?php echo get_num_queries(); ?><br/>
		<?php edit_post_link(); ?>
	</p>
	<?php } ?>

</aside>
<!-- /sidebar -->
