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
  ) );

  $project_meta->add_field( array(
    'name'       => __( 'Video mp4', 'cmb2' ),
    'desc'       => __( 'mp4 file for main video (optional)', 'cmb2' ),
    'id'         => $prefix . 'video_mp4',
    'type'       => 'file',
  ) );

  $project_meta->add_field( array(
    'name'       => __( 'Excerpt text for home', 'cmb2' ),
    'desc'       => __( 'Text to show on home', 'cmb2' ),
    'id'         => $prefix . 'home_excerpt',
    'type'       => 'wysiwyg',
  ) );

  $project_meta->add_field( array(
    'name'       => __( 'Key facts', 'cmb2' ),
    'desc'       => __( '...', 'cmb2' ),
    'id'         => $prefix . 'key_fact',
    'type'       => 'text',
    'repeatable'      => true,
  ) );

  $project_meta->add_field( array(
    'name'       => __( 'Video 2 webm', 'cmb2' ),
    'desc'       => __( 'webm file for 2nd video (optional)', 'cmb2' ),
    'id'         => $prefix . 'video_webm_2',
    'type'       => 'file',
  ) );

  $project_meta->add_field( array(
    'name'       => __( 'Video 2 mp4', 'cmb2' ),
    'desc'       => __( 'mp4 file for 2nd video (optional)', 'cmb2' ),
    'id'         => $prefix . 'video_mp4_2',
    'type'       => 'file',
  ) );

  $project_meta->add_field( array(
    'name'       => __( '2nd copy block', 'cmb2' ),
    'desc'       => __( 'Text to show 2nd on single project (optional)', 'cmb2' ),
    'id'         => $prefix . 'copy_2',
    'type'       => 'wysiwyg',
  ) );

  $project_meta->add_field( array(
    'name'       => __( 'Video 2 webm', 'cmb2' ),
    'desc'       => __( 'webm file for 3rd video (optional)', 'cmb2' ),
    'id'         => $prefix . 'video_webm_3',
    'type'       => 'file',
  ) );

  $project_meta->add_field( array(
    'name'       => __( 'Video 2 mp4', 'cmb2' ),
    'desc'       => __( 'mp4 file for 3rd video (optional)', 'cmb2' ),
    'id'         => $prefix . 'video_mp4_3',
    'type'       => 'file',
  ) );

  $project_meta->add_field( array(
    'name'       => __( '2nd copy block', 'cmb2' ),
    'desc'       => __( 'Text to show 3nd on single project (optional)', 'cmb2' ),
    'id'         => $prefix . 'copy_3',
    'type'       => 'wysiwyg',
  ) );
}
?>
