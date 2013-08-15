<?PHP

function reversableencryption($key,$string)
{
    global $encrypted;
    global $decrypted;
    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
    $encrypted = rtrim($encrypted,"=");
    $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($key))), "\0");

}

function encryptthis($key,$string)
{
    global $encryptedthis;
    $encryptedthis = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
    $encryptedthis = rtrim($encryptedthis,"=");
}

function decryptthis($key,$encrypted)
{
    global $decryptedthis;
    $decryptedthis = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($key))), "\0");


}

function getuserdetails($usernamedetails)
{
    global $lineuser;
    global $sniperpassmd5;
    global $email;
    global $emailpassmd5;
    global $emaildomain;
    global $exists;
    global $line;
    global $userid;
    global $defaultcoverletter;
    global $prefhourofday;
    global $replytoname;
    $query = "SELECT * FROM userdata where username='".$usernamedetails."'";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
    {
        $lineuser = $line['username'];
        $sniperpassmd5 = $line['sniperpassmd5'];
        $email = $line['email'];
        $emailpassmd5 = $line['emailpassmd5'];
        $emaildomain = $line['emaildomain'];
        $userid = $line['iduserdata'];
        $defaultcoverletter = $line['defaultcoverletter'];
        $prefhourofday = $line['prefhourofday'];
        $replytoname = $line['replytoname'];
    }
    {
        if($usernamedetails == $lineuser)
        {
            $exists = 'Y';
        }
        else
        {
            $exists = 'N';
        }
    }
}
function getuserlist()
{

    global $namelist;
    global $hourlist;
    $query = "SELECT * FROM userdata";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
    {
        $namelist[] = $line['username'];
        $hourlist[] = $line['prefhourofday'];
    }
}
function getmaildetails($usernamemail)
{
    global $lineuser;
    global $sniperpassmd5;
    global $email;
    global $emailpassmd5;
    global $emaildomain;
    global $exists;
    global $line;
    global $userid;
    
    $query = "SELECT * FROM userdata where username='".$usernamemail."'";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
    {
        $userid = $line['iduserdata'];
    }    
    
    $query2 = "SELECT * FROM applied where userid='".$userid."'";
    $result2 = mysql_query($query2) or die('Query failed: ' . mysql_error());
    
    while ($line2 = mysql_fetch_array($result2, MYSQL_ASSOC))
    {
    echo '<tr>';
        echo '<td style="border:1px solid black;" valign=bottom>';
            echo '<input type=text disabled=disabled value="';
            echo date(m."-".d."-".Y);
            echo '">';
        echo '</td>';
        echo '<td style="border:1px solid black;" valign=bottom>';
        echo '<input type=text disabled=disabled value="';
            echo $line2['emailaddress'];
            echo '">';
        echo '</td>';
        echo '<td style="border:1px solid black;" valign=bottom>';
        echo '<input type=text disabled=disabled value="';
            echo $line2['subject'];
            echo '">';
        echo '</td>';        
        echo '<td style="border:1px solid black;" valign=bottom>';
        echo '<textarea disabled=disabled>';
            echo $line2['emailtext'];
            echo '</textarea >';
        echo '</td>';
        echo '<td style="border:1px solid black;" valign=bottom>';
            echo '<textarea disabled=disabled>';
            echo $line2['reminder'];
            echo '</textarea >';
        echo '</td>';
        echo '<td style="border:1px solid black;" valign=bottom>';
            echo '<a class="schedule" href="'.$line2['url'].'">';
            echo $line2['url'];
            echo '</a>';
        echo '</td>';
        echo '<td style="border:1px solid black;" valign=bottom>';
            echo '<textarea  disabled=disabled>';
            if(isset($line2['sent']))
            {
                echo 'Sent date:';
                echo $line2['sentdate'];
            }
            echo '</textarea>';
        echo '</td>';        
    echo '</tr>';
    }

}

function getmailcount($usernamemail)
{
    global $mailcount;
    
    $query = "SELECT * FROM userdata where username='".$usernamemail."'";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
    {
        
        $userid = $line['iduserdata'];
        #echo $userid;
    }    
    
    $querymailarray = "SELECT * FROM applied where userid='".$userid."' and sent IS NULL";
    $resultmailarray = mysql_query($querymailarray) or die('Query failed: ' . mysql_error());
    while ($line2 = mysql_fetch_array($resultmailarray, MYSQL_ASSOC))
    {
        
        $mailID = $line2['idapplied'];
        $mailADDRESS = $line2['emailaddress'];
        $mailTEXT = $line2['emailtext'];
        
    }
        #print_r($mailarray);
}

function adduser($usernameadd,$passwordadd)
{
    $query = "SELECT * FROM userdata where username='".$usernameadd."'";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
    {
        $lineuser = $line['username'];

      #  username,sniperpassmd5,email,emailpassmd5,emaildomain

    }
    {
        if($usernameadd == $lineuser)
        {
            $exists = 'Y';
        }
        else
        {
            $exists = 'N';
        }
    }
    if($exists == 'N')
    {
        $newpass = md5($passwordadd);
        $query = "insert into userdata (username,sniperpassmd5) values('".$usernameadd."','".$newpass."')";
        $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    }
         
}

function addmail($userid,$date,$email,$emailbody,$reminder,$url,$subject)
{
        $query = "insert into applied (userid,date,emailaddress,emailtext,reminder,url,subject)
        values('".$userid."','".$date."','".$email."','".$emailbody."','".$reminder."','".$url."','".$subject."')";
        $result = mysql_query($query) or die('Query failed: ' . mysql_error());
}

function updateuser($usernameupdate,$fieldname,$fieldsetto)
{
    $query = "SELECT * FROM userdata where username='".$usernameupdate."'";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
    {
        $lineuser = $line['username'];

      #  username,sniperpassmd5,email,emailpassmd5,emaildomain
    }

        if($usernameupdate == $lineuser)
        {
            //$newpass = md5($passwordadd);
            $query = "UPDATE userdata set ".$fieldname."='".$fieldsetto."' where username='".$usernameupdate."'";
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        }
        else
        {
            $exists = 'N';
        }

    if(isset($exists))
    {
        if(($exists == 'N'))
        {
        
        }
    }
    
         
}
?>