$(document).ready(function(){

	document.cookie = "dataread=; expires= Tues, 12 Apr 2016 10:00:00 UTC";
	var click = $('.submitbutton');
	var read= getCookie("dataread");
	var fading = false;
	console.log(read);
	if (read==false)
	{
		document.cookie="dataread=false"
	}
	var x= document.cookie;
	
	click.click('submit', function() 
	{
		if($('#blank').is(':empty'))
		{
			console.log(x);
			console.log(x.dataread);
			if (x== "dataread=false")
			{
				$.ajax({
 	 			method: "POST",
 		 		url: "getData.php",
 				data: {file:"file1.txt"},
 				success: function(data)
 				{
 					console.log(data);
					$('#blank').append("<p>"+data+"</p>");
 					$('#blank').show();
 					document.cookie="dataread=true";
 				}
 				});
 			}
 		}
 		if((!$('#blank').is(':empty')) && fading==false)
 		{
 			$('#blank').fadeOut("slow");
 			fading=true;
 		}	
 		else if((!$('#blank').is(':empty')) && fading==true)
 		{
 			$('#blank').fadeIn("slow");
 			fading=false;
 		}
 		
		
	});

});

function getCookie(cname) 
{
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) 
    {
        var c = ca[i];
        while (c.charAt(0)==' ')
        {
        	 c = c.substring(1);
        }	 
        if (c.indexOf(name) == 0) 
        {
        	return c.substring(name.length,c.length);
        } 	
    }
    return "";
}



