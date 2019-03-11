$(document).ready(function(){
  datalist = $('#searchStudentDatalist');

  function update(){
    input = $('.searchInput').val();
    //CALL AJAX for DB search

    if(input != ""){
      jqXHR = $.ajax({
  			method: "POST",
  			url: '../scripts/searchStudentInfo.php',
  			data: {input: input}
  		});
    } else {
      $('.searchResultNaam').text('Naam');
      $('.searchResultKlas').text('Klas');
      $('.searchResultMail').text('E-mail');
      $('.searchResultActiviteit').text('Laatst actief');
      $('.searchResultGroupName').text('Groepnaam');
      $('.searchResultGroupName').next().addClass('hide');
      $('.searchResultQuizHeader').text('Quiz resultaten');
      $('.searchResultQuizHeader').next().addClass('hide');
      $('.searchResultProgression').text('Theorie progressie');
      $('.searchResultProgression').next().addClass('hide');
    }

		jqXHR.done(function(response) {
      response = JSON.parse(response);
      if(response.error.length > 0){
        alert(response.error);
      }

      info = response.info;
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
        $('.searchResultQuizHeader').next().removeClass('hide');
        $('.searchResultQuizHeader').text('Quiz resultaten');
        $('.searchResultQuizInhoud').html('');
        quizResultsLength = (Object.values(info['quizResults'])).length;

        append = "";

        for(i=0; i<quizResultsLength; i++){
          //TODO rewrite
          CquizResults = info['quizResults'][i];
          CquizResultsArray = [];
          CquizResultsArray[0] = parseFloat(Object.keys(CquizResults));
          CquizResultsArray[1] = parseFloat(Object.values(CquizResults));

          append += "<div class='searchResultQuizInhoudItem'><span class='searchResultQuizInhoudHoofdstuk'>H"+CquizResultsArray[0]+"</span><span class='searchResultQuizInhoudCijfer'>"+CquizResultsArray[1]+"</span></div>";
        }

        $('.searchResultQuizInhoud').append(append);

      } else {
        $('.searchResultQuizHeader').next().addClass('hide');
        $('.searchResultQuizHeader').text('Er zijn geen gemaakte quizes');
      }

      if(info['progression'] != ""){
        $('.searchResultProgression').next().removeClass('hide');
        $('.searchResultProgression').text('Theorie progressie');

        $('.searchResultProgressionInhoud').html('');
        progressionResultsProgression = Object.values(info['progression']);
        progressionResultsChapters = Object.keys(info['progression']);
        progressionResultsLength = progressionResultsProgression.length;

        for(i=0; i<progressionResultsLength; i++){
          CprogressionResultsChapters = progressionResultsChapters[i];
          CprogressionResultsCompletion = progressionResultsProgression[i];

          //show Chapters
          if(CprogressionResultsChapters!='userid' && CprogressionResultsCompletion!=null){
            Nparagraphs = CprogressionResultsCompletion.length;

            FinishedParagraphs = 0;
            for(j=0; j<Nparagraphs; j++){
              FinishedParagraphs += Number(CprogressionResultsCompletion[j]);
            }

            CchapterCompletionPercentage = Math.round((FinishedParagraphs/Nparagraphs) * 100);

            append = "<div class='searchResultProgressieChapter'><span class='searchResultProgressieInhoudHoofdstuk barItem'>"+CprogressionResultsChapters+"</span><span class='searchResultProgressieInhoudPercentage'>"+CchapterCompletionPercentage+"%</span><span class='icons'><span class='Arrow image'><img src='../icons/arrow.svg' class='arrow'/></span></span></div>";

            $('.searchResultProgressionInhoud').append(append);

            //add paragraphs
            append = "<div class='searchResultProgressieParagraphs'>";

            for(j=0; j<Nparagraphs; j++){
              CparagraphComplete = Number(CprogressionResultsCompletion[j]);
              if(CparagraphComplete){
                append += "<div class='searchResultProgressieParagraphRow'><span class='searchResultProgressieParagraphRowParagraph'>§"+(j+1)+"</span><span class='searchResultProgressieParagraphRowProgress'><span class='onSchedule'></span></span></div>";
              } else {
                append += "<div class='searchResultProgressieParagraphRow'><span class='searchResultProgressieParagraphRowParagraph'>§"+(j+1)+"</span><span class='searchResultProgressieParagraphRowProgress'><span class='notOnSchedule'></span></span></div>";
              }

            }

            append += "</div>";
            $('.searchResultProgressionInhoud').append(append);

          }
        }
      } else {
        $('.searchResultProgression').next().addClass('hide');
        $('.searchResultProgression').text('Er is geen progressie');
      }

      //collapse 'menu'
      $(".barItem").parent().next().slideUp(0);

		});

		jqXHR.fail(function(jqXHR) {
		  alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
		});

  }

  $('.searchInput').on('input', function(){
    update();
  })

  $('.searchInput').on('blur', function(){
    update();
  })

})
