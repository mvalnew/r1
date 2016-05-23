var ball = document.getElementById('ball');

// отключение браузерного Drag'nDrop
ball.ondragstart = function() {
   return false; 
};
   
// при нажатии мыши - подготовимся к перемещению
ball.onmousedown = function(e) {
        
    // разместим в том же месте, но в абсолютных координатах
    ball.style.position = 'absolute';
    moveAt(e);
    
    // перемещение
    document.onmousemove = function (e) {
        moveAt(e);
    };
    
    // окончание перемещения
    ball.onmouseup = function() {
        document.onmousemove = null;
        document.onmouseup = null;
    };
    
   // центрируем мяч под курсором
    function moveAt(e) {
        var left = e.pageX - ball.offsetWidth/2;
        var top = e.pageY - ball.offsetHeight/2;
        
        send(left, top);
        
        ball.style.left = left +'px';
        ball.style.top = top +'px';
    }
    
    // отправка сообщения на сервер
    function send(left, top) {
       // AJAX
        var xhr = new  XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState != 4) return;
            var mess = "";
            if (xhr.status != 200) {
                mess += xhr.status + ': ' + xhr.statusText;
            } else {
                mess += xhr.responseText;
            }
            if (mess) {
                info(mess);
            }
        };
        var params = '?left=' + left + '&top=' + top;
        xhr.open('GET', 'http://help/addition/sharedmemory/on.php'+params, true);
        xhr.send();
    }
    
    function info(m) {
            var  p = document.createElement("p");
            p.innerHTML = m;
            document.body.appendChild(p);
    }
};
