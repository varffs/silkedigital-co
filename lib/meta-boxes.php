<?php

/* Get post objects for select field options */
function get_post_objects( $query_args ) {
$args = wp_parse_args( $query_args, array(
    'post_type' => 'post',
) );
$posts = get_posts( $args );
$post_options = array();
if ( $posts ) {
    foreach ( $posts as $post ) {
        $post_options [ $post->ID ] = $post->post_title;
    }
}
return $post_options;
}


/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Hook in and add metaboxes. Can only happen on the 'cmb2_init' hook.
 */
add_action( 'cmb2_init', 'igv_cmb_metaboxes' );
function igv_cmb_metaboxes() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_igv_';

  /**
   * Metaboxes declarations here
   * Reference: https://github.com/WebDevStudios/CMB2/blob/master/example-functions.php
   */

   $project_meta = new_cmb2_box( array(
    'id'            => $prefix . 'project_meta',
    'title'         => __( 'Project Metabox', 'cmb2' ),
    'object_types'  => array( 'project', ), // Post type
    // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
    // 'context'    => 'normal',
    // 'priority'   => 'high',
    // 'show_names' => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // true to keep the metabox closed by default
  ) );

  $project_meta->add_field( array(
    'name'       => __( 'Video webm', 'cmb2' ),
    'desc'       => __( 'webm file for main video (optional)', 'cmb2' ),
    'id'         => $prefix . 'video_webm',
    'type'       => 'file',
    // 'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
    // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
    // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
    // 'on_front'        => false, // Optionally designate a field to wp-admin only
    // 'repeatable'      => true,
  ) );

  $project_meta->add_field( array(
    'name'       => __( 'Video mp4', 'cmb2' ),
    'desc'       => __( 'mp4 file for main video (optional)', 'cmb2' ),
    'id'         => $prefix . 'video_mp4',
    'type'       => 'file',
    // 'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
    // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
    // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
    // 'on_front'        => false, // Optionally designate a field to wp-admin only
    // 'repeatable'      => true,
  ) );

  $project_meta->add_field( array(
    'name'       => __( 'Excerpt text for home', 'cmb2' ),
    'desc'       => __( 'Text to show on home', 'cmb2' ),
    'id'         => $prefix . 'home_excerpt',
    'type'       => 'wysiwyg',
    // 'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
    // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
    // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
    // 'on_front'        => false, // Optionally designate a field to wp-admin only
    // 'repeatable'      => true,
  ) );

}
?>
