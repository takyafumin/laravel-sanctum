$(function () {

    $('#get-user-info').on("click", function() {
        const url = $(this).data('url');
        const target = $(this).data('target');

        $.ajax({
            type: 'GET',
            url: url,
            dataType: "json",
        }).then((...args) => {
            const [data, textStatus, jqXHR] = args;
            $(target).text(JSON.stringify(data));
        }).catch((...args) => {
            const [jqXHR, textStatus, errorThrown] = args;
            $(target).text(errorThrown);
        });
    });
});
