<!--стандартный поиск-->
<!--<form role="search" method="get" id="searchform" action="--><?php //echo home_url( '/' ) ?><!--" >-->
<!--	<label class="screen-reader-text" for="s">Поиск: </label>-->
<!--	<input type="text" value="--><?php //echo get_search_query() ?><!--" name="s" id="s" />-->
<!--	<input type="submit" id="searchsubmit" value="найти" />-->
<!--</form>-->

<!--скастомный поиск-->
<form class="search-form" role="search" method="get" id="searchform"
      action="<?php echo home_url('/') ?>">
    <input
            class="search-form__input"
            type="text"
            value="<?php echo get_search_query() ?>"
            name="s" id="s"
            placeholder="Поиск на сайте WordPress"
            autocomplete="off"
    />
    <button type="button" id="searchsubmit">
        <p>Жми</p>
    </button>

    <ul class="ajax-search"></ul>
</form>