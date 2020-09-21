<?php
$cardCss = false;
$text_imageCss = false;
$slideCss = false;

class widgets {
    function text_image($titel, $tekst, $img_url) {
        global $text_imageCss;

        if ($text_imageCss == false) {
            echo <<<EOT
        <style>
            .text_image_widget {
                width: 100%;
                display: flex;
                justify-content: center;
                margin: 50px 0;
            }
        
            .text_image_widget article {
                width: 30%;
                margin: 40px;
            }
        
            .text_image_widget div {
                width: 30%;
                height: 100%;
                margin: 40px;
                display: flex;
                justify-content: center;
            }
        
            .text_image_widget div img {
                height: 300px;
            }
        </style>
EOT;
            $text_imageCss = true;
        }

        echo <<<EOT
        <section class="text_image_widget">
            <article>
                <h1>$titel</h1>
                <p>$tekst</p>
            </article>
            <div>
                <img src="$img_url">
            </div>
        </section>
EOT;
    }

    function cards($titel, $tekst, $link_url, $image_url = null) {
        global $cardCss;
        if ($cardCss == false) {
            echo <<<EOT
                <style>
                    .card_container {
                        width: 100%;
                        display: flex;
                        justify-content: space-around;
                        margin: 50px 0;
                    }
                
                    .card_container article {
                        flex: 2;
                        margin: 0 50px;
                        padding: 0 0 20px 0;
                        border-radius: 7px;
                        background-color: ghostwhite;
                        transition: 0.3s;
                    }
                
                    .card_container article:hover {
                        box-shadow: 5px 5px 50px -20px black ;
                    }
                
                    .card_container article a {
                        margin: 0 30px;
                        text-decoration: none;
                    }
                
                    .card_container article h2 {
                        margin: 0 30px 10px 30px;
                    }
                
                    .card_container article p {
                        font-size: 15px;
                        margin: 0 30px 20px 30px;
                    }
                    
                    .card_container article img {
                        width: 100%;
                        margin: 0 0 20px 0;
                        position: relative;
                    }
                </style>
EOT;
            $cardCss = true;
        }
        echo '<article>';
            if ($image_url != null) {
                echo '<img src="'.$image_url.'">';
            }
            echo <<<EOT
                <h2>$titel</h2>
                <p>$tekst</p>
                <a href="$link_url">Lees Verder...</a>
              </article>
EOT;
    }

    function slideShow($slide_url0, $slide_url1 = null, $slide_url2 = null, $slide_url3 = null, $slide_url4 = null, $slide_url5 = null) {
        global $slideCss;
        if ($slideCss == false) {
            echo <<<EOT
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
EOT;
            $slideCss = true;
        }

        for ($i = 0; true; $i++) {
            $currentSlide = ${'slide_url' . $i};
            if ($currentSlide == null) {
                break;
            }
            echo <<<EOT
            
EOT;
        }
    }
}

?>
