<?PHP

if(isset($_SESSION['UserName']))
{
    $username = $_SESSION['UserName'];
}
$filedate= date("m".'_'."d".'_'."y".'_'."G".'_'."i".'_'."s");
#print_r($_FILES);
if(isset($_FILES['file']))
{
    
    $allowedExts = array("pdf", "doc", "docx");
    $temp = explode(".", $_FILES['file']['name']);
    $extension = end($temp);
    if(isset($temp))
    {
        echo 'PIE';
        if ($_FILES['file']['error'] > 0)
        {
            echo "Return Code: " . $_FILES['file']['error'] . "<br>";
        }
        else
        {
            echo "Upload: " . $_FILES['file']['name'] . "<br>";
            if(is_dir("upload/".$username."/old"))
            {
                #echo 'do something if the directory does exist';
            }
            else
            {
                mkdir("upload/".$username."/old",0,true);
            }
            
                if(is_dir("upload/".$_SESSION['UserName']))
                {
                    $files1 = scandir("upload/".$_SESSION['UserName']);
                    foreach($files1 as $valfile)
                    {
                        if($valfile != '.')
                        {
                            if($valfile != '..')
                            {
                                if($valfile != 'old')
                                {
                                    rename("upload/".$username."/".$valfile, "upload/".$username."/old/".$valfile);
                                }
                            }
                        }
                    }
                }
            
            //if (file_exists("upload/".$username."/".$_FILES['file']['name']))
            //{
            //    rename("upload/".$username."/".$_FILES['file']['name'], "upload/".$username."/old/".$filedate."_".$_FILES["file"]["name"]);
            //}

            move_uploaded_file($_FILES['file']['tmp_name'],
            "upload/".$username."/".$_FILES['file']['name']);
            #echo "Stored in: " . "upload/".$id."/".$id."_left_hand.jpg";
        
        }
    }
    else
      {
      #echo "No new file added.";
      }
  }

?>