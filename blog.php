<?php
include './panels/header-top.php';
require 'admin/includes/db-config.php';

// fetch one blog
$latestBlog = $conn->query("SELECT * FROM blogs WHERE Status = 1 ORDER BY Created_At DESC LIMIT 1")->fetch_assoc();
//print_r($latestBlog);
//exit();

// Fetch  two side blog 
$blogData = [];
$blogs = $conn->query("SELECT * FROM blogs WHERE Status = 1 ORDER BY ID  LIMIT 2");
while ($blog = $blogs->fetch_assoc()) {
    $blogData[] = $blog;
}

// Fetch the three blog
$recentBlogs = [];
$recentBlogsQuery = $conn->query("SELECT * FROM blogs WHERE Status = 1 ORDER BY ID DESC LIMIT 3");
while ($recentBlog = $recentBlogsQuery->fetch_assoc()) {
    $recentBlogs[] = $recentBlog;
}
?>

<title>Blog | Edtech Innovate Pvt Ltd</title>
<meta name="description" content="">
<meta property="og:title" content="Blog | Edtech Innovate Pvt Ltd" />
<meta property="og:description" content="" />
<?php include './panels/header-bottom.php'; ?>
<?php include './panels/menu.php'; ?>

<div class="about-hero-warp px-3 px-md-0">
    <div class="container">
        <div class="about-hero-content">
            <h1 class="text-dark text-center text-white fs-2">EdTech Blogs</h1>
        </div>
    </div>
</div>

<!-- Blog Warp Start -->
<div class="blog-warp py-3 py-md-5 px-3 px-md-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-big-widget">
                    <div class="image">
                        <a href="/blog-details?url=<?php echo($latestBlog['Slug']) ?>">
                            <img src="/admin/<?php echo $latestBlog['Photo']; ?>" class="img-fluid" alt="hero" loading="lazy">
                        </a>
                    </div>
                    <div class="content">
                        <a href="/blog-details?url=<?= $latestBlog['Slug'] ?>">
                            <ul class="blog-list">
                                <li><?php echo date("F j, Y", strtotime($latestBlog['Created_At'])); ?></li>
                            </ul>
                            <p class="h5 mob-page-sub-title"><?php echo $latestBlog['Name']; ?></p>
                        </a>
                        <p class="align-text-web"><?php echo substr($latestBlog['Description'], 0, 200); ?>...</p>
                        <a href="/blog-details?url=<?= $latestBlog['Slug'] ?>" class="read-more read-text-class">Read Blog Post</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 rounded-3" style="background-color: antiquewhite;">
                <?php foreach ($blogData as $blog) : ?>
                    <div class="blog-small-widget">
                        <div class="image pt-3">
                            <a href="blog-details?url=<?= $blog['Slug'] ?>">
                                <img src="./admin/<?php echo $blog['Photo']; ?>" class="img-fluid" alt="hero" loading="lazy">
                            </a>
                        </div>
                        <div class="content">
                            <a href="blog-details?url=<?= $blog['Slug'] ?>">
                                <ul class="blog-list">
                                    <li><?php echo date("F j, Y", strtotime($blog['Created_At'])); ?></li>
                                </ul>
                                <p class="h5 mob-page-sub-title"><?php echo $blog['Name']; ?></p>
                            </a>
                            <a href="blog-details?url=<?= $blog['Slug'] ?>" class="read-more  read-text-class">Read Blog Post</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- Blog Warp End -->

<!-- Blog Recent Warp Start -->
<div class="blog-recent-warp px-3 px-md-0">
    <div class="container">
        <div class="inner-recent-blog pt-5 pb-5">
            <div class="single-section">
                <p class="h5 text-primary mob-page-sub-title">Our Recent Blogs</p>
            </div>
            <div class="row align-items-center justify-content-center">
                <?php foreach ($recentBlogs as $recentBlog) : ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="blog-small-widget">
                            <div class="image">
                                <a href="blog-details?url=<?= $recentBlog['Slug']; ?>">
                                    <img src="./admin/<?= $recentBlog['Photo']; ?>" class="img-fluid" alt="hero" loading="lazy">
                                </a>
                            </div>
                            <div class="content">
                                <a href="blog-details?url=<?= $recentBlog['Slug']; ?>">
                                    <ul class="blog-list">
                                        <li><?php echo date("F j, Y", strtotime($recentBlog['Created_At'])); ?></li>
                                    </ul>
                                    <p class="h5  mob-page-sub-title"><?= $recentBlog['Name']; ?></p>
                                </a>
                                <a href="blog-details?url=<?= $recentBlog['Slug']; ?>" class="read-more  read-text-class">Read Blog Post</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- Blog Recent Warp End -->

<?php include './panels/footer-top.php'; ?>
<?php include './panels/footer-bottom.php'; ?>
