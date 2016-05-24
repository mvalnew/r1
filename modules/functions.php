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
        $db = getDB();
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

//******************* 3-х уровневая структура *****************************************

// 3-х уровневая структура раздел-подразделы-статьи

function getName($sectionid) {
    $name = "";
    if ($sectionid) { // если есть sectionid
        $db = getDB();
        if (!mysqli_connect_errno()) { // если нет ошибок
            $query = "select * from sections where sectionid=$sectionid";
            $res = $db->query($query);
            $num_results = $res->num_rows;
            for ($i=0; $i < $num_results; $i++) { 
                $row = $res->fetch_assoc();
                $name = $row['name'];
            }
            $res->close();
            $db->close();
        } // если нет ошибок
    } // если есть sectionid
    return $name;
}

// меню для секции (страницы)
function setMenu($sectionid) {
    if ($sectionid) { // если есть sectionid
        $db = getDB();
        if (!mysqli_connect_errno()) { // если нет ошибок
            // 1-й уровнь - параметр $sectionid 
            // 2-й уровень - выбираем дочерние подразделы
            $query = "select * from sections where parent=$sectionid";
            $res = $db->query($query);
            $num_results = $res->num_rows;
            for ($i=0; $i < $num_results; $i++) { 
                $row = $res->fetch_assoc();
                //$result[] = array('id'=>$row['sectionid'], 'name'=>$row['name']);
                echo "<li><a href='?subsection={$row['sectionid']}'>{$row['name']}</a>";
            }
            $res->close();
            $db->close();
        } // если нет ошибок
    } // если есть sectionid
}

function getDb() {
        @ $db = new mysqli('localhost', 'mysql','mysql','help');
        //@ $db = new mysqli('mysql.cba.pl', 'mv','liberty','mv_zzz_com_ua', 3306);
        return $db;
}

// Вывод тем одной секции (одна страница)
function setTopics($subsectionid) {
    if ($subsectionid) { // если есть sectionid
        $db = getDB();
        if (!mysqli_connect_errno()) { // если нет ошибок
            $query =  "select  * from topics where sectionid=$subsectionid";
            $result = $db->query($query);
            $num_results = $result->num_rows;
            if ($result) {
                for ($i=0; $i < $num_results; $i++) { 
                    $row = $result->fetch_assoc();
                    echo "<h2 id='topic_{$row['topicid']}' style='text-align: center;'><strong>{$row['name']}</strong></h2>";
                    echo $row['content'];
                }
                $result->close();
            }
            $db->close();
        } // если нет ошибок
    } // если есть sectionid
}

// Вывод HTML для секции первого уровня и ее подсекций
function setHTML($sectionid, $startTopic, $scriptFile="") { 
    $subsectionid = $_GET['subsection'];
    if (!$subsectionid) {
        $subsectionid = $startTopic;
    }
    $caption = getName($sectionid)." : ".getName($subsectionid);
    $script = "";
    if ($scriptFile) {
        $script = "<script src='$scriptFile'></script>";
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo $caption; ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/style.css">
    <?php echo $script; ?>
</head>
<body>
<h1 style="text-align: center;"><?php echo $caption; ?></h1>
<table>
  <tr>
    <td id="menu">
    <li><a href='/index.html'>В начало</a>
    <h4>Содержание:</h4>
    <?php setMenu($sectionid) ?>
    </td>
    <td id="content">
    <?php setTopics($subsectionid); ?>
    </td>
  </tr>
</table>
</body>
</html>
<?php } ?>