<?php

if($_POST['text1'] == "admin" && $_POST['text2'] == "admin" ) {
   deleterows();
}
else {
   echo "Incorrect username or password. Contact Angie.";
}

function deleterows() {

   $sampleIDstr = $_POST['delete'];

   $sampleIDarray = preg_split("/\n|,/", $sampleIDstr);

   echo "These are the samples to be deleted...<br/>";

   $selectionline = "";

   foreach ($sampleIDarray as &$curr) {

   if ($selectionline == "") {
      $selectionline = 'SampleID = ' . $curr;
   }
   else {
      $selectionline = $selectionline . ' or SampleID = ' . $curr;
   }
   }

   $sql = 'SELECT * FROM testing.top1000_temp WHERE ' . $selectionline;

   $conn = new mysqli("localhost", "admin", "admin", "testing");

   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }

   $result = $conn->query($sql);

   echo "<style> table, th, td {border:1px solid black;}</style>";

   echo "<table>";

   echo "<tr> <th>SampleID</th> <th>Specimen</th> <th>Species</th> <th>Initials</th> <th>Experiment</th> <th>Site</th> <th>Visit</th> <th>Celltype</th> <th>Cellnumber</th> <th>Sampledate</th> <th>Room</th> <th>Freezer</th> <th>Cane</th> <th>Box</th> <th>Row</th> <th>Column</th> <th>WrittenonTube_Notes</th> <th>RemovedfromBoxforELISAfridge</th> <th>IgG_Spike</th> <th>IgG_SpikeValue</th> <th>Counter</th> <th>IgGTitration</th> </tr>";


   while($row = mysqli_fetch_array($result)) {

      echo "<tr><td>" . $row['SampleID'] . "</td><td> " . $row['Specimen'] . "</td><td> " . $row['Species'] . "</td><td> " . $row['Initials'] . "</td><td> " . $row['Experiment'] . "</td><td> " . $row['Site'] . "</td><td> " . $row['Visit'] . "</td><td> " . $row['Celltype'] . "</td><td> " . $row['Cellnumber'] . "</td><td> " . $row['Sampledate'] . "</td><td> " . $row['Room'] . "</td><td> " . $row['Freezer'] . "</td><td> " . $row['Cane'] . "</td><td> " . $row['Box'] . "</td><td> " . $row['Row_'] . "</td><td> " . $row['Column_'] . "</td><td> " . $row['WrittenonTube_Notes'] . "</td><td> " . $row['RemovedfromBoxforELISAfridge'] . "</td><td> " . $row['IgG_Spike'] . "</td><td> " . $row['IgG_SpikeValue'] . "</td><td> " . $row['Counter'] . "</td><td> " . $row['IgGTitration'] . "</td></tr>";

   }

   echo "</table>";

   echo "<br/>";

   echo "Being moved to backup database...";
   echo "<br/>";

   $backupinsertion1 = "INSERT INTO testing.DeletedTable(";
   $backupinsertion2 = "VALUES (";

   $sql = 'SELECT * FROM testing.top1000_temp WHERE ' . $selectionline;

   $conn = new mysqli("localhost", "admin", "admin", "testing");

   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }

   $result = $conn->query($sql);

   while($row = mysqli_fetch_array($result)) {

      $sampID = $row['SampleID'];
      $deletedOn = date("Y-m-d");
      $user = $_POST['text1'];
      $specimen = $row['Specimen'];
      $species = $row['Species'];
      $initials = $row['Initials'];
      $exp = $row['Experiment'];
      $site = $row['Site'];
      $visit = $row['Visit'];
      $celltype = $row['Celltype'];
      $cellnumber = $row['Cellnumber'];
      $sampledate = $row['Sampledate'];
      $room = $row['Room'];
      $freezer = $row['Freezer'];
      $cane = $row['Cane'];
      $box = $row['Box'];
      $currrow = $row['Row_'];
      $currcol = $row['Column_'];
      $written = $row['WrittenonTube_Notes'];
      $removed = $row['RemovedfromBoxforELISAfridge'];
      $spike = $row['IgG_Spike'];
      $spikeval = $row['IgG_SpikeValue'];
      $counter = $row['Counter'];
      $titration = $row['IgGTitration'];

      if ($sampID != "") {
      	 $backupinsertion1 = $backupinsertion1 . "SampleID,";
	 $backupinsertion2 = $backupinsertion2 . '"' . $sampID . '",';
      }

      if ($deletedOn != "") {
         $backupinsertion1 = $backupinsertion1 . "DeletedOn,";
         $backupinsertion2 = $backupinsertion2 . $deletedOn . ",";
      }

      if ($user != "") {
         $backupinsertion1 = $backupinsertion1 . "DeletedBy,";
         $backupinsertion2 = $backupinsertion2 . '"' . $user . '",';
      }

      if ($specimen != "") {
         $backupinsertion1 = $backupinsertion1 . "Specimen,";
         $backupinsertion2 = $backupinsertion2 . '"' . $specimen . '",';
      }

      if ($species != "") {
         $backupinsertion1 = $backupinsertion1 . "Species,";
         $backupinsertion2 = $backupinsertion2 . '"' . $species . '",';
      }

      if ($initials != "") {
         $backupinsertion1 = $backupinsertion1 . "Initials,";
         $backupinsertion2 = $backupinsertion2 . '"' . $initials . '",';
      }

      if ($exp != "") {
         $backupinsertion1 = $backupinsertion1 . "Experiment,";
         $backupinsertion2 = $backupinsertion2 . '"' . $exp . '",';
      }

      if ($site != "") {
         $backupinsertion1 = $backupinsertion1 . "Site,";
         $backupinsertion2 = $backupinsertion2 . '"' . $site . '",';
      }

      if ($visit != "") {
         $backupinsertion1 = $backupinsertion1 . "Visit,";
         $backupinsertion2 = $backupinsertion2 . $visit . ",";
      }

      if ($celltype != "") {
         $backupinsertion1 = $backupinsertion1 . "Celltype,";
         $backupinsertion2 = $backupinsertion2 . '"' . $celltype . '",';
      }

      if ($cellnumber != "") {
         $backupinsertion1 = $backupinsertion1 . "Cellnumber,";
         $backupinsertion2 = $backupinsertion2 . '"' . $cellnumber . '",';
      }

      if ($sampledate != "") {
         $backupinsertion1 = $backupinsertion1 . "Sampledate,";
         $backupinsertion2 = $backupinsertion2 . '"' . $sampledate . '",';
      }

      if ($room != "") {
         $backupinsertion1 = $backupinsertion1 . "Room,";
         $backupinsertion2 = $backupinsertion2 . '"' . $room . '",';
      }

      if ($freezer != "") {
         $backupinsertion1 = $backupinsertion1 . "Freezer,";
         $backupinsertion2 = $backupinsertion2 . $freezer . ",";
      }

      if ($cane != "") {
         $backupinsertion1 = $backupinsertion1 . "Cane,";
         $backupinsertion2 = $backupinsertion2 . $cane . ",";
      }

      if ($box != "") {
         $backupinsertion1 = $backupinsertion1 . "Box,";
         $backupinsertion2 = $backupinsertion2 . '"' . $box . '",';
      }

      if ($currrow != "") {
         $backupinsertion1 = $backupinsertion1 . "Row_,";
         $backupinsertion2 = $backupinsertion2 . $currrow . ",";
      }

      if ($currcol != "") {
         $backupinsertion1 = $backupinsertion1 . "Column_,";
         $backupinsertion2 = $backupinsertion2 . $currcol . ",";
      }

      if ($written != "") {
         $backupinsertion1 = $backupinsertion1 . "WrittenonTube_Notes,";
         $backupinsertion2 = $backupinsertion2 . '"' . $written . '",';
      }

      if ($removed != "") {
         $backupinsertion1 = $backupinsertion1 . "RemovedfromBoxforELISAfridge,";
         $backupinsertion2 = $backupinsertion2 . '"' . $removed . '",';
      }

      if ($spike != "") {
         $backupinsertion1 = $backupinsertion1 . "IgG_Spike,";
         $backupinsertion2 = $backupinsertion2 . '"' . $spike . '",';
      }

      if ($spikeval != "") {
         $backupinsertion1 = $backupinsertion1 . "IgG_SpikeValue,";
         $backupinsertion2 = $backupinsertion2 . '"' . $spikeval . '",';
      }

      if ($counter != "") {
         $backupinsertion1 = $backupinsertion1 . "Counter,";
         $backupinsertion2 = $backupinsertion2 . '"' . $counter . '",';
      }

      if ($titration != "") {
         $backupinsertion1 = $backupinsertion1 . "IgGTitration,";
         $backupinsertion2 = $backupinsertion2 . '"' . $titration . '",';
      }

 
      $backupinsertion = rtrim($backupinsertion1, ",") . ") " . rtrim($backupinsertion2, ",") . ")";

   }

   $temp = $conn->query($backupinsertion);

   echo "Being removed from database...";
   echo "<br/>";

   // ACTUAL DELETE
   $sql = 'DELETE FROM testing.top1000_temp WHERE ' . $selectionline;
   $result = $conn->query($sql);

   echo "DELETED, STAMPED WITH YOUR USERNAME AND DATE-TIME.";
   
}




?>