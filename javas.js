var a=0;
function af()
{
	//a++;
	//alert('suspecious activity count:'+a);
	
	
	if(a==10)
	{
		alert('We have detected sespecious activity serveral time');
		window.location='exam1.php';
	}

}
function af1()
{	

	alert('suspecious activity');
	
}
function on() {
  document.getElementById("overlay").style.display = "block";
}

function off() {
  document.getElementById("overlay").style.display = "none";
}
function on1() {
  document.getElementById("overlay1").style.display = "block";
}

function off1() {
  document.getElementById("overlay1").style.display = "none";
}

function myop()
{
	document.getElementById("next").value="UNMARK";

}
function myop1()
{
	document.getElementById("prev").value="UNMARK";
	
}
function chtom()
{
	document.getElementById("next").style.display= "display";
	document.getElementById("unmark").style.display= "none";
}
function chtom1()
{
	document.getElementById("prev").style.display= "display";
	document.getElementById("unmark").style.display= "none";
}
function clear1()
{
	document.getElementById('classes9').checked = false;
	document.getElementById('classes10').checked = false;
	document.getElementById('classes11').checked = false;
	document.getElementById('classes12').checked = false;

}
function qf()
{
	// Referneces
	var control = $("#quesimg"),clearBn = $("#a");

// Setup the clear functionality
clearBn.on("click", function(){
    control.replaceWith( control.val('').clone( true ) );
});

// Some bound handlers to preserve when cloning
control.on({
    change: function(){ console.log( "Changed" ) },
     focus: function(){ console.log(  "Focus"  ) }
});
}