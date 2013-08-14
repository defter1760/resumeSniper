<?PHP
require('blandfileuploadhead.php');
?>

<html>
<head>
    <style>
        .filter-type {
    border-bottom: 1px dotted #666;
}

.sidebarlistscroll {
    width: 320px;
    height: 30px;
    margin-bottom: 15px;
    /*overflow-y: scroll;*/
    border: none;
    visibility: hidden;
}
#filter{display:none}
#filter:checked + .sidebarlistscroll{
    visibility: visible;
}
    </style>
</head>
<body>


    <table>
        <tr>
            <td width="600">
                <label for="file">Resume:</label>
            </td>
        </tr>
        <tr>
            <td>
                <?PHP echo '<form method="post" action="index.php" enctype="multipart/form-data">';

                   ## if (file_exists("upload/" . $_FILES["file"]["name"]))
                        echo '<input type="file" name="file" id="file"><br>';
                        echo '<input type="submit" name="submit" value="Update Resume">';  
                ?>
                </form>
            </td>

        </tr>

    </table>
    

<table>
    <tr>
        <th>
            Resume
        </th>
    </tr>
    
            <?PHP
            if(isset($_SESSION['UserName']))
            {
                if(!empty($_SESSION['UserName']))
                {
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
                                        echo '<tr>';
                                            echo '<td>';
                                                echo '<a class="schedule" href="upload/'.$_SESSION['UserName'].'/'.$valfile.'" target="parent">'.$valfile.'</a>';
                                            echo '</td>';
                                        echo '</tr>';
                                    }
                                }
                            }
                        }
                    }
                    else
                    {
                        mkdir("upload/".$_SESSION['UserName']."/old",0,true);
                    }
                }
            }
            ?>
        </td>
    </tr>
</table>
</body>
</html>