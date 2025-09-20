<?php
include('./panels/header-top.php');
require 'admin/includes/db-config.php';
?>


<title>Careers | Edtech Innovate Pvt Ltd</title>
<meta name='description' content='Explore various career opportunities and join Edtech Innovate’s dynamic community that works to revolutionize the way education is delivered.'>
<meta property="og:title" content="Careers | Edtech Innovate Pvt Ltd" />
<meta property="og:description" content="Explore various career opportunities and join Edtech Innovate’s dynamic community that works to revolutionize the way education is delivered." />
<?php include('./panels/header-bottom.php'); ?>

<?php include('./panels/menu.php'); ?>

<!-- careers page header starts here -->
<section>
    <div class="about-hero-warp px-3 px-md-0">
        <div class="container">
            <div class="about-hero-content">
                <h1 class="title-breadcrumb mob-page-sub-title text-white">Careers</h1>
            </div>
        </div>
    </div>
</section>
<!-- careers page header ends here -->

<!-- careers page main content ends here -->
<section>
    <div class="container my-3 my-md-5">
        <div class="row">
            <div class="col-md-7 order-2 order-md-1">
                <div class="carrers-page mb-4">
                    <h2 class="pt-4">Join Our Team!</h2>
                    <p class="text-justify pt-2">We, at Edtech Innovate, are committed to building advanced technological products and services tailored to the needs of our partnered institutions. Our team comprises highly qualified and experienced professionals and experts in web development, digital marketing, creative writing, business operations, graphics & animation, and other domains.</p>
                    <p class="text-justify mb-4">If you are confident that you possess the skills and motivation to work with our team and contribute to the development of Education Technology in our country, then you can apply at Edtech Innovate to work with us.</p>
                    <a href="#job-openings" class="fw-bolder py-2 px-4 border rounded-5 border-primary">View Openings <i class="fa-solid fa-arrow-right ps-2"></i></a>
                </div>
            </div>

            <!-- right side careers image starts here -->
            <div class="col-md-5 order-1 order-md-2">
                <img src="./web-assets/images/careers-img.avif" alt="careers-image">
            </div>
            <!-- right side careers image ends here -->
        </div>
    </div>
</section>
<!-- careers page main content ends here -->

<section id="job-openings">
    <div class="container mb-4">
        <div class="career-header text-center pt-3 pb-2">
            <!-- <h5 class="text-success">We're Hiring</h5>
            <h3>Career Opportunities</h3> -->
        </div>
        <div class="row">
            <div class="col">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php
                    // Fetch job categories from the database with a join to fetch associated jobs count
                    $categoryQuery = "SELECT job_categories.id, job_categories.name, COUNT(jobs.id) AS job_count
                      FROM job_categories 
                      LEFT JOIN jobs ON job_categories.id = jobs.category_id 
                      WHERE job_categories.status = 1 
                      GROUP BY job_categories.id 
                      ORDER BY job_categories.id ASC";
                    $categoryResult = $conn->query($categoryQuery);
                    $firstCategory = true;

                    while ($categoryRow = $categoryResult->fetch_assoc()) {
                        $categoryId = $categoryRow['id'];
                        $categoryName = $categoryRow['name'];
                        $jobCount = $categoryRow['job_count'];
                    ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?= $firstCategory ? 'active' : '' ?>" id="<?= $categoryName ?>-tab" data-bs-toggle="tab" data-bs-target="#<?= $categoryName ?>-tab-pane" type="button" role="tab" aria-controls="<?= $categoryName ?>-tab-pane" aria-selected="<?= $firstCategory ? 'true' : 'false' ?>">
                                <?= $categoryName ?> (<?= $jobCount ?>)
                            </button>
                        </li>
                    <?php
                        $firstCategory = false;
                    }
                    ?>
                </ul>


                <div class="tab-content mx-2" id="myTabContent">
                    <?php
                    // Reset the result pointer
                    $categoryResult->data_seek(0);

                    // Reset first category flag for the content
                    $firstCategory = true;

                    // Loop through job categories
                    while ($categoryRow = $categoryResult->fetch_assoc()) {
                        $categoryId = $categoryRow['id'];
                        $categoryName = $categoryRow['name'];

                        // Fetch job listings for the current category with a join to fetch category name
                        $jobQuery = "SELECT jobs.*, job_categories.name AS category_name 
                                    FROM jobs 
                                    JOIN job_categories ON jobs.category_id = job_categories.id 
                                    WHERE jobs.category_id = $categoryId";
                        $jobResult = $conn->query($jobQuery);

                    ?>
                        <div class="tab-pane fade <?= $firstCategory ? 'show active' : '' ?>" id="<?= $categoryName ?>-tab-pane" role="tabpanel" aria-labelledby="<?= $categoryName ?>-tab" tabindex="0">
                            <?php
                            // Loop through job listings for the current category
                            while ($jobRow = $jobResult->fetch_assoc()) {
                            ?>




                                <!-- Job Description starts here -->
                                <div class="row mt-4 border rounded-3">
                                    <div class="col-sm-8">
                                        <div class="jobs-card ms-3">
                                            <h5 class="mt-3 text-center text-sm-start"><?= $jobRow['title'] ?></h5>
                                            <p class="py-2 text-center text-sm-start">
                                                <span class="bg-body-secondary fw-semibold py-1 px-3 rounded-2"><?= $jobRow['experience'] ?></span>
                                                <span class="bg-body-secondary fw-semibold ms-2 py-1 px-3 rounded-2"><?= $jobRow['employment_type'] ?></span>
                                                <span class="bg-body-secondary fw-semibold ms-2 py-1 px-3 rounded-2"><?= $jobRow['short_location'] ?></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-md-0 d-flex justify-content-center align-items-center">
                                        <!-- Button trigger modal More-Details -->
                                        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#job-<?= $jobRow['id'] ?>">
                                            View Details
                                        </button>

                                        <!-- Modal More-Details -->
                                        <div class="modal fade" id="job-<?= $jobRow['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $jobRow['title'] ?> <i class="fa-solid fa-circle-info ps-2 text-success"></i></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="full-JD">
                                                            <h5>Full Job Description</h5>

                                                            <?php if (!empty($jobRow['description'])) : ?>
                                                                <h6 class="pt-2">Description:</h6>
                                                                <p class="text-justify"><?= $jobRow['description'] ?></p>
                                                            <?php endif; ?>

                                                            <?php if (!empty($jobRow['responsibilities'])) : ?>
                                                                <h6 class="pt-2">Responsibilities:</h6>
                                                                <p class="text-justify"><?= $jobRow['responsibilities'] ?></p>
                                                            <?php endif; ?>

                                                            <?php if (!empty($jobRow['qualifications'])) : ?>
                                                                <h6 class="pt-2">Qualifications:</h6>
                                                                <p class="text-justify"><?= $jobRow['qualifications'] ?></p>
                                                            <?php endif; ?>

                                                            <?php if (!empty($jobRow['employment_type'])) : ?>
                                                                <p><span class="fw-bolder">Job Type:</span> <?= $jobRow['employment_type'] ?></p>
                                                            <?php endif; ?>

                                                            <?php if (!empty($jobRow['salary'])) : ?>
                                                                <p><span class="fw-bolder"><i class="fa-solid fa-money-bill text-success"></i> Salary:</span> <?= $jobRow['salary'] ?> per month</p>
                                                            <?php endif; ?>

                                                            <?php if (!empty($jobRow['schedule'])) : ?>
                                                                <p><span class="fw-bolder"><i class="fa-solid fa-clock text-primary"></i> Schedule:</span> <?= $jobRow['schedule'] ?></p>
                                                            <?php endif; ?>

                                                            <?php if (!empty($jobRow['location'])) : ?>
                                                                <p><span class="fw-bolder"><i class="fa-solid fa-location-dot text-danger"></i> Work Location:</span> <?= $jobRow['location'] ?></p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- apply now mail btn starts here -->
                                        <button type="button" class="btn btn-primary">
                                            <a href="mailto:hr@edtechinnovate.com" class="text-white">Apply Now</a>
                                        </button>
                                        <!-- apply now mail btn ends here -->
                                    </div>
                                </div>
                                <!-- Job Description ends here -->
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                        $firstCategory = false;
                    }
                    ?>
                </div>
                <!-- </div> -->
            </div>
        </div>
</section>


<section>
    <div class="container my-3 my-md-5 rounded-3" style="background-color: antiquewhite">
        <div class="row">
            <div class="col">
                <div class="job-section-2 py-4 px-2 px-sm-5">
                    <p class="fs-6 fs-sm-5 text-justify text-sm-center fw-medium">Can't find the perfect job role? No worries! Submit your application anyway. We're always looking for exceptional talent and your skills could be just what we need. Take the first step towards joining our dynamic team today!</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center align-items-center pb-3 pb-md-4">
            <div class="col-auto">
                <button type="button" class="btn btn-primary px-5">
                    <a href="mailto:hr@edtechinnovate.com" class="text-white">Submit Resume</a>
                </button>

                <!-- submit-app form code starts here -->
                <!-- Uncomment and complete this section if needed -->
                <!-- <button type="button" class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#submit-resume">
                        Submit Resume
                    </button> -->

                <!-- Modal -->
                <!-- <div class="modal fade" id="submit-resume" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Apply Now<i class="fa-solid fa-circle-check ps-2 text-success"></i></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <input type="text" class="form-control" placeholder="First Name" aria-label="First name">
                                            </div>
                                            <div class="col-12 mt-3 mt-sm-0 col-sm-6">
                                                <input type="text" class="form-control" placeholder="Last Name" aria-label="Last name">
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col">
                                                <input type="email" class="form-control" placeholder="Email" aria-label="Email">
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col">
                                                <input type="tel" class="form-control" placeholder="Mobile No" aria-label="Mobile">
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <input type="text" class="form-control" placeholder="Degree" aria-label="Degree">
                                            </div>
                                            <div class="col-12 mt-3 mt-sm-0 col-sm-6">
                                                <input type="text" class="form-control" placeholder="Specialization" aria-label="Specialization">
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <input type="text" class="form-control" placeholder="Passout Year" aria-label="Passout Year">
                                            </div>
                                            <div class="col-12 mt-3 mt-sm-0 col-sm-6">
                                                <input type="text" class="form-control" placeholder="CGPA/Percentage" aria-label="cgpa-percentage">
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="input-group">
                                                    <select class="custom-select py-2 w-100" id="inputGroupSelect02">
                                                        <option selected>Select Role:</option>
                                                        <option value="1">Frontend Developer</option>
                                                        <option value="2">Backend Developer</option>
                                                        <option value="3">FullStack Developer</option>
                                                        <option value="4">Business Development Manager</option>
                                                        <option value="5">Human Resource</option>
                                                        <option value="6">Accountant</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="input-group">
                                                    <select class="custom-select py-2 w-100" id="inputGroupSelect03">
                                                        <option selected>Select YOE:</option>
                                                        <option value="1">0 - 1 Year</option>
                                                        <option value="2">1 - 2 Years</option>
                                                        <option value="3">2 - 3 Years</option>
                                                        <option value="4">3 - 4 Years</option>
                                                        <option value="5">4 - 5 Years</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="" class="mb-1 ps-2">DOB:</label>
                                                <input type="date" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="" class="mb-1 ps-2">Upload Your Resume:</label>
                                                <input type="file" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="" class="mb-1 ps-1">Cover Letter:<span class="text-danger"> *</span></label>
                                                <textarea name="cover-letter" id="cover-letter" class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Submit Application</button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                <!-- submit-app form code ends here -->
            </div>
        </div>
    </div>
</section>

<?php include('./panels/footer-top.php'); ?>
<?php include('./panels/footer-bottom.php'); ?>