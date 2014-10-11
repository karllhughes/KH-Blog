<?php if ( is_active_sidebar( 'universal' ) ) : ?>

	<aside id="universal" class="sidebar" role="complementary">
	<section class="widgetContainer widget_text">
		<h1 class="widgetTitle">About the Author</h1>
		<div class="textwidget">
		<?php echo get_avatar( get_the_author_email(), '80' ); ?>
		<p>Karl Hughes is a software engineer, technology entrepreneur, distance runner, and vegetarian based in Chicago, IL.  Currently, he is a Software Engineer for <a href="http://packbackbooks.com/" title="Packback Books" >Packback</a>.</p>
<p>He also manages content and marketing for <a href="http://www.jobbrander.com" title="entry level marketing jobs">JobBrander</a>, a website devoted to helping entry level professionals in their <a href="http://www.jobbrander.com/jobs" title="entry level marketing jobs">job hunt</a>.</p>
<p><a href="<?php echo get_permalink( '6' ); ?>" title="About Karl">About Me</a> | <a href="<?php echo get_permalink( '8' ); ?>" title="Contact Me">Contact Info</a></p>

<h1 class="widgetTitle">Circle Me for More:</h1>
<!-- Place this tag where you want the badge to render -->
<g:plus href="https://plus.google.com/101080316492181821858" width="230" height="69" ></g:plus>

<h1 class="widgetTitle">Or Follow Me Elsewhere:</h1>
<div class="social-buttons">
<a href="http://www.facebook.com/KarlLHughes" title="Friend me on Facebook" target="_blank">
<img src="http://karllhughes.com/blog/wp-content/uploads/2012/03/fb.png" alt="Facebook" />
</a>
<a href="http://twitter.com/karllhughes" title="Follow me on Twitter" target="_blank">
<img src="http://karllhughes.com/blog/wp-content/uploads/2012/03/tw.png" alt="Twitter" />
</a>
<a href="http://www.linkedin.com/in/karllhughes" title="Connect on Linkedin" target="_blank">
<img src="http://karllhughes.com/blog/wp-content/uploads/2012/03/lin.png" alt="Linkedin" />
</a>
<a href="http://contributor.yahoo.com/user/1416913/karl_l_hughes.html" title="Check out my Contributions on Yahoo!" target="_blank">
<img src="http://karllhughes.com/blog/wp-content/uploads/2012/03/yahoo.png" alt="Yahoo!" />
</a>
<a href="http://feedburner.google.com/fb/a/mailverify?uri=KarlLHughes&amp;loc=en_US" title="Subscribe for Email Updates" target="_blank">
<img src="http://karllhughes.com/blog/wp-content/uploads/2012/03/email.png" alt="Email Feed" />
</a>
<a href="http://feeds.feedburner.com/KarlLHughes" title="Good ol' RSS" target="_blank">
<img src="http://karllhughes.com/blog/wp-content/uploads/2012/03/rss.png" alt="RSS Feed" />
</a>
</div>
		</div>
	</section>


		<?php dynamic_sidebar( 'universal' ); ?>

	</aside>

<?php endif; ?>