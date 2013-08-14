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
{#echo 'Here<br><br>';
$pUser = $_POST['username'];
$pPass = $_POST['password'];
    getuserdetails($pUser,$pPass);

    if($exists == 'Y')
    {
        if (md5($_POST['password']) === $sniperpassmd5)
        {
            $_SESSION['loggedIn'] = true;
            $_SESSION['UserName'] = $pUser;
            $_SESSION['UserID'] = $userid;
            $_SESSION['Email'] = $email;
            $_SESSION['DefaultCoverletter'] = $defaultcoverletter;
            $_SESSION['PrefHourOfDay'] = $prefhourofday;
            decryptthis($_SESSION['UserName'],$emailpassmd5);
            $_SESSION['EmailMD5'] = $decryptedthis;
            $_SESSION['EmailDomain'] = $emaildomain;
            $_SESSION['ReplyToName'] = $replytoname;
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

<html>
<head>
<title>Login</title>
</head>
  <body>
  <form method="post">
  <table style="border:1px solid black;">
    <tr>
	<td>
	
	    <h1>Resume Sniper
	    </h1>
	    <table>
		<tr>
		    <td>
                        <h2>You need to login:</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        
                        Username: 
                    </td>
                    <td>
                        <input type="password" name="username">
                    </td>
                </tr>
                <tr>
                    <td>
                        Password:
                        <td>
                            <input type="password" name="password">
                        </td>
                </tr>
                <tr>
                <td>
                    
                </td>
                    <td align=right>
                        <input type="submit" name="submit" value="Login">   
                    </td>
                </tr>
                         
                        
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</form>
  </body>
</html>

<?php
exit();
endif;
?>