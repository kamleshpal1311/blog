<?php
$fileName = 'http://localhost/glickin_blog/csv_format.csv';
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=example.csv');
header('Pragma: no-cache');
readfile("http://localhost/glickin_blog/csv_format.csv")
?>