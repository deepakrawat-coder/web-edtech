
<?php include('./panels/header-top.php') ?>
<?php require 'admin/includes/db-config.php'; ?>

<?php
$serveData = [];
$services = $conn->query("SELECT * FROM who_we_serve WHERE status = 1 ORDER BY id asc");
while ($serve = $services->fetch_assoc()) {
    $serveData[] = $serve;
}
?>

<title>Who We Serve | Edtech Innovate Pvt Ltd</title>
<meta name='description' content='Edtech Innovate empowers its business associates with cutting-edge technology solutions that are designed according to their unique needs and requirements.'>
<meta property="og:title" content="Who We Serve | Edtech Innovate Pvt Ltd" />
<meta property="og:description" content="" />
<?php include('./panels/header-bottom.php') ?>
<?php include('./panels/menu.php') ?>



<section>
    <div class="about-hero-warp px-3 px-md-0">
        <div class="container">
            <div class="about-hero-content">
                <h1 class="title-breadcrumb mob-page-sub-title text-white">Who We Serve</h1>
            </div>
        </div>
    </div>
</section>

<!-- <div class="container my-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Who We Serve</li>
        </ol>
    </nav>
</div> -->

<section>
    <div class="container my-5">
        <div class="who-we-serve">

            <h2 class="mb-3">Providing Tech Solutions for Business Associates</h2>
            <p class="text-justify">We are committed to empowering our Business Associates with cutting-edge technology solutions tailored to their unique needs and requirements. Our mission is to provide innovative technological solutions that support our Business Associates at every step along their journey. From streamlining operations to enhancing productivity and driving growth, we offer a comprehensive suite of advanced software solutions designed to optimize business performance and fuel success. With our expertise and dedication to excellence, we are here to partner with you in utilizing the power of technology to unlock new opportunities and achieve your business objectives.
            </p>

            <hr class="text-primary border border-2 border-primary">

            <!-- <div class="row my-2 my-md-4 py-1 py-md-4">
                <div class="col-md-9 order-2 order-md-1">
                    <h3>IITS</h3>
                    <p class="text-justify mb-4">IITS works with 78 educational institutions and 17 Indian universities. As the country's biggest EduTech company, IITS overseas the University's web portals to communicate between academic institutions and students.</p>
                    <a href="https://iitseducation.in/" target="_blank" class="fw-bolder py-2 px-5 border rounded-5 border-primary">Visit <i class="fa-solid fa-arrow-right ps-2"></i></a>
                </div>
                <div class="col-md-3 order-1 order-md-2 text-center pb-3">
                    <img src="./web-assets/images/who-we-serve/iits-logo.png" class="img-fluid" alt="client-img" style="padding-top: 30px;">
                </div>
            </div>

            <hr class="text-danger border border-2 border-danger"> -->

            <?php foreach ($serveData as $serve): ?>
                <div class="row my-2 my-md-4 py-1 py-md-4">
                    <div class="col-md-9 order-2 order-md-1">
                        <h3><?php echo $serve['client_name']; ?></h3>
                        <p class="text-justify mb-4"><?php echo $serve['description']; ?></p>
                        <a href="<?php echo $serve['link_url']; ?>" target="_blank" class="fw-bolder py-2 px-5 border rounded-5 border-primary">Visit <i class="fa-solid fa-arrow-right ps-2"></i></a>
                    </div>
                    <div class="col-md-3 order-1 order-md-2 text-center pb-3">
                        <img src="./admin/<?php echo $serve['photo']; ?>" class="img-fluid" alt="client-img" style= "padding-top: 30px;">
                    </div>
                </div>
                <hr class="text-danger border border-2 border-danger">
            <?php endforeach; ?>

            <!-- <div class="row my-2 my-md-4 py-1 py-md-4">
                <div class="col-md-9 order-2 order-md-1">
                    <h3>Jamia Urdu Aligarh</h3>
                    <p class="text-justify mb-4">Jamia Urdu Aligarh is a prominent institution known for distance education in our country. The institution is known for its commendable work in the promotion of the Urdu language as well as offering quality school education.</p>
                    <a href="https://juaonline.in/" target="_blank" class="fw-bolder py-2 px-5 border rounded-5 border-primary">Visit <i class="fa-solid fa-arrow-right ps-2"></i></a>
                </div>
                <div class="col-md-3 order-1 order-md-2 text-center pb-3">
                    <img src="./web-assets/images/who-we-serve/jua-logo.png" class="img-fluid" alt="client-img" style="padding-top: 30px;">
                </div>
            </div>

            <hr class="text-danger border border-2 border-danger">

            <div class="row my-2 my-md-4 py-1 py-md-4">
                <div class="col-md-9 order-2 order-md-1">
                    <h3>Glocal School of Vocational Studies/Glocal University</h3>
                    <p class="text-justify mb-4">Glocal School of Vocational Studies provides various UGC-certified, flexible, and affordable vocational training and skill development courses to enhance the employability and entrepreneurship skills of the students.</p>
                    <a href="https://vocational.glocaluniversity.edu.in/" target="_blank" class="fw-bolder py-2 px-5 border rounded-5 border-primary">Visit <i class="fa-solid fa-arrow-right ps-2"></i></a>
                </div>
                <div class="col-md-3 order-1 order-md-2 text-center pb-3">
                    <img src="./web-assets/images/who-we-serve/glocal.webp" class="img-fluid" alt="client-img" style="padding-top: 30px;">
                </div>
            </div>

            <hr class="text-danger border border-2 border-danger">

            <div class="row my-2 my-md-4 py-1 py-md-4">
                <div class="col-md-9 order-2 order-md-1">
                    <h3>Om Sterling Global University (OSGU)</h3>
                    <p class="text-justify mb-4">Om Sterling Global University is a Hisar, Haryana-based university that offers various courses at undergraduate and postgraduate levels, including vocational training and skill development programs. All these courses are UGC-approved.</p>
                    <a href="https://bvoc.osgu.co.in/" target="_blank" class="fw-bolder py-2 px-5 border rounded-5 border-primary">Visit <i class="fa-solid fa-arrow-right ps-2"></i></a>
                </div>
                <div class="col-md-3 order-1 order-md-2 text-center pb-3">
                    <img src="./web-assets/images/who-we-serve/osgu-logo.webp" class="img-fluid" alt="client-img" style="padding-top: 30px; ">
                </div>
            </div>

            <hr class="text-danger border border-2 border-danger">

            <div class="row my-2 my-md-4 py-1 py-md-4">
                <div class="col-md-9 order-2 order-md-1">
                    <h3>Shri Venkateshwara University (SVU)</h3>
                    <p class="text-justify mb-4">Shri Venkateshwara University (SVU) is a private university located in Gajraula, Uttar Pradesh that was established as a venture of the Venkateshwara Group of Institutions. SVU offers various courses at undergraduate and postgraduate levels, including vocational programs.</p>
                    <a href="#" class="fw-bolder py-2 px-5 border rounded-5 border-primary">Visit <i class="fa-solid fa-arrow-right ps-2"></i></a>
                </div>
                <div class="col-md-3 order-1 order-md-2 text-center pb-3">
                    <img src="./web-assets/images/who-we-serve/svu.jpg" class="img-fluid" alt="client-img" style="padding-top: 30px;">
                </div>
            </div>

            <hr class="text-danger border border-2 border-danger">

            <div class="row my-2 my-md-4 py-1 py-md-4">
                <div class="col-md-9 order-2 order-md-1">
                    <h3>Swayam Vidya</h3>
                    <p class="text-justify mb-4">SvyamVidya deals in the B2B segment by partnering with various renowned universities and other institutions such as schools and coaching centers to facilitate student admissions to university courses and assist in every step involved in the process.</p>
                    <a href="#" class="fw-bolder py-2 px-5 border rounded-5 border-primary">Visit <i class="fa-solid fa-arrow-right ps-2"></i></a>
                </div>
                <div class="col-md-3 order-1 order-md-2 text-center pb-3">
                    <img src="./web-assets/images/who-we-serve/swayam.png" class="img-fluid" alt="client-img" style="padding-top: 30px;">
                </div>
            </div>

            <hr class="text-danger border border-2 border-danger">

            <div class="row my-2 my-md-4 py-1 py-md-4">
                <div class="col-md-9 order-2 order-md-1">
                    <h3>Principle Institute of Management</h3>
                    <p class="text-justify mb-4">Principle Institute of Management is a renowned institution located in Calicut exclusively to support students to complete their courses via credit transfer in a time-bound and hassle-free manner.</p>
                    <a href="https://principleinstitution.com/" target="_blank" class="fw-bolder py-2 px-5 border rounded-5 border-primary">Visit <i class="fa-solid fa-arrow-right ps-2"></i></a>
                </div>
                <div class="col-md-3 order-1 order-md-2 text-center pb-3">
                    <img src="./web-assets/images/who-we-serve/pimt-min.png" class="ms-md-3" alt="client-img" style="width: 200px; height: 180px; border-radius: 50%;">
                </div>
            </div>

            <hr class="text-danger border border-2 border-danger">

            <div class="row my-2 my-md-4 py-1 py-md-4">
                <div class="col-md-9 order-2 order-md-1">
                    <h3>Brilliance Attestation</h3>
                    <p class="text-justify mb-4">Brilliance Attestation provides Certificate attestation services on educational, non-educational, and commercial documents in a secure and trustworthy manner. In addition, the organization provides other services such as document translation, notarization, and embassy legalization.</p>
                    <a href="https://theattestation.in/" target="_blank" class="fw-bolder py-2 px-5 border rounded-5 border-primary">Visit <i class="fa-solid fa-arrow-right ps-2"></i></a>
                </div>
                <div class="col-md-3 order-1 order-md-2 text-center pb-3">
                    <img src="./web-assets/images/who-we-serve/ba.webp" class="ms-md-3" alt="client-img" style="width: 200px; height: 180px; border-radius: 50%;">
                </div>
            </div>

            <hr class="text-danger border border-2 border-danger">

            <div class="row my-2 my-md-4 py-1 py-md-4">
                <div class="col-md-9 order-2 order-md-1">
                    <h3>CCVTE</h3>
                    <p class="text-justify mb-4">The Centre Council for Vocational Training and Skill Education (CCVTE) offers multiple skill development courses in various domains to provide the best opportunities for the public to improve their skills.</p>
                    <a href="https://ccvte.org/" target="_blank" class="fw-bolder py-2 px-5 border rounded-5 border-primary">Visit <i class="fa-solid fa-arrow-right ps-2"></i></a>
                </div>
                <div class="col-md-3 order-1 order-md-2 text-center pb-3">
                    <img src="./web-assets/images/who-we-serve/logo-ccvte (1).png" class="img-fluid" alt="client-img" style="padding-top: 30px;">
                </div>
            </div> -->
        </div>
    </div>
</section>

<?php include('./panels/footer-top.php') ?>
<?php include('./panels/footer-bottom.php') ?>