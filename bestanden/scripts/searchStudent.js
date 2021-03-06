$(document).ready(function(){
  datalist = $('#searchStudentDatalist');

  $('.searchInput').on('input', function(){
    input = $('.searchInput').val();
    //CALL AJAX for DB search

    jqXHR = $.ajax({
			method: "POST",
			url: '../scripts/searchStudentName.php',
			data: {input: input}
		});

		jqXHR.done(function(response) {
      response = JSON.parse(response);
      if(response.error.length > 0){
        alert(response.error);
      }
      searchResults = Object.values(response.searchResults);

      datalist.empty();
      for(var i=0; i<searchResults.length; i++){
        var opt = $("<option></option>").attr("value", searchResults[i]);
        datalist.append(opt);
      }
		});

		jqXHR.fail(function(jqXHR) {
		  alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
		});

  })

})
