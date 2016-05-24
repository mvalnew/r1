var ball = document.getElementById('ball');
ball.style.position = 'absolute';
onload = function() {
    setInterval(getData, 30)
    function  getData() {
        // AJAX
        var xhr = new  XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState != 4) return;
            var mess = "";
            if (xhr.status != 200) {
                mess += xhr.status + ': ' + xhr.statusText;
            } else {
                var coord = xhr.responseText.split("\n");
                var  coordX = coord[0] +'px';
                var  coordY = coord[1] +'px';
                //mess += 'x = '+coordX+' y = '+coordY; 
                if (ball.style.left != coordX)
                    ball.style.left = coordX;
                if (ball.style.top != coordY)
                    ball.style.top = coordY;
           }
            if (mess) {
                info(mess);
            }
        };
        //xhr.open('GET', 'http://help/addition/sharedmemory/of.php', true);
        xhr.open('GET', 'of.php', true);
        xhr.send();
    }
    function info(m) {
            var  p = document.createElement("p");
            p.innerHTML = m;
            document.body.appendChild(p);
    }
};