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
    <!-- Heading Section -->
    <main class="">
        <div class="bg-sky-950 py-10 md:pt-32 px-6">
            <div class="flex flex-col items-center text-center max-w-3xl mx-auto">
                <div class="relative">
                    <h1 class="relative text-white text-3xl md:text-5xl font-bold leading-tight md:leading-[65px] z-10">
                        <?php print($meta_title) ?>
                    </h1>
                    <div class="absolute left-1/2 bottom-2 -translate-x-1/2 h-12 w-72 md:w-96 bg-black blur-[50px] opacity-100"></div>
                </div>
            </div class="px-16">
            <nav class="flex items-left text-sm text-gray-400 mt-4">
                <a href="{{ route('welcome') }}" class="hover:text-white">Home</a>
                <span class="mx-2">›</span>
                <a href="{{ route('<?php print($route) ?>') }}" class="hover:text-white"><?php print($meta_title) ?></a>
            </nav>
        </div>

        <!-- Privacy Policy Content -->
        <div class="container mx-auto px-28 py-12 text-justify">
            <div class="prose max-w-none">
                <h1><?php print($meta_title) ?></h1>
            </div>
        </div>
    </main>

    @include('landing.components.footer')
</body>
</html>
