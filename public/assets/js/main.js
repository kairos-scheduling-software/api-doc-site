$(function() 
{
    //set up the ticket submit button
    $('#example-form').on('submit', function (e) {
        e.preventDefault();
        

        var postData = {json: $('#json').val(), mode: $('#mode').val()};
        var url = $('#example-form').attr("action");
        $.ajax({
            url: url,
            type: "POST",
            data: postData,
            success: function (data, textStatus, jqXHR)
            {
                var header = "<h2>Response</h2></br>";
                $('#example-response-text').html(header + data.data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('could not send your request to the solver. Make sure to check that the json is valid');
            }
        });

    });
});