<?php get_header(); ?>

  <section class="home__main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php the_title('<h1 class="page__title">', '</h1>') ?>
      <?php the_content() ?>
    <?php endwhile; endif; ?>
  </section>

  <aside class="home__aside">
    <?php the_field("headings"); ?>
  </aside>

<?php get_footer(); ?>
