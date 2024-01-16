<div class="box">
    <div class="content">
        <div class="box1">
            <div class="navmenu">
                <button class="custom-btn btn-12"><span>НАЖМИ</span><span>Категории</span></button>
                <button class="custom-btn btn-12 btn-12-1"><span>НАЖМИ</span> <span>Справочник</span></button>
                <button class="custom-btn btn-12 btn-12-1"><span>НАЖМИ</span> <span>Отзывы</span></button>
            </div>
            <div class="slider middle">
                <div class="slides">
                    <?php
                    global $post;
                    $myposts = get_posts([
                        'numberposts' => -1,
                        'offset'      => 0,
                        'category'    => 8
                    ]);
                    if( $myposts ){
                        $count = 0;
                        foreach( $myposts as $post ){
                            $count++;
                            setup_postdata( $post );
                            ?>
                            <!-- Вывод постов, функции цикла: the_title() и т.д. -->
                            <div class="slade-option">
                                <div class="slides1">
                                    <div class="img_slide">
                                        <div class="polaroid">
                                            <?php
                                            //должно находится внутри цикла
                                            if( has_post_thumbnail() ) {
                                                echo get_the_post_thumbnail();
                                                echo get_post_thumbnail_id();
                                            }
                                            else {
                                                echo get_the_post_thumbnail(42);
//                                          or echo '<img src="'.get_bloginfo("template_url").'/images/img-default.png" />';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="slides2" id="slides2">
                                    <div class="img_slide">
                                        <div class="vignette">
                                            <div class="text-article">
                                                <p1>
                                                    <?php the_title()?>
                                                </p1>

                                                <p2>
                                                    <?php
                                                    the_content()
                                                    ?>


                                                </p2>

                                                <div class="text-id">
                                                    <p1> <?php the_ID();?>, <?php echo get_the_date();?>, <?php the_author();?></p1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

                <div class="navigation">
                    <?php
                    $i = 1;
                    while ($i <= $count): ?>
                        <button class="b1" type="button" value="<?php  echo$i; ?>"> <?php  echo$i; ?> </button>
                        <?php
                        $i++;
                    endwhile; ?>
                </div>
            </div>


        </div>


        <div class="mid">

        </div>


        <div class="box2">
            <div class="content">

            </div>
        </div>
    </div>
</div>