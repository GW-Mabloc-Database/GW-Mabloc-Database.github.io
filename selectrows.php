<?php

// Create connection

$conn = new mysqli("localhost", "admin", "admin", "testing");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$specimen = $_POST["Specimen"];
$species = $_POST["Species"];
$initials = $_POST["Initials"];
$experiment = $_POST["Experiment"];
$site = $_POST["Site"];
$visit = $_POST["Visit"];
$celltype = $_POST["Celltype"];
$sampledate = $_POST["SampleDate"];
$room = $_POST["Room"];
$freezer = $_POST["Freezer"];
$cane = $_POST["Cane"];
$box = $_POST["Box"];
$row = $_POST["Row"];
$column = $_POST["Column"];
$notes = $_POST["Notes"];
$removedforelisa = $_POST["ELISA"];
$igspike = $_POST["IgG/Spike"];
$igvalue = $_POST["IgG/SpikeValue"];
$counter = $_POST["Counter"];
$igtit = $_POST["IgG/Titration"];


$selectionline = "WHERE ";

if ($specimen != "") {
   if ($selectionline == "WHERE ") {
      $selectionline = $selectionline . 'Specimen="'	. $specimen . '"';
   }
   else {
      $selectionline = $selectionline . ' AND Specimen="' . $specimen . '"';
   }
}

if ($species != "Select species") {
   if ($selectionline == "WHERE ") {
      $selectionline = $selectionline . 'Species="'    . $species . '"';
   }
   else	{
      $selectionline = $selectionline . ' AND Species="' . $species . '"';
   }
}

if ($initials != "") {
   if ($selectionline == "WHERE ") {
      $selectionline = $selectionline . 'Initials="'    . $initials . '"';
   }
   else {
      $selectionline = $selectionline . ' AND Initials="' . $initials . '"';
   }
}

if ($experiment != "") {
   if ($selectionline == "WHERE ") {
      $selectionline = $selectionline . 'Experiment="'    . $experiment . '"';
   }
   else {
      $selectionline = $selectionline . ' AND Experiment="' . $experiment . '"';
   }
}

if ($site != "Select site") {
   if ($selectionline == "WHERE ") {
      $selectionline = $selectionline . 'Site="'    . $site . '"';
   }
   else {
      $selectionline = $selectionline . ' AND Site="' . $site . '"';
   }
}

if ($visit != "") {
   if ($selectionline == "WHERE ") {
      $selectionline = $selectionline . 'Visit="'    . $visit . '"';
   }
   else {
      $selectionline = $selectionline . ' AND Visit="' . $visit . '"';
   }
}

if ($celltype != "Select Celltype") {
   if ($selectionline == "WHERE ") {
      $selectionline = $selectionline . 'Celltype="'    . $celltype . '"';
   }
   else {
      $selectionline = $selectionline . ' AND Celltype="' . $celltype . '"';
   }
}

if ($sampledate != "") {
   if ($selectionline == "WHERE ") {
      $selectionline = $selectionline . 'Sampledate="'    . $sampledate . '"';
   }
   else {
      $selectionline = $selectionline . ' AND Sampledate="' . $sampledate . '"';
   }
}

if ($room != "") {
   if ($selectionline == "WHERE ") {
      $selectionline = $selectionline . 'Room="'    . $room . '"';
   }
   else {
      $selectionline = $selectionline . ' AND Room="' . $room . '"';
   }
}

if ($freezer != "") {
   if ($selectionline == "WHERE ") {
      $selectionline = $selectionline . 'Freezer="'    . $freezer . '"';
   }
   else {
      $selectionline = $selectionline . ' AND Freezer="' . $freezer . '"';
   }
}

if ($cane != "") {
   if ($selectionline == "WHERE ") {
      $selectionline = $selectionline . 'Cane="'    . $cane . '"';
   }
   else {
      $selectionline = $selectionline . ' AND Cane="' . $cane . '"';
   }
}

if ($box != "") {
   if ($selectionline == "WHERE ") {
      $selectionline = $selectionline . 'Box="'    . $box . '"';
   }
   else {
      $selectionline = $selectionline . ' AND Box="' . $box . '"';
   }
}

if ($row != "") {
   if ($selectionline == "WHERE ") {
      $selectionline = $selectionline . 'Row="'    . $row . '"';
   }
   else {
      $selectionline = $selectionline . ' AND Row="' . $row . '"';
   }
}

if ($column != "") {
   if ($selectionline == "WHERE ") {
      $selectionline = $selectionline . 'column="'    . $column . '"';
   }
   else {
      $selectionline = $selectionline . ' AND column="' . $column . '"';
   }
}

if ($notes != "") {
   if ($selectionline == "WHERE ") {
      $selectionline = $selectionline . 'WrittenonTube_Notes="'    . $notes . '"';
   }
   else {
      $selectionline = $selectionline . ' AND WrittenonTube_Notes="' . $notes . '"';
   }
}

if ($removedforelisa != "Removed from Box for ELISA Fridge?") {
   if ($selectionline == "WHERE ") {
      $selectionline = $selectionline . 'RemovedfromBoxforELISAfridge="'    . $removedforelisa . '"';
   }
   else {
      $selectionline = $selectionline . ' AND RemovedfromBoxforELISAfridge="' . $removedforelisa . '"';
   }
}

if ($igspike != "IgG/Spike") {
   if ($selectionline == "WHERE ") {
      $selectionline = $selectionline . 'IgG_Spike="'    . $igspike . '"';
   }
   else {
      $selectionline = $selectionline . ' AND IgG_Spike="' . $igspike . '"';
   }
}

if ($igvalue != "IgG/Spike Value") {
   if ($selectionline == "WHERE ") {
      $selectionline = $selectionline . 'IgG_SpikeValue="'    . $igvalue . '"';
   }
   else {
      $selectionline = $selectionline . ' AND IgG_SpikeValue="' . $igvalue . '"';
   }
}

if ($counter != "") {
   if ($selectionline == "WHERE ") {
      $selectionline = $selectionline . 'Counter="'    . $counter . '"';
   }
   else {
      $selectionline = $selectionline . ' AND Counter="' . $counter . '"';
   }
}

if ($igtit != "IgGTitration") {
   if ($selectionline == "WHERE ") {
      $selectionline = $selectionline . 'IgGTitration="'    . $igtit . '"';
   }
   else {
      $selectionline = $selectionline . ' AND IgGTitration="' . $igtit . '"';
   }
}

$selectionline = $selectionline . ";";

// save to file

$sql = "SELECT * FROM testing.top1000_temp " . $selectionline;
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
  $delimiter = ",";
  $filename = "testing_" . date("Y-m-d") . ".csv";

  $fp = fopen('php://memory', 'w');

  $fields = array("Specimen", "Species", "Initials", "Experiment", "Site", "Visit", "Celltype", "Cellnumber", "Sampledate", "Room", "Freezer", "Cane", "Box", "Row", "Column", "WrittenonTube_Notes","RemovedfromBoxforELISAfridge?", "IgG_Spike", "IgG_SpikeValue", "Counter", "IgGTitration");
  fputcsv($fp, $fields, $delimiter);

  while($row = mysqli_fetch_assoc($result)) {
    $lineData = array($row['Specimen'], $row['Species'], $row['Initials'], $row['Experiment'], $row['Site'], $row['Visit'], $row['Celltype'], $row['Cellnumber'], $row['Sampledate'], $row['Room'], $row['Freezer'], $row['Cane'], $row['Box'], $row['Row_'], $row['Column_'], $row['WrittenonTube_Notes'], $row['RemovedfromBoxforELISAfridge'], $row['IgG_Spike'], $row['IgG_SpikeValue'], $row['Counter'], $row['IgGTitration']); 
    fputcsv($fp, $lineData, $delimiter); 
  }

  fseek($fp, 0);

  header('Content-Type: text/csv'); 
  header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
  fpassthru($fp);
}
else {

  echo "No results.";
}

?>