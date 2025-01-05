

<!-- https://www.studentstutorial.com/php/php-multiple-file-upload -->

<!DOCTYPE html>
<html>
<head>
<title>Image retrieve</title>
</head>

<body>
  
<form name="form1" action="" method="post" enctype="multipart/form-data">
<table>
<tr>
<td><input type="submit" name="submit2" value="display"></td>
</tr>
</table>
</form>


<?php

 $usernam='root2';
 $pass='';

$cn=mysqli_connect("localhost","root","","company") or die("Could not Connect My Sql");
if(isset($_POST["submit2"]))
{
   $res=mysqli_query($cn,"select * from images");
   echo "<table>";
   echo "<tr>";
   
   while($row=mysqli_fetch_array($res))
   {
     $imageURL = 'components/uploads/'.$row["file_name"];
   echo "<td>"; 
   echo '<img height="200" width="200"  src="'. $imageURL.' "/>';
   echo "<br>";
   ?><a class="btn" href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a> <?php
  
   echo "</td>";
   } 
   echo "</tr>";
   
   echo "</table>";
  }
?>
</body>
</html>