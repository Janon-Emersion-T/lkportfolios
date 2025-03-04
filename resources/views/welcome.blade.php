<?php
$meta_title = 'Disclaimer';
$meta_description = 'Read LKPortfolios’ Privacy Policy to understand how we collect, use, and protect your personal data securely.';
$meta_keywords = 'Privacy Policy, Data Protection, User Privacy, Security, LKPortfolios';
$route = 'disclaimer'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO Meta Tags -->
    <title><?= htmlspecialchars($meta_title) ?> | LKPortfolios</title>
    <meta name="description" content="<?= htmlspecialchars($meta_description) ?>">
    <meta name="keywords" content="<?= htmlspecialchars($meta_keywords) ?>">
    <meta name="author" content="LKPortfolios">
    <meta name="robots" content="index, follow">

    <!-- Open Graph (OG) for Social Media -->
    <meta property="og:title" content="<?= htmlspecialchars($meta_title) ?> - LKPortfolios">
    <meta property="og:description" content="<?= htmlspecialchars($meta_description) ?>">
    <meta property="og:image" content="images/privacy-policy-og.jpg">
    <meta property="og:url" content="https://lkportfolios.com/<?php print($route) ?>">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars($meta_title) ?> - LKPortfolios">
    <meta name="twitter:description" content="<?= htmlspecialchars($meta_description) ?>">
    <meta name="twitter:image" content="images/privacy-policy-twitter.jpg">

    <!-- Favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Preload Important Resources -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" as="style">
    <link rel="preload" href="fonts/custom-font.woff2" as="font" type="font/woff2" crossorigin="anonymous">

    <!-- CSS Files -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha384-xyz" crossorigin="anonymous">

    <!-- Canonical URL -->
    <link rel="canonical" href="https://lkportfolios.com/<?php print($route) ?>">
</head>
<body class="font-sans ">
    @include('landing.components.header')


    <main class="mt-24">
        @include('landing.components.slider')
        @include('landing.components.about')
        @include('landing.components.whychooseus')
    </main>

    @include('landing.components.footer')
</body>
</html>
