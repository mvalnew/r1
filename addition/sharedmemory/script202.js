var ball = document.getElementById('ball');
onload = function() {
    setInterval(getData, 100)
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
                var  coordX = coord[0];
                var  coordY = coord[1];
                //mess += 'x = '+coordX+' y = '+coordY; 
                ball.style.position = 'absolute';
                ball.style.left = coordX +'px';
                ball.style.top = coordY +'px';
           }
            if (mess) {
                info(mess);
            }
        };
        xhr.open('GET', 'http://help/addition/sharedmemory/of.php', true);
        xhr.send();
    }
    function info(m) {
            var  p = document.createElement("p");
            p.innerHTML = m;
            document.body.appendChild(p);
    }
};