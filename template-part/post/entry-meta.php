<div class="c-author-card">
    <div class="c-author-card__header">
        <?php echo get_avatar(get_the_author_meta('user_email'), 80); ?>
        <div class="c-author-card__meta">
        <h3 class="c-author-card__name" itemprop="author" itemscope itemtype="https://schema.org/Person">
            <?php 
            $first_name = get_the_author_meta('first_name');
            $last_name = get_the_author_meta('last_name');
            
            if (!empty($first_name) && !empty($last_name)) {
                echo esc_html($first_name . ' ' . $last_name);
            } else {
                echo get_the_author();
            }
            ?>
        </h3>
        
            <?php 
            $author_position = get_the_author_meta('position'); // Custom meta field
            if ($author_position) : ?>
                <span class="c-author-card__position"><?php echo esc_html($author_position); ?></span>
            <?php endif; ?>
        </div>
    </div>

    <div class="c-author-card__bio">
        <?php 
        $author_bio = get_the_author_meta('description');
        if ($author_bio) : ?>
            <p><?php echo wp_kses_post($author_bio); ?></p>
        <?php endif; ?>
    </div>

    <div class="c-author-card__footer">
        <div class="c-author-card__stats">
            <!-- <span class="c-author-card__posts">
                <?php printf(
                    _n('%s Article', '%s Articles', get_the_author_posts(), 'your-theme'),
                    number_format_i18n(get_the_author_posts())
                ); ?>
            </span> -->
            <span class="c-author-card__date">
                <time datetime="<?php the_time('Y-m-d'); ?>" itemprop="datePublished">
                    <?php the_time('F j, Y'); ?>
                </time>
            </span>
        </div>

        <?php 
        // Social Media Links
        $social_links = array(
            'linkedin' => get_the_author_meta('linkedin'),
        );
        
        if (array_filter($social_links)) : ?>
            <div class="c-author-card__social">
                <?php foreach ($social_links as $platform => $link) :
                    if ($link) : ?>
                       <a href="<?php echo esc_url($link); ?>" 
                          class="c-author-card__social-link <?php echo esc_attr($platform); ?>"
                          target="_blank"
                          rel="noopener">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                               <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                           </svg>
                           <span class="screen-reader-text"><?php echo esc_html(ucfirst($platform)); ?></span>
                       </a>
                       
                    <?php endif;
                endforeach; ?>
            </div>
        <?php endif; ?>


    </div>
</div>