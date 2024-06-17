<?php
add_action('cmb2_admin_init', 'cmb2_fields_home');
function cmb2_fields_home()
{
    $home_page = 33;

    /**
     * Inicia el metabox solo si es la página "Nosotros"
     */
    if ($home_page != '') {
        $cmb = new_cmb2_box(array(
            'id'            => 'fields_home',
            'title'        => __('Información Adicional', 'translate-ss'),
            'object_types'  => array('page'), // Post type
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true, // Show field names on the left
            'show_on'      => array('id' => array($home_page)), // Specific post IDs to display this metabox
            // 'cmb_styles' => false, // false to disable the CMB stylesheet
            // 'closed'     => true, // Keep the metabox closed by default
        ));

        $cmb->add_field(array(
            'name'    => 'Titulo',
            'desc'    => '',
            'id'      => 'title',
            'type'    => 'text',
        ));

        $cmb->add_field(array(
            'name' => 'Subtitulo',
            'id'   => 'subtitle',
            'type' => 'text',
        ));

        $cmb->add_field(array(
            'name' => 'Mensaje',
            'id'   => 'message',
            'type' => 'text',
        ));

        $cmb->add_field(array(
            'name' => 'Texto Boton',
            'id'   => 'buttonMessage',
            'type' => 'text',
        ));

        $group_field_id = $cmb->add_field(array(
            'id'          => 'items_services',
            'type'        => 'group',
            'description' => __('Items Servicios', 'cmb2'),
            // 'repeatable'  => false, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'       => __('Entry {#}', 'cmb2'), // since version 1.1.4, {#} gets replaced by row number
                'add_button'        => __('Add Another Entry', 'cmb2'),
                'remove_button'     => __('Remove Entry', 'cmb2'),
                'sortable'          => true,
                // 'closed'         => true, // true to have the groups closed by default
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ));

        $cmb->add_group_field($group_field_id, array(
            'name' => 'Titulo',
            'id'   => 'title',
            'type' => 'text',
            // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
        ));

        $cmb->add_group_field($group_field_id, array(
            'name' => 'SemiTitulo',
            'id'   => 'semititle',
            'type' => 'text',
            // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
        ));

        $cmb->add_group_field($group_field_id, array(
            'name' => 'Texto',
            'id'   => 'description',
            'type' => 'textarea',
        ));

        $cmb->add_group_field($group_field_id, array(
            'name' => 'Imagen',
            'id'   => 'image',
            'type' => 'file',
            // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
        ));

        $group_field_id = $cmb->add_field(array(
            'id'          => 'items_work_with_us',
            'type'        => 'group',
            'description' => __('Items Servicios', 'cmb2'),
            // 'repeatable'  => false, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'       => __('Entry {#}', 'cmb2'), // since version 1.1.4, {#} gets replaced by row number
                'add_button'        => __('Add Another Entry', 'cmb2'),
                'remove_button'     => __('Remove Entry', 'cmb2'),
                'sortable'          => true,
                // 'closed'         => true, // true to have the groups closed by default
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ));

        $cmb->add_group_field($group_field_id, array(
            'name' => 'Titulo',
            'id'   => 'title',
            'type' => 'text',
            // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
        ));

        $cmb->add_group_field($group_field_id, array(
            'name' => 'Texto',
            'id'   => 'description',
            'type' => 'textarea',
            // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
        ));

        $group_field_id = $cmb->add_field(array(
            'id'          => 'items_work_with_us',
            'type'        => 'group',
            'description' => __('Items Servicios', 'cmb2'),
            // 'repeatable'  => false, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'       => __('Entry {#}', 'cmb2'), // since version 1.1.4, {#} gets replaced by row number
                'add_button'        => __('Add Another Entry', 'cmb2'),
                'remove_button'     => __('Remove Entry', 'cmb2'),
                'sortable'          => true,
                // 'closed'         => true, // true to have the groups closed by default
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ));
    }
}
