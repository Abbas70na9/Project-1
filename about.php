<?php
/* Template Name: About Page */
get_header();
?>

<main class="main">
 <!-- About Section -->
<section id="about" class="about section">
  <div id="aboutme" class="container text-center">
    <h2 class="about-title"><?php the_title(); ?></h2> <!-- Dynamic Page Title -->

    <div class="about-content">
      <?php
        // WordPress page content dynamically fetched from editor
        if (have_posts()) :
          while (have_posts()) : the_post();
            the_content();
          endwhile;
        else :
          echo '<p>' . __('No content available', 'personal-theme') . '</p>';
        endif;
      ?>
    </div>
  </div>
</section><!-- End About Section -->


<!-- Optional: Dynamic Features Section -->
<section id="features" class="features section">
  <div class="container">
    <h2><?php _e('Our Features', 'personal-theme'); ?></h2>
    <div class="row">
      <?php
        // Query for the custom post type 'feature'
        $args = array(
          'post_type' => 'feature', // Custom post type 'feature'
          'posts_per_page' => 4
        );
        $features = new WP_Query($args);
        if ($features->have_posts()) :
          while ($features->have_posts()) : $features->the_post();
            ?>
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="feature-item">
                <div class="feature-icon">
                  <!-- Example: Add an icon or image here -->
                  <i class="bi bi-check-circle"></i> <!-- Or use an image -->
                </div>
                <h3><?php the_title(); ?></h3>
                <p><?php the_excerpt(); ?></p>
              </div>
            </div>
            <?php
          endwhile;
        else :
          echo '<p>' . __('No features available', 'personal-theme') . '</p>';
        endif;
      ?>
    </div>
  </div>
</section><!-- End Features Section -->


  <main class="main"><!-- About Section -->

  <!-- Skills Section -->
  <section id="skills" class="skills section">
    <div class="container section-title" data-aos="fade-up">
      <h2><?php _e('Skills', 'personal-theme'); ?></h2>
      <div>
        <span><?php _e('My', 'personal-theme'); ?></span> 
        <span class="description-title"><?php _e('Skills', 'personal-theme'); ?></span>
      </div>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row skills-content skills-animation">
        <div class="col-lg-6">
          <div class="progress">
            <span class="skill">
              <span><?php _e('HTML', 'personal-theme'); ?></span> 
              <i class="val">90%</i>
            </span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" style="width: 90%;"></div>
            </div>
          </div>
          <div class="progress">
            <span class="skill">
              <span><?php _e('CSS', 'personal-theme'); ?></span> 
              <i class="val">85%</i>
            </span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" style="width: 85%;"></div>
            </div>
          </div>
          <div class="progress">
            <span class="skill">
              <span><?php _e('JavaScript', 'personal-theme'); ?></span> 
              <i class="val">75%</i>
            </span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" style="width: 75%;"></div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="progress">
            <span class="skill">
              <span><?php _e('PHP', 'personal-theme'); ?></span> 
              <i class="val">80%</i>
            </span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" style="width: 80%;"></div>
            </div>
          </div>
          <div class="progress">
            <span class="skill">
              <span><?php _e('WordPress/CMS', 'personal-theme'); ?></span> 
              <i class="val">90%</i>
            </span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" style="width: 90%;"></div>
            </div>
          </div>
          <div class="progress">
            <span class="skill">
              <span><?php _e('Photoshop', 'personal-theme'); ?></span> 
              <i class="val">55%</i>
            </span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" style="width: 55%;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Skills Section -->

<!-- Interests Section -->
<section id="interests" class="interests section">
  <div class="container section-title" data-aos="fade-up">
    <h2><?php _e('Features', 'personal-theme'); ?></h2>
    <div>
      <span><?php _e('I\'m', 'personal-theme'); ?></span> 
      <span class="description-title"><?php _e('interested in', 'personal-theme'); ?></span>
    </div>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row gy-4">
      <?php
      // Query Interests from WordPress Database
      $interests = new WP_Query([
        'post_type' => 'interests', // Custom post type for Interests
        'posts_per_page' => -1, // Fetch all interests
        'orderby' => 'menu_order', // Use menu order for sorting
        'order' => 'ASC',
      ]);

      // Loop through Interests
      if ($interests->have_posts()) :
        $delay = 100; // Initialize animation delay
        while ($interests->have_posts()) : $interests->the_post();
          $interest_icon = get_post_meta(get_the_ID(), 'interest_icon', true); // Custom field for icon
          $interest_color = get_post_meta(get_the_ID(), 'interest_color', true); // Custom field for color
      ?>
      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>">
        <div class="features-item">
          <i class="<?php echo esc_attr($interest_icon); ?>" style="color: <?php echo esc_attr($interest_color); ?>;"></i>
          <h3><?php the_title(); ?></h3>
        </div>
      </div><!-- End Feature Item -->
      <?php
          $delay += 100; // Increment animation delay for each item
        endwhile;
        wp_reset_postdata(); // Reset query
      else :
      ?>
      <p><?php _e('No interests found.', 'personal-theme'); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section><!-- /Interests Section -->



</main>

<?php get_footer(); ?>

