$('.history').on('click', 'tr', function() {
    window.location = this.getAttribute( 'data-link' );
} );
