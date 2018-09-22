$(document).ready(function(){
  datalist = $('#searchStudentDatalist');

  function update(){
    input = $('.searchInput').val();
    //CALL AJAX for DB search

    jqXHR = $.ajax({
			method: "POST",
			url: '../scripts/searchStudentInfo.php',
			data: {input: input}
		});

		jqXHR.done(function(response) {
      response = JSON.parse(response);
      if(response.error.length > 0){
        alert(response.error);
      }

      info = response.info;
      console.log(info);
      $('.searchResultNaam').text(info['naam']);
      $('.searchResultKlas').text(info['klas']);
      if(info['email'].length > 0){
        $('.searchResultMail').text(info['email']);
      } else {
        $('.searchResultMail').text('Geen email ingesteld');
      }
      if(info['email'].length > 0){
        $('.searchResultActiviteit').text(info['LActivity']);
      } else {
        $('.searchResultActiviteit').text('Nooit actief geweest');
      }
      if(info['group_name'].length > 0){
        $('.searchResultGroupName').text(info['group_name']);
      } else {
        $('.searchResultGroupName').text('Zit niet in een groep');
      }
      if(info['groepsgenoten'] != 0){
        $('.searchResultGroupName').next().removeClass('hide');
        //TODO set right info
        $('.searchResultGroepInhoud').text(info['groepsgenoten']);
      } else {
        $('.searchResultGroupName').next().addClass('hide');
      }
      if(info['quizResults'] != 0){
        $('.searchResultQuiz').next().removeClass('hide');
        //TODO set right info
        $('.searchResultQuizInhoud').text(info['quizResults']);
      } else {
        $('.searchResultQuiz').next().addClass('hide');
      }
      //TODO progression







		});

		jqXHR.fail(function(jqXHR) {
		  alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
		});
  }

  $('.searchInput').on('keypress', function(){
    update();
  })

  $('.searchInput').on('blur', function(){
    update();
  })

})
