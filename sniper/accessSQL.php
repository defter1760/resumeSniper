<?PHP
require('mySQLconnect.php');


//function getuserdetails($usernamedetails,$password)
//{
//    $query = 'SELECT * FROM userdata where ID='.$usernamedetails;
//    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
//    
//    while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
//    {
//        $sniperpassmd5 = $line['sniperpassmd5'];
//        $email = $line['email'];
//        $emailpassmd5 = $line['emailpassmd5'];
//        $emaildomain = $line['emaildomain'];
//      #  username,sniperpassmd5,email,emailpassmd5,emaildomain
//
//    }
//}
    
    $query = 'SELECT * FROM clients where ID='.$ID;
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
    {
#        $lifePurpose = $line['lifePurpose'];
        $LineID= $line['id'];
        $LineWisdom= $line['lifeSchoolWisdom'];
        $LineLove= $line['lifeSchoolLove'];
        $LineService= $line['lifeSchoolService'];
        $LinePeace= $line['lifeSchoolPeace'];
    }
    


            $query = "UPDATE clients set fName='".$fName."' where id='".$ID."'";
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());

    
    }
    else
    {
        $query = "insert into clients (id,fName,lName,email,phone,phone2,specialInfo,lifePurpose,lifeLesson,lifeSchoolWisdom,lifeSchoolLove,lifeSchoolService,lifeSchoolPeace,importantToClient,ahaMoment,recordingMade,skypeName) values('".$ID."','".$fName."','".$lName."','".$email."','".$phone."','".$phone2."','".$specialInfo."','".$lifePurpose."','".$lifeLesson."','".$lifeSchoolWisdom."','".$lifeSchoolLove."','".$lifeSchoolService."','".$lifeSchoolPeace."','".$importantToClient."','".$ahaMoment."','".$recordingMade."','".$skypeName."')";
        $result = mysql_query($query) or die('Query failed: ' . mysql_error());    

    }
    $query2 = 'SELECT * FROM clients where ID='.$ID;
    $result2 = mysql_query($query2) or die('Query failed: ' . mysql_error());
    while ($line2 = mysql_fetch_array($result2, MYSQL_ASSOC))
    {
        $specialInfo = $line2['specialInfo'];
        $lifePurpose = $line2['lifePurpose'];
        $lifeSchoolWisdom = $line2['lifeSchoolWisdom'];
        $lifeSchoolLove = $line2['lifeSchoolLove'];
        $lifeSchoolService = $line2['lifeSchoolService'];
        $lifeSchoolPeace = $line2['lifeSchoolPeace'];
        $lifeLesson = $line2['lifeLesson'];
        $importantToClient = $line2['importantToClient'];
        $ahaMoment = $line2['ahaMoment'];        
    }
#    echo "<pre>";
#    echo $City;
#    print_r($_POST);
#      echo $lifeLesson;
#    echo "</pre>";
    ##
    #not a match as in there is no one in the db with this ID, so, let's add them
    ##

}

?>