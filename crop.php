<?php //$seesion_user = "stint"; 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Jquery Cropper</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/cropper.min.css" rel="stylesheet" type="text/css"/>
        <style>
            #change-profile .preview {

            }

            .priview-wraper{
                width: 100px;
                height:100px;
                position: absolute;
                top: 25%;
                right: 10%;
                overflow: hidden;
                border-radius: 100%;


            }

            .priview-wraper-origal{
                width: 100px;
                height:100px;
                overflow: hidden;
                border-radius: 100%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: 100%;
            }
        </style>
    </head>
    <body>
		<?php 
	if(isset($_GET['qno']))
   {
    $qno = $_GET['qno'];
	
    }
	if(isset($_GET['examname']))
   {
    $examname = $_GET['examname'];
	
    }
	if(isset($_GET['subject']))
   {
    $subject = $_GET['subject'];
	
    }
	if(isset($_GET['option']))
   {
    $option = $_GET['option'];
	
    }
	$name=$examname.$subject.$qno.$option;
//else
//{
	//$option="";
//}
	
	
	$seesion_user = "$name"; 
	?>
	<h3> Click on the image to Select </h3>
        <div class="container" style="margin: 100px auto;">
	
            <a href="#" data-toggle="modal" data-target="#change-profile">
                <div id="profile-result">
                    <?php if (file_exists('profile-pic/' . $seesion_user . '.jpg')): ?>
              
                        <img src="<?php echo 'profile-pic/' . $seesion_user . '.jpg'; ?>" alt="" class="" style="width: auto;height: 100px;">
                    <?php else: ?>
                        <img src="profile-pic/default.png" alt="" width='100' height='auto'>    
                    <?php endif; ?>
                </div>
            </a>

        </div>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/cropper.min.js" type="text/javascript"></script>
        
        <!--        boostrap model change profile pic-->
        <div class="modal fade" id="change-profile">
            <div class="modal-dialog">
                <div class="" style="background: #fff;padding: 10px;">

                    <div class="ajax-response" id="loading"></div>

                    <h4 class="m-t-5 m-b-5 ellipsis"></h4>
                    <div class="profile-pic-wraper col-sm-8">
                        <?php if (file_exists('profile-pic/' . $seesion_user . '.jpg')): ?>
                            <img src="<?php echo 'profile-pic/' . $seesion_user . '.jpg'; ?>" alt="" id="change-profile-pic" style="width: 50%;">
                        <?php else: ?>
                            <img src="profile-pic/default.png" alt="" id="change-profile-pic" style="width: 40%;">    
                        <?php endif; ?>

                    </div>

                    <div class="priview-wraper">
                        <!--<div class="preview"></div> -->
                    </div><br>
                    <div>
                        <form action="" enctype="multipart/form-data">
                            <input type="file" accept="image/*" id="profile-file-input" onchange="loadFile(event)">
                            <div style="position: absolute;right: 20px;bottom: 20px;">
                                <button href="#" class="btn btn-primary " data-dismiss="modal" style="background: #8fcb62;">Close</button>
                                <input type="button" value="Save" class="btn btn-primary" id="save-profile">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
		<div>
			<!--<a href="#"><button onclick="close_window();return false;" style='margin-left:40px;'>close</button></a>-->
			<script>
			function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}
			</script>
		</div>
	<script>
	
/* global URL, base_url */
var name= '<?php echo($name)?>';
var loadFile = function (event) {
    var output = document.getElementById('change-profile-pic');
    output.src = URL.createObjectURL(event.target.files[0]);
    $('#change-profile-pic').cropper("destroy");

    var $previews = $('.preview');
    $('#change-profile-pic').cropper({
        ready: function () {
            var $clone = $(this).clone().removeClass('cropper-hidden');
            $clone.css({
                display: 'block',
                width: '100%',
                minWidth: 0,
                minHeight: 0,
                maxWidth: 'none',
                maxHeight: 'none'
            });
            $previews.css({
                width: '100%',
                overflow: 'hidden'
            }).html($clone);
        },
        crop: function (e) {

            var imageData = $(this).cropper('getImageData');
            var croppedCanvas = $(this).cropper('getCroppedCanvas');
            $('#profile-result').html('<img src="' + croppedCanvas.toDataURL() + '" class="thumb-lg img-square" style="width:auto;height:100px;">');

            $('#save-profile').click(function () {
                $('#loading').show();
                $.ajax({
                    type: 'POST',
                    url: 'set-profile.php',
                    data: {
                        url: croppedCanvas.toDataURL(),
						name: name
                    },
                    success: function (response) {
                        
                        if (response == "success") {
                            $('#loading').html("Profile picture successfully updated");
                            setTimeout(function () {
                                $('#loading').hide();
                                $('#change-profile').modal('hide');
                            }, 2000);


                        }

                    }
                });
            });

            var previewAspectRatio = e.width / e.height;
            $previews.each(function () {
                var $preview = $(this);
                var previewWidth = $preview.width();
                var previewHeight = previewWidth / previewAspectRatio;
                var imageScaledRatio = e.width / previewWidth;
                $preview.height(previewHeight).find('img').css({
                    width: imageData.naturalWidth / imageScaledRatio,
                    height: imageData.naturalHeight / imageScaledRatio,
                    marginLeft: -e.x / imageScaledRatio,
                    marginTop: -e.y / imageScaledRatio
                });
            });

        }

    });

};

	</script>

    </body>
</html>
