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

    //if a new chapter is being created, give the option to give it a code
    if(chapterID == "Aanmaken"){
      $(".chapterCode").removeClass("hide");
    } else {
      $(".chapterCode").addClass("hide");
    }

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

    if(chapterID != "Aanmaken"){
      var chapter_name = $('#chapter_selector option:selected').text().split(/ (.+)/)[1];
      var chapter = $('#chapter_selector option:selected').text().split(" ")[0];
    } else {
      var chapter_name = "";
      var chapter = "";
    }

    if(paragraph_id != "Aanmaken"){
      var paragraph = $('#paragraph_selector option:selected').text().split(/ (.+)/)[0][1];
      var paragraph_name = $('#paragraph_selector option:selected').text().split(/ (.+)/)[1];
    } else {
      var paragraph = "";
      var paragraph_name = "";
    }

    //if the chapter is displayed with an * at the end, remove it (for edited paragraphs)
    if (chapter_name.slice(-1) == '*'){
      chapter_name.substring(0, chapter_name.length-1);
    }

    var main = $('#theorie').val();
    var questions = $('#vragen').val();
    var answers = $('#antwoorden').val();

    var Nchapter_Name = $('#Nchapter_Name').val();
    var Nparagraph_Name = $('#Nparagraph_Name').val();

    var Nchapter = $("#chapterCode").val();

    console.log([chapterID, paragraph_id, paragraph,  paragraph_name, chapter_name, chapter, main, questions, answers, Nchapter_Name, Nparagraph_Name, Nchapter]);

    jqXHR = $.ajax({
			method: "POST",
			url: '../scripts/saveEditContent.php',
			data: {chapterID:chapterID, paragraph_id:paragraph_id, main:main, questions:questions, answers:answers, paragraph: paragraph, chapter_name:chapter_name, paragraph_name:paragraph_name, chapter:chapter, Nchapter_Name:Nchapter_Name, Nparagraph_Name:Nparagraph_Name, Nchapter:Nchapter}
		});

    jqXHR.done(function(response) {
      response = JSON.parse(response);
      console.log('DEBUG');
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

  //buttons
  var selectedTextArea;
  var selectedTextAreaJS;

  function insertAtCaret(el, elJS, insert) {
    var caretPos = el[0].selectionStart;
    var caretEnd = el[0].selectionEnd;
    var textAreaTxt = el.val();

    //replace selected and insert 'insert'
    el.val(textAreaTxt.substring(0, caretPos) + insert + textAreaTxt.substring(caretEnd));

    //return 'caret'
    el.focus();
    elJS.selectionStart = caretPos + insert.length;
    console.log(caretPos + insert.length);
    elJS.selectionEnd = caretPos + insert.length;
  }

  $(".html-tile").hover(function(){
    selectedTextArea = $(document.activeElement);
    selectedTextAreaJS = document.activeElement;
  })

  //insert on button click
  $(".html-tile").click(function(){
    //if a textbox was active when clicking the button
    if (selectedTextArea.prop('nodeName') == "TEXTAREA") {
      let el = selectedTextArea;
      let elJS = selectedTextAreaJS;
      let item = $(this);
      let insert = "";

      if(item.hasClass("p")){
        insert = "<p>\n\tTEKST\n</p>";
      } else if(item.hasClass("url")){
        insert = "<a href='LINK'>TEKST</a>";
      } else if (item.hasClass("ul")) {
        insert = "<ul>\n\t<li>ITEM</li>\n</ul>";
      } else if (item.hasClass("code")) {
        insert = "<pre><code>\nCODE\n</code></pre>";
      } else if (item.hasClass("img")) {
        insert = "<img class='small' src='LOCATIE'>";
      } else if (item.hasClass("table")) {
        insert = "<table><tbody>\n\t<tr>\n\t\t<th>KOLOM</th>\n\t</tr>\n\t<tr>\n\t\t<td>RIJ</tb>\n\t</td>\n</tbody></table>";
      }

      insertAtCaret(el, elJS, insert);
    }

	})

  //insert on 'sub-button' click
  $(".html-tile-sub").click(function(){
    //if a textbox was active when clicking the button
    if (selectedTextArea.prop('nodeName') == "TEXTAREA") {
      let el = selectedTextArea;
      let elJS = selectedTextAreaJS;
      let item = $(this);

      if (item.hasClass("basic")) {
        insert = "<ol>\n\t<li>\n\t\tITEM\n\t</li>\n</ol>";
      } else if (item.hasClass("ML")) {
        insert = "<ol class='MLquestion'>\n\t<li>\n\t\tHOODFVRAAG\n\t\t<ol>\n\t\t\t<li>SUBVRAAG</li>\n\t\t</ol>\n\t</li>\n</ol>";
      }

      insertAtCaret(el, elJS, insert);
    }

  })


});
