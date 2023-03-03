<? php
/**
 * 
 * @package sunsettheme
 * 
 * ==================================
 *      ADMIN PAGE Contact Form 
 * ==================================
 * 
 */

$hamzoooz_contact_form = get_option( 'hamzoooz_contact_form' );
if( @$hamzoooz_contact_form  == 1 ){
	echo "it's Active";
}