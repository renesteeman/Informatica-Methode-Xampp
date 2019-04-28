$(document).ready(function(){
  function loadChapters(){
    //load available chapters
    jqXHR = $.ajax({
      method: "POST",
      url: '../scripts/loadChapters.php',
      data: {}
    });

    jqXHR.done(function(response) {
      response = JSON.parse(response);

      if(response.error){
        window.alert(response.msg);
      } else {
        $('#chapter_selector').html(response.msg);
        updateParagraphSelection();
      }
    });

    jqXHR.fail(function(jqXHR) {
      alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
    });
  }

  function updateParagraphSelection(){
    var chapterID = $('#chapter_selector option:selected').val();

		jqXHR = $.ajax({
			method: "POST",
			url: '../scripts/loadParagraphs.php',
			data: {chapterID: chapterID}
		});

    jqXHR.done(function(response) {
      response = JSON.parse(response);

      if(response.error){
        window.alert(response.msg);
      } else {
        $('#paragraph_selector').html(response.msg);
        updateParagraphContent();
      }
    });

		jqXHR.fail(function(jqXHR) {
			alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
	  });
  }

  function updateParagraphContent(){
    var paragraph_id = $('#paragraph_selector option:selected').val();

		jqXHR = $.ajax({
			method: "POST",
			url: '../scripts/loadParagraphEditContent.php',
			data: {paragraph_id: paragraph_id}
		});

    jqXHR.done(function(response) {
      response = JSON.parse(response);
      console.log(response.debug);

      if(response.error){
        window.alert(response.msg);
      } else {
        //show content
        $('#theorie').val(response.main);
        $('#vragen').val(response.questions);
        $('#antwoorden').val(response.answers);
      }
    });

		jqXHR.fail(function(jqXHR) {
			alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
	  });
  }

  loadChapters();

  $('#chapter_selector').change(function() {
		updateParagraphSelection();
	})

  $('#paragraph_selector').change(function() {
		updateParagraphContent();
	})

  $('.editTheory').submit(function(event){
    event.preventDefault();

    var chapterID = $('#chapter_selector option:selected').val();
    var paragraph_id = $('#paragraph_selector option:selected').val();

    var paragraph = $('#paragraph_selector option:selected').text().split(/ (.+)/)[0][1];
    var chapter_name = $('#chapter_selector option:selected').text().split(/ (.+)/)[1];
    //if the chapter is displayed with an * at the end, remove it (for edited paragraphs)
    if (chapter_name.slice(-1) == '*'){
      chapter_name.substring(0, chapter_name.length-1);
    }

    var paragraph_name = $('#paragraph_selector option:selected').text().split(/ (.+)/)[1];
    var chapter = $('#chapter_selector option:selected').text().split(" ")[0];

    var main = $('#theorie').val();
    var questions = $('#vragen').val();
    var answers = $('#antwoorden').val();

    console.log([chapterID, paragraph_id, paragraph,  paragraph_name, chapter_name, chapter, main, questions, answers]);

    jqXHR = $.ajax({
			method: "POST",
			url: '../scripts/saveEditContent.php',
			data: {chapterID:chapterID, paragraph_id:paragraph_id, main:main, questions:questions, answers:answers, paragraph: paragraph, chapter_name:chapter_name, paragraph_name:paragraph_name, chapter:chapter}
		});

    jqXHR.done(function(response) {
      response = JSON.parse(response);
      console.log(response.debug);

      window.alert(response.msg);

      //refresh for when a new paragraph is created
      //TODO get back to the paragraph that was being edited instead of to the first one of the chapter
      if(!response.error){
        loadChapters();
      }

    });

		jqXHR.fail(function(jqXHR) {
			alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
	  });
  })


});
