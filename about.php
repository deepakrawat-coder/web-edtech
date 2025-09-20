<?php include('./panels/header-top.php') ?>
<?php require 'admin/includes/db-config.php'; ?>

<?php
$serveData = [];
$services = $conn->query("SELECT * FROM who_we_serve WHERE status = 1 ORDER BY id asc");
while ($serve = $services->fetch_assoc()) {
    $serveData[] = $serve;
}
?>

<?php
$aboutData = [];
$abouts = $conn->query("SELECT * FROM about_us WHERE status = 1 ORDER BY id asc");
while ($about = $abouts->fetch_assoc()) {
    $aboutData[] = $about;
}
?>


<title>About Us | Edtech Innovate Pvt Ltd</title>
<meta name="description" content="EdTech Innovate is a SaaS company that provides innovative software solutions like AMS, ERP, CRM, and LMS to institutions to boost efficiency and productivity.">
<meta property="og:title" content="About Us | Edtech Innovate Pvt Ltd" />
<meta property="og:description" content="" />
<?php include('./panels/header-bottom.php') ?>
<?php include('./panels/menu.php') ?>
<!-- About Hero Warp Start -->
<div class="about-hero-warp px-3 px-md-0">
    <div class="container">
        <div class="about-hero-content">
            <h1 class="title-breadcrumb mob-page-sub-title text-white">About Us</h1>
            <!-- <p class="align-text-web">We consider all the drivers of change and give you the blocks and elements you need to change to create a truly professional website – so you can save time and focus on it.</p> -->
        </div>
    </div>
</div>
<!-- About Hero Warp End -->

<!-- About Image Warp Start -->
<div class="about-image-warp px-3 px-md-0">
    <div class="container">
        <div class="about-image">
            <!-- <img src="web-assets/images/heros/about1.jpg" class="about1 img-fluid" alt="about1" loading="lazy"> -->
        </div>
    </div>
</div>
<!-- About Image Warp End -->

<!-- About Booster Warp  Start -->
<!-- <div class="about-boost-warp pt-5 pb-75 px-3 px-md-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6" data-cue="slideInUp">
                <div class="boost-card colur1">
                    <div class="icon-content d-flex align-items-center">
                        <div class="icon">
                            <div class="rounded-icon">
                                <i class="flaticon-strategy"></i>
                            </div>
                        </div>
                        <p class=" h3 text-size-stories">
                            <a href="" class="mob-page-sub-title">Austere Innovative
                                Strategy</a>
                        </p>
                    </div>
                    <p>With Rible, you'll be able to gain your goals & maximize your potential, all while saving bit & reducing stress.</p>
                    <a href="services.html" class="hero-service-btn">
                        <i class="flaticon-trend"></i>
                        Explore More
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-cue="slideInUp">
                <div class="boost-card colur2 ">
                    <div class="icon-content d-flex align-items-center">
                        <div class="icon">
                            <div class="rounded-icon">
                                <i class="flaticon-coding"></i>
                            </div>
                        </div>
                        <p class="h3 text-size-stories">
                            <a href="">Effortless Coding
                                Maturing</a>
                        </p>
                    </div>
                    <p>With Rible, you'll be able to gain your goals & maximize your potential, all while saving bit & reducing stress.</p>
                    <a href="services.html" class="hero-service-btn">
                        <i class="flaticon-trend"></i>
                        Explore More
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-cue="slideInUp">
                <div class="boost-card colur3">
                    <div class="icon-content d-flex align-items-center">
                        <div class="icon">
                            <div class="rounded-icon">
                                <i class="flaticon-data-analytics"></i>
                            </div>
                        </div>
                        <p class="h3 text-size-stories">

                            <a href="">User Data Analytics
                                Friendly</a>
                        </p>
                    </div>
                    <p>With Rible, you'll be able to gain your goals & maximize your potential, all while saving bit & reducing stress.</p>
                    <a href="services.html" class="hero-service-btn">
                        <i class="flaticon-trend"></i>
                        Explore More
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- About Booster Warp  Start -->

<!-- Logo Slider Warp Start -->
<!-- <div class="logo-slider-warp pb-100 px-3 px-md-0">
    <div class="container">
        <div class="swiper logo-slider">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <a href="#" class="logo">
                        <img src="web-assets/images/logo/logo1.png" class="img-fluid" alt="image" loading="lazy">
                    </a>
                </div>

                <div class="swiper-slide">
                    <a href="#" class="logo">
                        <img src="web-assets/images/logo/logo2.png" class="img-fluid" alt="image" loading="lazy">
                    </a>
                </div>

                <div class="swiper-slide">
                    <a href="#" class="logo">
                        <img src="web-assets/images/logo/logo3.png" class="img-fluid" alt="image" loading="lazy">
                    </a>
                </div>

                <div class="swiper-slide">
                    <a href="#" class="logo">
                        <img src="web-assets/images/logo/logo4.png" class="img-fluid" alt="image" loading="lazy">
                    </a>
                </div>

                <div class="swiper-slide">
                    <a href="#" class="logo">
                        <img src="web-assets/images/logo/logo5.png" class="img-fluid" alt="image" loading="lazy">
                    </a>
                </div>

                <div class="swiper-slide">
                    <a href="#" class="logo">
                        <img src="web-assets/images/logo/logo6.png" class="img-fluid" alt="image" loading="lazy">
                    </a>
                </div>

                <div class="swiper-slide">
                    <a href="#" class="logo">
                        <img src="web-assets/images/logo/logo1.png" class="img-fluid" alt="image" loading="lazy">
                    </a>
                </div>

                <div class="swiper-slide">
                    <a href="#" class="logo">
                        <img src="web-assets/images/logo/logo2.png" class="img-fluid" alt="image" loading="lazy">
                    </a>
                </div>

                <div class="swiper-slide">
                    <a href="#" class="logo">
                        <img src="web-assets/images/logo/logo3.png" class="img-fluid" alt="image" loading="lazy">
                    </a>
                </div>

            </div>
        </div>
    </div>
</div> -->
<!-- Logo Slider Warp End -->

<!-- About Help Warp Start -->
<!-- <div class="about-help-warp px-3 px-md-0">
    <div class="container">
        <div class="inner-about-warp pt-3 pt-sm-5 pb-3 pb-sm-5">
            <div class="row">
                <div class="col-lg-6 order-2 order-md-1">
                    <div class="about-content">
                        <p class="text-justify">EdTech Innovate is a product-based Software-as-a-Service (SaaS) company that specializes in providing an innovative digital platform to various universities and aspiring students to connect and facilitate seamless operations, from marketing to admissions, and enhancing the overall educational experience for students at every stage through innovative technological solutions. Our company provides services to partnered universities and students in terms of web portal development, Enterprise Resource Planning (ERP), Client Relationship Management (CRM), admission management system, online examination, and complete Learning Management System (LMS) with eBooks, and video lectures. These services empower institutions to not only expand enrollments but also optimize marketing expenditures and boost productivity.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-md-2">
                    <div class="about-image">
                        <img src="web-assets/images/heros/about-us.jpg" class="about2 img-fluid" alt="about" loading="lazy">
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-6 order-2">
                    <div class="about-content">
                        <p class="text-justify pt-2 pt-md-5">Behind our success is a dedicated team comprising technical experts and education specialists. EdTech Innovate takes pride in managing a diverse portfolio of over 10 cutting-edge technology products, each contributing to our mission of revolutionizing education through innovation and strategic partnerships. Our collaborations extend across Pan India, involving over 100 esteemed institutes. We are on a mission to transform the education system by employing technology to build a future where education is a pleasant experience rather than just a task. Join us on this revolutionary journey as we redefine the learning process via innovative solutions and meaningful partnerships.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 order-1">
                    <div class="about-image">
                        <img src="web-assets/images/heros/about-us2.jpg" class="about2 img-fluid" alt="about" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- Dynamic HTML Content -->
<div class="about-help-warp px-3 px-md-0">
    <div class="container">
        <div class="inner-about-warp pt-3 pt-sm-5 pb-3 pb-sm-5">
            <?php foreach ($aboutData as $index => $about) { ?>
                <div class="row">
                    <div class="col-lg-6 <?php echo $index % 2 == 0 ? 'order-2 order-md-1' : 'order-2'; ?>">
                        <div class="about-content ck-content">
                            <p class="text-justify"><?php echo $about['description']; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-6 <?php echo $index % 2 == 0 ? 'order-1 order-md-2' : 'order-1'; ?>">
                        <div class="about-image">
                            <img src="./admin/<?php echo $about['image_url']; ?>" class="about2 img-fluid" alt="about" loading="lazy">
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- About Help Warp End -->

<section>
    <div class="container-fluid overflow-hidden">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php foreach ($serveData as $serve) : ?>
                    <div class="swiper-slide Regular p-2 m-3">
                        <a href="<?php echo $serve['link_url']; ?>" target="_blank">
                            <img src="./admin/<?php echo $serve['photo']; ?>" alt="about-us">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>







<!-- <section>
    <div class="container-fluid overflow-hidden">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide Regular p-2 m-3">
                    <a href="https://theattestation.in/" target="_blank">
                        <img src="web-assets/images/who-we-serve/ba.webp" alt="about-us">
                    </a>
                </div>
                <div class="swiper-slide Regular p-2 m-3">
                    <a href="https://vocational.glocaluniversity.edu.in/" target="_blank">
                        <img src="web-assets/images/who-we-serve/glocal.webp" alt="about-us">
                    </a>
                </div>
                <div class="swiper-slide Regular p-2 m-3">
                    <a href="https://iitseducation.in/" target="_blank">
                        <img src="web-assets/images/who-we-serve/iits-logo.png" alt="about-us">
                    </a>
                </div>
                <div class="swiper-slide Regular p-2 m-3">
                    <a href="https://juaonline.in/" target="_blank">
                        <img src="web-assets/images/who-we-serve/jua-logo.png" alt="about-us">
                    </a>
                </div>
                <div class="swiper-slide Regular p-2 m-3">
                    <a href="https://ccvte.org/" target="_blank">
                        <img src="web-assets/images/who-we-serve/logo-ccvte (1).png" alt="about-us">
                    </a>
                </div>
                <div class="swiper-slide Regular p-2 m-3">
                    <a href="https://bvoc.osgu.co.in/" target="_blank">
                        <img src="web-assets/images/who-we-serve/osgu-logo.webp" alt="about-us">
                    </a>
                </div>
                <div class="swiper-slide Regular p-2 m-3">
                    <a href="https://principleinstitution.com/" target="_blank">
                        <img src="web-assets/images/who-we-serve/pimt-min.png" alt="about-us">
                    </a>
                </div>
                <div class="swiper-slide Regular p-2 m-3">
                    <a href="" target="_blank">
                        <img src="web-assets/images/who-we-serve/svu.jpg" alt="about-us">
                    </a>
                </div>
                <div class="swiper-slide Regular p-2 m-3">
                    <a href="" target="_blank">
                        <img src="web-assets/images/who-we-serve/swayam.png" alt="about-us">
                    </a>
                </div>
                <div class="swiper-slide Regular p-2 m-3">
                    <img src="web-assets/images/who-we-serve/ba.webp" alt="about-us">
                </div>
            </div>
            
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section> -->

<!-- Global Warp Start -->
<!-- <div class="global-warp pt-100 pb-75 px-3 px-md-0">
    <div class="container">
        <div class="global-content">
            <p>We consider all the drivers of change to give you the blocks and sections you need to change to create a truly happens professional website.</p>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="global-count">
                        <p class="h1">486k</p>
                        <p>Satisfied Global Clients</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="global-count">
                        <p class="h1">99%</p>
                        <p>Download Total Range</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="global-count">
                        <p class="h1">3.5K+</p>
                        <p>5 star Odometers</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="global-count">
                        <p class="h1">653+</p>
                        <p>Finishing Success Projects</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Global Warp End -->

<!-- Team Warp Start -->
<!-- <div class="team-warp pt-100 pb-75 px-3 px-md-0">
    <div class="container">
        <div class="section-title">
            <p class="h2 mob-page-sub-title">Meet The Team</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6" data-cue="slideInUp">
                <div class="team-card">
                    <img src="web-assets/images/teams/team1.jpg" class="team1 team-hover1" alt="team" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <div class="content">
                        <p class="h5 mob-page-sub-title">Edward Germany</p>
                        <p>Web Developer</p>
                    </div>
                </div>

            </div>
            <div class="col-lg-3 col-md-6" data-cue="slideInUp">
                <div class="team-card">
                    <img src="web-assets/images/teams/team2.jpg" class="team1 team-hover2" alt="team">
                    <div class="content">
                        <p class="h5 mob-page-sub-title">Vanessa Brandt</p>
                        <p>Content Strategist</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-cue="slideInUp">
                <div class="team-card">
                    <img src="web-assets/images/teams/team3.jpg" class="team1 team-hover3" alt="team">
                    <div class="content">
                        <p class="h5 mob-page-sub-title">Matthew Saucedo</p>
                        <p>Web Designer</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-cue="slideInUp">
                <div class="team-card">
                    <img src="web-assets/images/teams/team4.jpg" class="team1 team-hover4" alt="team">
                    <div class="content">
                        <p class="h5 mob-page-sub-title">Johnnie Rauscher</p>
                        <p>Developer</p>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-conent p-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="web-assets/images/teams/team1.jpg" alt="" class="img-fluid">
                                    <p class="h6 mt-2">Lorem, ipsum.</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="h4">Lorem ipsum dolor sit amet.</p>
                                    <p class="text-justify text-dark">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia ex ipsam aut voluptate vitae nobis eius natus nesciunt odit dicta iusto quibusdam quisquam eligendi animi corporis quis obcaecati doloremque corrupti dolore, eveniet illum! Provident totam quibusdam aut, quos consequuntur est necessitatibus dolorum temporibus recusandae blanditiis ea tenetur nisi officia voluptas?</p> </div>
                            </div>
                           
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Team Warp End -->

<!-- about_section Statement Warp Starts here -->
<!-- <div class="statement-warp pb-5 mt-md-5 mt-5 px-3 px-md-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="statement-image">
                    <img src="web-assets/images/heros/about3.jpg" class="about3" alt="about">
                </div>
            </div>
            <div class="col-lg-5">
                <div class="statement-content">
                    <h2 class="h3 mob-page-sub-title">Our Statement</h2>
                    <p class="text-justify">“Its innovative tools and customizable settings make it easy to adapt to your unique needs, so you can focus on what matters most. With EdTech Innovate, you'll be able to achieve your goals & maximize your potential, all while saving.”</p>
                    <p class="h5 mob-page-sub-title text-end">Akhilesh Semwal</p>
                    <p class="fw-bolder text-end">CEO</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="statement-warp pb-5 mt-md-3 mt-2 px-3 px-md-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="statement-image">
                    <img src="web-assets/images/heros/about3.jpg" class="about3" alt="about">
                </div>
            </div>
            <div class="col-lg-5">
                <div class="statement-content">
                    <h2 class="h3 mob-page-sub-title">Our Statement</h2>
                    <p class="text-justify">Muhammad Rashid is the Managing Director of Edtech Innovate Private Limited. Additionally, he is the Co-founder and Director of the Institute of Integrated Training and Studies in Delhi, as well as the Chairman and founder of the Principle Institute of Management and Technology. With a postgraduate degree in Education (M.A. Education), Mr. Rashid has successfully built his career in coaching and professional education over the last 14 years. His extensive experience in guiding students through the world of knowledge is one of the key strengths of Edtech Innovate Private Limited.</p>
                    <p class="h5 mob-page-sub-title text-end">Muhammad Rashid</p>
                    <p class="fw-bolder text-end">MD</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="statement-warp pb-5 mt-md-3 mt-2 px-3 px-md-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="statement-image">
                    <img src="web-assets/images/heros/about3.jpg" class="about3" alt="about">
                </div>
            </div>
            <div class="col-lg-5">
                <div class="statement-content">
                    <h2 class="h3 mob-page-sub-title">Our Statement</h2>
                    <p class="text-justify">“Its innovative tools and customizable settings make it easy to adapt to your unique needs, so you can focus on what matters most. With EdTech Innovate, you'll be able to achieve your goals & maximize your potential, all while saving.”</p>
                    <p class="h5 mob-page-sub-title text-end">Muhammad Rashid</p>
                    <p class="fw-bolder text-end">CEOO</p>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- about_section Statement Warp Ends here -->
<?php include('./panels/footer-top.php') ?>
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 3, // Display 4 slide items at a time
        spaceBetween: 10,
        infinite: true,
        // loop: true, // Enable infinite loop
        autoplay: {
            delay: 1000, // Adjust autoplay delay as needed
            disableOnInteraction: true, // Continue autoplay after user interaction
        },
        pagination: {
            clickable: true,
        },
        breakpoints: {
            480: {
                slidesPerView: 6,
                spaceBetween: 20
            }
        }
    });
</script>

<?php include('./panels/footer-bottom.php') ?>