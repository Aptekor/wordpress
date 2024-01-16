<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--     Добавление CSS стилей -->
    <?php wp_head();?>
</head>
<body>
    <header>
        <div class="container">
            <div class="container_all_header">
                <div class="box_header_right">
                    <?php
                        if (has_custom_logo()) {
                            // Логотип есть выводим его
                            echo  get_custom_logo();
                        }
                    ?>
                </div>

                <div class="box_header_center">
                    <a href="/"> <h11> Старый Пасечник </h11> </a>
                </div>

                <div class="box_header_left">
                    <nav class="menu">
                        <ul class="list">

                                <?php if (!is_user_logged_in()): ?>
                                    <li>
                                        <a id="linkInPut" class="link popup-link"> <div class="icon"> <img src="<?php echo get_template_directory_uri()?>/img/icon-in.png" alt=""></div> <p1>Вход</p1> </a>
                                    </li>
                                <?php endif; ?>

                                <?php if (is_user_logged_in()): ?>
                                    <li>
                                        <a class="link"  id = "icon-article">
                                            <div class="icon">
                                                <div class="timer" id="timer1">

                                                    <input type="submit" id="timer2">

                                                    <?php echo $_SESSION['user_time'];?>


                                                    <?php
                                                        if(isset($_COOKIE['Admin'])) {
                                                        echo "The cookie: '" . 'Admin' . "' is not set.";
                                                        }

                                                    ?>


                                                </div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="link" href="/account">  <div class="icon"> <img src="<?php echo get_template_directory_uri()?>/img/icon_LK.png" alt=""> </div> <p1>Профиль</p1> </a>
                                    </li>

                                    <li>
                                        <a class="link" href="/" id="exit_all">
                                            <div class="icon">
                                                    <input type="image" src="<?php echo get_template_directory_uri()?>/img/icon-exit.png" alt="" width="26" height="28" name=DESTROY SESSION">
                                            </div>
                                            <p1>Выход</p1>
                                        </a>
                                    </li>
                                <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>