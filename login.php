<?php include('./panels/header-top.php') ?>
<title>Login | Edtech Innovate Pvt Ltd</title>
<meta name='description' content='Users can log in to their accounts by entering email address and password. In case users forget their password, they can click on the Forget Password option.'>
<meta property="og:title" content="Login | Edtech Innovate Pvt Ltd" />
<meta property="og:description" content="" />
<?php include('./panels/header-bottom.php') ?>
<?php include('./panels/menu.php') ?>


<div class="about-hero-warp px-3 px-md-0">
    <div class="container">
        <div class="about-hero-content">
            <h1 class="title-breadcrumb mob-page-sub-title text-white">Login</h1>
        </div>
    </div>
</div>

<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img src="web-assets/images/main/logo-menu.jpg" style="width: 185px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">We are EdTech Innovate</h4>
                                </div>

                                <form>
                                    <p class="fw-bolder">Please login to your account</p>

                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Email address</label>
                                    </div>

                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                        <label for="floatingPassword">Password</label>
                                    </div>

                                    <div class="text-center pt-1 mt-3 mb-5 pb-1">
                                        <div>
                                            <button class="btn btn-primary btn-block fw-semibold w-100 py-3 fa-lg mb-3" type="button">Log
                                                in</button>
                                        </div>
                                        <a class="text-muted" href="#">Forgot password?</a>
                                    </div>

                                    <!-- <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">Don't have an account?</p>
                                        <button type="button" class="btn btn-outline-danger">Create new</button>
                                    </div> -->

                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4 ">About Us</h4>
                                <p class="small mb-0 text-justify">EdTech Innovate is a product-based Software-as-a-Service (SaaS) company that specializes in providing an innovative digital platform to various universities and aspiring students to connect and facilitate seamless operations, from marketing to admissions, and enhancing the overall educational experience for students at every stage through innovative technological solutions.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('./panels/footer-top.php') ?>
<?php include('./panels/footer-bottom.php') ?>