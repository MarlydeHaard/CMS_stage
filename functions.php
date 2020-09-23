<?php
$cardCss = false;
$text_imageCss = false;
$slideCss = false;
$slideShow = 0;

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
                margin: 0 40px;
            }
        
            .text_image_widget div {
                width: 30%;
                height: 100%;
                margin: 0 40px;
                display: flex;
                justify-content: center;
            }
        
            .text_image_widget div img {
                height: 300px;
            }
            
            @media (max-width: 1250px) {
                .text_image_widget article {
                    width: 45%;
                }
                
                .text_image_widget div {
                    width: 45%;
                }
            }
            
            @media (max-width: 900px) {
                .text_image_widget {
                    flex-direction: column;
                }
                
                .text_image_widget article {
                    width: 80%;
                    margin: 0 10%;
                }
                
                .text_image_widget div {
                    width: 100%;
                    margin: 0;
                }
                
                .text_image_widget div img{
                    width: 80%;
                    margin: 0 10%;
                    height: auto;
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
                    
                    @media (max-width: 1300px) {
                        .card_container article {
                            margin: 0 10px;
                        }
                    }
                    
                    @media (max-width: 1000px) {
                        .card_container {
                            flex-wrap: wrap;
                        }
                    
                        .card_container article {
                            flex: none;
                            width: 45%;
                            margin: 10px 10px;
                        }
                    }
                    
                    @media (max-width: 550px) {
                        .card_container article {
                            width: 95%;
                            margin: 10px 2.5%;
                        }
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

    function slideShow($interval = '5', $height = '800px', $slide_url0 = null, $slide_url1 = null, $slide_url2 = null, $slide_url3 = null, $slide_url4 = null, $slide_url5 = null, $slide_url6 = null, $slide_url7 = null, $slide_url8 = null, $slide_url9 = null, $slide_url10 = null) {
        global $slideCss;
        global $slideShow;
        $height1000 = intval($height)/1.5 . 'px';
        $height600 = intval($height)/2 . 'px';

        if ($slideCss == false) {
            echo <<<EOT
            <style>
                .slideshow_container {
                    width: 100%;
                    height: $height;
                    margin: 50px 0;
                    position: relative;
                    overflow: hidden;
                }
                .slideshow_image {
                    height: 100%;
                    width: auto;
                    min-width: 100%;
                    transition: 1s;
                    position: absolute;
                    margin-top: 0;
                    margin-left: 0;
                    opacity: 0;
                }
                
                .pijl1 {
                    position: absolute;
                    margin-top: 0;
                    margin-left: 0;
                    width: 50%;
                    height: 100%;
                    z-index: 2;
                    display: flex;
                    justify-content: flex-start;
                    align-items: center;
                    transition: 0.5s;
                    opacity: 0;
                }
                
                .pijl1:hover {box-shadow: inset 700px 0px 300px -400px rgba(0,0,0,0.75); opacity: 100; cursor: pointer}
                
                .pijl2 {
                    position: absolute;
                    margin-top: 0;
                    margin-left: 50%;
                    width: 50%;
                    height: 100%;
                    z-index: 2;
                    text-align: right;
                    display: flex;
                    align-items: center;
                    justify-content: flex-end;
                    opacity: 0;
                    transition: 0.5s;
                }
                
                .pijl2:hover {box-shadow: inset -700px 0px 300px -400px rgba(0,0,0,0.75); opacity: 100; cursor: pointer}
                
                .pijl span {
                    font-size: 50px;
                    color: white;
                    margin: 0 10px;
                }
                
                .bolletjes {
                    position: absolute;
                    margin-top: 0;
                    margin-left: 0;
                    width: 100%;
                    height: 100%;
                    display: flex;
                    justify-content: center;
                    align-items: flex-end;
                    z-index: 1;
                }
                
                .bolletjes span {
                    width: 10px;
                    height: 10px;
                    border-radius: 50%;
                    margin: 30px 5px;
                    border: solid 3px white;
                    transition: 0.5s;
                }
                
                @media (max-width: 1150px) {
                    .pijl1:hover {
                        box-shadow: none;
                    }
                    .pijl2:hover {
                        box-shadow: none;
                    }
                }
                
                @media (max-width: 1000px) {
                    .slideshow_container {
                        height: $height1000;
                    }
                }
                
                @media (max-width: 600px) {
                    .slideshow_container {
                        height: $height600;
                    }
                }
            </style>
EOT;
            $slideCss = true;
        }
        echo <<<EOT
                <section class="slideshow_container" id="slideshow_container">
                <div class="pijl1 pijl" onclick="slideShow$slideShow('prev')"><span>&#x2039;</span></div><div class="pijl2 pijl" onclick="slideShow$slideShow(' ')"><span>&#x203A;</span></div>;
                <div class="bolletjes">
EOT;
        for ($i = 0; true; $i++) {
            $currentSlide = ${'slide_url' . $i};
            if ($currentSlide == null) break;
            echo "<span id='slide$slideShow$i'></span>";
        }
        echo '</div>';

        for ($i = 0; true; $i++) {
            $currentSlide = ${'slide_url' . $i};
            if ($currentSlide == null) break;
            echo <<<EOT
            <img src="$currentSlide" class="slideshow_image slide$slideShow">
EOT;
        }
        echo '</section>';

        echo <<<EOT
        <script>
            var slides = document.getElementsByClassName('slide$slideShow');
            var interval = setInterval(slideShow$slideShow, $interval);
            var slide = 0;
            slideShow$slideShow(null);
        
            function slideShow$slideShow(direction) {
                if (direction != null) {
                    clearInterval(interval);
                } 
                
                 if(direction == 'prev') {
                    slides[slide].style.opacity = '0';
                    document.getElementById('slide$slideShow'+slide).style.backgroundColor = 'transparent';
                    if (slide == 0) {
                        slide = slides.length-1
                    } else {
                        slide -= 1;
                    }
                    document.getElementById('slide$slideShow'+slide).style.backgroundColor = 'white';
                    slides[slide].style.opacity = '100';
                } else if (slide == (slides.length-1)) {
                    slides[slide].style.opacity = '0';
                    document.getElementById('slide$slideShow'+slide).style.backgroundColor = 'transparent';
                    slide = 0;
                    document.getElementById('slide$slideShow'+slide).style.backgroundColor = 'white';
                    slides[slide].style.opacity = '100';
                } else {
                    slides[slide].style.opacity = '0';
                    document.getElementById('slide$slideShow'+slide).style.backgroundColor = 'transparent';
                    slide += 1;
                    document.getElementById('slide$slideShow'+slide).style.backgroundColor = 'white';
                    slides[slide].style.opacity = '100';
                }
            }
        </script>
EOT;

        $slideShow++;
    }
}

?>
