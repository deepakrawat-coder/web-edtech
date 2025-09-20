<?php require './admin/includes/db-config.php';
require './admin/includes/helper.php';
?>

<?php include('./panels/header-top.php') ?>
<title>Contact Us | Edtech Innovate Pvt Ltd</title>
<meta name='description' content='Contact the Edtech Innovate team by visiting our official website and entering your details, or you can simply email or call us at provided contact details.'>
<meta property="og:title" content="Contact Us | Edtech Innovate Pvt Ltd" />
<meta property="og:description" content="" />
<?php include('./panels/header-bottom.php') ?>
<?php include('./panels/menu.php') ?>

<!--Banner starts here-->
<!-- <section class='new-media'>
    <div class='container'>
        <div class='row py-5'>
            <div class='col-md-12'>
                <h1 class='text-white text-center '>Connect With Us</h1>
                <h2 class='fs-6  text-center text-white font-size-contacttext'>Let's talk. Learn more about EDtech and
                    how we're supercharging progress with our clients, our people and in our communities.</h2>
            </div>
        </div>
    </div>
</section> -->
<div class="about-hero-warp px-3 px-md-0">
    <div class="container">
        <div class="about-hero-content">
            <h1 class="title-breadcrumb text-dark text-center text-white">Contact Us</h1>
            <!-- <h2 class="fs-6 fw-normal text-center text-dark blog-text-fontsize">Let's talk. Learn more about EDtech and
                how we're supercharging progress with our clients, our people and in our communities.</h2> -->
        </div>
    </div>
</div>
<!--Banner ends here-->

<!-- Contact Warp Start -->
<section class='py-5 contact-bg'>
    <div class='contact-warp'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-6'>
                    <div class='contact-content single-section'>
                        <!-- <div class='contact-widget contact-widget-hover1 d-flex align-items-center bg-white p-4 '>
                            <div class='icon-style'>
                                <div class='icon icon-contact'>
                                    <img src='web-assets/images/logo/email.png' class='contact_svg_size contact1 img-fluid' alt='contact1' loading="lazy">
                                </div>
                            </div>
                            <div class='content'>
                                <span class='h5'>Connect With Email</span>
                                <a href='mailto:info@edtechinnovate.com'><span>info@edtechinnovate.com</span></a>
                            </div>
                        </div> -->

                        <div class='contact-widget bg-white p-4 rounded-3'>
                            <!-- <div class='icon-style'>
                                <div class='icon icon-contact5'>
                                    <img src='web-assets/images/logo/pin.png' class='contact1 img-fluid contact_svg_size' alt='contact1' loading="lazy">
                                </div>
                            </div>
                            <div class='content'>
                                <h3 class='h5'>Address</h3>
                                <span class="text-dark fw-light "> A-18, S1, Second Floor, Sector 59, Noida UP 201301.</span>

                            </div> -->
                            <div class="row">
                                <div class="col">
                                    <h3>Head Office</h3>
                                    <hr class="text-danger border border-2 border-danger">
                                    <p class="fw-semibold mb-2"><i class="fa-solid fa-location-dot pe-2 text-danger"></i>A-18, S1, Second Floor, Sector 59, Noida UP 201301</p>
                                    <p class="fw-semibold mb-2"><i class="fa-solid fa-envelope pe-2 text-primary-emphasis"></i><a href='mailto:info@edtechinnovate.com'><span>info@edtechinnovate.com</span></a></p>
                                    <p class="fw-semibold mb-2"><i class="fa-solid fa-phone pe-2 text-primary"></i><a href='tel:8851920153'>+91 8851920153</a></p>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <h3>Branch Offices</h3>
                                    <hr class="text-primary border border-2 border-primary">

                                    <p class="fw-bold mb-1 fs-6">Bangalore</p>
                                    <p class="mb-2"><i class="fa-solid fa-location-dot pe-2 text-danger"></i>46/4, Novel Tech Park, GB Palya, Kudlu Gate, Bengaluru- 560068</p>
                                    <p class="mb-2"><i class="fa-solid fa-envelope pe-2 text-primary-emphasis"></i><a href='mailto:info@edtechinnovate.com'><span>info@edtechinnovate.com</span></a></p>
                                    <p class="mb-5"><i class="fa-solid fa-phone pe-2 text-primary"></i><a href='tel:8851920153'>+91 8851920153</a></p>

                                    <p class="fw-bold mb-1 fs-6">Calicut</p>
                                    <p class="mb-2"><i class="fa-solid fa-location-dot pe-2 text-danger"></i>6/299-D3, marina Mall, YMCS Cross Road, Kozhikode, Calicut - 673001</p>
                                    <p class="mb-2"><i class="fa-solid fa-envelope pe-2 text-primary-emphasis"></i><a href='mailto:info@edtechinnovate.com'><span>info@edtechinnovate.com</span></a></p>
                                    <p class="mb-5"><i class="fa-solid fa-phone pe-2 text-primary"></i><a href='tel:8851920153'>+91 8851920153</a></p>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <h3>International Office</h3>
                                    <hr class="text-primary border border-2 border-primary">
                                    <p class="fw-bold mb-1 fs-6">Dubai</p>
                                    <p class="mb-2"><i class="fa-solid fa-location-dot pe-2 text-danger"></i>Suite no 3004c, 30th Floor Aspin Commercial Tower, Sheik Zayed Road, United Arab Emirates Dubai - 500001</p>
                                    <p class="mb-2"><i class="fa-solid fa-envelope pe-2 text-primary-emphasis"></i><a href='mailto:info@edtechinnovate.com'><span>info@edtechinnovate.com</span></a></p>
                                    <p class="mb-5"><i class="fa-solid fa-phone pe-2 text-primary"></i><a href='tel:8851920153'>+91 8851920153</a></p>
                                </div>
                            </div>
                        </div>

                        <!-- <div class='contact-widget contact-widget-hover2 d-flex align-items-center bg-white p-4'>
                            <div class='icon-style'>
                                <div class='icon icon-contact1'>
                                    <img src='web-assets/images/logo/phone-call.png' class=' contact_svg_size contact1 img-fluid' alt='contact1' loading="lazy">
                                </div>
                            </div>
                            <div class='content'>
                                <h3 class='h5'>Connect With Call</h3>
                                <a href='tel:8595350621'>+91 8595350621</a>
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class='col-lg-6'>
                    <div class='massage-warp bg-color-contactus'>
                        <form class="needs-validation" role="form" id="form-add-gallery"  method="POST" enctype="multipart/form-data">
                            <div class='row'>
                                <div class='col-lg-6'>
                                    <div class='input-box'>
                                        <label for='firstname' class='form-label'>First Name</label>
                                        <input type='text' name="firstname" class='form-control' id='firstname' placeholder='First Name' required>
                                    </div>
                                </div>
                                <div class='col-lg-6'>
                                    <div class='input-box'>
                                        <label for='lastname' class='form-label'>Last Name</label>
                                        <input type='text' name="lastname" class='form-control' id='lastname' placeholder='Last Name' required>
                                    </div>
                                </div>
                                <div class='col-lg-6'>
                                    <div class='input-box'>
                                        <label for='email' class='form-label'>Email</label>
                                        <input type='email' name="email" class='form-control' id='email' placeholder='Email' required>
                                    </div>
                                </div>
                                <div class='col-lg-6'>
                                    <div class='input-box'>
                                        <label for='phone' class='form-label'>Phone</label>
                                        <input type='tel' maxlength="10" name="phone" class='form-control' onkeypress="return isNumberKey(event);" id='phone' placeholder='Phone' required>
                                    </div>
                                </div>
                                <div class='col-lg-12'>
                                    <div class='input-box'>
                                        <label for='message' class='form-label'>Your Message</label>
                                        <textarea name="message" class='form-control' id='message' placeholder='Type Your Text Here.......' required></textarea>
                                    </div>
                                </div>
                                <div class='col-lg-12'>
                                    <div class='form-check'>
                                        <input type='checkbox' class='form-check-input' id='privacyCheckbox' required>
                                        <label class='form-check-label' for='privacyCheckbox'>
                                            <p class='contact-check-text'>I have read EDTECH Innovate <a href='privacy-policy.php' target='_blank' class='text-cpp'>Privacy Policy</a> and agree to the
                                                <a href='terms-condition.php' class='text-cpp'>terms and conditions</a>
                                            </p>
                                            <p class='contact-check-text py-3'>By providing your contact information and clicking 'submit', you
                                                authorize EDTech to store your contact details and contact you with information on case studies, whitepapers, events, webinars, newsletters, announcements and other relevant updates.
                                            </p>
                                        </label>
                                    </div>
                                </div>
                                <div class='col-lg-6 others-option d-flex align-items-center'>
                                    <div class='option-item'>
                                        <button type="submit" class='default-btn home-six-main'>Submit<i class='fa fa-arrow-right ms-1'></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>



            </div>

            <div class="row mt-4">
                <div class="col">
                    <div class='contact-widget mb-3'>
                        <div class='inner-map contact-widget-mapsize'>
                            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.5095516285783!2d77.31147307522406!3d28.58448668626137!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5868398466b%3A0xf77b1b3375589c9f!2sS2code%20technology%20LLP!5e0!3m2!1sen!2sin!4v1708154657576!5m2!1sen!2sin" style="width: 545px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->

                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.7608708831517!2d77.36323547429244!3d28.606949785244108!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8027fc49bc413905%3A0x72486e854c4912de!2sEdTech%20Innovate!5e0!3m2!1sen!2sin!4v1710919161515!5m2!1sen!2sin" style="width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Warp End -->

<?php include('./panels/footer-top.php') ?>
<?php include('./panels/footer-bottom.php') ?>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Toastr.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script>
function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

</script>


<script>
    $(document).ready(function() {
        $("#form-add-gallery").on("submit", function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "./admin/app/leads/store",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    data = JSON.parse(data); // Parse JSON response
                    if (data.status === 200) {
                        toastr.success(data.message);
                        // Reset the form
                        $('#form-add-gallery')[0].reset();
                    } else {
                        toastr.error(data.message);
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('An error occurred while submitting the form.');
                }
            });
        });
    });
</script>