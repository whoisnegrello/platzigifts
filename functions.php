<?php 

function init_template(){
    add_theme_support( 'post-thumbnails');
    add_theme_support( 'title-tag' );

    register_nav_menus(
        array(
          'top_menu' => 'Principal'
        )
    );
}


add_action('after_setup_theme','init_template');

function template_styles(){
    wp_register_style('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css',false,'4.4.1','all');
    wp_register_style('montserrat','https://fonts.googleapis.com/css?family=Montserrat&display=swap',false,'','all');
    wp_enqueue_style('main-style', get_stylesheet_uri(), array('bootstrap','montserrat'),'1.0','all');

    wp_register_script( 'popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', false, true );
    wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery','popper'), true);

    wp_enqueue_script( 'custom', get_template_directory_uri()."/assets/js/custom.js", false,"1.1", true );

    wp_localize_script(
        'custom',
        'pg',
        array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'apiurl' => home_url('/wp-json/pg/v1/')
        )
    );
}

add_action('wp_enqueue_scripts','template_styles');


function registrar_sidebar(){
    register_sidebar( array(
        'name' => 'Pie de página',
        'id'  => 'footer',
        'description' => 'Zona de Widgets para pie de página', 
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<p>',
		'after_title'   => '</p>',
    ));
}

add_action('widgets_init','registrar_sidebar');



function productos_type() {

	$labels = array(
		'name'                  => 'Productos',
		'singular_name'         => 'Producto',
        'menu_name'             => 'Producto', 
	);

	$args = array(
		'label'                 => 'Productos',
		'description'           => __( 'Facturas emitidas por suscripción', 'lst' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions'),
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-cart',
        'show_in_nav_menus'     => false,
        'show_in_rest'          => true,
		'can_export'            => true,
		'publicly_queryable'    => true,
		'rewrite'               => true,
    );
    
	register_post_type( 'producto', $args );

}
add_action( 'init', 'productos_type');

add_action('init', 'lstCreateCustomTaxonomies');
function lstCreateCustomTaxonomies(){

    $taxonomy = array(
        'labels' => array(
            'name'          => _x('Categorías de Productos', 'taxonomy general name', 'ls19'),
            'singular_name' => _x('Categoría de Productos', 'taxonomy singular name', 'ls19'),
            'search_items'  => __('Buscar categoría'),
            'all_items'     => __('Todas las categorías'),
            'edit_item'     => __('Editar categoría'),
            'update_item'   => __('Actualizar categoría'),
            'add_new_item'  => __('Agregar categoría'),
            'menu_name'     => __('Categorías de Productos')
        ),
        'slug' => 'categorias-productos',
        'post_types' => array('producto')
    );

    $args = array(
        'hierarchical'      => true,
        'public'            => true,
        'labels'            => $taxonomy['labels'],
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => $taxonomy['slug'])
    );
    register_taxonomy($taxonomy['slug'], $taxonomy['post_types'], $args);
}

add_action('wp_ajax_nopriv_filtroProductos','filtroProductos');
add_action('wp_ajax_filtroProductos','filtroProductos');
function filtroProductos(){

    $args = array(
        'post_type' => 'producto',
        'posts_per_page' => -1,
        'order'     => 'ASC',
        'orderby' => 'title',
        'tax_query' => array(
            array(
                'taxonomy' => 'categorias-productos',
                'field' => 'slug',
                'terms' => $_POST['categoria']
            )
        )
    );
    $productos = new WP_Query($args);

    $return = array();
    if ($productos->have_posts()) {
        while($productos->have_posts()){
            $productos->the_post();
            $return[] = array(
                'imagen' => get_the_post_thumbnail(get_the_ID(), 'large'),
                'link' => get_permalink(),
                'titulo' => get_the_title()
            );
        }
    }

    wp_send_json($return);
}

add_action('rest_api_init', function (){
    register_rest_route(
        'pg/v1', '/novedades/(?P<cantidad>\d+)', array(
            'methods' => 'GET',
            'callback' => 'novedadesAPI'
        )
    );
});
function novedadesAPI($data)
{
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $data['cantidad'],
        'order'     => 'ASC',
        'orderby' => 'title'
    );
    $novedades = new WP_Query($args);
   
    if ($novedades->have_posts()) {
        while($novedades->have_posts()){
            $novedades->the_post();
            $return[] = array(
                'imagen' => get_the_post_thumbnail(get_the_ID(), 'large'),
                'link' => get_permalink(),
                'titulo' => get_the_title()
            );
        }
    } else {
        return null;
    }
   
    return $return;
}

add_action('init', 'pgRegisterBlock');
function pgRegisterBlock()
{
    // Requiere los parámetros generados automaticamente por WP Scripts
    $asset_file = include_once get_template_directory().'/blocks/build/index.asset.php';
    //Registra el script
    wp_register_script(
        'pgb-js',
        get_template_directory_uri().'/blocks/build/index.js',
        $asset_file['dependencies'],
        $asset_file['version']
    );

    register_block_type(
        'pgb/basic-block',
        array(
            'editor_script' => 'pgb-js',
            'render_callback' => 'pgRenderDynamicBlock'
        )
    );
}

function pgRenderDynamicBlock($attributes, $content)
{
    return '<h2>'.$attributes['content'].'</h2>';
}

add_action('acf/init', 'pgAcfRegisterBlocks');
function pgAcfRegisterBlocks()
{

    if (function_exists('acf_register_block')) {
        $block = array(
            'name'            => 'pg-slider',
            'title'           => __('PG Institucional', 'lst'),
            'description'     => __('Bloque para generar la página institucional de Platzi Gifts.', 'lst'),
            'render_template' => get_template_directory().'/template-parts/block-institucional.php',
            'category'        => 'layout',
            'icon'            => 'format-gallery',
            'mode'            => 'edit',
            'keywords'        => array(
                'platzi',
                'wordpress'
            )
        );

        acf_register_block($block);
    }
}