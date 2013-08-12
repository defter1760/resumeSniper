<?PHP
require('mySQLconnect.php');


if(isset($ID))
{
    
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
    

    
    if ($LineID == $ID)
    {
        if(isset($fName))
        {
            $query = "UPDATE clients set fName='".$fName."' where id='".$ID."'";
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        }
        if(isset($lName))
        {
            $query = "UPDATE clients set lName='".$lName."' where id='".$ID."'";
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        }
        if(isset($email))
        {
            $query = "UPDATE clients set email='".$email."' where id='".$ID."'";
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        }
        if(isset($phone))
        {
            $query = "UPDATE clients set phone='".$phone."' where id='".$ID."'";
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        }
        if(isset($phone2))
        {
            $query = "UPDATE clients set phone2='".$phone2."' where id='".$ID."'";
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        }
        if(isset($specialInfo))
        {
            $query = "UPDATE clients set specialInfo='".$specialInfo."' where id='".$ID."'";
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        }
        if(isset($lifePurpose))
        {
            $query = "UPDATE clients set lifePurpose='".$lifePurpose."' where id='".$ID."'";
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        }

        if(isset($lifeSchoolWisdom))
        {
            if($lifeSchoolWisdom == 'y')
            {
                $query = "UPDATE clients set lifeSchoolWisdom='y' where id='".$ID."'";
                $result = mysql_query($query) or die('Query failed: ' . mysql_error());

            }
            
            else
            {
                $query = "UPDATE clients set lifeSchoolWisdom='n' where id='".$ID."'";
                $result = mysql_query($query) or die('Query failed: ' . mysql_error());

            }
        }
        else
        {
            if ($LineWisdom != 'y')
            {
                $query = "UPDATE clients set lifeSchoolWisdom='n' where id='".$ID."'";
                $result = mysql_query($query) or die('Query failed: ' . mysql_error());

            }

        }        

        if(isset($lifeSchoolLove))
        {
            if($lifeSchoolLove == 'y')
            {
                $query = "UPDATE clients set lifeSchoolLove='y' where id='".$ID."'";
                $result = mysql_query($query) or die('Query failed: ' . mysql_error());
            }
            else
            {
                $query = "UPDATE clients set lifeSchoolLove='n' where id='".$ID."'";
                $result = mysql_query($query) or die('Query failed: ' . mysql_error());
            }
        }
        else
        {
            if ($LineLove != 'y')
            {
                $query = "UPDATE clients set lifeSchoolLove='n' where id='".$ID."'";
                $result = mysql_query($query) or die('Query failed: ' . mysql_error());

            }

        }         

        if(isset($lifeSchoolService))
        {
            if($lifeSchoolService == 'y')
            {
                $query = "UPDATE clients set lifeSchoolService='y' where id='".$ID."'";
                $result = mysql_query($query) or die('Query failed: ' . mysql_error());
            }
            else
            {
                $query = "UPDATE clients set lifeSchoolService='n' where id='".$ID."'";
                $result = mysql_query($query) or die('Query failed: ' . mysql_error());
            }
        }
        else
        {
            if ($LineService != 'y')
            {
                $query = "UPDATE clients set lifeSchoolService='n' where id='".$ID."'";
                $result = mysql_query($query) or die('Query failed: ' . mysql_error());
            }
        }
        
        if(isset($lifeSchoolPeace))
        {
            if($lifeSchoolPeace == 'y')
            {
                $query = "UPDATE clients set lifeSchoolPeace='y' where id='".$ID."'";
                $result = mysql_query($query) or die('Query failed: ' . mysql_error());
            }
            else
            {
                $query = "UPDATE clients set lifeSchoolPeace='n' where id='".$ID."'";
                $result = mysql_query($query) or die('Query failed: ' . mysql_error());
            }
        }
        else
        {
            if ($LinePeace != 'y')
            {
                $query = "UPDATE clients set lifeSchoolPeace='n' where id='".$ID."'";
                $result = mysql_query($query) or die('Query failed: ' . mysql_error());
            }
        }
       
        if(isset($lifeLesson))
        {
            $query = "UPDATE clients set lifeLesson='".$lifeLesson."' where id='".$ID."'";
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        }
        if(isset($importantToClient))
        {
            $query = "UPDATE clients set importantToClient='".$importantToClient."' where id='".$ID."'";
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        }
        if(isset($lifeSchoolLesson))
        {
            $query = "UPDATE clients set lifeSchoolLesson='".$lifeSchoolLesson."' where id='".$ID."'";
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        }
        if(isset($ahaMoment))
        {
            $query = "UPDATE clients set ahaMoment='".$ahaMoment."' where id='".$ID."'";
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        }             
    
    
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
else
{    
    if(isset($conID))
    {

        $query = "insert into clients (id,fName,lName,email,phone,phone2,specialInfo,lifePurpose,lifeLesson,lifeSchoolWisdom,lifeSchoolLove,lifeSchoolService,lifeSchoolPeace,importantToClient,ahaMoment,recordingMade,skypeName) values('".$conID."','".$fName."','".$lName."','".$email."','".$phone."','".$phone2."','".$specialInfo."','".$lifePurpose."','".$lifeLesson."','".$lifeSchoolWisdom."','".$lifeSchoolLove."','".$lifeSchoolService."','".$lifeSchoolPeace."','".$importantToClient."','".$ahaMoment."','".$recordingMade."','".$skypeName."')";
        $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    }
    else
    {
#        $query = "insert into clients (id,fName,lName,email,phone,phone2,specialInfo,lifePurpose,lifeLesson,lifeSchoolWisdom,lifeSchoolLove,lifeSchoolService,lifeSchoolPeace,importantToClient,ahaMoment,recordingMade,skypeName) values('".$ID."','".$fName."','".$lName."','".$email."','".$phone."','".$phone2."','".$specialInfo."','".$lifePurpose."','".$lifeLesson."','".$lifeSchoolWisdom."','".$lifeSchoolLove."','".$lifeSchoolService."','".$lifeSchoolPeace."','".$importantToClient."','".$ahaMoment."','".$recordingMade."','".$skypeName."')";
#        $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        
    }
    
}
?>