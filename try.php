<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My post</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
		
    </head>
   </head>
   <body>
   
   
   <?php
   include 'config.php';
   
    if (isset($_POST['latex']) && !empty($_POST['latex'])) {
				$latex=$_POST['latex'];
				$mysqli=$conn->query("INSERT INTO `latex`( `Content`) VALUES('$latex')");
                echo '<h3>Posted successfully</h3>';
            
        }
        ?>
      <div class="container">

            <form method="post" action="">
                <div class="form-group">
                    <label for="latex sr-only"></label>
                    <textarea class="form-control" rows="5" id="latex" name="latex" placeholder="What is your question ?"></textarea>
                </div>
                <div class="text-right">
                    <input type="submit" class="btn btn-primary"value="Post Now">
                </div>
            </form><br>
			 <div class="container">
                <?php
                
                $my_query = $conn->query("SELECT * FROM latex");

                while ($data = $my_query->fetch_assoc()):
                    ?>
                    <div class="jumbotron">
                        <p><?php echo $data['Content']?></p> 
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
	  
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
		<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
		
        <script type="text/x-mathjax-config">
            MathJax.Hub.Config({
            extensions: ["tex2jax.js"],
            jax: ["input/TeX","output/HTML-CSS"],
            tex2jax: {inlineMath: [["$","$"],["\\(","\\)"]]}
            });
        </script>
   </body>
</html>