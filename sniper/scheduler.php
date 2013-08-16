<?PHP
require('head.php');
require('access.php');
if(isset($_POST['email']))
{
    if(isset($_POST['emailbody']))
    {
        addmail(addslashes($_SESSION['UserID']),addslashes($_POST['date']),addslashes($_POST['email']),addslashes($_POST['emailbody']),addslashes($_POST['reminder']),addslashes($_POST['url']),addslashes($_POST['subject']));
    }
}
?>
<tr>
    <td>
<form method="post">
<table style="border-collapse:collapse;" style="border:1px solid black;">
    <tr>
        <th style="border:1px solid black;" >
            Date Added
        </th>
        <th style="border:1px solid black;">
            Email Address
        </th>
        <th style="border:1px solid black;">
            Subject
        </th>        
        <th style="border:1px solid black;">
            Email Body
        </th>
        <th style="border:1px solid black;">
            Reminder
        </th>
        <th style="border:1px solid black;">
            URL
        </th>
        <th style="border:1px solid black;">
            Log
        </th>        
    </tr>
    <tr>
        <td style="border:1px solid black;" valign=bottom>
            <input type=text name=date value="<?PHP echo date("m".'-'."d".'-'."Y");?>">
        </td>
        <td style="border:1px solid black;" valign=bottom>
            <input type=text name=email>
        </td>
        <td style="border:1px solid black;" valign=bottom>
            <input type=text name=subject>
        </td>        
        <td style="border:1px solid black;" valign=bottom>
            <textarea type=text name=emailbody><?PHP echo $_SESSION['DefaultCoverletter']; ?></textarea>
        </td>
        <td style="border:1px solid black;" valign=bottom>
            <input type=text name=reminder>
        </td>
        <td style="border:1px solid black;" valign=bottom>
            <input type=text name=url>
        </td>
        <td style="border:1px solid black;" valign=bottom>
            <input type="submit" value="Schedule" class="submit"/>
        </td>        
    </tr>
<?PHP
getmaildetails($_SESSION['UserName']);
?>
</table>