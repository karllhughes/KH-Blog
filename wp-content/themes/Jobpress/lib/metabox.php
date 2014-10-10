<?php

function jb_show_company_meta($job_id) {
    $terms = wp_get_post_terms( $job_id, 'company' );
    if($terms && $terms[0]) {
        $company = $terms[0];
        $company_meta = get_term_meta($company->term_id);
    }
    ?><?php if($company_meta['jb_image'][0]) { ?>
                <a href="<?php echo get_term_link( $company ); ?>" 
                   title="See More <?php echo $company->name; ?> Entry Level Marketing Jobs on JobBrander" 
                   ><img src="<?php echo $company_meta['jb_image'][0]; ?>" alt="" /></a>
            <?php } ?>
    <span class="author"> <?php echo get_the_term_list( $job_id, 'company', '', ' | ' ); ?></span> 
    | <?php echo get_the_term_list( $job_id, 'city', '', ' | ' ); ?>
    | <span class="date">  <?php the_time('F j, Y'); ?></span>
<?php 
}

function add_company_meta_data($tag) {
    ?><style>textarea#description {display: none;} </style>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="jb_linkedin_login"><?php _e('Get Company Data') ?></label></th>
        <td>
            <?php jb_li_auth_link(); ?><br />
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="jb_website"><?php _e('Company Website') ?></label></th>
        <td>
            <input type="text" name="jb_website" id="jb_website" size="40" value="<?php echo get_term_meta($tag->term_id, 'jb_website', TRUE); ?>"><br />
            <span class="description">Company website URL</span>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="jb_tagline"><?php _e('Tagline') ?></label></th>
        <td>
            <input type="text" name="jb_tagline" id="jb_tagline" size="40" value="<?php echo get_term_meta($tag->term_id, 'jb_tagline', TRUE); ?>"><br />
            <span class="description">Company Tagline</span>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="jb_description"><?php _e('Company Description') ?></label></th>
        <td>
            <textarea name="jb_description" id="jb_description" 
            ><?php echo get_term_meta($tag->term_id, 'jb_description', TRUE); ?></textarea><br />
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="jb_employee_count"><?php _e('Employees') ?></label></th>
        <td>
            <input type="text" name="jb_employee_count" id="jb_employee_count" size="40" value="<?php echo get_term_meta($tag->term_id, 'jb_employee_count', TRUE); ?>"><br />
            <span class="description">Approximate size of the company</span>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="jb_li_id"><?php _e('Linkedin ID') ?></label></th>
        <td>
            <input type="text" name="jb_li_id" id="jb_li_id" size="40" value="<?php echo get_term_meta($tag->term_id, 'jb_li_id', TRUE); ?>"><br />
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="jb_industry"><?php _e('Industry') ?></label></th>
        <td>
            <input type="text" name="jb_industry" id="jb_industry" size="40" value="<?php echo get_term_meta($tag->term_id, 'jb_industry', TRUE); ?>"><br />
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="jb_handle"><?php _e('Twitter Handle') ?></label></th>
        <td>
            <input type="text" name="jb_handle" id="jb_handle" size="40" value="<?php echo get_term_meta($tag->term_id, 'jb_handle', TRUE); ?>"><br />
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="jb_founded"><?php _e('Year Founded') ?></label></th>
        <td>
            <input type="text" name="jb_founded" id="jb_founded" size="40" value="<?php echo get_term_meta($tag->term_id, 'jb_founded', TRUE); ?>"><br />
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="jb_image"><?php _e('Square Image URL') ?></label></th>
        <td>
            <input type="text" name="jb_image" id="jb_image" size="40" value="<?php echo get_term_meta($tag->term_id, 'jb_image', TRUE); ?>"><br />
        </td>
    </tr>
<?php
    

}
add_action('company_edit_form_fields', 'add_company_meta_data', 10, 1);
//add_action('company_add_form_fields', 'add_company_meta_data', 10, 1);
 
function jb_save_company_meta( $term_id ) {
    //require_once('linkedin.php');
    $term = get_term($term_id, 'company');
    $li_data = jb_li_get_company_info($term->slug);
    // Save website url
    if ( $_POST['jb_website'] ) {
         update_term_meta($term_id, 'jb_website', $_POST['jb_website']);
    } elseif($li_data->websiteUrl) {
         update_term_meta($term_id, 'jb_website', jb_addhttp($li_data->websiteUrl));
    }
    // Save description
    if ( $_POST['jb_description'] ) {
         update_term_meta($term_id, 'jb_description', $_POST['jb_description']);
    } elseif($li_data->description) {
         update_term_meta($term_id, 'jb_description', $li_data->description);
    }
    // Save tagline
    if ( $_POST['jb_tagline'] ) {
         update_term_meta($term_id, 'jb_tagline', $_POST['jb_tagline']);
    } 
    // Save employee count
    if ( $_POST['jb_employee_count'] ) {
         update_term_meta($term_id, 'jb_employee_count', $_POST['jb_employee_count']);
    } elseif($li_data->employeeCountRange->name) {
         update_term_meta($term_id, 'jb_employee_count', $li_data->employeeCountRange->name);
    }
    // Save linkedin ID
    if ( $_POST['jb_li_id'] ) {
         update_term_meta($term_id, 'jb_li_id', $_POST['jb_li_id']);
    } elseif($li_data->id) {
         update_term_meta($term_id, 'jb_li_id', $li_data->id);
    }
    // Save industry
    if ( $_POST['jb_industry'] ) {
         update_term_meta($term_id, 'jb_industry', $_POST['jb_industry']);
    } elseif($li_data->industries->values[0]->name) {
         update_term_meta($term_id, 'jb_industry', $li_data->industries->values[0]->name);
    }
    // Save twitter handle
    if ( $_POST['jb_handle'] ) {
         update_term_meta($term_id, 'jb_handle', $_POST['jb_handle']);
    } elseif($li_data->twitterId) {
         update_term_meta($term_id, 'jb_handle', $li_data->twitterId);
    }
    // Save founded year
    if ( $_POST['jb_founded'] ) {
         update_term_meta($term_id, 'jb_founded', $_POST['jb_founded']);
    } elseif($li_data->foundedYear) {
         update_term_meta($term_id, 'jb_founded', $li_data->foundedYear);
    }
    // Save square image url
    if ( $_POST['jb_image'] ) {
         update_term_meta($term_id, 'jb_image', $_POST['jb_image']);
    } elseif($li_data->squareLogoUrl) {
         update_term_meta($term_id, 'jb_image', $li_data->squareLogoUrl);
    }
}
add_action ( 'create_company', 'jb_save_company_meta');
add_action ( 'edit_company', 'jb_save_company_meta');


$prefix = 'jb_';

$meta_box = array(
    'id' => 'jobmeta',
    'title' => 'Job details',
    'page' => 'job',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'External Link',
            'desc' => 'Link to original job posting',
            'id' => $prefix . 'url',
            'type' => 'text',
            'std' => ''
        )
    ),
);

add_action('admin_menu', 'mytheme_add_box');

// Add meta box
function mytheme_add_box() {
	global $meta_box;
	
	add_meta_box($meta_box['id'], $meta_box['title'], 'mytheme_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}

// Callback function to show fields in meta box
function mytheme_show_box() {
	global $meta_box, $post;
	
	// Use nonce for verification
	echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	
	echo '<table class="form-table">';

	foreach ($meta_box['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		
		echo '<tr>',
				'<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
				'<td>';
		switch ($field['type']) {
			case 'text':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />',
					'<br />', $field['desc'];
				break;
			case 'textarea':
				echo '<textarea  name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>',
					'<br />', $field['desc'];

				break;
			case 'select':
				echo '<select name="', $field['id'], '" id="', $field['id'], '">';
				foreach ($field['options'] as $option) {
					echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
				}
				echo '</select>',
				'<br />', $field['desc'];
				break;
			case 'radio':
				foreach ($field['options'] as $option) {
					echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
				}
				break;
			case 'checkbox':
				echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
				break;
		}
		echo 	'<td>',
			'</tr>';
	}
	
	echo '</table>';
}

add_action('save_post', 'mytheme_save_data');

// Save data from meta box
function mytheme_save_data($post_id) {
	global $meta_box;
	
	// verify nonce
	if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}

	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	
	foreach ($meta_box['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}

?>