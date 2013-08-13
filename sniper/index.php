<?php
require('head.php');
require('access.php');
if (isset($_POST['email'])) $pEmail = $_POST['email'];
if (empty($pEmail)) unset($pEmail);

if (isset($_POST['emailpass'])) $pEmailpass = $_POST['emailpass'];
if (empty($pEmailpass)) unset($pEmailpass);

if(isset($pEmail))
{
    updateuser($_SESSION['UserName'],'email',$pEmail);
    if(isset($pEmailpass))
    {
        updateuser($_SESSION['UserName'],'emailpassmd5',md5($pEmailpass));    
    }
}
?>
<form action="index.php" method="POST" class="form">
  <table style="border:1px solid black;">
    <tr>
	<td>
	
	    <h1>Resume Sniper
	    </h1>
        </td>
    </tr>
    <tr>
	<td>
<!--	    <h3>
                <a href=index.php>Home</a>
                <a href=scheduler.php>Scheduler</a>
                <a href=logout.php>Log out</a>
	    </h3>-->
        </td>
    </tr>
    <tr>
        <td>
            <h2>
            <?PHP
                echo 'Hello '.$_SESSION['UserName'].'!<br> Update email details:';
            ?> 
        </td>
    </tr>
    <tr>
        <td>
	    <table >
                <tr>
                    <td>
                        
                        Email: 
                    </td>
                    <td>
                        <?PHP
                            if(isset($_SESSION['Email']))
                            {
                                echo '<input type=email name=email value='.$_SESSION['Email'].'>';
                            }
                            else
                            {
                                echo '<input type=email name=email>';
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        
                        Email Password: 
                    </td>
                    <td>
                        <?PHP
                            if(isset($_SESSION['EmailMD5']))
                            {
                                echo '<input type=password name=emailpass value='.$_SESSION['EmailMD5'].'>';
                            }
                            else
                            {
                                echo '<input type=password name=emailpass>';
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td> 
                    </td>
                    <td align=right>
                        <input type=submit name=submit value=UPDATE>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
  </table>
</form>
<?PHP



?>
