<?php
// Función para el shortcode que muestra un listado de posts
function custom_posts_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'ids' => '', // IDs de los posts separados por comas
        ),
        $atts,
        'custom_posts'
    );

    $ids = explode(',', $atts['ids']);
    $posts_query = new WP_Query(array(
        'post__in' => $ids,
        'orderby' => 'post__in',
        'posts_per_page' => -1, // Mostrar todos los posts especificados
    ));

    if ($posts_query->have_posts()) {
        $output = '<section class="list-group">';
        while ($posts_query->have_posts()) {
            $posts_query->the_post();
            $versionJs = get_field('version_js');
            $output .= '<article class="list-group__post">';
            $output .= '<h3 class="list-group__title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
            $output .= '<div class="list-group__excerpt">' . custom_excerpt(get_the_excerpt(), 100) . '</div>';
            $output .= '<a href="' . get_permalink() . '" class="list-group__read-more icon-arrow-right"></a>';
            $output .= '<span class="list-group__version">' . $versionJs . '</span>';
            $output .= '</article>';
        }
        $output .= '</section>';
        wp_reset_postdata(); // Restablecer datos de publicación
        return $output;
    } else {
        return '<p>No se encontraron publicaciones.</p>';
    }
}
add_shortcode('custom_posts', 'custom_posts_shortcode');

// Función para limitar el extracto a cierta cantidad de caracteres
function custom_excerpt($text, $limit) {
    if (strlen($text) > $limit) {
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' ')) . '...';
    }
    return $text;
}
