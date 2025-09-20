<?php include('./panels/header-top.php'); ?>
<?php require 'admin/includes/db-config.php'; ?>

<?php
// fetch gallery with gallery images 
$galleryImagesQuery = $conn->query("
SELECT gallery.*, gallery_image.image_url
FROM gallery
LEFT JOIN gallery_image ON gallery.id = gallery_image.gallery_id;
");
?>
<?php
// Fetch video 
$videosQuery = $conn->query("SELECT * FROM gallery_video WHERE status = 1");
$videos = [];
while ($video = $videosQuery->fetch_assoc()) {
    $videos[$video['position']] = $video['video_link'];
}
?>

<title>Gallery | Edtech Innovate Pvt Ltd</title>
<meta name='description' content=''>
<meta property="og:title" content="Vision, Mission & Core Values | Edtech Innovate Pvt Ltd" />
<meta property="og:description" content="" />
<style>
    .container .title {
        color: #1a1a1a;
        text-align: center;
        margin-bottom: 10px;
    }

    .content {
        position: relative;
        width: 90%;
        max-width: 400px;
        margin: auto;
        overflow: hidden;
    }

    .content .content-overlay {
        background: rgba(0, 0, 0, 0.7);
        position: absolute;
        height: 99%;
        width: 100%;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        opacity: 0;
        -webkit-transition: all 0.4s ease-in-out 0s;
        -moz-transition: all 0.4s ease-in-out 0s;
        transition: all 0.4s ease-in-out 0s;
    }

    .content:hover .content-overlay {
        opacity: 1;
    }

    .content-image {
        width: 100%;
    }

    .content-details {
        position: absolute;
        text-align: center;
        padding-left: 1em;
        padding-right: 1em;
        width: 100%;
        top: 50%;
        left: 50%;
        opacity: 0;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        -webkit-transition: all 0.3s ease-in-out 0s;
        -moz-transition: all 0.3s ease-in-out 0s;
        transition: all 0.3s ease-in-out 0s;
    }

    .content:hover .content-details {
        top: 50%;
        left: 50%;
        opacity: 1;
    }

    .content-details h3 {
        color: #fff;
        font-weight: 500;
        letter-spacing: 0.15em;
        margin-bottom: 0.5em;
        text-transform: uppercase;
    }

    .content-details p {
        color: #fff;
        font-size: 0.8em;
    }

    .fadeIn-bottom {
        top: 80%;
    }

    .fadeIn-top {
        top: 20%;
    }

    .fadeIn-left {
        left: 20%;
    }

    .fadeIn-right {
        left: 80%;
    }

    .about-hero-content p {
        color: white;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

<?php include('./panels/header-bottom.php'); ?>
<?php include('./panels/menu.php'); ?>

<section>
    <div class="about-hero-warp px-3 px-md-0">
        <div class="container">
            <div class="about-hero-content">
                <h1 class="title-breadcrumb text-dark text-center text-white">Gallery</h1>
            </div>
        </div>
    </div>
</section>

<section class="gallery-sec">
    <div class="container-fluid">
        <div class="img-gallery-magnific">
            <div class="text-center p-3">
                <!-- <div class="row">
                    <div class="col-md-9 mb-4 mb-lg-0">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/PzvgR4mc588?si=w3vwRoA00UfHnetS" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="col-md-3">
                        <iframe width="100%" height="450" src="https://www.youtube.com/embed/Q4biEkg7wr4?si=TqfWwhN4QQDt-Way" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div> -->
                <div class="row">
                    <?php if (isset($videos['left'])) : ?>
                        <div class="col-md-9 mb-4 mb-lg-0">
                            <iframe width="100%" height="100%" src="<?php echo $videos['left']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($videos['right'])) : ?>
                        <div class="col-md-3">
                            <iframe width="100%" height="450" src="<?php echo $videos['right']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    <?php endif; ?>
                </div>

                
                <div class="row justify-content-center mt-5">
                    <?php while ($gallery = $galleryImagesQuery->fetch_assoc()) { ?>
                        <div class="col-md-4 mt-2 mb-2">
                            <div class="card gallery-page__single" data-tgt="gallery-<?php echo $gallery['id']; ?>">
                                <img src="./admin/<?php echo $gallery['image_link']; ?>" alt="" class="card-img-top" loading="lazy">
                                <div class="gallery-page__icon">
                                    <a href="#gallery-<?php echo $gallery['id']; ?>"></a>
                                </div>
                            </div>
                            <h3 class="mb-0 text-center text-dark fw-bolder fs-6 pt-2"><?php echo $gallery['image_name']; ?></h3>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <?php $galleryImagesQuery->data_seek(0); ?>
            <?php while ($gallery = $galleryImagesQuery->fetch_assoc()) { ?>
                <div id="gallery-<?php echo $gallery['id']; ?>" class="hidden">
                    <?php
                    $imageUrls = explode(', ', $gallery['image_url']);
                    foreach ($imageUrls as $imageUrl) {
                    ?>
                        <a href="./admin/<?php echo $imageUrl; ?>"></a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
    </div>
</section>

<?php include('./panels/footer-top.php'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script>
    $(document).ready(function() {
        $('.gallery-page__single').on('click', function(event) {
            event.preventDefault();
            var gallery = '#' + $(this).attr('data-tgt');
            $(gallery).magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: {
                    enabled: true
                }
            }).magnificPopup('open');
        });
    });
</script>
<?php include('./panels/footer-bottom.php'); ?>