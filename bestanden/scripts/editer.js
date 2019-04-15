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
    var chapter = $('#chapter_selector option:selected').val();

		jqXHR = $.ajax({
			method: "POST",
			url: '../scripts/loadParagraphs.php',
			data: {chapter: chapter}
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
    var theory_id = $('#paragraph_selector option:selected').val();

		jqXHR = $.ajax({
			method: "POST",
			url: '../scripts/loadParagraphEditContent.php',
			data: {theory_id: theory_id}
		});

    jqXHR.done(function(response) {
      response = JSON.parse(response);

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

    var theory_id = $('#paragraph_selector option:selected').val();

    var main = $('#theorie').val();
    var questions = $('#vragen').val();
    var answers = $('#antwoorden').val();

    jqXHR = $.ajax({
			method: "POST",
			url: '../scripts/saveEditContent.php',
			data: {theory_id: theory_id, main:main, questions:questions, answers:answers}
		});

    jqXHR.done(function(response) {
      response = JSON.parse(response);

      window.alert(response.msg);
    });

		jqXHR.fail(function(jqXHR) {
			alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
	  });
  })


});
