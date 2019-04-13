$(document).ready(function(){
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
      }
    });

		jqXHR.fail(function(jqXHR) {
			alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
	  });
  }

  $('#chapter_selector').change(function() {
		updateParagraphSelection();
	})

  $('#paragraph_selector').change(function() {
		var chapter = $('#chapter_selector option:selected').val();
    var paragraph = $('#paragraph_selector option:selected').val();

		jqXHR = $.ajax({
			method: "POST",
			url: '../scripts/loadParagraphEditContent.php',
			data: {chapter: chapter, paragraph:paragraph}
		});

    jqXHR.done(function(response) {
      response = JSON.parse(response);

      if(response.error){
        window.alert(response.msg);
      } else {
        //show content
      }
    });

		jqXHR.fail(function(jqXHR) {
			alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
	  });
	})

  $('.editTheory').submit(function(event){
    event.preventDefault();

    var chapter = $('#chapter_selector option:selected').text();
    var paragraph = $('#paragraph_selector option:selected').text();
  })





});
