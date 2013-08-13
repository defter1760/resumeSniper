<?PHP


$dateNOW = date('Y').'-'.date('m').'-'.date('d');
$dateNOWjason = date('m').'/'.date('d').'/'.date('Y');
$timeNOW = date('H').':'.date('i').':'.date('s');
$monthNOW = date('Y').'-'.date('m');
$weekNOW = date('Y').'-'.date('W');

$hourNOW = date('G');


$message = "

<img style='-webkit-user-select: none' src='http://in0.us/mailhit.php?'>
";        
        
        

require_once('class.phpmailer.php');
$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

try 
{
	$mail->Host       = "mail1.domain.initiativelegal.com";
	$mail->SMTPDebug  = 0;
	$mail->SMTPAuth   = true;
	$mail->Port       = 25;
	$mail->Username   = "Mars_Reports";
	$mail->Password   = "5khd9J04z22yCYo0";
	$mail->AddAddress('defter@gmail.com','Ian Hutchings');
	$mail->SetFrom('Mars_Reports@initiativelegal.com','MARS REPORTS');
	$mail->AddBCC('defter@gmail.com', 'Ian Hutchings');
	$mail->Subject = 'MARS Macy\'s campaign: '.$dateNOWjason;
	$mail->MsgHTML($message);
	$mail->Send();
	echo "</p>\n";
} 


catch (Exception $e) 
{
  echo $e->getMessage(); //Boring error messages from anything else!
}
        

?>