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

//if(isset($_GET['username']))
//{
//    getuserdetails($_GET['username']);
//}

$username = 'defter';

$mailbomb= explode('@',$email);
#echo $mailbomb['1'];

$maildomain= $mailbomb['1'];

if($maildomain == 'gmail.com')
{
    $mailhost= '';
}

$message = "
Waffles and Pickles
<img style='-webkit-user-select: none' src='http://in0.us/mailhit.php?'>
";        
if(is_dir("upload/".$username))
{
    $files1 = scandir("upload/".$username);
    foreach($files1 as $valfile)
    {
        if($valfile != '.')
        {
            if($valfile != '..')
            {
                if($valfile != 'old')
                {
                    $attachment2= "upload/".$username."/".$valfile;
                }
            }
        }
    }
}
echo $attachment2;
require_once('class.phpmailer.php');
$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

try 
{
	$mail->Host       = "ssl://smtp.gmail.com";
	$mail->SMTPDebug  = 0;
	$mail->SMTPAuth   = true;
	$mail->Port       = 465;
	$mail->Username   = "ian.s.hutchings@gmail.com";
	$mail->Password   = "flaktyre499z0...";
	$mail->AddAddress('defter@gmail.com','Ian Hutchings');
	$mail->SetFrom('ian.s.hutchings@gmail.com','Ian Hutchings');
	$mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
	$mail->Subject = 'SNIPED '.$timeNOW;
	$mail->MsgHTML($message);
	$mail->Send();
        if (isset($attachment2))
        {
            $mail->AddAttachment($attachment2);      // attachment
        }
        #echo "</p>\n";
} 


catch (Exception $e) 
{
  echo $e->getMessage(); //Boring error messages from anything else!
}
        

?>