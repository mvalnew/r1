<?php
/* $content - массив контентов */
function html($caption, $content) { ?>
<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo $caption; ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<table>
  <tr>
    <td id="menu">
    <li><a href='/index.html'>В начало</a>
    <h4>Содержание:</h4>
    <?php foreach(getMenu($content) as $el) {
        echo "<li>$el\n";
    } ?>
    </td>
    <td id="content">
    <?php
        echo "<h2>$caption</h2>";
            foreach($content as $el) {
            echo '<h3><a name="'.$el['href'].'">'.$el['title']."</a></h3> \n";
            include $el['content'];
        } 
    ?>
    </td>
  </tr>
</table>
</body>
</html>
<?php } 

/* $content - массив контентов состоящих из 
el.title, el.href и el.content*/
// возвращает массив сток меню в виде <a htef='...'>...</a>
function getMenu($content) { 
    $res = array();
    foreach($content as $el) {
        $res[] = '<a href="#'.$el['href'].'">'.$el['title'].'</a>';
    }
    return $res;
}

function addContent(&$content, $title, $href) {
    $content[] = array('title'=>$title, 'href'=>$href, 'content'=>$href.'.html');
}
?>