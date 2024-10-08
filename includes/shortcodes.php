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

    // Verificar si se pasaron los IDs
    if (empty($atts['ids'])) {
        return '<p>No se especificaron IDs de publicaciones.</p>';
    }

    // Limpiar espacios y convertir a array
    $ids = array_map('intval', array_filter(array_map('trim', explode(',', $atts['ids']))));

    // Si no hay IDs válidos después de la conversión, retornamos un mensaje
    if (empty($ids)) {
        return '<p>No se encontraron IDs válidos.</p>';
    }

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
            $output .= '<h3 class="list-group__title"><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></h3>';
            $output .= '<div class="list-group__excerpt">' . esc_html(custom_excerpt(get_the_excerpt(), 100)) . '</div>';

            // Obtener y mostrar las etiquetas sin enlaces
            $tags = get_the_tags();
            if ($tags) {
                $output .= '<ul class="list-group__tags">';
                foreach ($tags as $tag) {
                    $output .= '<li class="list-group__tag">' . esc_html($tag->name) . '</li>';
                }
                $output .= '</ul>';
            }

            $output .= '<a href="' . esc_url(get_permalink()) . '" class="list-group__read-more icon-arrow-right"></a>';
            if ($versionJs) {
                $output .= '<span class="list-group__version">' . esc_html($versionJs) . '</span>';
            }
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

function mi_shortcode_custom($atts, $content = null) {

    $atts = shortcode_atts(
      array(
        'clase' => 'clase-custom',
        'titulo' => '',
      ),
      $atts,
      'custom-info'
    );

    $output = '<div class="custom-info ' . esc_attr($atts['clase']) . '">';
    if(empty($atts['titulo'])) {
        $output .= "";
    } else {
        $output .= '<h2 class="custom-info__title">' . esc_html($atts['titulo']) . '</h2>';
    }
    $output .= '<p class="custom-info__description">' . wp_kses_post($content) . '</p>';
    $output .= '<p class="custom-info__icon"><svg xmlns="http://www.w3.org/2000/svg" width="180" height="180" fill="var(--white)" class="bi bi-quote" viewBox="0 0 16 16"><path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388q0-.527.062-1.054.093-.558.31-.992t.559-.683q.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 9 7.558V11a1 1 0 0 0 1 1zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612q0-.527.062-1.054.094-.558.31-.992.217-.434.559-.683.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 3 7.558V11a1 1 0 0 0 1 1z"></path></svg></p>';
    $output .= '</div>';

    return $output;
}
add_shortcode('custom-info', 'mi_shortcode_custom');