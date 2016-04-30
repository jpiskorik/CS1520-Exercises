<html>
<head>
<title>Getting the name of the user </title>
</head>
<body>
<?php

		
      $name=$_POST["name"];
  	  $match=false;
  	  $file= "names.txt";
  	  if(!file_exists($file))
  	  {
  	  		$myfile = fopen("names.txt", "x+");
  	  		fclose($myfile);
  	  		
  	  }

      $myfile = fopen("names.txt", "r+") or die("Unable to open file!");
      echo fgets($myfile);
	  $compare= trim(fgets($myfile));
	  while (! feof($myfile))
	  {	  		

	  		if(strcmp($name,$compare)==0)
	  		{
        		$match=true;
        		break;
        	}
        	$compare= trim(fgets($myfile));
       }
       if($match==false)
       {
    		fwrite($myfile,$name. "\n");
       }
	   fclose($myfile);
      
      if($match == true)
      {
      		echo  $name. ", " .
      		   '<p style = "color:blue ;"> you have </p>' .
      		   '<p style = "color:aqua ;"> already </p>' .
      		   '<p style = "color:lime ;"> been </p>' .
               '<p style = "color:fuchsia ;">registered! </p>';     
      }
      else
      {
      		$name = '<font color="red">'.$name.'</font>';
      		echo 
      		   '<p style = "color:yellow ;"> Congragulations </p>' .
      		   $name .
      		   '<p style = "color:purple ;"> you have  </p>' .
      		   '<p style = "color:orange ;"> been  </p>' .
               '<p style = "color:fuchsia ;">registered! </p>';  
      }
      
?>
</body>
</html>
