$(document).ready(function(){
  $(".ptile").click(function(){
		var paragraph_id = $(this).children().first().attr('id');

    window.location.href = 'theorie.php?paragraph_id='+paragraph_id;
	});
});
