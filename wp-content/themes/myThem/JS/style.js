$(document).ready(function () {
        // //Раскрытие слайдера
        // $('.section').click(function (event) {
        //     $('.section,.menu').toggleClass('active');
        //     $('body').toggleClass('lock');
        // });
        // // *********************END***********************************


        // //Drag&Drop функция
        // let elem = document.querySelector('#box2-1-8')
        // let offsetX;
        // let offsetY;
        //
        // $('#slaide').mousedown(function (event) {
        //     elem.addEventListener('dragstart', function (event) {
        //         offsetX = event.offsetX;
        //         offsetY = event.offsetY;
        //     });
        //
        //     elem.addEventListener('dragend', function (event) {
        //         elem.style.top = (event.pageY - offsetY) + 'px';
        //         elem.style.left = (event.pageX - offsetX) + 'px';
        //     });
        // })
        // // *********************END***********************************


        // //Удаление коментарием
        // $(document).on('click', '#buttonDel1', function () {
        //     let value = $(this).attr('value')
        //     let idDel = "#Com" + value
        //     console.log(idDel)
        //
        //     $.ajax({
        //         type: "POST",
        //         async: true,
        //         data: {
        //             del_coment: true,
        //             country: value,
        //         },
        //         success: function (data) {
        //             $(idDel).remove()
        //         },
        //     });
        // });
        // // *********************END***********************************
        //
        //
        // //Ввод комментария аяксом
        // $(document).on('click', '#btn-troa', function () {
        //     let url3 = window.location.pathname
        //     console.log(url3);
        //     $.ajax({
        //         type: "POST",
        //         url: url3,
        //         cache: false,
        //         dataType: 'JSON',
        //         data: {},
        //         success: function (data) {
        //             console.log();
        //         },
        //     });
        // });
        //
        //
        // // *********************END***********************************


        // //Вывод правил
        //
        // $(document).on('click', '#rules', function () {
        //     $('.text-rules').toggle('active');
        // })
        // // *********************END***********************************
        //
        //
        //
        //Открытие модального окна
         window.onload = function() {

             const button = document.getElementById('linkInPut');
             const modal = document.getElementById('modal');
             const wrapper = document.getElementById('wrapper');

            button.onclick = function () {
                modal.style.display = 'block';
                wrapper.style.display = 'block';
            }

            wrapper.onclick = function () {
                modal.style.display = 'none';
                wrapper.style.display = 'none';
            }
         }
        // *********************END***********************************

        //Ajax на форму для регистрации
        $('.btn1').click(function (e) { //устанавливаем событие отправки для формы с id=form
            e.preventDefault();
            let login = $('.username').val();
            let password = $('.password').val();

            $.ajax({
                url: '/',
                type: 'POST',
                dataType: 'JSON',
                cache: false,
                data: {
                    log: login,
                    pwd: password,
                    rememberme: true,
                    in_put: true
                }
                ,
                success: function (data) {
                    // console.log(data); // выводишь любое переданное значение.
                    if (data.msg === 'Авторизация прошла успешно') {
                        $("#msg1").text(data.msg);
                        location.reload();
                    }
                }
            });
        });
        // *********************END***********************************

        //Ajax на завершение сессии и логаут
        $('#exit_all').click(function (e) { //устанавливаем событие отправки для формы с id=form
            e.preventDefault();
            $.ajax({
                url: '/',
                type: 'POST',
                dataType: 'JSON',
                cache: false,
                data: {
                    exit_all: true
                }
                ,
                success: function (data) {
                    console.log(data); // выводишь любое переданное значение.
                    $("#msg1").text(data.msg);

                    if (data.msg === 'Сессия завершена') {
                        location.reload();
                    }
                }
            });
        });
        // *********************END***********************************



    //Ajax на завершение сессии и логаут
    $('#timer2').click(function (e) { //устанавливаем событие отправки для формы с id=form
        e.preventDefault();
        $.ajax({
            url: '/',
            type: 'POST',
            dataType: 'JSON',
            cache: false,
            data: {
                cook: true
            }
            ,
            success: function (data) {
                console.log(data); // выводишь любое переданное значение.

                $("#timer1").text(data);
            }
        });
    });
    // *********************END***********************************















})


//Упраление слайдами
$(document).on('click', '.b1', function () {
    if(this.value>1) {
        let i = (this.value * -1 * 100) +100
        $('.slides').css('top', i+'%');
    }else {
        $('.slides').css('top', "0%");
    }
})
// *********************END***********************************


//Таймер на время авторизации
// $(document).ready(function () {
//     let timer = 120
//     let secund = 60
//     function sayHi() {
//         if (timer>0) {
//               timer = timer - 1
//               secund = secund - 1
//             let  minut  = Math.round(timer/60)
//             let time = minut + ":" + secund
//             $("#timer").html(time);
//         }else {
//             $("#timer").html('Время истекло');
//         }
//
//     }
//
//     setInterval(sayHi, 1000);
//
// })
 // *********************END***********************************
