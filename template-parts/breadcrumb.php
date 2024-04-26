<div class="breadcrumbs">
  <a href="<?php echo esc_url(home_url('/')); ?>">Inicio</a>
 <?php if (is_single()) : ?>
    <?php # $categories = get_the_category();
      # if ($categories) :
      #  $category = $categories[0]; ?>
        <!-- <span><i class="icon-arrow-right-short"></i></span> <a href="<?php # echo esc_url(get_category_link($category->term_id)); ?>"><?php echo esc_html($category->name); ?></a> -->
      <?# php endif; ?>
        <span><i class="icon-arrow-right-short"></i></span> <?php the_title(); ?>
  <?php endif; ?>
</div>