jQuery(document).ready(function($) {

    const data = {
        'action': 'getPostsFromServer',
    };

    $( '#importPosts' ).click(function(e){

        e.preventDefault();

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data,
            beforeSend: function( xhr ) {
                $( '#importPosts' ).text( 'Loading...' );
            },
            success: function( data ) {
                $( '#importPosts' ).text( 'Import Posts' );
                location.reload();
            },
            finally: function () {
                $( '#importPosts' ).text( 'Import Posts' );
            }
        });

    });
});