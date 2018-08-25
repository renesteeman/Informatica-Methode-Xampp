$(document).ready(function(){
	//planner
	$('.addChapter').children().val(' ');
	window.setTimeout(addChapter, 100);

	function addChapter(){
		$('.addChapter').children().val('');
	}

	$(".addChapterButton").click(function(){
		var name = $(this).prev().children().val();
		if(name!=""){
			var paste = '<li><span class="list-item">'+ name +'</span><span class="delete">x</span></li>'
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
	$('.createItemForm').submit(function(event){
		event.preventDefault();

		var Inaam = $('input[name=Inaam]').val();
		var Iomschrijving = $('textarea[name=Iomschrijving]').val();
		var Iklas = $('input[name=Iklas]').val();
		var Idatum = $('input[name=Idatum]').val();

		var Iprogressie = [];
		$('.itemLijst>ul>li>.list-item').each(function(index){
			Iprogressie.push($(this).text());
		});

		var password = $('input[name=password]').val();

		//Give php the info it needs (via AJAX)
		jqXHR = $.ajax({
			method: "POST",
			url: "createItemAjax.php",
			data: {Inaam: Inaam, Iomschrijving: Iomschrijving, Iklas: Iklas, Iprogressie: Iprogressie, Idatum: Idatum, password: password}
		});
		jqXHR.done(function(msg) {
			window.alert(msg);
			window.location.href = '../pages/planner.php';
		});
		jqXHR.fail(function(jqXHR, textStatus) {
		  alert( "Request failed: " + textStatus );
		});

	});

	//edit item sent data
	$(".editItem").click(function(){

		var itemdatum = $(this).parent().parent().parent().children().find('.DateCompare').text();
		var itemID = $(this).parent().parent().parent().children().find('.itemID').text();
		var itemklas = $(this).parent().parent().parent().children().find('.klas').text();
		var itemname = $(this).parent().parent().parent().children().find('.naam').text();
		var itembeschrijving = $(this).parent().parent().parent().find('.itemBeschrijving').text();
		itembeschrijving = itembeschrijving.trim();

		//sent values of group via ajax to editGroupFront.php
		jqXHR = $.ajax({
			method: "POST",
			url: '../scripts/editItemSetSession.php',
			data: {itemname: itemname, itemID: itemID, itemklas: itemklas, itemdatum:itemdatum, itembeschrijving:itembeschrijving}
		});
		jqXHR.done(function(msg) {
			window.location.href = '../scripts/editItemFront.php';
		});
		jqXHR.fail(function( jqXHR) {
		  alert("Er is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
	  });

	});

	$('.editItemForm').submit(function(event){
		event.preventDefault();
	});

	function addLid(){
		$('.addItem').children().val('');
	}

	$(".addItemButton").click(function(){
		var name = $(this).prev().children().val();
		if(name!=""){
			var paste = '<li><span class="list-item">'+ name +'</span><span class="delete">x</span></li>'
			$(this).prev().children().val('');
			$(this).parent().prev().children().first().append(paste);
		}

	});

	$(".addItem").children().first().keypress(function(event){
		if(event.keyCode == 13){
			$('.addItemButton').click();
		}
		return event.keyCode != 13;
	});

	//edit item
	$("#editItemConfirm").click(function(){
		var NInaam = $('input[name=NInaam]').val();
		var NIomschrijving = $('textarea[name=NIomschrijving]').val();
		var NIklas = $('input[name=NIklas]').val();
		var NIdatum = $('input[name=NIdatum]').val();

		var NIprogressie = [];
		$('.itemLijst>ul>li>.list-item').each(function(index){
			NIprogressie.push($(this).text());
		});

		var password = $('input[name=password]').val();

		//sent values of group via ajax to editItemFront.php
		jqXHR = $.ajax({
			method: "POST",
			url: '../scripts/editItemAjax.php',
			data: {NInaam: NInaam, NIomschrijving:NIomschrijving, NIklas:NIklas, NIdatum:NIdatum, NIprogressie:NIprogressie, password:password}
		});

		jqXHR.done(function(msg) {
			window.alert(msg);
			window.location.href = '../pages/planner.php';
		});

		jqXHR.fail(function( jqXHR) {
		  alert("Er is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
		});
	});

	//delete item data
	$('.deleteItemButton').click(function(){
		if (confirm("Weet u zeker dat u de opdracht wilt verwijderen?")){
			var password = $("input[name='password']").val();

			//sent values of group via ajax to editGroupFront.php
			jqXHR = $.ajax({
				method: "POST",
				url: '../scripts/deleteItem.php',
				data: {password:password}
			});

			jqXHR.done(function(msg) {
				window.alert(msg);
				window.location.href = '../pages/planner.php';
			});

			jqXHR.fail(function( jqXHR) {
			  alert("Er is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
			});

		} else {
			alert("Opdracht verwijderen is geanuleerd.");
		}
	});
});
