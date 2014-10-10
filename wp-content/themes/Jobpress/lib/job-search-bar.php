<?php
function jb_show_top_search_bar() { 
    // get the job type terms
    $types = get_terms('job_type');
    // get the cities
    $cities = get_terms('city');
    ?>
    <header class="jumbotron subhead" id="overview">
      <div id="job-search">
          <div class="row">
            <div class="span5">
              <h1>Job<span class="back-word">Brander</span></h1>
              <p><?php bloginfo('description'); ?></p>
              <div style="margin: 30px 20px 0 20px;">
                  <ul class="nav nav-pills">
                    <li style="width:30%;"><i class="icon-map-marker"></i>
                      <a href="<?php echo get_permalink( get_page_by_path( 'city' ) ); ?>">Browse Cities</a>
                    </li>
                    <li style="width:40%;"><i class="icon-briefcase"></i>
                      <a href="<?php echo get_permalink( get_page_by_path( 'company' ) ); ?>">Browse Companies</a>
                    </li>
                    <li style="width:30%;"><i class="icon-book"></i>
                      <a href="<?php echo get_category_link(get_cat_ID( 'Blog' )); ?>">Career Advice</a>
                    </li>
                  </ul>
              </div>
            </div>
            <form action="<?php echo home_url(); ?>" method="GET">
                <fieldset>
                <div class="row">
                <div class="span3">
                  <select name="job_type" style="width: 90%;">
                    <option value="">Any Job</option>
                    <?php foreach($types as $type) { ?>
                    <option value="<?php echo $type->slug; ?>"><?php echo $type->name; ?></option>
                    <?php } ?>
                    <input type="hidden" name="post_type" value="job" />
                  </select>
                  <label>Job Type</label>
                </div>
                </div>    
                
                <div class="row">
                <div class="span3">
                  <select name="city" style="width: 90%;">
                    <option value="">Any City</option>
                    <?php foreach($cities as $city) { ?>
                    <option value="<?php echo $city->slug; ?>"><?php echo $city->name; ?></option>
                    <?php } ?>
                  </select>
                  <label>City</label>
                </div>
                </div>
                    
                <div class="row">
                <div class="span3">
                  <button type="submit" class="btn btn-primary btn-large">Get Hired!</button>
                </div>
                </fieldset>
            </form>
          </div>
      </div>
    <div class="clearfix"></div>
    </header><?php
}

function jb_show_companies_slider() {
    // Set the arguments to get the companies
    $args = array(
        'orderby'       => 'count', 
        'order'         => 'DESC',
        'hide_empty'    => true, 
        'exclude'       => array(), 
        'include'       => array(),
        'number'        => '12', 
        'fields'        => 'all'
    ); 
    $companies = get_terms( 'company', $args );
    // Loop through and get necessary metadata
    foreach($companies as $company) {
        $image = get_term_meta($company->term_id, 'jb_image', TRUE);
        if(!$image) { $image = "http://wiki.urbandead.com/images/1/1c/Square.gif"; }
    ?><a href="" title="<?php echo $company->name; ?>">
        <img src="<?php echo $image; ?>" alt="" style="width:16.66%; height: auto; float:left;" />
        </a><?php
    }
    //print_r($companies);
}
?>