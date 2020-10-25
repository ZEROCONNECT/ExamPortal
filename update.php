<!DOCTYPE html> 
<html> 
  
<head> 
    <title> 
        How to check if file exist using jquery 
    </title> 
    <script src= 
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> 
    </script> 
    <style> 
        body { 
            text-align: center; 
        } 
          
        h1 { 
            color: green; 
        } 
          
        #output { 
            color: green; 
            font-size: 20px; 
            font-weight: bold; 
        } 
    </style> 
</head> 
  
<body> 
    <h1>  
        GeeksforGeeks  
    </h1> 
  
    <label id="File_Path"> 
        <b>Enter File Path:</b> 
    </label> 
  
    <input type="text" id="File_URL"> 
  
    <button id='Check_File'>X</button> 
  
    <p id="output"></p> 
  
    <script> 
        $(document).ready(function() { 
            
            $("#Check_File").click(function() { 
                
                var url = $("#File_URL").val(); 
                if (url != "") { 
                    $.ajax({
                    type: 'POST',
                    url: 'set.php',
                    data: {
                        url: url,
						
                    },
                    success: function (response) {
                        
                        if (response == "success") {
                         alert('success');   
						}

                        
						else
						{
							 alert('success');   
						}

                    }
                }) 
                }  
            }); 
        }); 
    </script> 
</body> 
  
</html> 