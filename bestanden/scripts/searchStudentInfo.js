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
      if(info['naam'] != ""){
        $('.searchResultNaam').text(info['naam']);
      } else {
        $('.searchResultNaam').text('Deze persoon bestaat niet');
      }
      if(info['klas'] != ""){
        $('.searchResultKlas').text(info['klas']);
      } else {
        $('.searchResultKlas').text('Deze persoon bestaat niet');
      }
      if(info['email'] != ""){
        $('.searchResultMail').text(info['email']);
      } else {
        $('.searchResultMail').text('Geen email ingesteld');
      }
      if(info['LActivity'] != ""){
        $('.searchResultActiviteit').text(info['LActivity']);
      } else {
        $('.searchResultActiviteit').text('Nooit actief geweest');
      }
      if(info['group_name'] != ""){
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
      if(info['progression'] != 0){
        $('.searchResultProgression').next().removeClass('hide');
        //TODO set right info
        $('.searchResultProgressionInhoud').text(info['progression']);
      } else {
        $('.searchResultProgression').next().addClass('hide');
      }







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
