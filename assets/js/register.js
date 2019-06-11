
$(document).ready(function() {

	//On click signup, hide login and show registration form
	$("#signup").click(function() {
        console.log("working?")
		$("#first").slideUp("slow", function(){
			$("#second").slideDown("slow");
		});
	});

	//On click signup, hide registration and show login form
	$("#signin").click(function() {
        console.log("working?")
		$("#second").slideUp("slow", function(){
			$("#first").slideDown("slow");
		});
	});


});