<?php get_header(); ?>

<div class="o-layout-row">
  <div class="c-hero">
    <div class="o-wrapper">
      <div class="c-hero__content">
        <h1 class="c-hero__title"><?php the_title(); ?></h1>
      </div>
    </div>
  </div>
  <main id="main-content" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="https://schema.org/WebPageElement">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <section class="editor-content  clearfix">
        <?php the_content(); ?>
      </section> 
      <!-- /editor-content -->
    <?php endwhile; endif; // END main loop (if/while) ?>
  </main>
  <!-- /container -->
</div>
<!-- /layout-row-->

<?php // IF USING PARTS -> get_template_part( 'template-part/name-of-part' ); ?>

<?php get_footer(); ?>
