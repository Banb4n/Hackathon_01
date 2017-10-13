<div class="centerApp center">
<!-- display home page -->
<?php
$preview =  file_get_contents("cache.html");

$preview = str_replace('&#60;','<',$preview);
$preview = str_replace('&#62;','>',$preview);
$preview = str_replace('380px','80%',$preview);
//$preview = str_replace('&#62;','>',$preview);

echo $preview;

?>
</div>
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red waves-effect waves-light" href="?page=update" title="updateDisplay">
        <i class="large material-icons">mode_edit</i>
    </a>
</div>

<!--
<div>
    <object  style="width: 380px;height: 500px;" data='snippets.php?user=Banb4n&var=a:3:{s:4:"user";a:6:{i:0;s:4:"name";i:1;s:10:"avatar_url";i:2;s:9:"followers";i:3;s:9:"following";i:4;s:12:"public_repos";i:5;s:12:"public_gists";}s:5:"repos";a:2:{s:5:"limit";s:3:"D-3";i:0;s:4:"show";}s:5:"gists";a:2:{s:5:"limit";s:3:"D-3";i:0;s:4:"show";}}'
             type="text/html"></object>
</div> -->