<?php
include 'functions.php';

$widget = new widgets();
?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php
$tekst = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';

$widget->text_image("De beste auto's", $tekst, "image/auto.jpg");
?>

<section class="card_container">
    <?php
    $widget->cards('Titel', $tekst, 'https://www.youtube.com', 'image/placeholder.png');
    $widget->cards('Titel', $tekst, 'https://www.youtube.com', 'image/placeholder.png');
    $widget->cards('Titel', $tekst, 'https://www.youtube.com', 'image/placeholder.png');
    $widget->cards('Titel', $tekst, 'https://www.youtube.com', 'image/placeholder.png');
    ?>
</section>

<style>
    .slideshow_container {
        width: 100%;
    }
    .slideshow_image {
        width: 100%;
        transition: 1s;
        position: absolute;
        margin-top: 0;
        margin-left: 0;
        opacity: 0;
    }
</style>

<section class="slideshow_container">
    <img src="image/eten1.jpg" class="slideshow_image">
    <img src="image/eten2.jpg" class="slideshow_image">
    <img src="image/eten3.jpg" class="slideshow_image">
</section>

<script>
    var slides = document.getElementsByClassName('slideshow_image');
    var interval = setInterval(slideShow, 5000);
    var slide = 0;
    slideShow();

    function slideShow() {
        if (slide == (slides.length-1)) {
            slides[slide].style.opacity = '0';
            slide = 0;
            slides[slide].style.opacity = '100';
        }
        slides[slide].style.opacity = '0';
        slide += 1;
        slides[slide].style.opacity = '100';
    }
</script>

</body>
</html>