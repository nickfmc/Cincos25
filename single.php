<?php get_header(); ?>
<div class="o-layout-row">
  <div class="c-hero">
    <div class="o-wrapper">
      <div class="c-hero__content">
        <h1 class="c-hero__title">News & Press</h1>
      </div>
    </div>
  </div>

  <main id="main-content" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="https://schema.org/WebPageElement">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
     
      <!-- /article-header -->

     <section class="editor-content clearfix">
         <div class="c-single-layout">
             <div class="c-single-content">
              <h1 class="h3-style"><?php the_title(); ?></h1>
                 <?php if (has_post_thumbnail()) : ?>
                     <div class="c-featured-image">
                         <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
                     </div>
                 <?php endif; ?>
                 <article <?php post_class(); ?> role="article">
                     <?php the_content(); ?>
                 </article>
                 <footer class="c-article-footer">
                  <a href="/news"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="m2.87 7.75l1.97 1.97a.75.75 0 1 1-1.06 1.06L.53 7.53L0 7l.53-.53l3.25-3.25a.75.75 0 0 1 1.06 1.06L2.87 6.25h9.88a3.25 3.25 0 0 1 0 6.5h-2a.75.75 0 0 1 0-1.5h2a1.75 1.75 0 1 0 0-3.5z" clip-rule="evenodd"/></svg> Back to News</a>
                     <?php //get_template_part('template-part/post/entry-meta'); ?>
                 </footer>
             </div>
             
             <div class="c-single-sidebar">
                 <?php get_sidebar(); ?>
             </div>
         </div>
     </section>
     
     <?php endwhile; endif; ?>
  </main>
</div>
<!-- /layout-row-->

<?php get_footer(); ?>