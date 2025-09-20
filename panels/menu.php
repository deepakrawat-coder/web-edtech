<?php $breadcrumbs = array_filter(explode('/', $_SERVER['REQUEST_URI']));
?>
<!-- Start Navbar Area -->
<nav class='navbar navbar-expand-lg top-navbar style6 sticky-top' id='navbar'>
    <div class='container-fluid style6'>
        <a class='navbar-brand' href='/'>
            <img src='/web-assets/images/main/updated-logo.webp' width="155" height="54" class='navbar-logo number-6 edtechlogo-edtech' alt='logo'>
            <img src='/web-assets/images/main/updated-logo.webp' width="155" height="54" class='responsive-logo edtechlogo-edtech' class='navbar-logo' alt='logo'>
        </a>
        <a aria-label="Mobile Menu" class='navbar-toggler' data-bs-toggle='offcanvas' data-bs-target='#navbarOffcanvas' role='button' aria-controls='navbarOffcanvas'>
            <span class='burger-menu'>
                <span class='top-bar'></span>
                <span class='middle-bar'></span>
                <span class='bottom-bar'></span>
            </span>
        </a>
        <div class='collapse navbar-collapse'>
            <ul class='navbar-nav mx-auto style2'>
                <li class='nav-item mb-2'>
                    <?php $pages = ['/admission-management-system', '/learning-management-system', '/online-exam-portal', '/customer-relationship-management'] ?>
                    <a href='#' class="dropdown-toggle nav-link <?php print in_array($breadcrumbs[2], $pages) ? 'active' : '' ?>">
                        Products
                    </a>
                    <ul class='dropdown-menu row d-flex' style="width: 740px;">
                        <li class='nav-item mb-2 col-6'>
                            <a href='/admission-management-system' class='nav-link fs-6 mb-1'>Admission Management System <i class="fa-solid fa-arrow-right ms-1"></i></a>

                            <ul class="ms-4">
                                <li class="nav-item mb-1"><a href="/online-application-form-submission" class="dropdown-subLinks"><i class="fa-solid fa-check me-1"></i>Online Application Form Submission</a></li>
                                <li class="nav-item mb-1"><a href="/integration-of-multiple-programs" class="dropdown-subLinks"><i class="fa-solid fa-check me-1"></i>Integration Of Multiple Programs</a></li>
                                <li class="nav-item mb-1"><a href="/document-management" class="dropdown-subLinks"><i class="fa-solid fa-check me-1"></i>Document Management</a></li>
                                <li class="nav-item mb-1"><a href="/payment-management" class="dropdown-subLinks"><i class="fa-solid fa-check me-1"></i>Payment Management</a></li>
                                <li class="nav-item mb-1"><a href="/addressing-queries" class="dropdown-subLinks"><i class="fa-solid fa-check me-1"></i>Addressing Queries</a></li>
                            </ul>
                        </li>
                        <li class='nav-item mb-2 col-6'>
                            <a href='/learning-management-system' class='nav-link fs-6'>Learning Management System <i class="fa-solid fa-arrow-right ms-1"></i></a>

                            <ul class="ms-4">
                                <li class="nav-item mb-1"><a href="/academics-configuration" class="dropdown-subLinks"><i class="fa-solid fa-check me-1"></i>Academics configuration</a></li>
                                <li class="nav-item mb-1"><a href="/course-assignment-exam-time-table-management" class="dropdown-subLinks"><i class="fa-solid fa-check me-1"></i>Course, Assignment, Exam & Time Table Management</a></li>
                                <li class="nav-item mb-1"><a href="/personalized-interface" class="dropdown-subLinks"><i class="fa-solid fa-check me-1"></i>Personalized Interface</a></li>
                                <li class="nav-item mb-1"><a href="/role-based-access" class="dropdown-subLinks"><i class="fa-solid fa-check me-1"></i>Role-Based Access</a></li>
                                <li class="nav-item mb-1"><a href="/social-learning-tools" class="dropdown-subLinks"><i class="fa-solid fa-check me-1"></i>Social Learning Tools</a></li>
                            </ul>
                        </li>
                        <li class='nav-item mb-2 col-6'>
                            <a href='/online-exam-portal' class='nav-link fs-6'>Online Examination Portal <i class="fa-solid fa-arrow-right ms-1"></i></a>

                            <ul class="ms-4">
                                <li class="nav-item mb-1"><a href="/ai-and-video-proctoring" class="dropdown-subLinks"><i class="fa-solid fa-check me-1"></i>AI and Video Proctoring</a></li>
                                <li class="nav-item mb-1"><a href="/automated-exam-management-and-scheduling" class="dropdown-subLinks"><i class="fa-solid fa-check me-1"></i>Automated Exam Management and Scheduling</a></li>
                                <li class="nav-item mb-1"><a href="/lms-integration" class="dropdown-subLinks"><i class="fa-solid fa-check me-1"></i>LMS Integration</a></li>
                                <li class="nav-item mb-1"><a href="/personalization" class="dropdown-subLinks"><i class="fa-solid fa-check me-1"></i>Personalization</a></li>
                                <li class="nav-item mb-1"><a href="/publish-results" class="dropdown-subLinks"><i class="fa-solid fa-check me-1"></i>Publish Results</a></li>
                            </ul>
                        </li>
                        <li class='nav-item mb-2 col-6'>
                            <a href='https://leads.edtechinnovate.com' class='nav-link fs-6'>Customer Relationship Management <i class="fa-solid fa-arrow-right ms-1"></i></a>

                            <ul class="ms-4">
                                <li class="nav-item mb-1"><a href="/social-media-integration" class="dropdown-subLinks"><i class="fa-solid fa-check me-1"></i>Social Media Integration</a></li>
                                <li class="nav-item mb-1"><a href="/multi-channel-communication" class="dropdown-subLinks"><i class="fa-solid fa-check me-1"></i>Multi-Channel Communication</a></li>
                                <li class="nav-item mb-1"><a href="/lead-management" class="dropdown-subLinks"><i class="fa-solid fa-check  me-1"></i>Lead Management</a></li>
                                <li class="nav-item mb-1"><a href="/track-sales" class="dropdown-subLinks"><i class="fa-solid fa-check  me-1"></i>Track Sales</a></li>
                                <li class="nav-item mb-1"><a href="/in-built-payment-platform" class="dropdown-subLinks"><i class="fa-solid fa-check  me-1"></i>In-Built Payment Platform</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- <li class='nav-item mb-2'>
                    <?php $pages = ['pricing.php']; ?>
                    <a href='pricing.php' class="nav-link <?php print in_array($breadcrumbs[2], $pages) ? 'active' : ''; ?>">
                        Pricing
                    </a>
                </li> -->


                <!-- <li class='nav-item mb-2 '>
                    <?php $pages = ['/online-proctor-exam']; ?>
                    <a href='online-proctor-exam.php' class="nav-link <?php print in_array($breadcrumbs[2], $pages) ? 'active' : ''; ?>">
                        Online Proctor Exam
                    </a>
                </li> -->

                <li class='nav-item mb-2'>
                    <?php $pages = ['/gallery']; ?>
                    <a href='/gallery' class="nav-link <?php print in_array($breadcrumbs[2], $pages) ? 'active' : ''; ?>">
                        Gallery
                    </a>
                </li>

                <!-- <li class='nav-item mb-2'>
                    <?php $pages = ['blog.php']; ?>
                    <a href='blog.php' class="nav-link <?php print in_array($breadcrumbs[2], $pages) ? 'active' : ''; ?>">
                        Blog
                    </a>
                </li> -->

                <li class='nav-item mb-2'>
                    <?php $pages = ['/vision-mission-corevalue', '/news-media'] ?>
                    <a href='' class="dropdown-toggle nav-link <?php print in_array($breadcrumbs[2], $pages) ? 'active' : '' ?>">
                        Company
                    </a>
                    <ul class='dropdown-menu'>
                        <li class='nav-item mb-2'>
                            <a href='/about' class='nav-link'>About Us</a>
                        </li>
                        <li class='nav-item mb-2'>
                            <a href='/vision-mission-corevalue' class='nav-link'>
                                Vision, Mission & Core Values
                            </a> 
                        </li>
                        <!-- <li class='nav-item mb-2'>
                            <a href='news-media.php' class='nav-link'>News & Media</a>
                        </li> -->
                        <li class='nav-item mb-2'>
                            <a href='/who-we-serve' class='nav-link'>Who We Serve</a>
                        </li>
                        <li class='nav-item mb-2'>
                            <a href='/message-from-flag-bearers' class='nav-link'>Message from Our Flag Bearers</a>
                        </li>
                        <!-- <li class='nav-item mb-2'>
                            <a href='pricing.php' class='nav-link'>Pricing</a>
                        </li> -->
                    </ul>
                </li>

                <!-- <li class='nav-item mb-2'>
                    <?php $pages = ['about.php']; ?>
                    <a href='pricing.php' class="nav-link <?php print in_array($breadcrumbs[2], $pages) ? 'active' : ''; ?>">
                        Pricing
                    </a>
                </li> -->

                <li class='nav-item mb-2'>
                    <a href='/pricing' class='nav-link'>Pricing</a>
                </li>

                <li class='nav-item mb-2'>
                    <!-- <a href='careers.php' class='nav-link'>Careers</a> -->
                    <a href='/careers' class='nav-link'>Careers</a>
                </li>

                <li class='nav-item mb-2'>
                    <?php $pages = ['contact.php']; ?>
                    <a href='/contact' class="nav-link <?php print in_array($breadcrumbs[2], $pages) ? 'active' : ''; ?>">
                        Contact
                        <span>Us</span> </a>
                </li>

            </ul>
            <!-- <div class="menu-button-animation-hover button-menu-talk">
                <div class="menu-item-button">
                    <button class="nav-link " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" class="talk-button">Login</button>
                </div>
            </div> -->
            <a href="/login" class="fw-bolder py-2 px-4 me-3 border rounded-5 border-success">Login</a>
            <a href="/book-a-demo" class="fw-bolder py-2 px-3 border rounded-5 border-primary">Book a Demo</a>
        </div>
    </div>
</nav>
<!-- End Navbar Area -->

<!-- Start Mobile Device Navbar Area -->
<?php $breadcrumbs = array_filter(explode('/', $_SERVER['REQUEST_URI']));
?>
<div class='responsive-navbar offcanvas offcanvas-end' tabindex='-1' id='navbarOffcanvas'>
    <div class='offcanvas-header'>
        <a href='/' class='logo d-inline-block'>
            <img src='web-assets/images/main/updated-logo.webp' width="155" height="54" class='responsive-logo edtechlogo-edtech' loading="lazy">
        </a>
        <button type='button' class='close-btn' data-bs-dismiss='offcanvas' aria-label='Close'>
            <i class='ri-close-line'></i>
        </button>
    </div>
    <div class='offcanvas-body'>
        <div class='accordion' id='navbarAccordion'>
            <!-- <div class='accordion-item'>
                <button class='accordion-button collapsed active' type='button' data-bs-toggle='collapse' data-bs-target='#collapseNine' aria-expanded='false' aria-controls='collapseNine'>
                    Products
                </button>
                <div id='collapseNine' class='accordion-collapse collapse' data-bs-parent='#navbarAccordion'>
                    <div class='accordion-body'>
                        <div class='accordion' id='navbarAccordion2'>
                            <div class='accordion-item'>
                                <a href='admission-management-system.php' class='accordion-link'>
                                    Admission Management System
                                </a>
                            </div>
                            <div class='accordion-item'>
                                <a href='learning-management-system.php' class='accordion-link'>
                                    Learning Management System
                                </a>
                            </div>
                            <div class='accordion-item'>
                                <a href='online-exam-portal.php' class='accordion-link'>
                                    Online Examination Portal </a>
                            </div>
                            <div class='accordion-item'>
                                <a href='customer-relationship-management.php' class='accordion-link'>
                                    Customer Relationship Management </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->


            <div class='accordion-item'>
                <button class='accordion-button collapsed active' type='button' data-bs-toggle='collapse' data-bs-target='#collapseNine' aria-expanded='false' aria-controls='collapseNine'>
                    Products
                </button>
                <div id='collapseNine' class='accordion-collapse collapse' data-bs-parent='#navbarAccordion'>
                    <div class='accordion-body'>
                        <div class='accordion' id='navbarAccordion2'>
                            <div class='accordion-item'>
                                <a href='/admission-management-system' class='accordion-link'>
                                    Admission Management System
                                </a>

                                <button class='accordion-button collapsed active' type='button' data-bs-toggle='collapse' data-bs-target='#ams-links' aria-expanded='false' aria-controls='ams-links'>
                                    <!-- <a href="admission-management-system.php">Admission Management System</a> -->
                                </button>
                                <div id='ams-links' class='accordion-collapse collapse' data-bs-parent='#collapseNine'>
                                    <div class='accordion-body'>
                                        <div class='accordion' id='navbarAccordion2'>
                                            <div class='accordion-item'>
                                                <a href='/online-application-form-submission' class='accordion-link'>
                                                    Online Application Form Submission
                                                </a>
                                            </div>
                                            <div class='accordion-item'>
                                                <a href='/integration-of-multiple-programs' class='accordion-link'>
                                                    Integration of multiple programs
                                                </a>
                                            </div>
                                            <div class='accordion-item'>
                                                <a href='/document-management' class='accordion-link'>
                                                    Document Management
                                                </a>
                                            </div>
                                            <div class='accordion-item'>
                                                <a href='/payment-management' class='accordion-link'>
                                                    Payment Management </a>
                                            </div>
                                            <div class='accordion-item'>
                                                <a href='/addressing-queries' class='accordion-link'>
                                                    Addressing queries </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='accordion-item'>
                                <a href='/learning-management-system' class='accordion-link'>
                                    Learning Management System
                                </a>

                                <button class='accordion-button collapsed active' type='button' data-bs-toggle='collapse' data-bs-target='#lms-links' aria-expanded='false' aria-controls='lms-links'>
                                    <!-- Learning Management System -->
                                </button>
                                <div id='lms-links' class='accordion-collapse collapse' data-bs-parent='#collapseNine'>
                                    <div class='accordion-body'>
                                        <div class='accordion' id='navbarAccordion2'>
                                            <div class='accordion-item'>
                                                <a href='/academics-configuration' class='accordion-link'>
                                                    Academics Configuration
                                                </a>
                                            </div>
                                            <div class='accordion-item'>
                                                <a href='/course-assignment-exam-time-table-management' class='accordion-link'>
                                                    Course, Assignment, Exam & Time Table Management
                                                </a>
                                            </div>
                                            <div class='accordion-item'>
                                                <a href='/personalized-interface' class='accordion-link'>
                                                    Personalized Interface</a>
                                            </div>
                                            <div class='accordion-item'>
                                                <a href='/role-based-access' class='accordion-link'>
                                                    Role-based Access</a>
                                            </div>
                                            <div class='accordion-item'>
                                                <a href='/social-learning-tools' class='accordion-link'>
                                                    Social Learning Tools</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='accordion-item'>
                                <a href='/online-exam-portal' class='accordion-link'>
                                    Online Examination Portal </a>

                                <button class='accordion-button collapsed active' type='button' data-bs-toggle='collapse' data-bs-target='#oe-links' aria-expanded='false' aria-controls='oe-links'>
                                    <!-- Online Examination Portal -->
                                </button>
                                <div id='oe-links' class='accordion-collapse collapse' data-bs-parent='#collapseNine'>
                                    <div class='accordion-body'>
                                        <div class='accordion' id='navbarAccordion2'>
                                            <div class='accordion-item'>
                                                <a href='/ai-and-video-proctoring' class='accordion-link'>
                                                    AI and Video Proctoring
                                                </a>
                                            </div>
                                            <div class='accordion-item'>
                                                <a href='/automated-exam-management-and-scheduling' class='accordion-link'>
                                                    Automated Exam Management and Scheduling
                                                </a>
                                            </div>
                                            <div class='accordion-item'>
                                                <a href='/lms-integration' class='accordion-link'>
                                                    LMS Integration </a>
                                            </div>
                                            <div class='accordion-item'>
                                                <a href='/personalization' class='accordion-link'>
                                                    Personalization </a>
                                            </div>
                                            <div class='accordion-item'>
                                                <a href='/publish-results' class='accordion-link'>
                                                    Publish Results
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='accordion-item'>
                                <a href='/customer-relationship-management' class='accordion-link'>
                                    Customer Relationship Management </a>

                                <button class='accordion-button collapsed active' type='button' data-bs-toggle='collapse' data-bs-target='#cms-links' aria-expanded='false' aria-controls='cms-links'>
                                    <!-- Customer Relationship Management -->
                                </button>
                                <div id='cms-links' class='accordion-collapse collapse' data-bs-parent='#collapseNine'>
                                    <div class='accordion-body'>
                                        <div class='accordion' id='navbarAccordion2'>
                                            <div class='accordion-item'>
                                                <a href='/social-media-integration' class='accordion-link'>
                                                    Social Media Integration
                                                </a>
                                            </div>
                                            <div class='accordion-item'>
                                                <a href='/multi-channel-communication' class='accordion-link'>
                                                    Multi-Channel Communication
                                                </a>
                                            </div>
                                            <div class='accordion-item'>
                                                <a href='/lead-management' class='accordion-link'>
                                                    Lead Management </a>
                                            </div>
                                            <div class='accordion-item'>
                                                <a href='/track-sales' class='accordion-link'>
                                                    Track Sales</a>
                                            </div>
                                            <div class='accordion-item'>
                                                <a href='/in-built-payment-platform' class='accordion-link'>
                                                    In-Built Payment Platform
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class='accordion-item'>
                <a href='pricing.php' class='nav-link'>
                    Pricing
                </a>
            </div> -->

            <!-- <div class='accordion-item'>
                <a href='online-proctor-exam.php' class='nav-link'>
                    Online Proctor Exam
                    </button>
                </a>
            </div> -->

            <div class='accordion-item'>
                <a href='/gallery' class='nav-link'>
                    Gallery
                    <!-- </button> -->
                </a>
            </div>

            <!-- <div class='accordion-item'>
                <a href='blog.php' class='nav-link'>
                    Blog
                    </button>
                </a>
            </div> -->
            
            <div class='accordion-item'>
                <button class='accordion-button collapsed ' type='button' data-bs-toggle='collapse' data-bs-target='#collapseFour' aria-expanded='false' aria-controls='collapseFour'>
                    Company
                </button>
                <div id='collapseFour' class='accordion-collapse collapse' data-bs-parent='#navbarAccordion'>
                    <div class='accordion-body'>
                        <div class='accordion' id='navbarAccordion25'>
                            <div class='accordion-item'>
                                <a href='/about' class='accordion-link '>
                                    About Us
                                </a>
                            </div>
                            <div class='accordion-item'>
                                <a href='/vision-mission-corevalue' class='accordion-link '>
                                    Vision, Mission & Core Values
                                </a>
                            </div>
                            <!-- <div class='accordion-item'>
                                <a href='news-media.php' class='accordion-link '>
                                    News & Media
                                </a>
                            </div> -->
                            <div class='accordion-item'>
                                <a href='/who-we-serve' class='accordion-link'>
                                    Who We Serve
                                </a>
                            </div>
                            <div class='accordion-item'>
                                <a href='/message-from-flag-bearers' class='accordion-link'>
                                    Message from Our Flag Bearers
                                </a>
                            </div>
                            <!-- <div class='accordion-item'>
                                <a href='pricing.php' class='accordion-link'>
                                    Pricing
                                </a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class='accordion-item'>
                <a href='/pricing' class='nav-link'>
                    Pricing
                </a>
            </div>

            <div class='accordion-item'>
                <a href='/careers' class='nav-link'>
                    Careers
                </a>
            </div>

            <div class='accordion-item'>
                <a href='/contact' class='nav-link'>
                    Contact Us
                </a>
            </div>

            <div class='accordion-item mb-3'>
                <a href='/login' class='nav-link fw-bolder py-2 px-4 border rounded-5 border-success w-50 text-center'>
                    <i class="fa-solid fa-right-to-bracket me-1"></i> Login
                </a>
            </div>

            <div class='accordion-item'>
                <a href='/book-a-demo' class='nav-link fw-bolder py-2 px-3 border rounded-5 border-primary w-50 text-center'>
                    <i class="fa-solid fa-clock me-1"></i> Book a Demo
                </a>
            </div>
        </div>
    </div>
</div>
<!-- End Mobile Device Navbar Area -->