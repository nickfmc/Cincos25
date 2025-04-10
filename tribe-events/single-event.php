<?php
/**
 * Single Event Template
 */

if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

get_header();
?>

<div class="c-event-hero alignfull">
    <div class="o-wrapper">
        <div class="c-hero__content">
            <h1 class="c-hero__title mb-0">
                <?php the_title(); ?>
            </h1>
            <div class="c-hero__meta">
                <div class="c-hero__date">
                    <?php echo tribe_events_event_schedule_details(); ?>
                </div>  
            </div>
        </div>
    </div>
</div>

<section id="tribe-events-pg-template" class="tribe-events-pg-template">
    <main id="tribe-events-content" class="tribe-events-single o-wrapper">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="tribe-events-back">
                <a href="/events">
                    <?php printf( '&laquo; ' . esc_html_x( 'All %s', '%s Events plural label', 'the-events-calendar' ), tribe_get_event_label_plural() ); ?>
                </a>
            </div>

            <div class="tribe-events-content-wrapper">
                <!-- Left Column -->
                <div class="tribe-events-main-content">
                    <!-- Event featured image -->
                    <?php echo tribe_event_featured_image(); ?>

                    <!-- Event content -->
                    <div class="tribe-events-single-event-description">
                        <?php the_content(); ?>
                        <?php
    // Check if event is in fiesta-fundraiser category
    if (has_term('fiesta-fundraiser', 'tribe_events_cat')) : ?>
        <div class="fiesta-fundraiser-cta">
            <div class="cta-inner">
                <h3>Fiesta Fundraiser</h3>
                <p>Are you a Nonprofit primarily serving the local community or surrounding areas of Rochester, Dover, and Epping and want to partner to raise some money</p>
                <div class="cta-buttons">
                    <a href="/cincos-community-giving/" class="cta-button c-btn-yellow">Apply Today</a>
                  
                </div>
            </div>
        </div>
        <?php endif; ?>

                    </div>
                </div>

                <!-- Right Column -->
                <div class="tribe-events-sidebar">
                    <!-- Event meta -->
                    <?php do_action( 'tribe_events_single_event_before_the_meta' ); ?>
                    <?php tribe_get_template_part( 'modules/meta' ); ?>
                    <?php //do_action( 'tribe_events_single_event_after_the_meta' ); ?>
                </div>
            </div>

            <!-- Event navigation -->
            <?php 
            $events_label_plural = tribe_get_event_label_plural();
            $next_event_link = tribe_get_next_event_link( 'Next ' . $events_label_plural . ' &raquo;' );
            $prev_event_link = tribe_get_prev_event_link( '&laquo; Previous ' . $events_label_plural );
            ?>

        

        <?php endwhile; ?>
    </main>
</section>

<?php get_footer(); ?>
