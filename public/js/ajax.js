$(document).ready(function(){

    $("#destroy").click(function()
    {

        var id = $(this).data("id");

        $.ajax(
        {
            url: "http://localhost:8888/booking/destroy",
            type: 'DELETE',
            dataType: "JSON",
            data: {
                "id": id
            },
            success: function ()
            {
                console.log("it Work");
            }
        });

        console.log("It failed");
    })

});