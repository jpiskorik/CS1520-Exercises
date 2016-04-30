<?php
	// CS 1520
	// Simple script to retrieve some data from the server
	$fname = "file1.txt";
	$data = file_get_contents($fname);
	echo "$data";
?>