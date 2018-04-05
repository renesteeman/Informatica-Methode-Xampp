$(document).ready(function(){
	//burger icon
	$(".burger-icon").click(function(){
		$(".nav-burger").toggleClass("active");
	});

	//chapter tiles
	$(".tile").click(function(){
		$(this).siblings().toggle();
		$(this).toggleClass("active");
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

	//groepen
	$('.addLid').children().val(' ');
	window.setTimeout(addLid, 100);

	function addLid(){
		$('.addLid').children().val('');
	}

	$(".addLidButton").click(function(){
		var name = $(this).prev().children().val();
		if(name!=""){
			var paste = '<li><span class="lid">'+ name +'</span><span class="delete">x</span></li>'
			$(this).prev().children().val('');
			$(this).parent().prev().children().first().append(paste);
		}

	});

	$(".addLid").children().first().keypress(function(event){
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
		$('.ledenLijst>ul>li>.lid').each(function(index){
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
		});
		jqXHR.fail(function( jqXHR, textStatus ) {
		  alert( "Request failed: " + textStatus );
		});

	});

	//edit group sent data
	$(".Edit").click(function(){

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
		$('.ledenLijst>ul>li>.lid').each(function(index){
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
		  alert("AJAX failed, contact admin");
		});
	});

	//delete group data
	$('.deleteGroupButton').click(function(){
		if (confirm("Are you sure you want to delete the group?")){
			var password = $("input[name='password']").val();

			//sent values of group via ajax to editGroupFront.php
			jqXHR = $.ajax({
				method: "POST",
				url: '../scripts/deleteGroup.php',
				data: {password:password}
			});

			jqXHR.done(function(msg) {
				window.alert(msg);
				window.location.href = '../pages/overview.php';
			});

			jqXHR.fail(function( jqXHR) {
			  alert("AJAX failed, contact admin");
			});

		} else {
			alert("Canceled group deletion");
		}
	});

	//quiz
	function updateQuizHeader(){
		var aantalVragenBeantwoord = $('input[type=checkbox]:checked').length;
		var aantalVragen = $('.vraagBalk').length;
		$('.quiz-bar').html(aantalVragenBeantwoord + ' uit ' + aantalVragen + ' vragen beantwoord');
	};

	updateQuizHeader();

	$('input[type="checkbox"]').on('change', function() {
		var checkBoxesQuestion = $(this).parent().parent().parent().find('input[type=checkbox]');
		$(checkBoxesQuestion).not(this).prop('checked', false);
		updateQuizHeader();
	});

	$(".vraagBalk").click(function(){
		$(this).next().slideToggle();
		$(this).toggleClass("active");
		$(this).next().next().toggleClass("after-active");
	});

	$('.controleerAntwoordButton').click(function(){
		var aantalVragenBeantwoord = $('input[type=checkbox]:checked').length;
		var aantalVragen = $('.vraagBalk').length;
		var antwoorden = [];

		var url = window.location.href;
		var chapterLocation = url.search("H") + 1;
		var chapter = url.charAt(chapterLocation);

		for(i=0; i<aantalVragenBeantwoord;i++){
			var antwoord = $(this).prev().children('.antwoorden').find('input[type="checkbox"]:checked').parent().eq(i).text();
			antwoord = $.trim(antwoord);
			antwoorden.push(antwoord);
		}

		if(aantalVragen == aantalVragenBeantwoord){
			//sent the given answers to the quiz php
			jqXHR = $.ajax({
				method: "POST",
				url: '../../../scripts/quiz.php',
				data: {antwoorden: antwoorden, hoofdstuk: chapter}
			});

			jqXHR.done(function(msg) {
				window.alert(msg);
			});

			jqXHR.fail(function( jqXHR) {
				alert("AJAX failed, contact admin");
			});

		} else {
			alert('Beantwoord eerst alle vragen');
		}

	});

	//planner
	$('.addChapter').children().val(' ');
	window.setTimeout(addChapter, 100);

	function addChapter(){
		$('.addChapter').children().val('');
	}

	$(".addChapterButton").click(function(){
		var name = $(this).prev().children().val();
		if(name!=""){
			var paste = '<li><span class="item">'+ name +'</span><span class="delete">x</span></li>'
			$(this).prev().children().val('');
			$(this).parent().prev().children().first().append(paste);
		}

	});

	$(".addChapter").children().first().keypress(function(event){
		if(event.keyCode == 13){
			$('.addChapterButton').click();
		}
		return event.keyCode != 13;
	});


	//create Item
	/*
	$('.createGroupForm').submit(function(event){
		event.preventDefault();

		var Gnaam = $('input[name=Gnaam]').val();
		var Gomschrijving = $('textarea[name=Gomschrijving]').val();
		var Glink = $('input[name=Glink]').val();

		var Gleden = [];
		$('.ledenLijst>ul>li>.lid').each(function(index){
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
		});
		jqXHR.fail(function( jqXHR, textStatus ) {
		  alert( "Request failed: " + textStatus );
		});

	}); */


});
