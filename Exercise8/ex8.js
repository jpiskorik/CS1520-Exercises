var score=0;
var correctA=[];

$(document).ready(function(){
	
	//get questions
	$('.submitbutton').click('submit', function(){
		$.ajax({
 	 		method: "GET",
 		 	url: "data.xml",
 		 	datatype: "xml",
 			success: function(value) {
                Quiz(value);
            }    
		});
	});
});	

function Quiz(xml)
{
	//adding the scoreboard to the 
    $("#quizzing").append('<br class=scoring><div class=scoring id=score>Nokia scoreboard: </div>');
    $("#quizzing").append('<div class=scoring id=Right> correct answers: '+score+' </div>');
    $("#quizzing").append('<br/><br>');


	//finding the info from our xml file
    $(xml).find('quiz-problems problem').each(function(i, element){
    
    	//getting the question
        var q = $(element).find('question').text().trim();

		// add the question to html
        $("#quizzing").append('<div class="questions" id="question'+i+'"">'+q+'</div>');
		$('#question'+i).append('<select id=select'+i+' onchange=check(this)>');

        $('#select'+i).append('<option value="blank"></option>');
        
        $(element).find('answer').each(function(k, element){
			// Adding the answers to html
        	$('#select'+i).append('<option value="'+element.textContent.trim()+'" >'+element.textContent.trim()+'</option>');
        });
		$("#quizzing").append('<br class=questions>');
        var correct = $(element).find('correct').text().trim();
        
        correctA.push(correct);

    });

}

function check(guess)
{
	// Remove other answers
	$(".answer").remove();
	
    var chosen = $(guess).find('option:selected')[0].innerText.trim();
    
	// if the user's answer is in the array
 	if ($.inArray(chosen.toString(), correctA) !== -1) {
 	
		//correct answer
		alert("Thats Correct!");
		score= score+ 1;
		
		// update correct answers
    	$("#Right").replaceWith('<div class=scoring id=Right>Number correct: '+score+' </div>');
	}
	//else its wrong 
	else {
		alert("Sorry that is the wrong answer");
	}
}