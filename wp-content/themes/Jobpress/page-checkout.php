<?php get_header(); ?>

<div id="content" class="span12">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
	<div class="postmeta">
        </div>
        <div class="row">
            <div class="span6 offset3" style="min-height: 500px;">
                <div id="mc1e6ajvmti1s"><a href="https://app.moonclerk.com/pay/1e6ajvmti1s">Create New Job Listing</a></div><script type="text/javascript">var mc1e6ajvmti1s;(function(d,t) {var s=d.createElement(t),opts={"checkoutToken":"1e6ajvmti1s","width":"100%"};s.src='https://d2l7e0y6ygya2s.cloudfront.net/assets/embed.js';s.onload=s.onreadystatechange = function() {var rs=this.readyState;if(rs) if(rs!='complete') if(rs!='loaded') return;try {mc1e6ajvmti1s=new MoonclerkEmbed(opts);mc1e6ajvmti1s.display();} catch(e){}};var scr=d.getElementsByTagName(t)[0];scr.parentNode.insertBefore(s,scr);})(document,'script');</script>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clearfix"></div>
</div>
<?php endwhile; else: ?>
		<h1 class="title">Not Found</h1>
		<p>I'm Sorry,  you are looking for something that is not here. Try a different search.</p>
<?php endif; ?>
</div>
<?php get_footer(); ?>
