$('#league_id').on('change', function(e){
    // console.log(e);
    var league_id = e.target.value;

    $.get('/ajax-team?league_id=' + league_id, function(data){
        // console.log(data);
        $('#team_id').prop('disabled', false);
        $('#team_id').empty();
        $.each(data, function(index, teamObj){
            $('#team_id').append('<option value="'+teamObj.id+'">'+teamObj.name+'</option>');
        });
    });
});