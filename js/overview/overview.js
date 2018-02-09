$(document).ready(function() {

  //On change value "klassen" or "groepen"
  $('#selectedStatus').on('change', function() {
    val = $('#selectedStatus').val();
    if (val == 'Klassen') {
        $.post('../../php/overview/classes.php', function(data) {
          $('#result').html(data);
        });
    };
    if (val == 'Groepen') {
      $.post('../../php/overview/groups.php', function(data) {
        $('#result').html(data);
      });
    };
  });

});
