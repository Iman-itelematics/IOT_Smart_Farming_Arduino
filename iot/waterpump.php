<?php  
$waterpump = $_GET['waterpump'];
if($waterpump == "on") {  
  $file = fopen("waterpump.json", "w") or die("can't open file");
  fwrite($file, '{"waterpump": "on"}');
  fclose($file);
} 
else if ($waterpump == "off") {  
  $file = fopen("waterpump.json", "w") or die("can't open file");
  fwrite($file, '{"waterpump": "off"}');
  fclose($file);
}
?>

