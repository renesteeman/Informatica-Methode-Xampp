$(document).ready(function(){
  //update account
  $('.accountSettingsForm').submit(function(event){
    event.preventDefault();

    var Nnaam = $("input[name='Nnaam']").val();
    var Nusername = $("input[name='Nusername']").val();
    var Npassword = $("input[name='Npassword']").val();
    var NpasswordConfirm = $("input[name='NpasswordConfirm']").val();
    var Nemail = $("input[name='Nemail']").val();
    var Ngroup_role = $("input[name='Ngroup_role']").val();
    var password = $("input[name='password']").val();

    jqXHR = $.ajax({
      method: "POST",
      url: '../scripts/editAccount.php',
      data: {Nnaam: Nnaam, Nusername: Nusername, Npassword: Npassword, NpasswordConfirm: NpasswordConfirm, Nemail:Nemail, Ngroup_role: Ngroup_role, password: password},
    });

    jqXHR.done(function(response) {
      response = JSON.parse(response);
      window.alert(response.msg);

      //if there isn't an error, redirect, else stay on page
      if(!response.error){
        window.location.href = '../index.php';
      }
    });

    jqXHR.fail(function(jqXHR) {
			alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
	  });
  });
});
