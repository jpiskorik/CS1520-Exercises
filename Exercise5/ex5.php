<!-- NOT DONE YET NEED check mysql--!>
<html>
  <head>
    <title> get name from db </title>
  </head>
  <body>
    <?php
		
	  $nameexists=1;
      $fname = $_POST["fname"];
      $lname = $_POST["lname"]
      $db = mysqli_connect("127.0.0.1", "my_user", "my_password", "my_db");
      if ($db->connect_error) 
      {
           print "Error - Could not connect to MySQL";
           exit;
      }

	  $firstnamefind = "SELECT fname FROM People WHERE fname= '$fname'";
	  $r=$db->query($firstnamefind);
	  //first name mathes so check last name
	  if(gettype($r) == "boolean")
	  {
			$lastnamefind = "SELECT fname FROM People WHERE lname= '$lname'";
	  		$r2=$db->query($lastnamefind);
	  		if(gettype($r) == "boolean")
	  		{
	  			$name_exists=1;
	  		}
	  }
	  //if name not found add to table
	  if($name_exists=0)
	  {
	  		$sql= "INSERT INTO People (firstname, lastname) VALUES ('$fname', '$lname')";
	  		$result = $db->query($sql);
	  		if (gettype($result) == "boolean")
      		{
         		 echo "Name was added to the database <br />";
          		 
      		}
	  }

      // Display the results in a table

      print "<table><caption> <h2> People Table </h2> </caption>";
      print "<tr align = 'center'>";

      // Get the number of rows in the result, as well as the first row
      //  and the number of fields in the rows

      $num_rows = $result->num_rows;  // how many rows in result?
      $row = $result->fetch_array();  // get first row
      $num_fields = sizeof($row);

      while ($next_element = each($row))
      { 
          $next_element = each($row);
          $next_key = $next_element['key'];
          print "<th>" . $next_key . "</th>";
      }

      print "</tr>";

      // Output the values of the fields in the row

      for ($row_num = 0; $row_num < $num_rows; $row_num++) {
          reset($row); 
          print "<tr align = 'center'>";
          for ($field_num = 0; $field_num < $num_fields/2; $field_num++)
          {
              print "<td>" . $row[$field_num] . "</td> ";
		  }
          print "</tr>";
          $row = $result->fetch_array();
      }
      print "</table>";
    ?>
  </body>
</html>