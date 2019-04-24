$(document).ready(function(){
  $(".paragraph").click(function(){
		var paragraph_id = $(this).attr('id');

    window.location.href = './pages/theorie.php?paragraph_id='+paragraph_id;
	});

  $(".quiz").click(function(){
		var chapter_id = $(this).attr('id');
    var chapter_name = $(this).parent().parent().parent().prev().text();

    window.location.href = './pages/quiz.php?chapter_id='+chapter_id+'&chapter_name='+chapter_name;
	});

  $(".document").click(function(){
    var chapter_id = $(this).parent().parent().attr('id');
    var chapter_name = $(this).parent().parent().parent().prev().text();
		var document_id = $(this).attr('id');

    window.location.href = './pages/document.php?chapter_id='+chapter_id+'&document_id='+document_id+'&chapter_name='+chapter_name;
	});
});
