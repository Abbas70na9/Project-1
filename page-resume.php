<?php
/* Template Name: Resume Page */
get_header(); 
?>

<main class="main">

  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1><?php the_title(); ?></h1>
            <p class="mb-0">
              <?php echo get_post_meta(get_the_ID(), 'resume_subtitle', true); ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Page Title -->

  <!-- Resume Section -->
  <section id="resume" class="resume section">
    <div class="container">
      <div class="row">
        
        <!-- Summary -->
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <h3 class="resume-title"><?php _e('Summary', 'personal-theme'); ?></h3>

          <div class="resume-item pb-0">
            <h4><?php echo get_post_meta(get_the_ID(), 'resume_name', true); ?></h4>
            <p><em><?php echo get_post_meta(get_the_ID(), 'resume_summary', true); ?></em></p>
            <ul>
              <li><?php echo get_post_meta(get_the_ID(), 'resume_location', true); ?></li>
              <li><?php echo get_post_meta(get_the_ID(), 'resume_phone', true); ?></li>
              <li><?php echo get_post_meta(get_the_ID(), 'resume_email', true); ?></li>
            </ul>
          </div><!-- End Resume Item -->

          <h3 class="resume-title"><?php _e('Education', 'personal-theme'); ?></h3>

          <?php
// Get the resume education custom field data (string)
$education = get_post_meta(get_the_ID(), 'resume_education', true);

// Check if there's any education data and decode it if it's in JSON format
if (!empty($education)) {
    // Decode the JSON string into a PHP array
    $education_array = json_decode($education, true);

    // If decoding was successful and it's an array, loop through each education entry
    if (is_array($education_array)) {
        foreach ($education_array as $edu) { ?>
            <div class="resume-item">
                <h4><?php echo esc_html($edu['degree']); ?></h4> <!-- Degree -->
                <h5><?php echo esc_html($edu['years']); ?></h5> <!-- Years attended -->
                <p><em><?php echo esc_html($edu['institution']); ?></em></p> <!-- Institution name -->
                <p><?php echo esc_html($edu['details']); ?></p> <!-- Additional details -->
            </div>
        <?php }
    } else {
        echo '<p>No valid education data found.</p>';
    }
} else {
    echo '<p>No education data available.</p>';
}
?>

        </div><!-- End Column -->

        <!-- Professional Experience -->
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <h3 class="resume-title"><?php _e('Professional Experience', 'personal-theme'); ?></h3>

          <?php
// Get the resume experience custom field data (string)
$experience = get_post_meta(get_the_ID(), 'resume_experience', true);

// Check if there's any experience data and decode it if it's in JSON format
if (!empty($experience)) {
    // Decode the JSON string into a PHP array
    $experience_array = json_decode($experience, true);

    // If decoding was successful and it's an array, loop through each job
    if (is_array($experience_array)) {
        foreach ($experience_array as $job) { ?>
            <div class="resume-item">
                <h4><?php echo esc_html($job['title']); ?></h4> <!-- Job Title -->
                <h5><?php echo esc_html($job['years']); ?></h5> <!-- Years worked -->
                <p><em><?php echo esc_html($job['company']); ?></em></p> <!-- Company name -->
                <ul>
                    <li><?php echo esc_html($job['responsibilities']); ?></li> <!-- Job responsibilities -->
                </ul>
            </div>
        <?php }
    } else {
        echo '<p>No valid experience data found.</p>';
    }
} else {
    echo '<p>No experience data available.</p>';
}
?>

          
        </div><!-- End Column -->

      </div><!-- End Row -->
    </div><!-- End Container -->
  </section><!-- End Resume Section -->

</main>

<?php get_footer(); ?>
