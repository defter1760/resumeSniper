<?PHP
//require('access.php');
require('mySQLconnect.php');
require('functions.php');
$dateNOW = date('Y').'-'.date('m').'-'.date('d');
$dateNOWjason = date('m').'/'.date('d').'/'.date('Y');
$timeNOW = date('H').':'.date('i').':'.date('s');
$monthNOW = date('Y').'-'.date('m');
$weekNOW = date('Y').'-'.date('W');

$hourNOW = date('G');

#$username = 'defter';

getuserlist();#gets everyone in the system and puts them into an array
foreach ($namelist as $userkey => $userval)
{
    
    foreach ($hourlist as $hourkey => $hourval)
    {
        if($hourNOW == $hourval)
        {
            getuserdetails($userval);
            $mailbomb= explode('@',$email);
            $maildomain= $mailbomb['1'];
            decryptthis($userval,$emailpassmd5);
            if($maildomain == 'gmail.com')
            {
                $mailhost= 'ssl://smtp.gmail.com';
                $mailauth= 'true';
                $mailport= '465';
            }
            if(is_dir("/var/www/resumeSniper/sniper/upload/".$userval))
            {
                $files1 = scandir("/var/www/resumeSniper/sniper/upload/".$userval);
                foreach($files1 as $valfile)
                {
                    if($valfile != '.')
                    {
                        if($valfile != '..')
                        {
                            if($valfile != 'old')
                            {
                                $attachment2= "/var/www/resumeSniper/sniper/upload/".$userval."/".$valfile;
                                
                            }
                        }
                    }
                }
            }
            $query = "SELECT * FROM userdata where username='".$userval."'";
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
            while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
            {
                $userid = $line['iduserdata'];
            }    
            $querymailarray = "SELECT * FROM applied where userid='".$userid."' and sent IS NULL";
            $resultmailarray = mysql_query($querymailarray) or die('Query failed: ' . mysql_error());
            while ($line2 = mysql_fetch_array($resultmailarray, MYSQL_ASSOC))
            {
                $mailID = $line2['idapplied'];
                $mailADDRESS = $line2['emailaddress'];
                $mailTEXT = $line2['emailtext'];
                $mailSUBJECT = $line2['subject'];
                $message = $mailTEXT."
                <br><br><br>
                <img style='-webkit-user-select: none' src='http://in0.us/hit.php?id=".$userid."&id2=".$mailID."'>
                ";   
                require_once('class.phpmailer.php');
                $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
                $mail->IsSMTP(); // telling the class to use SMTP
                try 
                {
                    $mail->Host       = $mailhost;
                    $mail->SMTPDebug  = 0;
                    $mail->SMTPAuth   = $mailauth;
                    $mail->Port       = $mailport;
                    $mail->Username   = $email;
                    $mail->Password   = $decryptedthis;
                    $mail->AddAddress($mailADDRESS,$mailADDRESS);
                    $mail->SetFrom($email,$replytoname);
                    $mail->AddBCC($email,$replytoname);
                    $mail->Subject = $mailSUBJECT;
                    $mail->MsgHTML($message);
                    if (isset($attachment2))
                    {
                        $mail->AddAttachment($attachment2);      // attachment
                    }
                    $mail->Send();
                }
                catch (Exception $e) 
                {
                  echo $e->getMessage(); //Boring error messages from anything else!
                }
                $query = "UPDATE applied set sent='y',sentdate='".$dateNOW." @ ".date('H'.":".'i'.":".'s')."' where userid='".$userid."' and idapplied='".$mailID."'";
                $result = mysql_query($query) or die('Query failed: ' . mysql_error());
            }
        }
    }
}

        

?>