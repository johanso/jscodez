<?php get_header(); ?>

  <div class="post__content">
    <?php get_template_part('template-parts/post'); ?>

    <aside class="sidebar">
      <?php get_sidebar(); ?>
    </aside>

    <section class="custom-reaction">
      <?php do_action('wpra_lite_custom_display'); ?>
    </section>

    <?php
      $previous_post = get_previous_post();
      $next_post = get_next_post();
    ?>

    <?php if ($previous_post || $next_post) : ?>   
      <section class="post__navigation list-group">
        <?php if ($previous_post) : ?>
          <article class="post__navigation--prev list-group__post">
            <h3 class="list-group__title"><?php previous_post_link('%link', '<i class="icon-arrow-left"></i> %title'); ?></h3>
          </article>
        <?php endif; ?>
        <?php if ($next_post) : ?>
          <article class="post__navigation--next list-group__post">
            <h3 class="list-group__title"><?php next_post_link('%link', '%title <i class="icon-arrow-right"></i>'); ?></h3>
          </article>
        <?php endif; ?>
      </section>
    <?php endif; ?>

  </div>

<?php get_footer(); ?>