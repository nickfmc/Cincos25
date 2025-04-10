<?php
/**
 * Custom functions for this project? If yes, drop them here!
 */

  // If using acf icon picker - https://github.com/houke/acf-icon-picker -  modify the path to the icons directory
//   add_filter( 'acf_icon_path_suffix', 'acf_icon_path_suffix' );

//   function acf_icon_path_suffix( $path_suffix ) {
//       return 'img/icons/';
//   }


function add_sponsor_label_script() {
    if ( tribe_is_event() ) {
        ?>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const websiteLabel = document.querySelector('.tribe-events-event-url-label');
            if (websiteLabel) {
                websiteLabel.textContent = 'Sponsor:';
            }
        });
        </script>
        <?php
    }


}

add_action( 'wp_footer', 'add_sponsor_label_script' );




/**
 * Remove clickable links from venue names in Tribe Events
 */


// Add this to your theme's functions.php file
add_filter('tribe_get_venue_link', 'remove_venue_link', 100);
add_filter('tribe_events_get_venue_link', 'remove_venue_link', 100);

function remove_venue_link($link) {
    // Get the venue ID
    $venue_id = tribe_get_venue_id();
    
    // If we have a venue ID, get the raw venue name
    if ($venue_id) {
        // Get the raw venue name from post title
        $venue_name = get_the_title($venue_id);
        return $venue_name;
    }
    
    // If no venue ID, strip all HTML tags and return plain text
    return strip_tags($link);
}

add_filter('tribe_get_venue', 'strip_venue_html', 100);

function strip_venue_html($venue) {
    return strip_tags($venue);
}


// If needed, also add this to ensure the structured data doesn't include venue links
add_filter('tribe_json_ld_event_data', 'remove_venue_structured_data', 100, 2);
function remove_venue_structured_data($data, $event) {
    if (isset($data['location']['url'])) {
        unset($data['location']['url']);
    }
    return $data;
}

  
//used for Stackable blocks support - match to wrapper width 
global $content_width;
$content_width = 1180;




function next_tribe_event_shortcode() {
    if (!class_exists('Tribe__Events__Main')) {
        return 'The Events Calendar plugin is required.';
    }

    $events = tribe_get_events([
        'posts_per_page' => 1,
        'start_date' => 'now',
        'orderby' => 'date',
        'order' => 'ASC'
    ]);

    if (empty($events)) {
        return '<div class="next-event-card next-event-card--empty">
                    <p>No upcoming events.</p>
                    <p class="subtitle">Check back soon!</p>
                </div>';
    }

    $event = $events[0];
    $event_id = $event->ID;
    $title = get_the_title($event_id);
    
    // Get date components separately
    $month = tribe_get_start_date($event_id, false, 'M');
    $day = tribe_get_start_date($event_id, false, 'j');
    $start_time = tribe_get_start_date($event_id, false, 'g:i A');
    $venue = tribe_get_venue($event_id);
    $event_link = get_permalink($event_id);

    $output = '<div class="next-event-card">
                    <div class="date-flag">
                        <span class="month">' . esc_html($month) . '</span>
                        <span class="day">' . esc_html($day) . '</span>
                    </div>
                    <div class="event-content">
                        <h3 class="next-event-card__title">' . esc_html($title) . '</h3>
                        <div class="next-event-card__details">';
    
    $output .= '<div class="next-event-card__time">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    ' . esc_html($start_time) . '
                </div>';
    
    if ($venue) {
        $output .= '<div class="next-event-card__venue">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        ' . esc_html($venue) . '
                    </div>';
    }

    $output .= '</div>
                <a href="' . esc_url($event_link) . '" class="event-link">View Event Details</a>
                </div>
            </div>';

    return $output;
}
add_shortcode('next_event', 'next_tribe_event_shortcode');





// ****************** Grab custom data and input into Generate Block headline field ************

                  // function custom_field_gb_query() {
                  //   // Start output buffering
                  //   ob_start();
                  //     //  shortcode content
                      

                  //   $output = ob_get_clean();

                  //   // Return the content as a string
                  //   return $output;
                  // }
                  // add_shortcode('custom_field_gb_query', 'custom_field_gb_query');



                  // add_filter( 'render_block_generateblocks/headline', function( $block_content, $block ) {
                  //   if ( 
                  //     !is_admin() && 
                  //     ! empty( $block['attrs']['className'] ) && 
                  //     strpos( $block['attrs']['className'], 'is-field-name' ) !== false 
                  //   ) {
                  //     $post_id = get_the_ID();
                  //     $block_content = do_shortcode('[custom_field_gb_query]');		
                  //   }

                  //   return $block_content;
                  // }, 10, 2 );

// ****************** Grab custom data and input into Generate Block headline field ************

?>
