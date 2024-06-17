<?php

class Project_Model_Package{

    private $post_type_name;
    private $post_type_singular;
    private $post_type_plural;
    private $template_parser;
    private $menu_icon;

    function __construct( $template_parser )
    {
        $this->template_parser = $template_parser;
        $this->post_type_name = 'ss-package';
        $this->post_type_singular = __('Paquete', 'ss-translate');
        $this->post_type_plural = __('Paquetes', 'ss-translate');
        $this->request_type_taxonomy = 'artCategory';
        $this->request_type_taxonomy_singular = __('Categoria','ss-translate');
        $this->request_type_taxonomy_plural = __('Categorias','ss-translate');
        $this->request_type_taxonomy2 = 'artType';
        $this->request_type_taxonomy_singular2 = __('Tipo','ss-translate');
        $this->request_type_taxonomy_plural2 = __('Tipos','ss-translate');
        $this->menu_icon = 'dashicons-airplane';

        add_action( 'init', array( $this, 'create_post_type' ) );
        add_action( 'init', array( $this, 'create_taxonomies' ) );
        add_action( 'cmb2_admin_init', array( $this, 'add_meta_boxes' ) );

        add_action( 'wp_enqueue_scripts', array( $this, 'load_frontend_scripts' )  );
        add_action( 'wp_enqueue_scripts', array( $this, 'load_frontend_styles' )  );

        add_action( 'admin_print_styles-post.php', array( $this, 'load_admin_styles' ), 1000 );
        add_action( 'admin_print_styles-post-new.php', array( $this, 'load_admin_styles' ), 1000 );

        add_action( 'admin_print_scripts-post.php', array( $this, 'load_admin_scripts' ), 1000 );
        add_action( 'admin_print_scripts-post-new.php', array( $this, 'load_admin_scripts' ), 1000 );
    }

    function create_post_type(){

        $labels = array(
            'name' => sprintf( _x( '%s', 'post type general name', 'ss-translate' ), $this->post_type_plural ),
            'singular_name' => sprintf( _x( '%s', 'post type singular name', 'ss-translate' ), $this->post_type_singular ),
            'add_new' => _x( 'Agregar Nueva', $this->post_type_singular, '' ),
            'add_new_item' => sprintf( __( 'Nueva %s', 'ss-translate' ), $this->post_type_singular ),
            'edit_item' => sprintf( __( 'Editar %s', 'ss-translate' ), $this->post_type_singular ),
            'new_item' => sprintf( __( 'Agregar %s', 'ss-translate' ), $this->post_type_singular ),
            'all_items' => sprintf( __( '%s', 'ss-translate' ), $this->post_type_plural ),
            'view_item' => sprintf( __( 'Ver %s', 'ss-translate' ), $this->post_type_singular ),
            'search_items' => sprintf( __( 'Buscar', 'ss-translate' ), $this->post_type_plural ),
            'not_found' => sprintf( __( 'No %s Encontrados', 'ss-translate' ), $this->post_type_plural ),
            'not_found_in_trash' => sprintf( __( 'No %s Encontrados en la Papelera', 'ss-translate' ), $this->post_type_plural ),
            'parent_item_colon' => '',
            'menu_name' => $this->post_type_plural,
        );

        $args = array(
            'labels' => $labels,
            'description'         => __( 'Articulos', 'ss-translate'),
            'supports'            => array( 'title','thumbnail', 'excerpt', 'editor' ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 4,
            'menu_icon'           =>  $this->menu_icon,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
        );

        register_post_type( $this->post_type_name, $args );
    }

    function types_taxonomy(){

        // Add new taxonomy, make it hierarchical (like categories)
        $labels = array(
            'name'              => $this->request_type_taxonomy_singular,
            'singular_name'     => $this->request_type_taxonomy_singular,
            'search_items'      => sprintf( __( 'Buscar %s', 'ss-translate' ), $this->request_type_taxonomy_plural ),
            'all_items'         => sprintf( __( 'Todos los %s', 'ss-translate' ), $this->request_type_taxonomy_plural ),
            'parent_item'       => __( 'Parent Genre', 'textdomain' ),
            'parent_item_colon' => __( 'Parent Genre:', 'textdomain' ),
            'edit_item'         => sprintf( __( 'Editar %s', 'ss-translate' ), $this->request_type_taxonomy_singular ),
            'update_item'       => sprintf( __( 'Actualizar %s', 'ss-translate' ), $this->request_type_taxonomy_singular ),
            'add_new_item'      => sprintf( __( '' ) ),
            'new_item_name'     => sprintf( __( 'Nuevo %s', 'ss-translate' ), $this->request_type_taxonomy_singular ),
            'menu_name'         => $this->request_type_taxonomy_plural,
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => true,
            'query_var'         => true,
            'rewrite'       => array(
                'slug' => $this->request_type_taxonomy_singular
            ),
            'hierarchical'  => true
            // 'rewrite'           => array( 'slug' => $this->request_type_taxonomy_singular ),
        );

        //register_taxonomy( $this->request_type_taxonomy, array( $this->post_type_name ), $args );

        register_taxonomy( $this->request_type_taxonomy, array( $this->post_type_name ), $args);
    }

    function types_taxonomy2(){

        // Add new taxonomy, make it hierarchical (like categories)
        $labels = array(
            'name'              => $this->request_type_taxonomy_singular2,
            'singular_name'     => $this->request_type_taxonomy_singular2,
            'search_items'      => sprintf( __( 'Buscar %s', 'ss-translate' ), $this->request_type_taxonomy_plural2 ),
            'all_items'         => sprintf( __( 'Todos los %s', 'ss-translate' ), $this->request_type_taxonomy_plural2 ),
            'parent_item'       => __( 'Parent Genre', 'textdomain' ),
            'parent_item_colon' => __( 'Parent Genre:', 'textdomain' ),
            'edit_item'         => sprintf( __( 'Editar %s', 'ss-translate' ), $this->request_type_taxonomy_singular2 ),
            'update_item'       => sprintf( __( 'Actualizar %s', 'ss-translate' ), $this->request_type_taxonomy_singular2 ),
            'add_new_item'      => sprintf( __( '' )),
            'new_item_name'     => sprintf( __( 'Nuevo %s', 'ss-translate' ), $this->request_type_taxonomy_singular2 ),
            
            'menu_name'         => $this->request_type_taxonomy_plural2,
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => true,
            'query_var'         => true,
            'rewrite'       => array(
                'slug' => $this->request_type_taxonomy_singular2
            ),
            'hierarchical'  => true
            // 'rewrite'           => array( 'slug' => $this->request_type_taxonomy_singular ),
        );

        //register_taxonomy( $this->request_type_taxonomy, array( $this->post_type_name ), $args );

        register_taxonomy( $this->request_type_taxonomy2, array( $this->post_type_name ), $args);
    }

    function create_taxonomies(){
        //$this->types_taxonomy();
        //$this->types_taxonomy2();
    }

    function metabox_general(){
        $prefix = 'package_';

        $cmb = new_cmb2_box( array(
            'id'           => $prefix . 'general',
            'title'        => __( 'Información extra', 'ss-translate' ),
            'object_types' => array( $this->post_type_name, ), // Post type
            'context'      => 'normal',
            'priority'     => 'high',
            'show_names'   => true, // Show field names on the left
        ) );


        $cmb->add_field( array(
            'name'    => 'Subtitulo',
            'desc'    => 'Subtitulo del banner',
            'default' => '',
            'id'      => $prefix.'subtitle_banner',
            'type'    => 'text'
        ) );
        
        $cmb->add_field( array(
            'name'    => 'Imagen',
            'desc'    => '',
            'id'      => 'main_image',
            'type'    => 'file'
        ) );

        // items paquetes con imagen dias noches titulo precio desde y tipo de acomodacion
        $group_field_id = $cmb->add_field( array(
            'id'          => $prefix.'packages',
            'type'        => 'group',
            'description' => __( 'Paquetes', 'cmb2' ),
            'options'     => array(
                'group_title'       => __( 'Paquete {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                'add_button'        => __( 'Agregar Paquete', 'cmb2' ),
                'remove_button'     => __( 'Remover Paquete', 'cmb2' ),
                'sortable'          => true,
                // 'closed'         => true, // true to have the groups closed by default
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );

        $cmb->add_group_field( $group_field_id, array(
            'name' => 'Imagen',
            'id'   => 'image',
            'type' => 'file',
        ) );

        $cmb->add_group_field( $group_field_id, array(
            'name' => 'Dias',
            'id'   => 'days',
            'type' => 'text',
        ) );

        $cmb->add_group_field( $group_field_id, array(
            'name' => 'Noches',
            'id'   => 'nights',
            'type' => 'text',
        ) );

        $cmb->add_group_field( $group_field_id, array(
            'name' => 'Titulo',
            'id'   => 'title',
            'type' => 'text',
        ) );

        $cmb->add_group_field( $group_field_id, array(
            'name' => 'Precio desde',
            'id'   => 'price',
            'type' => 'text',
        ) );

        $cmb->add_group_field( $group_field_id, array(
            'name' => 'Tipo de acomodación',
            'id'   => 'accommodation_type',
            'type' => 'text',
        ) );

    }

    function add_meta_boxes(){
        $this->metabox_general();
    }

    function load_admin_styles(){

        global $post_type;

        if($this->post_type_name != $post_type){
            return;
        }

        //wp_enqueue_style('bootstrap-css', plugins_url('../js/pqrs/bootstrap.min.css', __FILE__));
    }

    function load_frontend_styles(){

        global $post_type;

        if($this->post_type_name != $post_type){
            return;
        }

        // wp_enqueue_style('dugalu-logos-css', plugins_url('../css/style.css', __FILE__));

    }

    function load_admin_scripts(){

        global $post_type;

        if($this->post_type_name != $post_type){
            return;
        }

        //wp_enqueue_script('pqrs-backend-js', plugins_url('../js/pqrs/pqrs-backend.js', __FILE__), array('jquery'), '1.0', true);
        // wp_enqueue_script('enig-comp-admin-js', plugins_url('../js/admin.js', __FILE__), array('jquery'), '1.0', true);

    }

    function load_frontend_scripts(){

        global $post_type;

        if($this->post_type_name != $post_type){
            return;
        }

        // wp_enqueue_script('indupalma-pqrs-parsley-js', plugins_url('../js/pqrs/parsley.js', __FILE__), array('jquery'), '1.0', true);
        // wp_enqueue_script('indupalma-pqrs-frontend-js', plugins_url('../js/pqrs/pqrs-frontend.js', __FILE__), array('jquery','indupalma-pqrs-parsley-js'), '1.0', true);

    }
}