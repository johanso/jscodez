<div id="sidebar-float" class="sidebar__float">
  <div class="sidebar__float-inner">
    <i class="icon-filter-left"></i>
    <?php if (has_category('js-dom')): ?>
      <span>Tutoriales DOM</span>
    <?php else: ?>
      <span>tutoriales JavaScript</span>
    <?php endif; ?>
  </div>
</div>

<?php 
if (has_category('js-dom')) {
  dynamic_sidebar('sidebar-js-dom'); // Este será tu nuevo sidebar para js-dom
} else {
  dynamic_sidebar('sidebar-post'); // Este es tu sidebar actual
}
?>