<?php get_header(); ?>

<div id="content" class="span8">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
	<div class="title">
		<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
	</div>
	<div class="postmeta"></div>
        <div class="clearfix"></div>
        <div class="row">
        <?php
            // Get all the cities
            $cities = get_terms('city'); $count=0;
            foreach($cities as $city) { $count++; ?>
            <div class="span4">
                <h2><a href="<?php echo get_term_link( $city, 'city' ); ?>"
                title="Entry Level Jobs & Internships in <?php echo $city->name; ?>"><?php echo $city->name; ?></a></h2>
            </div>
            <?php if($count % 2 == 0) { echo '</div><div class="row">'; }
            }
        ?>
        </div>
</div>
<?php endwhile; else: ?>
		<h1 class="title">Not Found</h1>
		<p>I'm Sorry,  you are looking for something that is not here. Try a different search.</p>
<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>