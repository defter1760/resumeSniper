<?php

  $im=imagecreate(1,1);
  $white=imagecolorallocate($im,255,255,255);
  imagesetpixel($im,1,1,$white);
  header("content-type:image/jpg");
  imagejpeg($im);
  imagedestroy($im);

?>

<?PHP
require('mySQLconnect.php');
$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');

$hour = date('G');
$day = date('l');

if(isset($_COOKIE["users_resolution"]))
$screen_res = $_COOKIE["users_resolution"];
else //means cookie is not found set it using Javascript
{
echo "\n";
echo "<script language=\"javascript\">";
echo "\n";
echo "writeCookie();";
echo "\n";
echo "function writeCookie()";
echo "\n";
echo "{";
    echo "\n\t";
    echo "var today = new Date();";
    echo "\n\t";
    echo "var the_date = new Date(\"December 31, 2023\");";
    echo "\n\t";
    echo "var the_cookie_date = the_date.toGMTString();";
    echo "\n\t";
    echo "var the_cookie = \"users_resolution=\"+ screen.width +\"x\"+ screen.height;";
    echo "\n\t";
    echo "var the_cookie = the_cookie + \";expires=\" + the_cookie_date;";
    echo "\n\t";
    echo "document.cookie=the_cookie";
echo "}";
echo "</script>";

}
if (isset($_SERVER['HTTP_REFERER'])) $ref = $_SERVER['HTTP_REFERER'];
if (empty($ref)) $ref = '';
if (isset($_SERVER['REMOTE_ADDR'])) $ip = $_SERVER['REMOTE_ADDR'];
if (empty($ip)) $ip = '';
if (isset($_SERVER['REMOTE_HOST'])) $dns = $_SERVER['REMOTE_HOST'];
if (empty($dns)) $dns = '';
if (isset($_GET['id'])) $userid = $_GET['id'];
if (empty($userid)) $userid = '';
if (isset($_GET['id2'])) $appliedid = $_GET['id2'];
if (empty($appliedid)) $appliedid = '';

 $query = "INSERT INTO hits (ref,date,time,week,month,ip,dns,userid,appliedid,hour,day,resolution)
 VALUES ('$ref','$date','$time','$week','$month','$ip','$dns','$userid','$appliedid','$hour','$day','$screen_res')";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
?>