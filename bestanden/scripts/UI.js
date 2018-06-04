$(document).ready(function(){
	//burger icon
	$(".burger-icon").click(function(){
		$(".nav-burger").toggleClass("active");
	});

	//chapter tiles
	$(".tile").click(function(){
		$(this).siblings().toggle();
		$(this).toggleClass("active");

		//go to selected tile (mostly for mobile)
		var pos = $(this).position();
		var y = pos.top;

		$('html, body').animate({
            scrollTop: y - 120
        }, 'fast');

	});

	$("select").click(function(){
		if($('select[name=newGroup]').val()!=''){
			$(this).removeClass("defaultSelect");
		} else {
			$(this).toggleClass("defaultSelect");
		}
	});

	$(".Arrow").click(function(){
		$(this).parent().parent().next().slideToggle();
		$(this).parent().parent().next().toggleClass("active");

		$(this).toggleClass("active");

	});

	//paragraph
	$(".bar-s").click(function(){
		$(this).next().slideToggle();
		$(this).toggleClass("active");
		$(this).next().next().toggleClass("after-active");
	});

	$(".theorie-answers").slideToggle(0);

	//edit lists
	$('.add-item').children().val(' ');
	window.setTimeout(addLid, 100);

	function addLid(){
		$('.add-item').children().val('');
	}

	$(".addLidButton").click(function(){
		var name = $(this).prev().children().val();
		if(name!=""){
			var paste = '<li><span class="list-item">'+ name +'</span><span class="delete">x</span></li>'
			$(this).prev().children().val('');
			$(this).parent().prev().children().first().append(paste);
		}

	});

	$(".add-item").children().first().keypress(function(event){
		if(event.keyCode == 13){
			$('.addLidButton').click();
		}
		return event.keyCode != 13;
	});

	$(document).on('click',".delete",function(){
		$(this).parent().fadeOut();
		$(this).parent().remove();
	});

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
		jqXHR.done(function( msg ) {
			alert(msg);
			window.location.href = '../pages/overview.php';
		});
		jqXHR.fail(function( jqXHR, textStatus ) {
		  alert( "Request failed: " + textStatus );
		});

	});

	//edit group sent data
	$(".editGroup").click(function(){

		var groupname = $(this).parent().parent().parent().children().first().children().first().text();

		//sent values of group via ajax to editGroupFront.php
		jqXHR = $.ajax({
			method: "POST",
			url: '../scripts/editGroupSetSession.php',
			data: {groupname: groupname}
		});
		jqXHR.done(function() {
			window.location.href = '../scripts/editGroupFront.php';
		});
		jqXHR.fail(function( jqXHR) {
		  alert( "AJAX failed, contact admin" );
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

		console.log(NGleden);

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
		  alert("AJAX failed, contact admin");
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
				if(!msg.includes('error') && !msg.includes('Wrong')){
					window.location.href = '../pages/overview.php';
				}
			});

			jqXHR.fail(function( jqXHR) {
			  alert("AJAX failed, contact admin");
			});

		} else {
			alert("Groep verwijderen is geanuleerd.");
		}
	});

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
			url: '../scripts/updateAccount.php',
			data: {Nnaam: Nnaam, Nusername: Nusername, Npassword: Npassword, NpasswordConfirm: NpasswordConfirm, Nemail:Nemail, Ngroup_role: Ngroup_role, password: password}
		});

		jqXHR.done(function(msg) {
			if(msg.includes('succesvol')){
				window.alert(msg);
				window.location.href = '../index.php';
			} else {
				window.alert(msg);
			}
		});

		jqXHR.fail(function( jqXHR) {
		  alert("AJAX failed, contact admin");
		});
	});




});
