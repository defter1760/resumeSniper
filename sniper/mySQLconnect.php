<?PHP
##connect to MySQL DB
$link = mysql_connect('localhost', 'ian', 'maniacman669')
    or die('Could not connect: ' . mysql_error());
#echo 'Connected successfully';
mysql_select_db('sniper') or die('Could not select database');
?>