<?PHP
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


$serverName = "localhost\SPICE";
$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );

if (isset($_SERVER['HTTP_REFERER'])) $ref = $_SERVER['HTTP_REFERER'];
if (empty($ref)) $ref = '';
if (isset($_SERVER['REMOTE_ADDR'])) $ip = $_SERVER['REMOTE_ADDR'];
if (empty($ip)) $ip = '';
if (isset($_SERVER['REMOTE_HOST'])) $dns = $_SERVER['REMOTE_HOST'];
if (empty($dns)) $dns = '';
if (isset($_GET['uniqueid'])) $uniqueid = $_GET['uniqueid'];
if (empty($uniqueid)) $uniqueid = '';
 $query = "INSERT INTO hits (ref,date,time,week,month,ip,dns,uniqueid,hour,day,resolution)
 VALUES ('$ref','$date','$time','$week','$month','$ip','$dns','$uniqueid','$hour','$day','$screen_res')";
$results = sqlsrv_query($conn,$query);
?>