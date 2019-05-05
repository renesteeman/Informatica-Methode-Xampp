$(document).ready(function(){
	//IE patch
	function includes(container, value) {
		var returnValue = false;
		var pos = container.indexOf(value);

		if (pos >= 0) {
			returnValue = true;
		}

		return returnValue;
	}

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

		//Give php the info it needs (via AJAX)
		jqXHR = $.ajax({
			method: "POST",
			url: "createGroupAjax.php",
			data: {Gnaam: Gnaam, Gomschrijving: Gomschrijving, Glink: Glink, Gleden: Gleden}
		});
		jqXHR.done(function(response) {
      response = JSON.parse(response);
			alert(response.msg);

      //if there isn't an error, redirect
      if(!response.error){
        window.location.href = '../pages/overview.php';
      }

		});
		jqXHR.fail(function(jqXHR) {
			alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
	  });

	});

  $('.editGroupForm').submit(function(event){
    event.preventDefault();
  });

  //edit group
  $("#editGroupConfirm").click(function(){
		var group_id = $('.editGroupForm').attr('id');
    var NGname = $("input[name='NGnaam']").val();
    var NGbeschrijving = $("textarea[name='NGomschrijving']").val();
    var NGlink = $("input[name='NGlink']").val();

    var NGleden = [];
    $('.list>ul>li>.list-item').each(function(index){
      NGleden.push($(this).text());
    });

    //sent values of group via ajax to editGroupFront.php
		console.log(group_id,
NGname,
NGbeschrijving,
NGlink);
    jqXHR = $.ajax({
      method: "POST",
      url: '../scripts/editGroupAjax.php',
      data: {group_id:group_id, NGname: NGname, NGbeschrijving:NGbeschrijving, NGlink:NGlink, NGleden:NGleden}
    });

    jqXHR.done(function(response) {
			response = JSON.parse(response);
      window.alert(response.msg);
			if(!response.error){
				window.location.href = '../pages/overview.php';
			}
    });

		jqXHR.fail(function(jqXHR) {
			alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
	  });
  });

  //delete group data
  $('.deleteGroupButton').click(function(){
    if (confirm("Weet u zeker dat u de groep wilt verwijderen?")){
      var password = $("input[name='password']").val();
			var group_id = $('.editGroupForm').attr('id');

      jqXHR = $.ajax({
        method: "POST",
        url: '../scripts/deleteGroupAjax.php',
        data: {group_id:group_id, password:password}
      });

      jqXHR.done(function(msg) {
        window.alert(msg);
        if(!includes(msg, 'error') && !includes(msg, 'Wrong')){
          window.location.href = '../pages/overview.php';
        }
      });

			jqXHR.fail(function(jqXHR) {
				alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
		  });

    } else {
      alert("Groep verwijderen is geanuleerd.");
    }
  });
});
