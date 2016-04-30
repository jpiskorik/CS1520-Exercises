<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="testWords.css">
    </head>

    <body>
        <br><br>
        <div align="center" id="problems">
            <button onclick="displayWord()" value="Display Word" type="button"> Display Word </button>
        </div>
        <br>

        <table align="center" id="table">
            <tr>
                <th> Word </th>
                <th> Count </th>
            </tr>
        </table>

        <script>
            var databaseCreated = false;
            var index = new Object();
            function displayWord(){
            	//if database isnt created we create it
                if( !databaseCreated ){
                    $.ajax(
                    {
                        url: "./setWords.php",
                        success: function()
                        {
                            databaseCreated = true;
                            displayWord(); 
                        }
                    });
                }
                //else we retrieve the words
                else{
                    $.ajax(
                    {
                        url: "./getWords.php",
                        dataType: "xml",
                        success: function( data )
                        {
                            update( data.getElementsByTagName( "value" )[ 0 ].childNodes[ 0 ].nodeValue );
                        }
                    });
                }
                //function that gets the next word from databse using hash map
                function update( word ){
                    if( !index[ word ] )
                    {
                        index[ word ] = 0;    
                        $( "#table tr:last" ).after( "<tr>" +
                                "<td>" + word + "</td><td id=\"" + word + "\"></td>" +
                            "</tr>" );
                    }
                    index[ word ]++;
                    $( "#" + word ).html( index[ word ] );
                }
            }
        </script>
    </body>
</html>