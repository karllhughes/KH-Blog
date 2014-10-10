<?php
/*
Plugin Name: JobBrander Job Import Tools
Description: Imports jobs from feeds for companies we have
Version: 1
Author: Karl L. Hughes
Author URI: http://karllhughes.com
*/


    function klh_add_jobs_rss_page(){
	    $optionpage_name = "Jobs RSS";
	    add_menu_page( $optionpage_name, $optionpage_name, 'manage_options', 'jobs-rss', 'run_jobs_rss');
    }
    if (is_admin()){ add_action('admin_menu', 'klh_add_jobs_rss_page'); }

    function run_jobs_rss() {
        if(isset($_POST['save-submit']) && $_POST['save-submit'] =='Save to DB') {
            $new_jobs = klh_save_job_listings($_POST['jobs']);
        } elseif(isset($_POST['gen-submit']) && $_POST['gen-submit'] =='Import Jobs') {
            $listings = klh_generate_job_listings($_POST['num']);
        } elseif(isset($_POST['ruby-run']) && $_POST['ruby-run'] =='Scan Job Sites') {
            // Run ruby script to add jobs to db
            $cmd = 'ruby '.dirname(__FILE__).'/ruby/jobs.rb';
            system($cmd);
        }
    ?>
    <h2>Import New Jobs</h2>
    <form action="" method="post">
        <p>How many jobs do you want to import?</p>
        <select name="num">
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <input type="submit" value="Import Jobs" name="gen-submit" />
        <input type="submit" value="Scan Job Sites" name="ruby-run" />
    </form>
    <style>
        table.job_table {
            border-collapse:collapse;
        }
        .job_table tr td {
            max-width: 200px;
            overflow: hidden;
            border: 1px solid #d4d4d4;
            padding: 5px;
        }
        .highlight-green {
            background-color: greenyellow;
            font-weight: bold;
        }
        .dropdown {
            width: 100%;
        }
        .description {
            min-height: 200px;
        }
    </style>
    <?php
        if(isset($new_jobs) && is_array($new_jobs)) {
            foreach ($new_jobs as $job) { ?>
        <p><a href="<?php echo get_permalink($job); ?>" target="_blank"><?php echo get_permalink($job); ?></a></p>
            <?php }
        }
        if(isset($listings) && is_array($listings)) {
            $city_args = array(
                'taxonomy' => 'city',
                'orderby' => 'name',
                'order' => 'ASC',
                'class' => 'dropdown',
                'hide_empty' => 0,
            );
            $company_args = array(
                'taxonomy' => 'company',
                'orderby' => 'name',
                'order' => 'ASC',
                'class' => 'dropdown',
                'hide_empty' => 0,
            );
            $cat_args = array(
                'taxonomy' => 'job_type',
                'orderby' => 'name',
                'order' => 'ASC',
                'class' => 'dropdown',
                'hide_empty' => 0,
            );
        ?>
        <form method="POST" action="">
            <table class='job_table'>
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Company</th>
                    <th>Posted</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Category</th>
                    <th></th>
                </tr>
            <?php foreach($listings as $listing) {
                $jb_city = get_term_by( 'name', $listing['city'].', '.$listing['state'], 'city');
                $jb_employer = get_term_by( 'name', $listing['company'], 'company');
                $city_args['selected'] = $jb_city->term_id;
                $city_args['name'] = "jobs[". $listing['id']."][city]";
                $company_args['selected'] = $jb_employer->term_id;
                $company_args['name'] = "jobs[". $listing['id']."][company]";
                $cat_args['name'] = "jobs[". $listing['id']."][job_type]";
                $listing['title'] = ucwords(strtolower($listing['title'])); ?>
                <tr id="<?php echo $listing['id']; ?>">
                <td id="<?php echo $listing['id']; ?>-check"><input type="checkbox" name="jobs[<?php echo $listing['id']; ?>][import]" /></td>
                <td id="<?php echo $listing['id']; ?>-title" class="text">
                    <a href="<?php echo $listing['link']; ?>" target="_blank"><?php
                    echo $listing['title']; ?></a><br/>
                    <textarea name="jobs[<?php echo $listing['id']; ?>][title]"><?php echo $listing['title']; ?></textarea>
                </td>
                <td id="<?php echo $listing['id']; ?>-company" class="text <?php
                    if($jb_employer) { echo 'highlight-green'; }
                    ?>"><a href="https://www.google.com/search?q=<?php echo urlencode($listing['company']); ?>"
                    target="_blank" ><?php echo $listing['company']; ?></a>
                    <a href="#" onclick="addCompany('<?php echo $listing['company']; ?>','<?php echo $listing['id']; ?>')"
                       style="font-weight:bold; font-size:14px; text-decoration:none;" id="new_company_<?php echo $listing['id']; ?>">+</a><br/>
                    <input type="hidden" name="jobs[<?php echo $listing['id']; ?>][new_company]"
                           value="" id="new_company_<?php echo $listing['id']; ?>"/>
                    <?php wp_dropdown_categories( $company_args ); ?>
                </td>
                <td id="<?php echo $listing['id']; ?>-date" class="text"
                    ><?php echo $listing['date']; ?> on <?php echo $listing['source']; ?></td>
                <td id="<?php echo $listing['id']; ?>-description" class="text">
                    <textarea class="description" name="jobs[<?php echo $listing['id']; ?>][description]"><?php echo $listing['description']; ?></textarea>
                </td>
                <td id="<?php echo $listing['id']; ?>-location" class="text <?php
                    if($jb_city) { echo 'highlight-green'; }
                ?>"><a href="https://www.google.com/search?q=<?php echo urlencode($listing['city'].', '.$listing['state']); ?>"
                    target="_blank" ><?php echo $listing['city'].', '.$listing['state']; ?></a>
                    <a href="#" onclick="addCity('<?php echo $listing['city'].', '.$listing['state']; ?>','<?php echo $listing['id']; ?>')"
                       style="font-weight:bold; font-size:14px; text-decoration:none;"
                       id="new_city_<?php echo $listing['id']; ?>">+</a><br/>
                    <input type="hidden" name="jobs[<?php echo $listing['id']; ?>][new_city]"
                           value="" id="new_city_<?php echo $listing['id']; ?>"/>
                <br/>
                <?php wp_dropdown_categories( $city_args ); ?>
                </td>
                <td><?php wp_dropdown_categories( $cat_args ); ?></td>
                </tr>
                <input type="hidden" name="jobs[<?php echo $listing['id']; ?>][link]"
                       value="<?php echo $listing['link']; ?>" />
            <?php } ?>
                </table>
            <input type="submit" value="Save to DB" name="save-submit" />
        </form>
        <script>
            function addCompany(company_name,id) {
                jQuery("input#new_company_"+id).val(company_name);
                jQuery("a#new_company_"+id).html('&#x2713;');
                jQuery("td#"+id+"-check > input").prop('checked', true);
                return false;
            }
            function addCity(city_name,id) {
                jQuery("input#new_city_"+id).val(city_name);
                jQuery("a#new_city_"+id).html('&#x2713;');
                jQuery("td#"+id+"-check > input").prop('checked', true);
                return false;
            }
        </script>
        <?php
        }

    }

    function klh_generate_job_listings($num) {
        global $wpdb;
        $querystr = "
            SELECT jobs.*
            FROM jobs
            WHERE imported=0
            ORDER BY jobs.date DESC
            LIMIT 0, ".$num."
        ";
        $pageposts = $wpdb->get_results($querystr, ARRAY_A);
        //echo "<pre>"; print_r($pageposts);  echo "</pre>";
        return $pageposts;
    }

    function klh_save_job_listings($feeds) {
        global $wpdb;
        $time = current_time('mysql');
        $cc = 0; $new_jobs = array();
        foreach ($feeds as $job_id => $job) {
            if($job['import']=='on') {
                //echo $job_id ." <pre>"; print_r($job); echo "</pre>";
                $new_job = array(
                    'post_title' => $job['title'],
                    'post_content' => $job['description'],
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_type' => 'job',
                    'comment_status' => 'closed',
                );
                $post_id = wp_insert_post($new_job);
                update_post_meta($post_id, 'jb_url', $job['link']);
                if($job['new_company']) {
                    $new_term = wp_insert_term( $job['new_company'], 'company');
                    $company = $new_term['term_id'];
                } else {
                    $company = (int)$job['company'];
                }
                if($job['new_city']) {
                    $new_term = wp_insert_term( $job['new_city'], 'city');
                    $city = $new_term['term_id'];
                } else {
                    $city = (int)$job['city'];
                }
                wp_set_post_terms( $post_id, $company, 'company');
                wp_set_post_terms( $post_id, $city, 'city');
                wp_set_post_terms( $post_id, (int)$job['job_type'], 'job_type');
                // Save this record to the jobs database as imported
                $wpdb->query("
                    UPDATE jobs
                    SET imported=1
                    WHERE id='".(int)$job_id."'"
                );
                $cc++;
                $new_jobs[] = $post_id;
            }
        }
        return $new_jobs;
    }

?>
