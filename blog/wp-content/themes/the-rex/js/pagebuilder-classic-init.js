/* -----------------------------------------------------------------------------
 * Page Template Meta-box
 * -------------------------------------------------------------------------- */
;(function( $, window, document, undefined ){
	"use strict";
	
	$( document ).ready( function () {
        var container = $('#bk-container');
        if(container.length) {  
            container.show();
        }
        $( '#page_template' ).change( function() {
			var template = $( '#page_template' ).val();
            //console.log(template);
			// Page Composer Template
			// Page Composer Template
			if ( 'page_builder.php' == template ) {
				
				$.page_builder( 'show' );
				$( '#bk_page_options' ).hide();

			} else {
				$.page_builder( 'hide' );
				$( '#bk_page_options' ).show();
			}
		} ).triggerHandler( 'change' );
        
	} );
})( jQuery, window , document );
