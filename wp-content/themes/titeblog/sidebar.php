<!-- sidebar -->
<aside role="complementary" class="sidebar medium-2 columns">

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
	</div>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
	</div>

	<?php get_template_part('searchform'); ?>
	
	<small>
		Queries on this page: <?php echo get_num_queries(); ?>
	</small>

</aside>
<!-- /sidebar -->
