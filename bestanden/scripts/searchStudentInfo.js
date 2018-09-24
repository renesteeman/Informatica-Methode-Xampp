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
      if(info['groepsgenoten'] != ""){
        $('.searchResultGroupName').next().removeClass('hide');
        $('.searchResultGroepInhoud').html("");

        info['groepsgenoten'] = Object.values(info['groepsgenoten']);

        for(i=0; i<info['groepsgenoten'].length; i++){
          if(info['groepsgenoten'][i][2] == null){
            info['groepsgenoten'][i][2] = "Geen groepsrol";
          }

          append = "<div class='searchResultGroepInhoudItem'><span class='searchResultGroepInhoudLeden'>"+info['groepsgenoten'][i][0]+"</span><span class='searchResultGroepInhoudKlas'>"+info['groepsgenoten'][i][1]+"</span><span class='searchResultGroepInhoudRollen'>"+info['groepsgenoten'][i][2]+"</span></div>";

          $('.searchResultGroepInhoud').append(append);
        }

      } else {
        $('.searchResultGroupName').next().addClass('hide');
      }
      if(info['quizResults'] != ""){
        $('.searchResultQuiz').next().removeClass('hide');
        $('.searchResultQuizInhoud').html('');
        quizResultsLength = (Object.values(info['quizResults'])).length;

        for(i=0; i<quizResultsLength; i++){
          CquizResults = info['quizResults'][i];
          CquizResultsArray = [];
          CquizResultsArray[0] = parseFloat(Object.keys(CquizResults));
          CquizResultsArray[1] = parseFloat(Object.values(CquizResults));

          console.log(CquizResultsArray);


          append = "<div class='searchResultQuizInhoudItem'><span class='searchResultQuizInhoudHoofdstuk'>H"+CquizResultsArray[0]+"</span><span class='searchResultQuizInhoudCijfer'>"+CquizResultsArray[1]+"</span></div>";

          $('.searchResultQuizInhoud').append(append);
        }



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
