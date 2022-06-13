<?php

header('Content-type: text/csv');
header('Content-Disposition: attachment; filename="temp_template.csv"');
ob_clean();
readfile("temp_template.csv");
exit;


?>