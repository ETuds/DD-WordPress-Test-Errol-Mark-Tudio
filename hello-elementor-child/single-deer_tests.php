<?php
/**
 * Template Name: Deer Tests Single Post Template
 * Template Post Type: deer_tests
 * Description: Deer Tests Single Post Template
 */

 get_header();

 if ( have_posts() ) :
     while ( have_posts() ) : the_post();
        $start_date = get_field('start_date');
        $end_date = get_field('end_date');
        $description = get_field('description');
        $cover_image = get_field('cover_image');
        $application_link = get_field('application_link');

        // dbug($cover_image);

        /**Check if Cover image return values and assign correctly */
        $cover_image_url = '';
        $cover_image_alt = '';
        if(is_array($cover_image)){
            $cover_image_url = esc_url($cover_image['url']);
            $cover_image_alt = esc_attr($cover_image['alt']);
        }
        elseif(is_numeric($cover_image)){
            $cover_image_url = esc_url(wp_get_attachment_url($cover_image));
            $cover_image_alt = esc_attr(get_post_meta($cover_image, '_wp_attachment_image_alt', true));
        }
        else{
            $cover_image_url = esc_url($cover_image);
            $cover_image_alt = '';
        }

        $application_link_url = '';
        $application_link_title = '';
        /**Check if Application Link return values and assign correctly */
        if(is_array($application_link)){
            $application_link_url = esc_url($application_link['url']);
            $application_link_title = esc_attr($application_link['title']);
        }
        else{
            $application_link_url = esc_url($application_link);
            $application_link_title = '';
        }

        //Display the contents and custom fields
        ?>
        <div class="deer-test-container">
            <h1 class="title"><?php the_title(); ?></h1>
            <?php if(!empty($cover_image_url)): ?>
                <div class="cover-image-container">
                    <img src="<?php echo $cover_image_url; ?>" alt="<?php echo $cover_image_alt; ?>">
                </div>
            <?php endif; ?>
            <div class="dates-container">
                <p class="start-date">Start Date: <?php echo !empty($start_date) ? $start_date :'';?></p>
                <p class="end-date">End Date: <?php echo !empty($end_date) ? $end_date :'';?></p>
            </div>
            <div class="description-container">
                <p class="description"><?php echo !empty($description) ? $description :'';?></p>
            </div>
            <?php if(!empty($application_link_url)): ?>
                <div class="application-link-container">
                    <a href="<?php echo $application_link_url; ?>"><?php echo $application_link_title; ?></a>
                </div>
            <?php endif; ?>
        </div>
        <?php
     endwhile;
    else:
        echo '<p>No Deer Test found!</p>';
 endif;

 get_footer();