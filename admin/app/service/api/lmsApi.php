<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Pid, Content-Type, Authorization");

// Get product ID from headers
$pid = isset($_SERVER['HTTP_X_PID']) ? intval($_SERVER['HTTP_X_PID']) : 0;

// -----------------------
// Client Logo API
// -----------------------
$clientLogoQuery = $conn->query("SELECT id, name, logo FROM clients_logos WHERE products_id = $pid AND status = 1 ORDER BY id DESC");
$clientLogos = [];
if ($clientLogoQuery && $clientLogoQuery->num_rows > 0) {
    while ($row = $clientLogoQuery->fetch_assoc()) {
        $row['logo'] = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . $row['logo'];
        $clientLogos[] = $row;
    }
}

// -----------------------
// Testimonials API
// -----------------------
$testimonialsQuery = $conn->query("
    SELECT id, name, title, message, image 
    FROM testimonial_service 
    WHERE products_id = $pid AND status = 1 
    ORDER BY id DESC
");

$testimonialsData = [];
if ($testimonialsQuery && $testimonialsQuery->num_rows > 0) {
    while ($row = $testimonialsQuery->fetch_assoc()) {
        $row['image'] = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . $row['image'];
        $testimonialsData[] = $row;
    }
}
// -----------------------
// Plains API
// -----------------------
$plainQuery = $conn->query("SELECT plains.id AS plain_id,plains.key_features AS features, plains.actual_price,plains.discout_price,plains.status,plains.created_at, plains_category.name AS category_name, plains_category.products_id, products.name AS product_name  FROM plains
    LEFT JOIN plains_category  ON plains_category.id = plains.plains_category_id LEFT JOIN products ON products.id = plains_category.products_id WHERE plains_category.products_id = $pid  AND plains.status = 1 ORDER BY plains.id DESC");

$PlainData = [];
if ($plainQuery && $plainQuery->num_rows > 0) {
    while ($row = $plainQuery->fetch_assoc()) {
        $PlainData[] = $row;
    }
}
// -----------------------
// FAQ API
// -----------------------
$faqQuery = $conn->query("SELECT id ,questions,answers FROM faq_service WHERE products_id = $pid AND status = 1 ORDER BY id DESC");
$faqData = [];
if ($faqQuery && $faqQuery->num_rows > 0) {
    while ($row = $faqQuery->fetch_assoc()) {
        $faqData[] = $row;
    }
}
// -----------------------
// Blog API
// -----------------------
// $blogQuery = $conn->query("SELECT blogs_service.Name,blogs_service.Slug,blogs_service.Photo,blogs_service.Description,blogs_service.Content,Meta_Title,blogs_service.Meta_Key,blogs_service.Meta_Description,blogs_service.Products_ID,blogs_service.Created_At,blogfaq_service.question,blogfaq_service.answer FROM blogs_service LEFT JOIN blogfaq_service ON blogfaq_service.blogs_id= blogs_service.ID WHERE blogs_service.Products_ID = $pid AND blogs_service.Status= 1");
// $blogData = [];
// if ($blogQuery && $blogQuery->num_rows > 0) {
//     while ($row = $blogQuery->fetch_assoc()) {
//         $blogData[] = $row;
//     }
// }
$blogQuery = $conn->query("
    SELECT 
        b.ID,
        b.Name,
        b.Slug,
        b.Photo,
        b.Description,
        b.Content,
        b.Meta_Title,
        b.Meta_Key,
        b.Meta_Description,
        b.Products_ID,
        b.Created_At,
        GROUP_CONCAT(f.question SEPARATOR '||') AS faq_questions,
        GROUP_CONCAT(f.answer SEPARATOR '||') AS faq_answers
    FROM blogs_service b
    LEFT JOIN blogfaq_service f 
        ON f.blogs_id = b.ID
    WHERE b.Products_ID = $pid 
      AND b.Status = 1
    GROUP BY b.ID
    ORDER BY b.Created_At DESC
");

$blogData = [];
if ($blogQuery && $blogQuery->num_rows > 0) {
    while ($row = $blogQuery->fetch_assoc()) {
        // ✅ Convert Photo to absolute URL
        if (!empty($row['Photo'])) {
            $row['Photo'] = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . $row['Photo'];
        }

        // Process FAQs into array
        $faqs = [];
        if (!empty($row['faq_questions'])) {
            $questions = explode('||', $row['faq_questions']);
            $answers   = explode('||', $row['faq_answers']);
            foreach ($questions as $i => $q) {
                $faqs[] = [
                    'question' => $q,
                    'answer'   => $answers[$i] ?? ''
                ];
            }
        }

        $blogData[] = [
            "ID"              => $row['ID'],
            "Name"            => $row['Name'],
            "Slug"            => $row['Slug'],
            "Photo"           => $row['Photo'], // ✅ Full URL now
            "Description"     => $row['Description'],
            "Content"         => $row['Content'],
            "Meta_Title"      => $row['Meta_Title'],
            "Meta_Key"        => $row['Meta_Key'],
            "Meta_Description" => $row['Meta_Description'],
            "Products_ID"     => $row['Products_ID'],
            "Created_At"      => $row['Created_At'],
            "FAQs"            => $faqs
        ];
    }
}
// -----------------------
// Hero Data API
// -----------------------
$heroData = [];
$heroQuery = $conn->query("SELECT * FROM hero_banner WHERE product_id = $pid AND Status = 1 ORDER BY id ASC LIMIT 1");
if ($heroQuery && $heroQuery->num_rows > 0) {
    while ($row = $heroQuery->fetch_assoc()) {
        $row['image'] = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . $row['image'];
        $heroData[] = $row;
    }
}
// -----------------------
// Service Data API
// -----------------------
// $serviceData = [];
// $serviceQuery = $conn->query("SELECT * FROM services WHERE product_id = $pid AND Status = 1 ORDER BY id ASC ");
// if ($serviceQuery && $serviceQuery->num_rows > 0) {
//     while ($row = $serviceQuery->fetch_assoc()) {
//          $row['image'] = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . $row['image'];
//         $serviceData[] = $row;
//     }
// }
// -----------------------
// Service Data API
// -----------------------
$serviceData = [];
$serviceQuery = $conn->query("SELECT * FROM services WHERE product_id = $pid AND Status = 1 ORDER BY id ASC ");
if ($serviceQuery && $serviceQuery->num_rows > 0) {
    while ($row = $serviceQuery->fetch_assoc()) {
         $row['image'] = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . $row['image'];
        $serviceData[] = $row;
    }
}
// -----------------------
// Key Features Data API
// -----------------------
$keyFeaturesData = [];
$keyFeaturesQuery = $conn->query("SELECT * FROM key_features WHERE product_id = $pid AND Status = 1 ORDER BY id ASC ");
if ($keyFeaturesQuery && $keyFeaturesQuery->num_rows > 0) {
    while ($row = $keyFeaturesQuery->fetch_assoc()) {
         $row['image'] = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . $row['image'];
        $keyFeaturesData[] = $row;
    }
}
// -----------------------
// About Service Data API
// -----------------------
$aboutData = [];
$aboutQuery = $conn->query("SELECT * FROM service_about WHERE product_id = $pid AND Status = 1 ORDER BY id ASC ");
if ($aboutQuery && $aboutQuery->num_rows > 0) {
    while ($row = $aboutQuery->fetch_assoc()) {
         $row['image'] = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . $row['image'];

        $aboutData[] = $row;
    }
}
// -----------------------
// Combine & Return
// -----------------------
$response = [
    "status" => 200,
    "data" => [
        "clientLogos" => $clientLogos,
        "testimonialsData" => $testimonialsData,
        "plainsData" => $PlainData,
        "faqData" => $faqData,
        "blogData" => $blogData,
        "heroData" => $heroData,
        "serviceData" => $serviceData,
        "keyFeaturesData" => $keyFeaturesData,
        "aboutData" => $aboutData
    ]
];

echo json_encode($response);
