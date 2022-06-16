<?php

   $conn = new mysqli("localhost", "admin", "admin", "testing");

   // Check connection
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }

   $sql = "SELECT * FROM testing.top1000_temp";
   $result = $conn->query($sql);

   echo "<style> table, th, td {border:1px solid black;}</style>";

   echo "<table>";

   echo "<tr> <th>SampleID</th> <th>Specimen</th> <th>Species</th> <th>Initials</th> <th>Experiment</th> <th>Site</th> <th>Visit</th> <th>Celltype</th> <th>Cellnumber</th> <th>Sampledate</th> <th>Room</th> <th>Freezer</th> <th>Cane</th> <th>Box</th> <th>Row</th> <th>Column</th> <th>WrittenonTube_Notes</th> <th>RemovedfromBoxforELISAfridge</th> <th>IgG_Spike</th> <th>IgG_SpikeValue</th> <th>Counter</th> <th>IgGTitration</th> </tr>";

   while($row = mysqli_fetch_array($result)) {
      echo "<tr><td>" . $row['SampleID'] . "</td><td> " . $row['Specimen'] . "</td><td> " . $row['Species'] . "</td><td> " . $row['Initials'] . "</td><td> " . $row['Experiment'] . "</td><td> " . $row['Site'] . "</td><td> " . $row['Visit'] . "</td><td> " . $row['Celltype'] . "</td><td> " . $row['Cellnumber'] . "</td><td> " . $row['Sampledate'] . "</td><td> " . $row['Room'] . "</td><td> " . $row['Freezer'] . "</td><td> " . $row['Cane'] . "</td><td> " . $row['Box'] . "</td><td> " . $row['Row_'] . "</td><td> " . $row['Column_'] . "</td><td> " . $row['WrittenonTube_Notes'] . "</td><td> " . $row['RemovedfromBoxforELISAfridge'] . "</td><td> " . $row['IgG_Spike'] . "</td><td> " . $row['IgG_SpikeValue'] . "</td><td> " . $row['Counter'] . "</td><td> " . $row['IgGTitration'] . "</td></tr>";
   }
   
   echo "</table>";
   mysqli_close($conn);
?>