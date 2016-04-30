<?php

	$name=$_POST["name"];
	$password=$_POST["password"];
	$colon=':';
	$match=false;
	
	
	$alltogether= $name.$colon.$password;
	
	 $myfile = fopen('names.txt', 'a') or die("Unable to open file!");
	 $compare= fgets($myfile);
	 
	  while ($compare!=null)
	  {	  		
        	if($alltogether==$compare)
        	{
        		$match=true;
        		break;
        	}
        	$compare= fgets($myfile). "<br />";
       }
	
	   if($match==false)
       {
    		$_SESSION["error"]= "Your ID or password is incorrect. Please try again";
    		header('Location: login.php');
    		
       }
	   fclose($myfile);
      
      if($match == true)
      {
      		echo $name . ", you've already been registered!";
      		$_SESSION["name"]=$name;
      		echo "You have sucessfully logged in!";
      		header('Location: home.php');
      }
    
?>