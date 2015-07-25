<?php
get_header();
?>

<section id="splash" class="yellow-background js-scroll-to-trigger u-pointer" data-target="us">
  <div class="u-holder u-align-center">
    <div class="u-held">
      <div class="center-text">
        <div id="splash-logo"><?php echo url_get_contents(get_stylesheet_directory_uri() . '/img/silke_logo.svg'); ?></div>
        <h3><?php
            $strapline = IGV_get_option('_igv_strapline');
            if (!empty($strapline)) {
              echo $strapline;
            }
          ?></h3>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('partials/menu'); ?>

<!-- main content -->

<main id="main-content">

  <div id="us" class="window">
    <div class="u-holder u-align-center center-spaced">
      <div class="u-held">
        <div id="us-copy" class="center-text u-align-left">
          <?php
            $about = IGV_get_option('_igv_about');
            if (!empty($about)) {
              echo wpautop($about);
            }
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- main posts loop -->
  <section id="work">
<?php
  $projects = get_posts('post_type=project&posts_per_page=-1');
  if ($projects) {
    foreach ($projects as $post) {
      setup_postdata($post);
      $meta = get_post_meta($post->ID);
?>
    <div class="home-work">
      <div class="home-work-main-video">
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
            <h2>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <div>
              <?php
                if (!empty($meta['_igv_home_excerpt'][0])) {
                  echo wpautop($meta['_igv_home_excerpt'][0]);
                }
              ?>
            </div>
          </div>

          <div class="home-key-facts container">
          <?php
            $key_facts = get_post_meta($post->ID, '_igv_key_fact');
            if ($key_facts) {
              if (count($key_facts[0]) >= 2) {
          ?>
            <div class="percent-col into-3">
              <div class="home-key-fact">
                <?php echo $key_facts[0][0]; ?>
              </div>
            </div>
            <div class="percent-col into-3 u-align-center">
              <div class="home-key-fact">
                <?php echo $key_facts[0][1]; ?>
              </div>
            </div>
            <div class="percent-col into-3 u-align-center">
              <a href="<?php the_permalink(); ?>">
                <div class="home-key-fact find-out-more">
                  find out more
                </div>
              </a>
            </div>
          <?php
              }
            } else {
          ?>
            <div class="find-out-more-solo u-align-center">
              <a href="<?php the_permalink(); ?>">
                <div class="home-key-fact find-out-more">
                  find out more
                </div>
              </a>
            </div>
          <?php
            }
          ?>
          </div>
        </div>
      </div>
    </div>
<?php
    }
  }
?>
  <!-- end posts -->
  </section>

<!-- end main-content -->

</main>

<?php
get_footer();
?>