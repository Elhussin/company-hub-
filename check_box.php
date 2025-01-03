<!-- <form action="" method="post"> -->

<!-- //Which buildings do you want access to?<br /> -->
<!-- <input type="checkbox" name="formDoor[]" value="A" />Acorn Building<br />
<input type="checkbox" name="formDoor[]" value="B" />Brown Hall<br />
<input type="checkbox" name="formDoor[]" value="C" />Carnegie Complex<br />
<input type="checkbox" name="formDoor[]" value="D" />Drake Commons<br />
<input type="checkbox" name="formDoor[]" value="E" />Elliot House

<input type="submit" name="formSubmit" value="Submit" />

</form>
-->


<?php
  // $aDoor = $_POST['formDoor'];
  // if(empty($aDoor)) 
  // {
  //   echo("You didn't select any buildings.");
  // } 
  // else 
  // {
  //   $N = count($aDoor);

  //   echo("You selected $N door(s): ");
  //   for($i=0; $i < $N; $i++)

  //   {
  //     echo($aDoor[$i] . " ");
  //     if($aDoor[$i]=="A"){
  //       echo "hotel";
  //     }
  //   }
  // } 
?>
<!--  OPEN NEW WINDOW SMALL  -->
<!-- <script type="text/javascript">
function OpenWindow() {
    window.open('index.php',
                'newwindow',
                config='height=670,width=500,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,directories=no,status=no');
}
</script> -->
<!-- <input type="button" value="Submit" onclick="OpenWindow()"> -->


<b id="alrt"></b>

<form method="post" action=<?php echo $_SERVER['PHP_SELF']; ?>" ></form>
<input type="text" name="id">
<input type="submit">
<?PHP
$id='';
if($_SERVER['REQUEST_METHOD']=='POST'){

  $id = htmlspecialchars($_REQUEST['id']);
  if(empty($id)){
    echo "note";
  }else{
    echo $id;
  }
}

?>

<!DOCTYPE html>
<html>
<body>

<!-- A form with input field and submit button -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Age: <input type="text" name="fage">
  <input type="submit">
</form>

<?php
$age;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get input field value
    $age = htmlspecialchars($_REQUEST['fage']);
    
    // If input field is empty
    if (empty($age)) {
    
        // Display message "Age is empty"
        echo "Age is empty";
        
    // Else if input field is not empty
    } else {
    
    	// Display age
        echo $age;
     echo   '<script> document.getElementById("alrt").innerHTML='.$age.'</script>';

    }
}
?> 

<script> document.getElementById("alrt").innerHTML=$age; 
</script>
</body>
</html>