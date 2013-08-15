<?PHP
require('functions.php');
require('mySQLconnect.php');

getuserlist();

echo '<br><br><br>';
foreach ($namelist as $userkey => $userval)
{
    foreach ($hourlist as $hourkey => $hourval)
    {
        echo $userval;
        echo ' likes it at ';
        echo $hourval;
    }
}

?>