

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="/web-assets/images/logo/edtech-fvicon.png" />
    <link rel="canonical" href="<?php echo $url; ?>">
    <link rel="shortcut icon" href="/web-assets/images/logo/edtech-fvicon.png" type="image/x-icon">
    <link rel="icon" href="/web-assets/images/logo/edtech-fvicon.png" type="image/x-icon">
    <!-- Links Of CSS File -->
    <link rel="stylesheet" href="/web-assets/css/bootstrap.min.css" rel="preload" as="style">
    <link rel="stylesheet" href="/web-assets/css/remixicon.css" rel="preload" as="style">
    <link rel="stylesheet" href="/web-assets/css/swiper-bundle.min.css" rel="preload" as="style">
    <link rel="stylesheet" href="/web-assets/fonts/flaticon_mycollection.css" rel="preload" as="style">
    <link rel="stylesheet" href="/web-assets/css/scrollCue.css" rel="preload" as="style">
    <link rel="stylesheet" href="/web-assets/css/navbar.css?=6.0"  rel="preload" as="style">
    <link rel="stylesheet" href="/web-assets/css/style.css?=6.0"  rel="preload" as="style">
    <link rel="stylesheet" href="/web-assets/css/responsive.css?=6.0"  rel="preload" as="style">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="preload" as="style" />
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="preload" as="style" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> -->
    <?php
    $protocol = !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
    $url = $protocol . $_SERVER['HTTP_HOST'] . htmlspecialchars($_SERVER['REQUEST_URI']);
    ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BGPK2PX5PK"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-BGPK2PX5PK');
    </script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Corporation",
  "name": "Edtech Innovate Pvt. Ltd.",
  "url": "https://www.edtechinnovate.com/",
  "logo": "https://www.edtechinnovate.com/web-assets/images/main/updated-logo.png",
  "description": "EdTech Innovate is a SaaS company that offers online services to universities and students for smooth operations including ERP, CRM, LMS, and exam administration.",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+91 8595350621",
    "contactType": "customer service",
    "contactOption": "TollFree",
    "areaServed": "IN",
    "availableLanguage": "en"
  },
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "A-18, S1, Second Floor",
    "addressLocality": "Sector 59",
    "addressRegion": "Noida",
    "postalCode": "201301"
  },
  "sameAs": [
    "https://www.facebook.com/EdTechInnovatePvtLtd",
    "https://www.instagram.com/edtech_innovate/",
    "https://www.linkedin.com/company/edtechinnovate"
  ]
}
</script>