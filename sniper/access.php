<!--//access.php-->

<?php
require('mySQLconnect.php');
require('functions.php');

session_start();
if (!isset($_SESSION['loggedIn']))
{
    $_SESSION['loggedIn'] = false;
}
if (isset($_POST['username']))
{echo 'Here<br><br>';
$pUser = $_POST['username'];
$pPass = $_POST['password'];
    getuserdetails($pUser,$pPass);

    if($exists == 'Y')
    {
        if (md5($_POST['password']) === $sniperpassmd5)
        {
            $_SESSION['loggedIn'] = true;
            $_SESSION['UserName'] = $pUser;
            $_SESSION['Email'] = $email;
            $_SESSION['EmailMD5'] = $emailpassmd5;
            $_SESSION['EmailDomain'] = $emaildomain;
        }
        else
        {
            die ('Incorrect password');
        }
    }
    else
    {
        echo 'Adding user: '.$_POST['username'];
        adduser($_POST['username'],$_POST['password']);
    }
    
}


if (!$_SESSION['loggedIn']):

?>

<?PHP
//echo md5($_POST['password']);
//         echo '<br><br><br>';
//         echo $sniperpassmd5;
//if (sha1('waffle') == '3c24bffe42f67e21d9d4d5dbc01a6eafd9019422')
//{
//    echo 'Woof';
//}

?>

<html><head><title>Login</title></head>
  <body>
    <p>You need to login</p>
    <form method="post">
      Username: <input type="password" name="username"> <br />    
      Password: <input type="password" name="password"> <br />
      <input type="submit" name="submit" value="Login">
    </form>
  </body>
</html>

<?php
exit();
endif;
?>