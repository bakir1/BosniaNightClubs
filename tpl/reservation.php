<?php
  include_once '../includes/dbh.php';

 ?>

<!-- Reservation -->
<section id="reservation">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Reservation</h2>
        <h3 class="section-subheading text-muted">Reserve your night.</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <form id="contactForm" action="includes/reserv.php" name="sentMessage" method="POST">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
<input id="mail-name" class="form-control" name="name" type="text" placeholder="Your Name *" required>
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
<input id="mail-email" class="form-control" name="email" type="email" placeholder="Your Email *" required>
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
<input id="mail-phone" class="form-control" name="phone" type="tel" placeholder="Your Phone *" required>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
<textarea id="mail-messaga" class="form-control" name="message" placeholder="Your Message *" required></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12 text-center">
              <div id="success"></div>
<button id="mail-submit" name="submit" class="btn btn-primary btn-xl text-uppercase" type="submit" onclick="return chk()">Send Reservation</button>
       <p id="form-messaga"></p>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
