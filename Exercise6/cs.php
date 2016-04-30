<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="ex6.css"></link>
<script>
function validateForm() {
    var x = document.forms["myForm"]["csclass"].value;
    var t=x.split("");   
    t[0]=t[0].toUpperCase();
    t[1]=t[1].toUpperCase();
    
    if (t[0]!="C" && t[1]!="S") 
    {
        alert("class must start with CS");
        return false;
    }
    else if(t[2]!=0 && t[2]!=1 && t[2]!=2 && t[2]!=3)
    {
    	alert("first digit must contain a 0,1,2,or 3");
        return false;
    }
    else if(isNaN(t[3]) || isNaN(t[4]) || isNaN(t[5]))
    {
    	alert("digits must be a number");
        return false;
    }
    else
    {
    	alert("Submission successful");
    	return true;
    }
}
</script>
</head>
<body>

<form name="myForm" action="cs.php"
onsubmit="return validateForm()" method="post">
CS class: <input id = "box" type="text" name="csclass">
<input type="submit" value="Submit">
</form>

</body>
</html>

