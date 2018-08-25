$(document).ready(function(){
  //create group
	$('.createGroupForm').submit(function(event){
		event.preventDefault();

		var Gnaam = $('input[name=Gnaam]').val();
		var Gomschrijving = $('textarea[name=Gomschrijving]').val();
		var Glink = $('input[name=Glink]').val();

		var Gleden = [];
		$('.ledenLijst>ul>li>.list-item').each(function(index){
			Gleden.push($(this).text());
		});

		var password = $('input[name=password]').val();

		//Give php the info it needs (via AJAX)
		jqXHR = $.ajax({
			method: "POST",
			url: "createGroupAjax.php",
			data: {Gnaam: Gnaam, Gomschrijving: Gomschrijving, Glink: Glink, Gleden: Gleden, password: password}
		});
		jqXHR.done(function(response) {
      response = JSON.parse(response);
			alert(response.msg);

      //if there isn't an error, redirect
      if(!response.error){
        window.location.href = '../pages/overview.php';
      }

		});
		jqXHR.fail(function(jqXHR, textStatus) {
		  alert("Er is iets mis gegaan met AJAX " + textStatus);
		});

	});

  $('.editGroupForm').submit(function(event){
    event.preventDefault();
  });

  //edit group
  $("#editGroupConfirm").click(function(){
    var NGname = $("input[name='NGnaam']").val();
    var NGbeschrijving = $("textarea[name='NGomschrijving']").val();
    var NGlink = $("input[name='NGlink']").val();
    var password = $("input[name='password']").val();

    var NGleden = [];
    $('.list>ul>li>.list-item').each(function(index){
      NGleden.push($(this).text());
    });

    //sent values of group via ajax to editGroupFront.php
    jqXHR = $.ajax({
      method: "POST",
      url: '../scripts/editGroupAjax.php',
      data: {NGname: NGname, NGbeschrijving:NGbeschrijving, NGlink:NGlink, NGleden:NGleden, password:password}
    });

    jqXHR.done(function(msg) {
      window.alert(msg);
      window.location.href = '../pages/overview.php';
    });

    jqXHR.fail(function( jqXHR) {
      alert("Er is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
    });
  });

  //delete group data
  $('.deleteGroupButton').click(function(){
    if (confirm("Weet u zeker dat u de groep wilt verwijderen?")){
      var password = $("input[name='password']").val();

      //sent values of group via ajax to editGroupFront.php
      jqXHR = $.ajax({
        method: "POST",
        url: '../scripts/deleteGroupAjax.php',
        data: {password:password}
      });

      jqXHR.done(function(msg) {
        window.alert(msg);
        if(!includes(msg, 'error') && !includes(msg, 'Wrong')){
          window.location.href = '../pages/overview.php';
        }
      });

      jqXHR.fail(function(jqXHR) {
        alert("Er is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
      });

    } else {
      alert("Groep verwijderen is geanuleerd.");
    }
  });
});
