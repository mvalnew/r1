<?php
/* $content - массив контентов */
function html($caption, $content, $mode='file') { ?>
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
            if ($mode=='file') {
                include $el['content'];
            } elseif($mode=='db') {
                echo $el['content']; 
            }
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

function addContentOfDB(&$content, $sectionid) {
    if ($sectionid) {
        @ $db = new mysqli('localhost', 'mysql','mysql','help');
        if (!mysqli_connect_errno()) {
            $query = "select * from topics where sectionid=$sectionid";
            $result = $db->query($query);
            $num_results = $result->num_rows;
            for ($i=0; $i < $num_results; $i++) { 
                $row = $result->fetch_assoc();
                $content[] = array('title'=>$row['name'], 'href'=>'topic'.$row['topicid'],
                     'content'=>$row['content']);
            }
            $result->close();
            $db->close();
        }
    }
}

?>