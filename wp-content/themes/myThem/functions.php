<?php
//if(!session_id()) {
//    session_start();
//}

require 'vendor/autoload.php';


//if(isset($_SESSION['user_time'])) {
//    $loop = React\EventLoop\Loop::get();
//    $outTime = $_SESSION['user_time'];
//    $timer = $loop->addPeriodicTimer(1, function ($timer) use ($loop, $outTime) {
//        $nowTime = time();
//        if ($nowTime>=$outTime) {
//            $loop->cancelTimer($timer);
//        }
//    });
//    $loop->run();
//
//}




/** --------------------------------------------------------------------
 * Скрываем вермию WP
--------------------------------------------------------------------- */
remove_action('wp_head', 'wp_generator');



/** -------------------------------------------------------------------
 * Подключение стилей и скриптов
---------------------------------------------------------------------*/
// правильный способ подключить стили и скрипты
add_action( 'wp_enqueue_scripts', 'myThem_scripts' );
function myThem_scripts() {
    //подключение стилей
    wp_enqueue_style( 'main', get_stylesheet_uri() );
    wp_enqueue_style( 'myThem', get_template_directory_uri() . '/css/style.css', array('main') );

    //подключение скриптов
    wp_deregister_script('jquery');
    wp_register_script('jquery',get_template_directory_uri() . '/JS/jquery.js' );
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'jsstyle', get_template_directory_uri() . '/JS/style.js', array('jquery') );
    wp_enqueue_script("myThem-ajax-search", get_template_directory_uri(). '/JS/ajax-search.js', array('jquery'), "", true);
    wp_enqueue_script("myThem-chat", get_template_directory_uri(). '/JS/chat.js', array('jquery'), "", true);
}
/** -------------------------------------------------------------------
 *                                                                  ---
---------------------------------------------------------------------*/



/**
 * Подключение записей в админ панель
 */
add_theme_support('post-thumbnails');
add_theme_support('title-tag');



/**
 * Подключение логотипов
 */

if (! function_exists('myThem_setup')) {
    function myThem_setup() {
        // Добавление пользовательского логотипа
        add_theme_support('custom-logo', [
            'height'        => 190,
            'width'         => 190,
            'flex-width'    => false,
            'flex-height'   => false,
            'header-text'   => '',
            'unlink-homepage-logo' => false,
        ]);
        //добавление динамического <title>
        add_theme_support('title-tag');
    }
    add_action('after_setup_theme','myThem_setup' );
}

/** -------------------------------------------------------------------
 * Авторизация
---------------------------------------------------------------------*/
if (isset( $_POST['in_put'])) {

    $user = wp_signon([
        'user_login'    => $_POST['log'],
        'user_password' => $_POST['pwd'],
        'remember'      => $_POST['rememberme'],
    ], true);

// авторизация не удалась
    if ( is_wp_error($user) ) {
        $answer = array( 'msg'=>"Данные введены не верно");
        echo json_encode($answer, JSON_UNESCAPED_UNICODE);
        echo $user->get_error_message();
        exit();
    } else {
         $answer = array( 'msg'=>"Авторизация прошла успешно");
         echo json_encode($answer, JSON_UNESCAPED_UNICODE);
//        // создание куки для передачи временни авторизации
//        $visit_time = time();
//        if(!isset($_COOKIE['wpb_visit_time'])) {
//            // set a cookie for 1 year
//            setcookie('wpb_visit_time', $visit_time, time()+300);
//        }

        exit();
    }
}

/** -------------------------------------------------------------------
 * Логаут
---------------------------------------------------------------------*/

if (isset( $_POST['exit_all'])) {
    wp_logout();
    $answer = array( 'msg'=>"Сессия завершена");
    echo json_encode($answer, JSON_UNESCAPED_UNICODE);
//    session_destroy();
//    unset($_COOKIE['wpb_visit_time']);
    exit();
}

/** -------------------------------------------------------------------
 * Работа с блогом
---------------------------------------------------------------------*/









/** -------------------------------------------------------------------
 * ajax поиск по сайту
---------------------------------------------------------------------*/

add_action("wp_ajax_nopriv_ajax_search", "ajax_search");
add_action("wp_ajax_ajax_search", "ajax_search");
function ajax_search(){
    $args = array(
        "post_type"      => "post", // Тип записи: post, page, кастомный тип записи
        "post_status"    => "publish",
        "order"          => "DESC",
        "orderby"        => "date",
        "s"              => $_POST["term"],
        "posts_per_page" => -1
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post();
            get_template_part("template-parts/loop-search-item");
        endwhile;
    } else {
        echo "Ничего не найдено";
    }
    exit;
}

/** -------------------------------------------------------------------
 * Время логирования в секундах
---------------------------------------------------------------------*/

if (isset( $_POST['cook'])) {
    $answer = $_SESSION['user_time'];
    echo json_encode($answer, JSON_UNESCAPED_UNICODE);
    exit();
}





//var_dump($_COOKIE['logged_in_cookie']);

//add_filter( 'auth_cookie_expiration', 'ats_auth_cookie_expirations');
//function ats_auth_cookie_expirations($expirein) { //
//    return 5; // 1 год в секундах
//}

?>