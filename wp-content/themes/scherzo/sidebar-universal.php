<?php if ( is_active_sidebar( 'universal' ) ) : ?>

	<aside id="universal" class="sidebar" role="complementary">
	<section class="widgetContainer widget_text">
		<h2 class="widgetTitle">About Me</h2>
		<div class="textwidget">
		<img src="http://i.imgur.com/GsDIIQz.jpg" class="avatar" />
		<p>
			I'm a Technology Entrepreneur & Engineer, and I'm
			currently building software at
			<a href="http://packbackbooks.com/" target="_blank" title="Packback Books">Packback</a>
			and running
			<a href="http://www.jobbrander.com" target="_blank" title="JobBrander">JobBrander</a>.
		</p>
		<p>
			Here on my blog I post about managing software teams,
			working at a startup, and some of the more interesting projects
			I'm working on.
		</p>
		<p><a href="<?php echo get_permalink( '6' ); ?>" title="About">Read More</a>
			| <a href="<?php echo get_permalink( '8' ); ?>" title="Contact Me">Contact</a>
			| <a href="https://drive.google.com/open?id=0B2SL8f3YPEJPQjZadGRJLVMtQ3M" title="Karl L. Hughes Resume">Resume</a>
		</p>

<h2 class="widgetTitle">Or Follow Me Elsewhere:</h2>
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
<a href="https://github.com/karllhughes/" title="View my Code on Github" target="_blank">
<img src="http://i.imgur.com/DgRRLq3.png" alt="Github" />
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
