<?php get_header()?>

<div class="box">
       <div class="content">

           <div class="search_box">
               <?php get_search_form(); ?>
           </div>


           <div class="box1">

            <div class="navmenu">
                <button class="custom-btn btn-12"><span>НАЖМИ</span><span>Новости</span></button>
                <button class="custom-btn btn-12 btn-12-1"><span>НАЖМИ</span> <span>Картотека</span></button>
                <button class="custom-btn btn-12 btn-12-1"><span>НАЖМИ</span> <span>Справочник</span></button>
            </div>

            <div class="box1-1">
                <div class="title_category">
                    <p> Свежее на сайте </p>
                </div>
                <div class="news">
                    <?php
                    global $post;
                    $myposts = get_posts([
                        'numberposts' => -1,
                        'offset'      => 6,
                        'category'    => 8
                    ]);
                    if( $myposts ){
                        $count = 0;
                        foreach( $myposts as $post ){
                            $count++;
                            setup_postdata( $post );
                            ?>

                            <div class="box_news">
                                <div class="box_news_title">
                                    <p1><?php the_title()?></p1>
                                </div>
                                <div class="box_news_img">
                                    <?php
                                    if( has_post_thumbnail() ) {
                                        echo get_the_post_thumbnail();
                                    }
                                    else {
                                        echo get_the_post_thumbnail(42);
    //                                          or echo '<img src="'.get_bloginfo("template_url").'/images/img-default.png" />';
                                    }
                                    ?>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        // Постов не найдено
                    }

                    wp_reset_postdata(); // Сбрасываем $post
                    ?>
                </div>
            </div>
        </div>


        <div class="mid">
            <style>
                #but_input {
                    width: 100px;
                    height: 100px;
                }

            </style>
            <input type="button" id="but_input"> ввод</input>
            <div id="chat"> </div>
        </div>

        <div class="box2">
            <div class="content">

            </div>
        </div>
    </div>
</div>

<?php get_footer()?>
