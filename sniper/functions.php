<?PHP


function getuserdetails($usernamedetails,$password)
{
    global $lineuser;
    global $sniperpassmd5;
    global $email;
    global $emailpassmd5;
    global $emaildomain;
    global $exists;
    global $line;
    $query = "SELECT * FROM userdata where username='".$usernamedetails."'";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
    {
        $lineuser = $line['username'];
        $sniperpassmd5 = $line['sniperpassmd5'];
        $email = $line['email'];
        $emailpassmd5 = $line['emailpassmd5'];
        $emaildomain = $line['emaildomain'];
      #  username,sniperpassmd5,email,emailpassmd5,emaildomain
#echo $sniperpassmd5.'<br><br>';
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

function updateuser($usernameupdate,$fieldname,$fieldsetto)
{
    $query = "SELECT * FROM userdata where username='".$usernameupdate."'";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
    {
        $lineuser = $line['username'];

      #  username,sniperpassmd5,email,emailpassmd5,emaildomain

    }
    {
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
    }
    if($exists == 'N')
    {
        
    }
         
}
?>