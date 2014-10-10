<div id="right" class="span4">
<?php //include (TEMPLATEPATH . '/searchform.php'); 
?>	
	
<!-- Sidebar widgets -->
<div class="sidebar"><?php if ( 'job' == get_post_type() ) { ?>
    <div class="google_ad" style="margin-bottom: 20px;">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- JobBrander Content -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-2322554200861137"
             data-ad-slot="7626825003"
             data-ad-format="auto"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
</div><?php } ?>
<ul>
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar') ) : else : ?>
	<?php endif; ?>
</ul>