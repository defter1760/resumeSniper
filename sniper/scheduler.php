<?PHP
require('head.php');
require('access.php');
?>

<table style="border-collapse:collapse;" style="border:1px solid black;">
    <tr>
        <th style="border:1px solid black;" >
            Date
        </th>
        <th style="border:1px solid black;">
            Email Address
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
    </tr>
    <tr>
        <td style="border:1px solid black;" valign=bottom>
            <input type=text name=date>
        </td>
        <td style="border:1px solid black;" valign=bottom>
            <input type=text name=email>
        </td>
        <td style="border:1px solid black;" valign=bottom>
            <textarea type=text name=emailbody></textarea>
        </td>
        <td style="border:1px solid black;" valign=bottom>
            <input type=text name=reminder>
        </td>
        <td style="border:1px solid black;" valign=bottom>
            <input type=text name=url>
        </td>
    </tr>    
</table>