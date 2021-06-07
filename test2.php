<?php
include "config1.php";
?>
<!doctype html>
<html>
  <head>

  <?php
  if(isset($_POST['submit'])){

    if(!empty($_POST['lang'])) {

      $lang = implode(",",$_POST['lang']);

      // Insert and Update record
      $checkEntries = mysqli_query($konek,"SELECT * FROM tbl_testing");
      if(mysqli_num_rows($checkEntries) == 0){
        mysqli_query($konek,"INSERT INTO tbl_testing(satu) VALUES('".$lang."')");
      }else{
        mysqli_query($konek,"UPDATE tbl_testing SET satu='".$lang."' ");
      }
 
    }

  }
  ?>
  </head>
  <body>
  <form method="post" action="">
    <span>Select languages</span><br/>
    <?php

    $checked_arr = array();

    // Fetch checked values
    $fetchLang = mysqli_query($konek,"SELECT * FROM tbl_testing");
    if(mysqli_num_rows($fetchLang) > 0){
      $result = mysqli_fetch_assoc($fetchLang);
      $checked_arr = explode(",",$result['satu']);
    }

    // Create checkboxes
    $languages_arr = array("PHP","JavaScript","jQuery","AngularJS");
    foreach($languages_arr as $language){

      $checked = "";
      if(in_array($language,$checked_arr)){
        $checked = "checked";
      }
      echo '<input type="checkbox" name="lang[]" value="'.$language.'" '.$checked.' > '.$language.' <br/>';
    }
    ?>
 
    <input type="submit" value="Submit" name="submit">
  </form>

  </body>
</html>