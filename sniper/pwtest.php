<?PHP

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
#$key = 'password to (en/de)crypt';
#$string = 'maniacman669';
decryptthis('defter','3Lct0d8MjsdZCFmnWUZqRWT5LsbdluZxJE5VqekdCVs');
echo '<br><br>';
#echo $encrypted;
echo '<br><br>';
echo $decryptedthis;
echo '<br><br>';
echo '<br><br>';
$stringmail = "defter@gmail.com";
$mailbomb= explode('@',$stringmail);
echo $mailbomb['1'];
?>