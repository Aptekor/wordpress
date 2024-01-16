$(document).ready(function () {

    let ws = new WebSocket('ws://localhost:2345');

    $("#but_input").on('click', function() {
       ws.send(JSON.stringify()) // отправляем на сервер
    })

    ws.onmessage = response => {
        $("#chat").text(response.data);
    }
})