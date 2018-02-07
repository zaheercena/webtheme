<?php /**
 * Initialize the options before anything else.
 */
//add_action( 'init', 'custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
/*function custom_theme_options() {

  /* OptionTree is not loaded yet, or this is not an admin request */
  /*if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;

  /**
   * Get a copy of the saved settings array.
   */
  /*$saved_settings = get_option( 'option_tree_settings', array() );

  /**
   * Custom settings array that will eventually be
   * passes to the OptionTree Settings API Class.
   */
  /*$custom_settings = array(
    'contextual_help' => array(
      'content'       => array(
        array(
          'id'        => 'general_help',
          'title'     => 'General',
          'content'   => '<p>Help content goes here!</p>'
        )
      ),
      'sidebar'       => '<p>Sidebar content goes here!</p>',
    ),
    'sections'        => array(
      array(
        'id'          => 'general',
        'title'       => 'General'
      )
    ),
    'settings'        => array(
      array(
        'id'          => 'my_checkbox',
        'label'       => 'Checkbox',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'general',
        'class'       => '',
        'choices'     => array(
          array(
            'value' => 'yes',
            'label' => 'Yes'
          )
        )
      ),
      array(
        'id'          => 'my_layout',
        'label'       => 'Layout',
        'desc'        => 'Choose a layout for your theme',
        'std'         => 'right-sidebar',
        'type'        => 'radio-image',
        'section'     => 'general',
        'class'       => '',
        'choices'     => array(
          array(
            'value'   => 'left-sidebar',
            'label'   => 'Left Sidebar',
            'src'     => OT_URL . '/assets/images/layout/left-sidebar.png'
          ),
          array(
            'value'   => 'right-sidebar',
            'label'   => 'Right Sidebar',
            'src'     => OT_URL . '/assets/images/layout/right-sidebar.png'
          ),
          array(
            'value'   => 'full-width',
            'label'   => 'Full Width (no sidebar)',
            'src'     => OT_URL . '/assets/images/layout/full-width.png'
          ),
          array(
            'value'   => 'dual-sidebar',
            'label'   => __( 'Dual Sidebar', 'option-tree' ),
            'src'     => OT_URL . '/assets/images/layout/dual-sidebar.png'
          ),
          array(
            'value'   => 'left-dual-sidebar',
            'label'   => __( 'Left Dual Sidebar', 'option-tree' ),
            'src'     => OT_URL . '/assets/images/layout/left-dual-sidebar.png'
          ),
          array(
            'value'   => 'right-dual-sidebar',
            'label'   => __( 'Right Dual Sidebar', 'option-tree' ),
            'src'     => OT_URL . '/assets/images/layout/right-dual-sidebar.png'
          )
        )
      ),
      array(
        'id'          => 'my_slider',
        'label'       => 'Images',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'general',
        'class'       => '',
        'choices'     => array(),
        'settings'    => array(
          array(
            'id'      => 'slider_image',
            'label'   => 'Image',
            'desc'    => '',
            'std'     => '',
            'type'    => 'upload',
            'class'   => '',
            'choices' => array()
          ),
          array(
            'id'      => 'slider_link',
            'label'   => 'Link to Post',
            'desc'    => 'Enter the posts url.',
            'std'     => '',
            'type'    => 'text',
            'class'   => '',
            'choices' => array()
          ),
          array(
            'id'      => 'slider_description',
            'label'   => 'Description',
            'desc'    => 'This text is used to add fancy captions in the slider.',
            'std'     => '',
            'type'    => 'textarea',
            'class'   => '',
            'choices' => array()
          )
        )
      )
    )
  );

  /* settings are not the same update the DB */
  /*if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings );
  }

  /* Lets OptionTree know the UI Builder is being overridden */
  /*global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;

}*/
