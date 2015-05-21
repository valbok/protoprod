$( document ).ready(function(){
    $('.process').click(function() {
        var ths = this;
        $(ths).next('.loader').show();
        var link = '/';
        var feed = $(ths).prev('.url').val();
        $.post( link,
                {'url' : feed, 'ajax' : true},
                function(data) {
                    $('.result').html(data);
                    $(ths).next('.loader').hide();
                }
        );

        return false;
    });
});
