<html>
<head>
  <script src="jquery-3.5.1.min.js"></script>  
  <script src="bootstrap.min.js"></script>
  <script src="jquery.Jcrop.min.js"></script>
  <script src="croppie.js"></script>
  <link rel="stylesheet" href="bootstrap.min.css" />
  <link rel="stylesheet" href="jquery.Jcrop.min.css" />
</head>

<form id="form">
  <h1>Client-side image-editor and uploader</h1>
  <h2>Image file select</h2>
  <input id="file" type="file" />
  <h2>Image cropper (Jcrop)</h2>
  <button id="cropbutton" type="button">Crop</button>
  <button id="scalebutton" type="button">Scale</button>
  <button id="rotatebutton" type="button">Rotate</button>
  <button id="hflipbutton" type="button">H-flip</button>
  <button id="vflipbutton" type="button">V-flip</button>
  <br>
  <div id="views"></div>
  <h2>Submit form</h2>
  <input type="submit" value="Upload form data and image" />
</form>
<script>
var crop_max_width = 400;
var crop_max_height = 400;
var jcrop_api;
var canvas;
var context;
var image;

var prefsize;

$("#file").change(function() {
  loadImage(this);
});

function loadImage(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    canvas = null;
    reader.onload = function(e) {
      image = new Image();
      image.onload = validateImage;
      image.src = e.target.result;
    }
    reader.readAsDataURL(input.files[0]);
  }
}

function dataURLtoBlob(dataURL) {
  var BASE64_MARKER = ';base64,';
  if (dataURL.indexOf(BASE64_MARKER) == -1) {
    var parts = dataURL.split(',');
    var contentType = parts[0].split(':')[1];
    var raw = decodeURIComponent(parts[1]);

    return new Blob([raw], {
      type: contentType
    });
  }
  var parts = dataURL.split(BASE64_MARKER);
  var contentType = parts[0].split(':')[1];
  var raw = window.atob(parts[1]);
  var rawLength = raw.length;
  var uInt8Array = new Uint8Array(rawLength);
  for (var i = 0; i < rawLength; ++i) {
    uInt8Array[i] = raw.charCodeAt(i);
  }

  return new Blob([uInt8Array], {
    type: contentType
  });
}

function validateImage() {
  if (canvas != null) {
    image = new Image();
    image.onload = restartJcrop;
    image.src = canvas.toDataURL('image/png');
  } else restartJcrop();
}

function restartJcrop() {
  if (jcrop_api != null) {
    jcrop_api.destroy();
  }
  $("#views").empty();
  $("#views").append("<canvas id=\"canvas\">");
  canvas = $("#canvas")[0];
  context = canvas.getContext("2d");
  canvas.width = image.width;
  canvas.height = image.height;
  context.drawImage(image, 0, 0);
  $("#canvas").Jcrop({
    onSelect: selectcanvas,
    onRelease: clearcanvas,
    boxWidth: crop_max_width,
    boxHeight: crop_max_height
  }, function() {
    jcrop_api = this;
  });
  clearcanvas();
}

function clearcanvas() {
  prefsize = {
    x: 0,
    y: 0,
    w: canvas.width,
    h: canvas.height,
  };
}

function selectcanvas(coords) {
  prefsize = {
    x: Math.round(coords.x),
    y: Math.round(coords.y),
    w: Math.round(coords.w),
    h: Math.round(coords.h)
  };
}

function applyCrop() {
  canvas.width = prefsize.w;
  canvas.height = prefsize.h;
  context.drawImage(image, prefsize.x, prefsize.y, prefsize.w, prefsize.h, 0, 0, canvas.width, canvas.height);
  validateImage();
}

function applyScale(scale) {
  if (scale == 1) return;
  canvas.width = canvas.width * scale;
  canvas.height = canvas.height * scale;
  context.drawImage(image, 0, 0, canvas.width, canvas.height);
  validateImage();
}

function applyRotate() {
  canvas.width = image.height;
  canvas.height = image.width;
  context.clearRect(0, 0, canvas.width, canvas.height);
  context.translate(image.height / 2, image.width / 2);
  context.rotate(Math.PI / 2);
  context.drawImage(image, -image.width / 2, -image.height / 2);
  validateImage();
}

function applyHflip() {
  context.clearRect(0, 0, canvas.width, canvas.height);
  context.translate(image.width, 0);
  context.scale(-1, 1);
  context.drawImage(image, 0, 0);
  validateImage();
}

function applyVflip() {
  context.clearRect(0, 0, canvas.width, canvas.height);
  context.translate(0, image.height);
  context.scale(1, -1);
  context.drawImage(image, 0, 0);
  validateImage();
}

$("#cropbutton").click(function(e) {
  applyCrop();
});
$("#scalebutton").click(function(e) {
  var scale = prompt("Scale Factor:", "1");
  applyScale(scale);
});
$("#rotatebutton").click(function(e) {
  applyRotate();
});
$("#hflipbutton").click(function(e) {
  applyHflip();
});
$("#vflipbutton").click(function(e) {
  applyVflip();
});

$("#form").submit(function(e) {
  e.preventDefault();
  formData = new FormData($(this)[0]);
  var blob = dataURLtoBlob(canvas.toDataURL('image/png'));
  //---Add file blob to the form data
  formData.append("cropped_image[]", blob);
  alert(formData);
  
  $.ajax({
    url: "whatever.php",
    type: "POST",
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function(data) {
     // alert(formData);
    },
    error: function(data) {
      alert("Error");
    },
    complete: function(data) {}
  });
});


</script>
</html>