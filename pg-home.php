<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>


<div class="c-home-hero">
  <div class="o-wrapper-wide">
    <div class="c-home-hero-content">
      <h1>Share a Taco,<br /> Share a Smile</h1>
      <p class="home-alert" role="heading">Open for lunch and dinner 7 days a week!</p>
      <!-- <button class="order-button" aria-haspopup="true" aria-expanded="false">Order Online</button> -->
      
      <button class="wmur-video-button" aria-haspopup="true" aria-expanded="false">
        As seen on WMUR
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <polygon points="5,3 19,12 5,21"></polygon>
        </svg>
      </button>
       
    </div>
  <div class="c-taco-swipe">
    <div class="c-taco-illustration"><img  src="<?php bloginfo( 'template_url' ) ?>/img/taco.png" alt="taco illustration" /></div>
    <div class="c-tacolove-illustration"><img  src="<?php bloginfo( 'template_url' ) ?>/img/taco_love.png" alt="tacolove text illustration" /></div>
    <div class="swiper">
          <div class="swiper-wrapper">
            <?php if( have_rows('taco_slides') ): ?>
             <?php while( have_rows('taco_slides') ): the_row(); ?>
           
             <div class="swiper-slide swiper-slide-5215">
             <?php
$image = get_sub_field('image');
$size = 'large';
if($image){
    echo wp_get_attachment_image(
        $image, 
        $size, 
        false, 
        array(
            'class' => 'swiper-slide-bg-image swiper-slide-bg-image-c61b swiper-gl-image'
        )
    );
}
?>
           </div>
            <?php endwhile; ?>
            <?php endif; ?>
          </div>
  

        </div>
  </div>
  </div>
</div>

<!-- WMUR Video Modal -->
<div class="wmur-video-modal" role="dialog" aria-hidden="true">
  <div class="modal-content">
    <button class="close-button" aria-label="Close modal">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="18" y1="6" x2="6" y2="18"></line>
        <line x1="6" y1="6" x2="18" y2="18"></line>
      </svg>
    </button>
    <div class="video-content">
      <h2>Cinco's Cantina on WMUR</h2>
      <div class="video-wrapper">
        <iframe 
          src="https://www.youtube.com/embed/U4LVT6C-D8M?si=GlHo3tgIyIpsyDJZ" 
          title="Cinco's Cantina on WMUR" 
          frameborder="0" 
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
          referrerpolicy="strict-origin-when-cross-origin" 
          allowfullscreen>
        </iframe>
      </div>
    </div>
  </div>
</div>

<div class="c-doordash">
  <div class="o-wrapper-wide">
    <div class="c-doordash-content">
      <h2 class="h5-style">Delivery With:</h2>
      <a href="https://order.online/online-ordering/business/-245866/"><img src="<?php bloginfo( 'template_url' ) ?>/img/doordash.svg" alt="Doordash logo" /></a>
    </div>
  </div>
</div>

<div class="o-layout-row">
  <main id="main-content" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="https://schema.org/WebPageElement">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <section class="editor-content  clearfix">
        <?php the_content(); ?>
      </section>
      <!-- /editor-content -->
    <?php endwhile; endif; // END main loop (if/while) ?>
  </main>
</div>
<!-- /layout-row-->

<?php // IF USING PARTS -> get_template_part( 'template-part/name-of-part' ); ?>

<?php get_footer(); ?>
