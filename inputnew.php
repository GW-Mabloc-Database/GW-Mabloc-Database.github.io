<?php

$conn = new mysqli("localhost", "admin", "admin", "testing");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$csv = array();

// check there are no errors
if($_FILES['csv']['error'] == 0){
    $name = $_FILES['csv']['name'];
    $ext = strtolower(end(explode('.', $_FILES['csv']['name'])));
    $type = $_FILES['csv']['type'];
    $tmpName = $_FILES['csv']['tmp_name'];

    // check the file is a csv
    if($ext === 'csv'){
        if(($handle = fopen($tmpName, 'r')) !== FALSE) {
            // necessary if a large csv file
            set_time_limit(0);

            $row = 0;

            while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
		
                // number of fields in the csv
                $col_count = count($data);
		
		if ($row == 0) {
		   $header = array();
		    for ($y=0; $y < $col_count; $y++){
		    	$header[$y] = $data[$y];
		    }
		}
		
		if ($row != 0) {
		   $currinsert1 = "INSERT INTO testing.top1000_temp(";
                   $currinsert2 = "VALUES (";
		   for ($x=0; $x < $col_count; $x++) {
		       if ($data[$x] != "") {
		       	  $currheader = $header[$x];
			  $currdata = $data[$x];

			  $currinsert1 = $currinsert1 . $currheader . ", ";

			  if ($currheader == "Visit" or $currheader == "Freezer" or $currheader == "Cane" or $currheader == "Row_" or $currheader == "Column_") {
			     $currinsert2 = $currinsert2 . $currdata . ", ";
			  } else {
			    $currinsert2 = $currinsert2 . '"' . $currdata . '", ';
			  }
			  

			}
		    }
		    $currinsert1 = substr($currinsert1, 0, -2) . ") ";
		    $currinsert2 = substr($currinsert2, 0, -2) . ") ";

		    $totalinsert = $currinsert1 . $currinsert2 . ";";

		    $result = $conn->query($totalinsert);
		}

                $row++;
            }
            fclose($handle);
        }
    }
}

?>
