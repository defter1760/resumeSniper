<?php
require('access.php');
?>
<?PHP
echo 'Hello '.$_SESSION['UserName'].'!';
echo '<br><br>';
if(isset($_SESSION['Email']))
{
    echo 'Email:<input type=email name=email value='.$_SESSION['Email'].'>';
}
else
{
        echo 'Email:<input type=email name=email>';
}
echo '<br><br>';
if(isset($_SESSION['EmailMD5']))
{
    echo 'Email Password:<input type=password name=emailpass value='.$_SESSION['EmailMD5'].'>';
}
else
{
        echo 'Email Password:<input type=password name=emailpass>';
}
?>
<br><br>
<a href=logout.php>Log out</a>