onload = new function() {
    var subsection = getUrlVars()["subsection"];
    if (subsection) {
        var head = document.getElementsByTagName("head")[0];
        var script = document.createElement("script");
        script.src = "script"+subsection+".js";
        head.appendChild(script);
    }
}
function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}
