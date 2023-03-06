<?php

/**
 *  @package hamzoooz
 *  ================================
 *  REMOVE GENERATOR VERSION NUMBER
 *  ================================
 * 
 */
	
function remove_script_version_numbers() {
    function remove_version_from_url( $url ) {
        return remove_query_arg( 'ver', $url );
    }
    add_filter( 'script_loader_src', 'remove_version_from_url' );
    add_filter( 'style_loader_src', 'remove_version_from_url' );
}
	
// Call the function to remove version numbers from scripts
remove_script_version_numbers();