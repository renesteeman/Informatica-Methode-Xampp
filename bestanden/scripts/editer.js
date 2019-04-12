$(document).ready(function(){
  //load available chapters
  jqXHR = $.ajax({
    method: "POST",
    url: '../scripts/loadChapters.php',
    data: {}
  });

  jqXHR.done(function(msg) {
    //$('.leerlingSelector').html(msg);
    //TODO CHECK FOR ERRORS
    alert(msg);

    $('#chapter_selector').html(msg);
  });

  jqXHR.fail(function(jqXHR) {
    alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
  });



  //TODO
  $('#chapter_selector').change(function() {
		var chapter = $('#chapter_selector option:selected').text();

		jqXHR = $.ajax({
			method: "POST",
			url: '../scripts/loadParagraphs.php',
			data: {chapter: chapter}
		});

		jqXHR.done(function(msg) {
			//$('.leerlingSelector').html(msg);
      alert(msg);
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
