<div class="footer">
    <div class="container">

        Контакт
    </div>
</div>

<!--  Модальное окно для авторизации и переход на регистрацию  -->
<div id="wrapper"> </div>

<div id = "modal" >
    <div class="popup1">
        <form method="post" class="form_index">
            <h32>Login Form</h32> <br><br>
            <div>
                <input type="text" name="loginUser" class="username" placeholder="Логин"><br>
            </div>

            <div>
                <input type="password" name="passUser"  class="password" placeholder="Пароль" autocomplete="on"><br><br>
            </div>
            <div>
                <input class="button10 btn1" type="submit"  name="in_put" placeholder="Войти"><br><br>
            </div>
            <div id="error_cod">
                <p1 id="msg1"></p1>
            </div>
            <a href="/account"> <p> Жми сюда если еще не зарегестрировался?</p></a>
        </form>
    </div>
</div>

<!--  Добавление JS скриптов  -->
<?php wp_footer();?>
</body>
</html>