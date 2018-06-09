<?php
/**
 * Plugin Name:       HTML Global lang Attribute
 * Plugin URI:        https://github.com/reatlat/wp-html-global-lang-attribute
 * Description:       description
 * Tags:              tags
 * Version:           0.0.1
 * Author:            Alex Zappa a.k.a. re[at]lat
 * Author URI:        https://reatlat.net
 * Donate link:       https://www.paypal.me/reatlat/5usd
 * Requires at least: 2.1.0
 * Tested up to:      4.9.6
 * Requires PHP:      5.6 or later
 * Stable tag:        0.0.1
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       html-global-lang-attribute
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) )
{
    die;
}


function activate_htmlGlobalLangAttribute()
{

    function set_HtmlGlobalLangAttribute( $output )
    {
        $lang = substr( get_locale(), 0, 2);
        if ( preg_match( '#lang="[a-z-]+"#i', $output ) ) {

            // TODO: if ( strrpos ( $output , 'en-US' ) ) { ... }

            $output = preg_replace( '#lang="([a-z-]+)"#i', 'lang="' . $lang . '"', $output );
        }

        return $output;
    }

    add_filter( 'language_attributes', 'set_HtmlGlobalLangAttribute');

}


function deactivate_htmlGlobalLangAttribute()
{

    // TODO: remove some settings and options

}


register_activation_hook( __FILE__, 'activate_htmlGlobalLangAttribute' );
register_deactivation_hook( __FILE__, 'deactivate_htmlGlobalLangAttribute' );






