<?php get_header(); ?>

<main class="main">
  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero-bg.jpg" alt="" data-aos="fade-in">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h2><?php _e('Muhammad Abbas', 'personal-theme'); ?></h2>
      <p>I'm a Full Stack Developer<span class="typed" data-typed-items="Developer"></span></p>
      <div class="social-links">
        <a href="https://www.twitter.com/abbasmuhammad"><i class="bi bi-twitter"></i></a>
        <a href="https://www.facebook.com/abbasmuhammad"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/abbasmuhammad"><i class="bi bi-instagram"></i></a>
        <a href="https://www.linkedin.com/in/muhammadabbas"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </section>
  
  <!-- Posts Section -->
<!-- Custom Post Section -->
<section id="custom-posts" class="custom-posts section">
  <div class="container">
    <h2><?php _e('Join with My Team :', 'personal-theme'); ?></h2>
    <div class="row">
      <?php
        // Fetch Regular WordPress Posts
        $args = array(
          'post_type' => 'post', // Default post type
          'posts_per_page' => 4
        );
        $posts = new WP_Query($args);
        if ($posts->have_posts()) :
          while ($posts->have_posts()) : $posts->the_post();
      ?>
            <div class="col-lg-3 col-md-4">
              <div class="custom-post-item">
                <h3><?php the_title(); ?></h3>
                <p><?php the_content(); ?></p> <!-- Full content without Read More -->
              </div>
            </div>
      <?php
          endwhile;
        else :
          echo '<p>' . __('No posts available', 'personal-theme') . '</p>';
        endif;
      ?>
    </div>
  </div>
</section><!-- End Custom Post Section -->

</main>


<?php get_footer(); ?>
