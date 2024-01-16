<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'dbWP' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'worldpress' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'worldpress' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '!/Z.:,Y*hvm_w`@0QP#mvhG kG5M&@R;-{g7|+@>P5a;pZBjQbA0]Gq+h*S:y/G2' );
define( 'SECURE_AUTH_KEY',  '$wo0qM8;Nu`BU%s7Y)-r)]|fY3gGfvu_UXr61Q6KlD:$:x{G&M}y@~-6?9OVZD.n' );
define( 'LOGGED_IN_KEY',    '4$nGvWdz_?F@`/ wDnG}*T< h3~qolp|,W%B?]gQpRu3Zl]*;?a+[>cpXYi*/= q' );
define( 'NONCE_KEY',        '^4]SvV6_%G=S}PCMAlWCbWjKq1i oK1SCj,jX]P4`o!;ZjInHOzB?Z]bNOIbB:!]' );
define( 'AUTH_SALT',        'vj*9/5N-kTf[/g],m%!0tn6^2T- y5a/l v;l+J):zXZ!Q}}=KYg<yDI`Lul@:84' );
define( 'SECURE_AUTH_SALT', 'cevrVEUQFp=t70l7OqH<;m[7DN?/6|[,amjMu`@C)q}?822npza.P#l3<]^UChtP' );
define( 'LOGGED_IN_SALT',   'lCjn.T,*ucH- ?W)Xe~R~S&1!GW6-z@g^z]+$?p7vI<`9OSOh_ALchS:$;F1gu}Z' );
define( 'NONCE_SALT',       'tKL[R7wieuA6ptwxr[vrJf2:@j2 :Z>.L=-2jc!cDC:NZ>x40);&m&6PzB&8*3tO' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
/* define( 'WP_DEBUG', false );  когда деплоится на сайт */

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */


/* Принудительное использование SSL соединения*/
define('FORCE_SSL_ADMIN', true);
// in some setups HTTP_X_FORWARDED_PROTO might contain
// a comma-separated list e.g. http,https
// so check for https existence
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && strpos( $_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false ) {
    $_SERVER['HTTPS'] = 'on';
}

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
