<?php
$dir = '.';
$article = $_REQUEST['art'];
if ($article != '') {
    $content = file_get_contents($article.'.art');
} else {
    $list = str_replace($dir.'/','',(glob($dir.'/*.art')));
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Help</title>
<link rel="shortcut icon" href="sys.help.png?rev=<?=time();?>" type="image/x-icon">
<link href="system.css?rev=<?=time();?>" rel="stylesheet">
<script src="jquery.js?rev=<?=time();?>"></script>
<script src="base.js?rev=<?=time();?>"></script>
</head>
<body>
<?php
if ($article != '') {
    $artdiv = explode('|[1]|', $content);
    $arthead = $artdiv[0];
    $artbody = $artdiv[1];
?>
    <p>
    <a href="help.php">INDEX</a>
    <a href="javascript:get('i', '', 'from', 'help', '', 'flossely');">UPDATE</a>
    <a href="index.php">EXIT</a>
    </p>
    <h2><?=$arthead;?></h2>
    <p><?=$artbody;?></p>
<?php
} else {
?>
<p>
<a href="javascript:get('i', '', 'from', 'help', '', 'flossely');">UPDATE</a>
<a href="index.php">EXIT</a>
</p>
<h2>TABLE OF CONTENTS</h2>
<?php
    foreach ($list as $key=>$value) {
        $artbase = basename($value, '.art');
        $content = file_get_contents($value);
        $artdiv = explode('|[1]|', $content);
        $arthead = $artdiv[0];
        $artbody = $artdiv[1];
?>
<p><a href="help.php?art=<?=$artbase;?>"><?=$arthead;?></a></p>
<?php }} ?>
</body>
</html>
