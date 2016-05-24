var ball = document.getElementById('ball');

// отключение браузерного Drag'nDrop
ball.ondragstart = function() {
   return false; 
};
   
// при нажатии мыши - подготовимся к перемещению
ball.onmousedown = function(e) {
        
    var xhr = new  XMLHttpRequest();
    xhr.onreadystatechange = onreadystatechange();
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
    
   // инициализация AJAX
   function onreadystatechange() {
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
   }
   // отправка сообщения на сервер
    function send(left, top) {
        xhr.abort();
        var params = '?left=' + left + '&top=' + top;
        //xhr.open('GET', 'http://help/addition/sharedmemory/on.php'+params, true);
        xhr.open('GET', 'on.php'+params, true);
     xhr.send();
    }
    
    function info(m) {
            var  p = document.createElement("p");
            p.innerHTML = m;
            document.body.appendChild(p);
    }
};
