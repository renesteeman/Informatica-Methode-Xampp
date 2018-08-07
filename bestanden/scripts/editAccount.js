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

      //if there isn't an error, redirect, else stay on page
      if(response.error == 0){
        window.alert(response.msg);
        window.location.href = '../index.php';
      } else {
        window.alert(response.msg);
      }
    });

    jqXHR.fail(function( jqXHR) {
      alert("AJAX failed, contact admin");
    });
  });
});
