$(document).ready(function(){
  $(".paragraph").click(function(){
		var paragraph_id = $(this).attr('id');

    window.location.href = './pages/theorie.php?paragraph_id='+paragraph_id;
	});
});
