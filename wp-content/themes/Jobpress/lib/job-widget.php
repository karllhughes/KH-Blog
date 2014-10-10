<?php
/**
 * Plugin Name: Blog Widget
 * Plugin URI: http://web2feel.com
 * Description: A widget that displays a mini blog section.
 * Version: 0.1
 * Author: Jinsona ( Widget framework courtesy - Justin Tadlock )
 * Author URI: http://web2feel.com , http://justintadlock.com
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 *
 * textdomain() used - web2feel
 *
 *
 */

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'w2f_job_widgets' );

/**
 * Register our widget.
 * 'Example_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function w2f_job_widgets() {
	register_widget( 'jb_signup_widget' );
	register_widget( 'W2F_Job_Widget' );
}

/**
 * Example Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class jb_signup_widget extends WP_Widget {
	/**
	 * Widget setup.
	 */
	function jb_signup_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'jb_signup_widget', 'description' => __('Sign Up to Get Job Listings') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'jb_signup_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'jb_signup_widget', __('JB Signup Widget', 'web2feel'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
            ?>
<style>
    li.jb_signup_widget {
        background-color: #0088cc;
        border-radius: 5px;
        text-align: center;
        color: #fff;
        padding: 0 20px 10px;
        font-size: 16px;
        line-height: 24px;
    }
    .sidebar ul li.jb_signup_widget h3 {
        border-bottom: 1px solid #fff;
        border-radius: 0;
    }
    li.jb_signup_widget input {
        font-size: 18px;
        height: 30px;
    }
    input.hideme {
        display: none;
        height: 0px;
    }
    .sidebar ul li.jb_signup_widget .input-append {
        margin-bottom: 0;
    }
    .sidebar ul li.jb_signup_widget .social-buttons {
        margin-bottom: 10px;
    }
</style>
            <?php
            extract( $args );

            /* Our variables from the widget settings. */
            $title = apply_filters('widget_title', $instance['title'] );
            $count = $instance['count'];

            /* Before widget (defined by themes). */
            echo $before_widget;

            /* Display the widget title if one was input (before and after defined by themes). */
            if ( $title )
                    echo $before_title . $title . $after_title;
?>
        <div class="blog-widget">
            <p>To get the latest jobs and job-hunting tips delivered to your inbox every month.</p>
            <div class="controls">
                <div class="input-append">
                    <!-- Begin MailChimp Signup Form -->
                    <form action="http://jobbrander.us7.list-manage1.com/subscribe/post?u=24c8d4e6cce312f595ce6ed17&amp;id=52cf17c3fb" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <input type="email" value="" name="EMAIL" class="span2" id="emailInput" placeholder="Email Address">
                        <div class="response" id="mce-error-response" style="display:none"></div>
                        <div class="response" id="mce-success-response" style="display:none"></div>
                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;"><input type="text" name="b_24c8d4e6cce312f595ce6ed17_52cf17c3fb" value=""></div>
                        <button type="submit" value="" name="subscribe" id="mc-embedded-subscribe" class="btn" style="height:40px;"><i class="icon-envelope"></i></button>
                    </form>
                </div>
            </div>
            <div class="social-buttons">
                <a href="http://twitter.com/thejobbrander" target="_blank">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/twitter2.png" style="width: 32px; height: auto;" />
                </a>
                <a href="https://www.facebook.com/pages/Job-Brander/565951163415856" target="_blank">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/facebook2.png" style="width: 32px; height: auto;" />
                </a>
                <a href="http://www.linkedin.com/groups/Entry-Level-Marketing-Jobs-Career-5104806" target="_blank">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/linkedin2.png" style="width: 32px; height: auto;" />
                </a>
                <a href="http://pinterest.com/jobbrander/" target="_blank">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/pinterest2.png" style="width: 32px; height: auto;" />
                </a>
                <a href="<?php echo bloginfo('rss2_url'); ?>" target="_blank">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/rss2.png" style="width: 32px; height: auto;" />
                </a>
                <!--<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/google+2.png" style="width: 32px; height: auto;" />-->
            </div>
        </div><!--blog_widget-->


    <?php
            /* After widget (defined by themes). */
            echo $after_widget;
    }

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['count'] = strip_tags( $new_instance['count'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Latest Jobs', 'web2feel'), 'count' => 3 );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'web2feel'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:95%;" />
		</p>

		<!-- Your Name: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e('Number of posts:', 'web2feel'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo $instance['count']; ?>" style="width:95%;" />
		</p>

	

	<?php
	}
}

class W2F_Job_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function W2F_Job_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'w2f_job_widget', 'description' => __('An widget to display latest job listings.', 'web2feel') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'w2f_job_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'w2f_job_widget', __('W2F Job Widget', 'web2feel'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$count = $instance['count'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
?>


			<div class="blog-widget">
                            
                <ul>
                	<?php 
                    $query = new WP_Query();
                    $query->query('post_type=job&posts_per_page='.$count.'&caller_get_posts=1');
                    ?>
                    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                    $company = wp_get_post_terms( get_the_ID(), 'company' );
                    $city = wp_get_post_terms( get_the_ID(), 'city' );
                    ?>
                 <li class="clearfix">
                    <div class="widget-post">
                        <h4 class="widtitle"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h4>
                            <p class="muted">
                                <a href="<?php echo get_term_link( $company[0] ); ?>"><?php echo $company[0]->name; ?></a> 
                                in <a href="<?php echo get_term_link( $city[0] ); ?>"><?php echo $city[0]->name; ?></a>
                            </p>
						<div class="clear"></div>
                    </div>
                    
                </li>
                    <?php endwhile; endif; ?>
                    
                    <?php wp_reset_query(); ?>

                </ul>
                
            </div><!--blog_widget-->
			
			
<?php
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['count'] = strip_tags( $new_instance['count'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Latest Jobs', 'web2feel'), 'count' => 3 );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'web2feel'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:95%;" />
		</p>

		<!-- Your Name: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e('Number of posts:', 'web2feel'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo $instance['count']; ?>" style="width:95%;" />
		</p>

	

	<?php
	}
}

?>