<?php
/**
 * blockname Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'c-news-query-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'c-news-query';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}

// Query news posts
$args = array(
    'post_type' => 'news_type',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC'
);

$news_query = new WP_Query($args);
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if ($news_query->have_posts()) : ?>
        <div class="c-news-grid">
            <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                <article class="c-news-card">
                    
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="c-news-image-wrapper">
                                <?php echo get_the_post_thumbnail(get_the_ID(), 'large', array('class' => 'c-news-image')); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="c-news-content">
                            <?php 
                            // Get post categories if any
                            $categories = get_the_terms(get_the_ID(), 'category');
                            if ($categories && !is_wp_error($categories)) : ?>
                                <span class="c-news-category">
                                    <?php echo esc_html($categories[0]->name); ?>
                                </span>
                            <?php endif; ?>
                
                            <h2 class="c-news-title">
                                <?php echo esc_html(get_the_title()); ?>
                            </h2>
                
                            <time class="c-news-date">
                                <?php echo get_the_date('F j, Y'); ?>
                            </time>
                
                            <div class="c-news-excerpt">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </div>
                            <a href="<?php echo esc_url(get_permalink()); ?>" class="c-news-link">
                            <span class="c-news-read-more">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </span>
                        </div>
                    </a>
                </article>
                
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p class="c-news-no-posts">No news articles found.</p>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
</div>

