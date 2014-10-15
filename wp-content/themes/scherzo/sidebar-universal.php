<?php if ( is_active_sidebar( 'universal' ) ) : ?>

	<aside id="universal" class="sidebar" role="complementary">
	<section class="widgetContainer widget_text">
		<h1 class="widgetTitle">About the Author</h1>
		<div class="textwidget">
		<?php echo get_avatar( get_the_author_email(), '80' ); ?>
		<p>Karl Hughes is a tech entrepreneur, college media fanatic, distance
		runner, and vegetarian based in Chicago, IL. Currently, he is the Engineering Manager for
		<a href="http://packbackbooks.com/" target="_blank" title="Packback Books"
		>Packback</a>.</p>
		<p>He also manages content strategy for
		<a href="http://www.jobbrander.com" title="JobBrander - Entry Level Jobs"
		>JobBrander</a>, a website devoted to helping entry level professionals
		start their careers, and <a href="http://casualkook.com/" title="Casual Kook"
		>Casual Kook</a>, his personal cooking and fitness blog.</p>
		<p><a href="<?php echo get_permalink( '6' ); ?>" title="About Karl">About Me</a> | <a href="<?php echo get_permalink( '8' ); ?>" title="Contact Me">Contact Info</a></p>

<h1 class="widgetTitle">Circle Me for More:</h1>
<!-- Place this tag where you want the badge to render -->
<g:plus href="https://plus.google.com/101080316492181821858" width="230" height="69" ></g:plus>

<h1 class="widgetTitle">Or Follow Me Elsewhere:</h1>
<div class="social-buttons">
<a href="http://www.facebook.com/KarlLHughes" title="Friend me on Facebook" target="_blank">
<img src="http://karllhughes.com/wp-content/uploads/2012/03/fb.png" alt="Facebook" />
</a>
<a href="http://twitter.com/karllhughes" title="Follow me on Twitter" target="_blank">
<img src="http://karllhughes.com/wp-content/uploads/2012/03/tw.png" alt="Twitter" />
</a>
<a href="http://www.linkedin.com/in/karllhughes" title="Connect on Linkedin" target="_blank">
<img src="http://karllhughes.com/wp-content/uploads/2012/03/lin.png" alt="Linkedin" />
</a>
<a href="http://feedburner.google.com/fb/a/mailverify?uri=KarlLHughes&amp;loc=en_US" title="Subscribe for Email Updates" target="_blank">
<img src="http://karllhughes.com/wp-content/uploads/2012/03/email.png" alt="Email Feed" />
</a>
<a href="http://feeds.feedburner.com/KarlLHughes" title="Good ol' RSS" target="_blank">
<img src="http://karllhughes.com/wp-content/uploads/2012/03/rss.png" alt="RSS Feed" />
</a>
</div>
		</div>
	</section>


		<?php dynamic_sidebar( 'universal' ); ?>

	</aside>

<?php endif; ?>
