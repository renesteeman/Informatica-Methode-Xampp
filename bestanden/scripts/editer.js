$(document).ready(function(){

  $('.editTheory').submit(function(event){
    event.preventDefault();

    var chapter = $('#chapter_selector option:selected').text();
    var paragraph = $('#paragraph_selector option:selected').text();
    console.log(chapter);
    console.log(paragraph);
  })





});
