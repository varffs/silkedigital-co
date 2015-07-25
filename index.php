<?php
get_header();
?>

<?php get_template_part('partials/menu'); ?>

<!-- main content -->

<main id="main-content">

  <section id="project">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();
    $meta = get_post_meta($post->ID);
?>

    <article <?php post_class(); ?> id="project-<?php the_ID(); ?>">

      <div class="u-holder u-align-center center-spaced">
        <div class="u-held">
          <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
        </div>
      </div>

      <div>
        <video autoplay loop muted>
          <?php
            if (!empty($meta['_igv_video_webm'][0])) {
              echo '<source src="' . $meta['_igv_video_webm'][0] . '" type="video/webm"/>';
            }
            if (!empty($meta['_igv_video_mp4'][0])) {
              echo '<source src="' . $meta['_igv_video_mp4'][0] . '" type="video/mp4"/>';
            }
          ?>
        </video>
      </div>

      <div class="u-holder u-align-center center-spaced">
        <div class="u-held">
          <div class="center-text u-align-left">
            <?php the_content(); ?>
          </div>
        </div>
      </div>

      <?php
        if (!empty($meta['_igv_video_webm_2'][0]) || !empty($meta['_igv_video_mp4_2'][0])) {
      ?>
      <div>
        <video autoplay loop muted>
          <?php
            if (!empty($meta['_igv_video_webm_2'][0])) {
              echo '<source src="' . $meta['_igv_video_webm_2'][0] . '" type="video/webm"/>';
            }
            if (!empty($meta['_igv_video_mp4_2'][0])) {
              echo '<source src="' . $meta['_igv_video_mp4_2'][0] . '" type="video/mp4"/>';
            }
          ?>
        </video>
      </div>
      <?php
        }
      ?>

      <?php
        if (!empty($meta['_igv_copy_2'][0])) {
      ?>
      <div class="u-holder u-align-center center-spaced">
        <div class="u-held">
          <div class="center-text u-align-left">
          <?php echo wpautop($meta['_igv_copy_2'][0]); ?>
          </div>
        </div>
      </div>
      <?php
        }
      ?>

      <?php
        if (!empty($meta['_igv_video_webm_3'][0]) || !empty($meta['_igv_video_mp4_3'][0])) {
      ?>
      <div>
        <video autoplay loop muted>
          <?php
            if (!empty($meta['_igv_video_webm_3'][0])) {
              echo '<source src="' . $meta['_igv_video_webm_3'][0] . '" type="video/webm"/>';
            }
            if (!empty($meta['_igv_video_mp4_3'][0])) {
              echo '<source src="' . $meta['_igv_video_mp4_3'][0] . '" type="video/mp4"/>';
            }
          ?>
        </video>
      </div>
      <?php
        }
      ?>

      <?php
        if (!empty($meta['_igv_copy_3'][0])) {
      ?>
      <div class="u-holder u-align-center center-spaced">
        <div class="u-held">
          <div class="center-text u-align-left">
          <?php echo wpautop($meta['_igv_copy_3'][0]); ?>
          </div>
        </div>
      </div>
      <?php
        }
      ?>

    </article>

<?php
  }
} else {
?>
    <article class="u-alert"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
<?php
} ?>

  </section>

<!-- end main-content -->

</main>

<?php
get_footer();
?>