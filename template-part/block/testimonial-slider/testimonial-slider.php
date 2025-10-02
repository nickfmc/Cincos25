<?php
/**
 * Testimonial Slider Block Template (ACF)
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int $post_id The post ID this block is saved to.
 */

// Get ACF fields
$testimonials = get_field('testimonials');
$slider_settings = get_field('slider_settings');
$autoplay = $slider_settings['autoplay'] ?? true;
$autoplay_speed = ($slider_settings['autoplay_speed'] ?? 5) * 1000; // Convert to milliseconds

if (empty($testimonials)) {
    return;
}

$wrapper_attributes = get_block_wrapper_attributes([
    'class' => 'c-testimonial-slider'
]);

// Generate unique ID for this slider instance
$slider_id = 'testimonial-slider-' . uniqid();
?>

<div <?php echo $wrapper_attributes; ?> id="<?php echo esc_attr($slider_id); ?>">
    <div class="c-testimonial-slider__container">
        <div class="c-testimonial-slider__wrapper">
            <?php foreach ($testimonials as $index => $testimonial): ?>
                <div class="c-testimonial-slider__slide <?php echo $index === 0 ? 'active' : ''; ?>" <?php if (!empty($testimonial['customer_image'])): ?>style="background-image: url('<?php echo wp_get_attachment_image_url($testimonial['customer_image'], 'large'); ?>');"<?php endif; ?>>
                    <div class="c-testimonial__content" itemscope itemtype="https://schema.org/Review">
                        
                        <div class="c-testimonial__rating" itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating">
                            <meta itemprop="ratingValue" content="5">
                            <meta itemprop="bestRating" content="5">
                            <meta itemprop="worstRating" content="1">
                            <div class="c-testimonial__tacos">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <span class="c-testimonial__taco" aria-hidden="true">🌮</span>
                                <?php endfor; ?>
                            </div>
                            <span class="sr-only">5 out of 5 tacos</span>
                        </div>
                        
                        <?php if (!empty($testimonial['testimonial_quote'])): ?>
                            <div class="c-testimonial__quote" itemprop="reviewBody">
                                <p>"<?php echo esc_html($testimonial['testimonial_quote']); ?>"</p>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($testimonial['customer_name'])): ?>
                            <div class="c-testimonial__name" itemprop="author" itemscope itemtype="https://schema.org/Person">
                                <span itemprop="name"><?php echo esc_html($testimonial['customer_name']); ?></span>
                            </div>
                        <?php endif; ?>
                        
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <?php if (count($testimonials) > 1): ?>
            <div class="c-testimonial-slider__navigation">
                <button class="c-testimonial-slider__prev" aria-label="Previous testimonial">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                    </svg>
                </button>
                <div class="c-testimonial-slider__dots">
                    <?php foreach ($testimonials as $index => $testimonial): ?>
                        <button class="c-testimonial-slider__dot <?php echo $index === 0 ? 'active' : ''; ?>" 
                                data-slide="<?php echo $index; ?>" 
                                aria-label="Go to testimonial <?php echo $index + 1; ?>">
                        </button>
                    <?php endforeach; ?>
                </div>
                <button class="c-testimonial-slider__next" aria-label="Next testimonial">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php if (count($testimonials) > 1): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('<?php echo esc_js($slider_id); ?>');
    if (!slider) return;
    
    const slides = slider.querySelectorAll('.c-testimonial-slider__slide');
    const dots = slider.querySelectorAll('.c-testimonial-slider__dot');
    const prevBtn = slider.querySelector('.c-testimonial-slider__prev');
    const nextBtn = slider.querySelector('.c-testimonial-slider__next');
    
    let currentSlide = 0;
    let autoplayInterval;
    
    function showSlide(index) {
        // Hide all slides
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        // Show current slide
        if (slides[index]) {
            slides[index].classList.add('active');
        }
        if (dots[index]) {
            dots[index].classList.add('active');
        }
        
        currentSlide = index;
    }
    
    function nextSlide() {
        const next = (currentSlide + 1) % slides.length;
        showSlide(next);
    }
    
    function prevSlide() {
        const prev = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(prev);
    }
    
    function startAutoplay() {
        <?php if ($autoplay): ?>
        autoplayInterval = setInterval(nextSlide, <?php echo intval($autoplay_speed); ?>);
        <?php endif; ?>
    }
    
    function stopAutoplay() {
        if (autoplayInterval) {
            clearInterval(autoplayInterval);
        }
    }
    
    // Event listeners
    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            stopAutoplay();
            prevSlide();
            startAutoplay();
        });
    }
    
    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            stopAutoplay();
            nextSlide();
            startAutoplay();
        });
    }
    
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            stopAutoplay();
            showSlide(index);
            startAutoplay();
        });
    });
    
    // Pause on hover
    slider.addEventListener('mouseenter', stopAutoplay);
    slider.addEventListener('mouseleave', startAutoplay);
    
    // Start autoplay
    startAutoplay();
});
</script>
<?php endif; ?>