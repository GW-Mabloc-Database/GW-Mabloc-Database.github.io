<?php

// Create connection

$conn = new mysqli("localhost", "admin", "admin", "testing");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}





$specimen = $_POST["Specimen"];

if ($specimen == "") {
  echo "no specimen selected";
}










//echo $_POST["Species"];

// save to file

//$sql = "SELECT * FROM testing.top1000_temp";
//$result = $conn->query($sql);

//if (mysqli_num_rows($result) > 0) {
//  $delimiter = ",";
//  $filename = "testing_" . date("Y-m-d") . ".csv";

//  $fp = fopen('php://memory', 'w');

//  $fields = array("Specimen", "Species", "Initials", "Experiment", "Site", "Visit", "Celltype", "Cellnumber", "Sampledate", "Room", "Freezer", "Cane", "Box", "Row", "Column", "WrittenonTube/Notes","Removed from Box for ELISA fridge?", "IgG/Spike", "IgG/SpikeValue", "Counter", "IgGTitration");
//  fputcsv($fp, $fields, $delimiter);

//  while($row = mysqli_fetch_assoc($result)) {
//    $lineData = array($row['Specimen'], $row['Species'], $row['Initials'], $row['Experiment'], $row['Site'], $row['Visit'], $row['Celltype'], $row['Cellnumber'], $row['Sampledate'], $row['Room'], $row['Freezer'], $row['Cane'], $row['Box'], $row['Row'], $row['Column'], $row['Written on Tube/Notes'], $row['Removed from Box for ELISA fridge?'], $row['IgG/Spike'], $row['IgG/Spike Value'], $row['Counter'], $row['IgGTitration']); 
//    fputcsv($fp, $lineData, $delimiter); 
//  }

//  fseek($fp, 0);

//  header('Content-Type: text/csv'); 
//  header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
//  fpassthru($fp);
//}

?>