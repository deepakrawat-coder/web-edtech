<?php include $_SERVER['DOCUMENT_ROOT'] . '/panels/header-top.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php'; ?>

<?php

$url = $_GET['url'];

//$url = isset($_GET['url']) ? $_GET['url'] : '';
$query = "
    SELECT blogs.*, blogsfaq.questions, blogsfaq.answers
    FROM blogs
    LEFT JOIN blogsfaq ON blogs.ID = blogsfaq.blog_id
    WHERE blogs.Slug = '$url'
";
$blogs = $conn->query($query);
$blog_details = $blogs->fetch_assoc();
?>



<title><?php echo $blog_details['Meta_Title']; ?></title>
<meta name="description" content="<?php echo $blog_details['Meta_Description']; ?>">
<meta name="keywords" content="<?php echo $blog_details['Meta_Key']; ?>">
<meta property="og:title" content="<?php echo $blog_details['Meta_Title']; ?>" />
<meta property="og:description" content="<?php echo $blog_details['Meta_Description']; ?>" />
<?php include $_SERVER['DOCUMENT_ROOT'] . '/panels/header-bottom.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/panels/menu.php'; ?>



<!-- About Hero Warp Start -->
<div class="inner-hero-warp inner-hero-warps bg-dark">
    <div class="container">
        <div class="inner-hero-content">
            <h1 class="title-breadcrumb mob-page-sub-title text-white"><?= $blog_details['Name'] ?></h1>
            <p class="fw-normal align-text-web text-white">

            </p>
        </div>
    </div>
</div>
<!-- About Hero Warp End -->

<!-- Blog Details Warp Start -->
<div class="blog-details-warp pt-md-3 pb-md-5">
    <div class="container">
        <div class="row mt-3 mt-md-0 px-3 px-md-0">
            <div class="col-lg-8">
                <div class="blog-big-details">
                    <div class="image">

                        <img src="/admin/<?= $blog_details['Photo'] ?>" alt="blog-img" class="img-fluid">

                    </div>
                    <div class="content ck-content">
                        <ul class="blog-list">

                        </ul>
                        <!-- <h2 class="fs-4"><?= $blog_details['Name'] ?></h2> -->
                        <p class="align-text-web blog-p">
                            <?= $blog_details['Content'] ?>
                        </p>


                    </div>


                </div>
                <!-- FAQ section -->
                <!-- <div class="container-faq mt-3 mt-md-4">
                    <div class="row">
                        <div class="col">
                            <h2 class="fs-4 mb-3">FAQs</h2>
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h3 class="accordion-header">
                                        <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            What are the main benefits of CRM?
                                        </button>
                                    </h3>
                                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            There are multiple benefits of using CRM software. Some of these benefits include Customer Service and Retention, Increased Sales, Analytics, Higher Productivity, New lead generation, Better Marketing, Improved Communication, and Increased Profitability.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="container-faq mt-3 mt-md-4">
                    <div class="row">
                        <div class="col">
                            <h2 class="fs-4 mb-3">FAQs</h2>
                            <div class="accordion ck-content" id="accordionExample">
                                <?php
                                $counter = 1; // Initialize a counter
                                foreach ($blogs as $faq) :
                                ?>
                                    <div class="accordion-item">
                                        <h3 class="accordion-header">
                                            <button class="accordion-button <?= $counter === 1 ? 'fw-semibold' : 'collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $counter ?>" aria-expanded="<?= $counter === 1 ? 'true' : 'false' ?>" aria-controls="collapse<?= $counter ?>">
                                                <?= $faq['questions'] ?>
                                            </button>
                                        </h3>
                                        <div id="collapse<?= $counter ?>" class="accordion-collapse collapse <?= $counter === 1 ? 'show' : '' ?>" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <?= $faq['answers'] ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    $counter++; // Increment the counter
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Popular blogs -->


            <?php
            $popularBlogs = [];
            $popularBlogsQuery = $conn->query("SELECT * FROM blogs WHERE Status = 1 ORDER BY ID DESC ");
            while ($popularBlog = $popularBlogsQuery->fetch_assoc()) {
                $popularBlogs[] = $popularBlog;
            }
            ?>
            <div class="col-lg-4 mb-5 mb-md-0">
                <div class="blog-small-details sticy-blog">

                    <!-- <div class="input-box">
                        <form>
                            <input type="text" class="form-control" placeholder="Search">
                            <button class="icon"><i class="ri-search-line"></i></button>
                        </form>
                    </div> -->

                    <div class="all-box post-box" style="height: 500px; overflow: auto;">
                        <h5>Popular Post</h5>
                        <?php foreach ($popularBlogs as $popularBlog) : ?>
                            <div class="blog-post d-flex">
                                <a class="thumb" href="/blog-details?url=<?= $popularBlog['Slug'] ?>">
                                    <img src="/admin/<?php echo $popularBlog['Photo']; ?>" class="img-fluid" alt="Popular blog photo">
                                </a>
                                <div class="post-content">
                                    <p class="h6">
                                        <a href="/blog-details?url=<?= $popularBlog['Slug'] ?>" class="text-dark"><?php echo substr($popularBlog['Name'], 0, 20); ?>...</a>
                                    </p>
                                    <a href="/blog-details?url=<?= $popularBlog['Slug'] ?>"><span class="text-dark"><?php echo date("F j, Y", strtotime($popularBlog['Created_At'])); ?></span>
                                        <div class="sub-content">
                                            <p class="text-dark"><?php echo substr($popularBlog['Description'], 0, 20); ?>...</p>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <!-- <div class="blog-post d-flex">
                                <a class="thumb" href="top-reasons-to-use-online-examination-system-for-institutes-and-universities.php">
                                    <img src="web-assets/images/main/blogs/Online Examination System is a software (1).jpg" class="img-fluid" alt="top-reasons-to-use-online-examination-system-for-institutes-and-universities">
                                </a>
                                <div class="post-content">
                                    <p class="h6">
                                        <a href="top-reasons-to-use-online-examination-system-for-institutes-and-universities.php" class="text-dark">Top 10 Reasons ...</a>
                                    </p>
                                    <a href="top-reasons-to-use-online-examination-system-for-institutes-and-universities.php"><span class="text-dark">May 04, 2024</span>
                                        <div class="sub-content">
                                            <p class="text-dark">There has been a ...</p>
                                        </div>
                                    </a>
                                </div>
                            </div> -->

                            <!-- <div class="blog-post d-flex">
                                <a class="thumb" href="customer-relationship-management-crm-examples.php">
                                    <img src="web-assets/images/main/blogs/8 Unforgettable CRM Examples (1).jpg" class="img-fluid" alt="Don't Just Manage, Win Customers: 8 Unforgettable CRM Examples">
                                </a>
                                <div class="post-content">
                                    <p class="h6">
                                        <a href="customer-relationship-management-crm-examples.php" class="text-dark">8 Unforgettable CRM...</a>
                                    </p>
                                    <a href="customer-relationship-management-crm-examples.php"><span class="text-dark">May 02, 2024</span>
                                        <div class="sub-content">
                                            <p class="text-dark">If you are searching...</p>
                                        </div>
                                    </a>
                                </div>
                            </div> -->

                            <!-- <div class="blog-post d-flex">
                                <a class="thumb" href="types-of-learning-management-systems.php">
                                    <img src="web-assets/images/main/blogs/types-of-learning-management-systems.jpg" class="img-fluid" alt="Types of Learning Management Systems">
                                </a>
                                <div class="post-content">
                                    <p class="h6">
                                        <a href="types-of-learning-management-systems.php" class="text-dark">Types of LMS ...</a>
                                    </p>
                                    <a href="types-of-learning-management-systems.php"><span class="text-dark">May 01, 2024</span>
                                        <div class="sub-content">
                                            <p class="text-dark">If you are searching...</p>
                                        </div>
                                    </a>
                                </div>
                            </div> -->

                            <!-- <div class="blog-post d-flex">
                                <a class="thumb" href="choose-the-right-lms-platform.php">
                                    <img src="web-assets/images/main/blogs/blog-5_730x487.webp" class="img-fluid" alt="Reasons Why Colleges Need Admission Software">
                                </a>
                                <div class="post-content">
                                    <p class="h6">
                                        <a href="choose-the-right-lms-platform.php" class="text-dark">The Future of Learning...</a>
                                    </p>
                                    <a href="choose-the-right-lms-platform.php"><span class="text-dark">April 24, 2024</span>
                                        <div class="sub-content">
                                            <p class="text-dark">We can see that...</p>
                                        </div>
                                    </a>
                                </div>
                            </div> -->

                            <!-- <div class="blog-post d-flex">
                                <a class="thumb" href="why-colleges-need-admissions-management-software.php">
                                    <img src="web-assets/images/main/blogs/blog-4.jpg" class="img-fluid" alt="Reasons Why Colleges Need Admission Software">
                                </a>
                                <div class="post-content">
                                    <p class="h6">
                                        <a href="why-colleges-need-admissions-management-software.php" class="text-dark">10 Reasons Why ...
                                        </a>
                                    </p>
                                    <a href="why-colleges-need-admissions-management-software.php"> <span class="text-dark">April 22, 2024</span>
                                        <div class="sub-content">
                                            <p class="text-dark">One of the key tasks of...</p>
                                        </div>
                                    </a>
                                </div>
                            </div> -->
                            <!-- <div class="blog-post d-flex">
                                <a class="thumb" href="difference-between-erp-and-ams.php">
                                    <span class="full-image cover bg-1"></span>
                                </a>
                                <div class="post-content">
                                    <p class="h6">
                                        <a href="difference-between-erp-and-ams.php" class="text-dark">Difference between ERP and AMS ...
                                        </a>
                                    </p>
                                    <a href="difference-between-erp-and-ams.php"> <span class="text-dark">October 29, 2023</span>
                                        <div class="sub-content">
                                            <p class="text-dark">In this blog, we ...</p>
                                        </div>
                                    </a>
                                </div>
                            </div> -->
                            <!-- <div class="blog-post d-flex">
                                <a class="thumb" href="university-management-softwares.php">
                                    <span class="full-image cover bg-2"></span>
                                </a>
                                <div class="post-content">
                                    <p class="h6">
                                        <a href="university-management-softwares.php" class="text-dark">Future of University Software ...</a>
                                    </p>
                                    <a href="university-management-softwares.php"> <span class="text-dark">October 20, 2023</span>
                                        <div class="sub-content">
                                            <p class="text-dark">Within an educational ...</p>
                                        </div>
                                    </a>
                                </div>
                            </div> -->
                            <!-- <div class="blog-post d-flex">
                                <a class="thumb" href="grow-university-through-admissions-management-software.php">
                                    <span class="full-image cover bg-3"></span>
                                </a>
                                <div class="post-content">
                                    <p class="h6">
                                        <a href="grow-university-through-admissions-management-software.php" class="text-dark">Growth of Universities ...
                                        </a>
                                    </p>
                                    <a href="grow-university-through-admissions-management-software.php"> <span class="text-dark">October 19, 2023</span>
                                        <div class="sub-content">
                                            <p class="text-dark">An automated Admission ...</p>
                                        </div>
                                    </a>
                                </div>
                            </div> -->

                            <!-- <div class="blog-post d-flex last-blog">
                            <a class="thumb" href="difference-between-erp-and-ams.php">
                                <span class="full-image cover bg-4"></span>
                            </a>
                            <div class="post-content">
                                <p class="h6">
                                    <a href="difference-between-erp-and-ams.php" class="text-dark">Apps come under various segments</a>
                                </p>
                                <a href="difference-between-erp-and-ams.php"> <span class="text-dark">October 19, 2023</span>
                                    <div class="sub-content">
                                        <p class="text-dark">Lorem ipsum dolor sit amet.</p>
                                    </div>
                                </a>
                            </div>
                        </div> -->
                        <?php endforeach; ?>
                    </div>

                    <!-- <div class="all-box categories">
                        <h5>Categories</h5>
                        <ul>
                            <li>
                                <a href="#">Web Design</a>
                            </li>
                            <li>
                                <a href="#">Web Development</a>
                            </li>
                            <li>
                                <a href="#">App Development</a>
                            </li>
                            <li>
                                <a href="#">UI/UX Design</a>
                            </li>
                            <li>
                                <a href="#">WordPress</a>
                            </li>
                        </ul>
                    </div> -->

                    <!-- <div class="all-box tags">
                        <h5>Related Tags</h5>
                        <a href="#">#Design</a>
                        <a href="#">#Development</a>
                        <a href="#">#Development</a>
                        <a href="#">#SaaS</a>
                        <a href="#">#Apps</a>
                        <a href="#">#Business</a>
                    </div> -->

                </div>
            </div>
        </div>
    </div>
    <!-- Blog Details Warp End -->
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/panels/footer-top.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/panels/footer-bottom.php'; ?>