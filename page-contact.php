<?php
/* Template Name: Contact Page */
get_header(); 
?>

<main class="main">
  <!-- Contact Section -->
  <section id="contact" class="contact section">
    <div class="container">
      <h2><?php _e('Contact Us', 'personal-theme'); ?></h2>
      <p><?php _e('Feel free to reach out using the form below. If You are a Designer or Developer or SEO specialist Or Data Analytics. Join Our team', 'personal-theme'); ?></p>
      <!-- Contact Form or Info Here -->
    </div>
  </section>

  <form action="your_php_script.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="600" onsubmit="return showAlert()">
  <div class="container text-center">
    <div class="row gy-4 justify-content-center">
      <div class="col-md-5">
        <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
      </div>

      <div class="col-md-5">
        <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
      </div>

      <div class="col-md-7">
        <input type="text" class="form-control" name="domain" placeholder="Enter Your domain" required="">
      </div>

      <div class="col-md-10">
        <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
      </div>

      <div class="col-md-12 text-center">
        <button type="submit">Send Message</button>
      </div>
    </div>
  </div>
</form>

<script>
  function showAlert() {
    alert("Your message has been successfully saved!");
    return false;
  }
</script>
</main>
<?php get_footer(); ?>
