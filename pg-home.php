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
      <button class="order-button" aria-haspopup="true" aria-expanded="false">Order Online</button>
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
  
          <!-- <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div> -->
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
