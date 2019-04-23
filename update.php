<?php

if(isset($_POST['ruleSubmit'])) {
  // update rules.txt
  $rules = $_POST['medicalRule'];
  $fname = "rules.txt";
  $fhandle = fopen($fname, "w");
  fwrite($fhandle, $rules);
  fclose($fhandle);


}

?>