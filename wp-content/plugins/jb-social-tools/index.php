<?php
/*
Plugin Name: JobBrander Social Tools
Description: Allows brands and users to connect social accounts and login
Version: 1
Author: Karl L. Hughes
Author URI: http://karllhughes.com
*/

// Remove profile fields
if(is_admin()){
  remove_action("admin_color_scheme_picker", "admin_color_scheme_picker");
}

//require_once('linkedin.php');
//require_once('twitteroauth.php');
add_filter('user_contactmethods','jb_modify_profile_fields',10,1);

//include( plugin_dir_path( __FILE__ ) . 'jb-social-tools/jb_profile.php');

function jb_modify_profile_fields( $contactmethods ) {
    $contactmethods['jb_li_url'] = 'Linkedin';
    $contactmethods['jb_tw_url'] = 'Twitter';
    $contactmethods['jb_fb_url'] = 'Facebook';
    $contactmethods['jb_gp_url'] = 'Google+';
    $contactmethods['jb_pi_url'] = 'Pinterest';
    unset($contactmethods['aim']);
    unset($contactmethods['jabber']);
    unset($contactmethods['yim']);
    return $contactmethods;
}
//add_action('init', 'jb_li_redirect');

function jb_li_redirect() {
    //echo "Testing"; exit;
    // Create user if email address sent

    $this_url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if(strpos($this_url, 'i/jobs') || strpos($this_url, 'www.jobbrander.com/jobs') ) {
        header("HTTP/1.1 301 Moved Permanently");
        header('Location: '.site_url().'/job');
        exit;
    }

    if(!is_admin() && $_POST['email'] && $_POST['hideme']=='') {
        jb_login_user($_POST['email']);
        $redirect = $_POST['return_url'];
        $_POST = array();
        header('Location: '.$redirect);
        exit;
    }

    global $li_api_key, $li_api_secret;
    session_start();
    $API_CONFIG = array(
          'appKey'       => $li_api_key,
          'appSecret'    => $li_api_secret,
          'callbackUrl'  => NULL
    );
    $_REQUEST[LINKEDIN::_GET_TYPE] = (isset($_REQUEST[LINKEDIN::_GET_TYPE])) ? $_REQUEST[LINKEDIN::_GET_TYPE] : '';
  switch($_REQUEST[LINKEDIN::_GET_TYPE]) {
    case 'initiate':
      // check for the correct http protocol (i.e. is this script being served via http or https)
      if($_SERVER['HTTPS'] == 'on') {
        $protocol = 'https';
      } else {
        $protocol = 'http';
      }

      // set the callback url
      $API_CONFIG['callbackUrl'] = $protocol . '://' . $_SERVER['SERVER_NAME'] . ((($_SERVER['SERVER_PORT'] != PORT_HTTP) || ($_SERVER['SERVER_PORT'] != PORT_HTTP_SSL)) ? ':' . $_SERVER['SERVER_PORT'] : '') . $_SERVER['PHP_SELF'] . '?' . LINKEDIN::_GET_TYPE . '=initiate&' . LINKEDIN::_GET_RESPONSE . '=1';
      $OBJ_linkedin = new LinkedIn($API_CONFIG);

      // check for response from LinkedIn
      $_GET[LINKEDIN::_GET_RESPONSE] = (isset($_GET[LINKEDIN::_GET_RESPONSE])) ? $_GET[LINKEDIN::_GET_RESPONSE] : '';
      if(!$_GET[LINKEDIN::_GET_RESPONSE]) {
        // LinkedIn hasn't sent us a response, the user is initiating the connection

        // Make sure the correct button was pressed
        if(!isset($_GET['li_form_submit'])) {
            return FALSE;
        }

        // send a request for a LinkedIn access token
        $response = $OBJ_linkedin->retrieveTokenRequest();
        if($response['success'] === TRUE) {
          // store the request token
          $_SESSION['oauth']['linkedin']['request'] = $response['linkedin'];


          // redirect the user to the LinkedIn authentication/authorisation page to initiate validation.
          header('Location: ' . LINKEDIN::_URL_AUTH . $response['linkedin']['oauth_token']);
          exit;
        } else {
          // bad token request
          echo "Request token retrieval failed:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
        }
      } else {
        // LinkedIn has sent a response, user has granted permission, take the temp access token, the user's secret and the verifier to request the user's real secret key
        $response = $OBJ_linkedin->retrieveTokenAccess($_SESSION['oauth']['linkedin']['request']['oauth_token'], $_SESSION['oauth']['linkedin']['request']['oauth_token_secret'], $_GET['oauth_verifier']);
        if($response['success'] === TRUE) {
          // the request went through without an error, gather user's 'access' tokens
          $_SESSION['oauth']['linkedin']['access'] = $response['linkedin'];

          // set the user as authorized for future quick reference
          $_SESSION['oauth']['linkedin']['authorized'] = TRUE;

          // redirect the user back to the demo page
          $response = $OBJ_linkedin->profile('~:(id,first-name,last-name,picture-url,email-address,headline,public-profile-url)');
          $response['linkedin'] = new SimpleXMLElement($response['linkedin']);
          $response['linkedin'] = (array)$response['linkedin'];
          $email = $response['linkedin']['email-address'];
          // Log the user in using Linkedin Email
          $user_status = jb_login_user($email, $response['linkedin']);
          // If the user clicked from the login page, go back
          if(strpos($_SESSION['jb']['login_url'], 'wp-login.php') || strpos( $_SESSION['jb']['login_url'],'wp-register.php')) {
            if($user_status=='new') { $redirect = $_SERVER['PHP_SELF']."?user=new"; }
            else { $redirect = $_SERVER['PHP_SELF']; }
            //header('Location: ' . $redirect );
            //exit;
          } else {
            if($user_status=='new') { $redirect = $_SESSION['jb']['login_url']."?user=new"; }
            else { $redirect = $_SESSION['jb']['login_url']; }
            //header('Location: ' . $_SESSION['jb']['login_url']);
            //exit;
          }
        } else {
          // bad token access
          echo "Access token retrieval failed:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
        }
      }
      break;

    case 'revoke':
      // check the session
      if(!oauth_session_exists()) {
        throw new LinkedInException('This script requires session support, which doesn\'t appear to be working correctly.');
      }

      $OBJ_linkedin = new LinkedIn($API_CONFIG);
      $OBJ_linkedin->setTokenAccess($_SESSION['oauth']['linkedin']['access']);
      $response = $OBJ_linkedin->revoke();
      if($response['success'] === TRUE) {
          $return_url = $_SESSION['jb']['login_url'];
        // revocation successful, clear session
        session_unset();
        $_SESSION = array();
        if(session_destroy()) {
          // session destroyed
          header('Location: ' . $return_url);
          exit;
        } else {
          // session not destroyed
          echo "Error clearing user's session";
        }
      } else {
        // revocation failed
        echo "Error revoking user's token:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
      }
      break;
    default:
      // nothing being passed back, display demo page

      // check PHP version
      if(version_compare(PHP_VERSION, '5.0.0', '<')) {
        throw new LinkedInException('You must be running version 5.x or greater of PHP to use this library.');
      }

      // check for cURL
      if(extension_loaded('curl')) {
        $curl_version = curl_version();
        $curl_version = $curl_version['version'];
      } else {
        throw new LinkedInException('You must load the cURL extension to use this library.');
      }

      break;
  }
}

function jb_li_auth_link() {
    global $li_api_key, $li_api_secret;
    // Save the page they're currently on
    $_SESSION['jb']['login_url'] = jb_current_url();
    $API_CONFIG = array(
          'appKey'       => $li_api_key,
          'appSecret'    => $li_api_secret,
          'callbackUrl'  => NULL
    );
    $OBJ_linkedin = new LinkedIn($API_CONFIG);
    $OBJ_linkedin->setTokenAccess($_SESSION['oauth']['linkedin']['access']);
    $OBJ_linkedin->setResponseFormat(LINKEDIN::_RESPONSE_XML);
    $_SESSION['oauth']['linkedin']['authorized'] = (isset($_SESSION['oauth']['linkedin']['authorized'])) ? $_SESSION['oauth']['linkedin']['authorized'] : FALSE;

    if($_SESSION['oauth']['linkedin']['authorized'] === TRUE) {
      // user is already connected
      ?>
      <form id="linkedin_revoke_form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
        <input type="hidden" name="<?php echo LINKEDIN::_GET_TYPE;?>" id="<?php echo LINKEDIN::_GET_TYPE;?>" value="revoke" />
        <input type="submit" value="Revoke Authorization" class="btn" />
      </form>

      <?php
      $response = $OBJ_linkedin->profile('~:(id,first-name,last-name,picture-url,email-address,headline)');
      if($response['success'] === TRUE) {
        $response['linkedin'] = new SimpleXMLElement($response['linkedin']);
      } else {
        // request failed
        echo "Error retrieving profile information:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response) . "</pre>";
      }
    } else {
      // user isn't connected
      ?>
      <form id="linkedin_connect_form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
        <input type="hidden" name="<?php echo LINKEDIN::_GET_TYPE;?>" id="<?php echo LINKEDIN::_GET_TYPE;?>" value="initiate" />
        <input type="submit" name="li_form_submit" value="Connect With LinkedIn" class="btn" />
      </form>
      <?php
    }
}

function jb_login_user($email, $linkedin_data=null) {
    $user = get_user_by( 'email', $email );
    $user_id = $user->ID;
    if ( !$user_id and email_exists($email) == false ) {
        $random_password = wp_generate_password( $length=8, $include_standard_special_chars=false );
        $username = explode('@', $email);
        $username = $username[0];
        $duplicate = get_user_by( 'slug', $username );
        if($duplicate) {
            $username = $username.'-'.rand(100,999);
        }
        $user_id = wp_create_user( $username, $random_password, $email );
        // Add user meta data
        // id,first-name,last-name,picture-url,email-address,headline,public-profile-url
        if($linkedin_data) {
            $userdata = array(
                'ID' => $user_id,
                'first_name' => $linkedin_data['first-name'],
                'last_name' => $linkedin_data['last-name'],
                'description' => $linkedin_data['headline'],
                'display_name' => $linkedin_data['first-name'].' '.$linkedin_data['last-name']
            );
            wp_update_user( $userdata );
            update_user_meta($user_id, 'jb_photo_url', $linkedin_data['picture-url']);
            update_user_meta($user_id, 'jb_li_url', $linkedin_data['public-profile-url']);
            // Log user in
            wp_set_auth_cookie( $user_id );
            //return 'new';
        }
    } elseif($linkedin_data) {
        // Log user in
        wp_set_auth_cookie( $user_id );
        return 'old';
    }
}

// Add http:// if necessary
function jb_addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}

function oauth_session_exists() {
  if((is_array($_SESSION)) && (array_key_exists('oauth', $_SESSION))) {
    return TRUE;
  } else {
    return FALSE;
  }
}
function jb_current_url() {
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
     $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
     $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

add_action( 'show_user_profile', 'jb_extra_user_profile_fields' );
add_action( 'edit_user_profile', 'jb_extra_user_profile_fields' );

function jb_extra_user_profile_fields($user) { ?>
    <h3>Other Options</h3>

    <table class="form-table">
    <tr>
        <th><label for="email"><?php _e("Email Updates"); ?></label></th>
        <td>
            <select name="jb_email">
                <option value="weekly" <?php if( get_user_meta($user->ID,'jb_email', TRUE)=='weekly' ) { echo ' selected="selected" '; } ?>
                        >Receive Weekly Updates</option>
                <option value="monthly" <?php if( get_user_meta($user->ID,'jb_email', TRUE)=='monthly' ) { echo ' selected="selected" '; } ?>
                        >Receive Monthly Updates</option>
                <option value="never" <?php if( get_user_meta($user->ID,'jb_email', TRUE)=='never' ) { echo ' selected="selected" '; } ?>
                        >Never Receive Email from Us</option>
            </select><br />
        <span class="description"><?php _e("Choose how often you'd like to receive email from us."); ?></span>
        </td>
    </tr>
    </table>
<?php

}

add_action( 'personal_options_update', 'jb_save_extra_user_profile_fields', 10, 1 );
add_action( 'edit_user_profile_update', 'jb_save_extra_user_profile_fields', 10, 1 );

function jb_save_extra_user_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }

    update_user_meta( $user_id, 'jb_email', $_POST['jb_email'] );
}

function jb_get_author_comment_count($author_id) {
    global $wpdb;
    $where = 'WHERE comment_approved = 1 AND user_id = '.$author_id;
    $comment_counts = (array) $wpdb->get_results("
            SELECT COUNT( * ) AS total
            FROM {$wpdb->comments}
            {$where}
            GROUP BY user_id
    ");
    if($comment_counts[0]->total) {
        return $comment_counts[0]->total;
    } else {
        return 0;
    }
}

?>
