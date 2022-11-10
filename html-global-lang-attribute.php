<?php
/**
 * Plugin Name:       HTML Global lang Attribute
 * Plugin URI:        https://github.com/reatlat/wp-html-global-lang-attribute
 * Description:       This plugin slice the language attribute for HTML tag, For example: lang="en-US" to lang="en"
 * Tags:              lang, language, slice, seo
 * Version:           1.0.5
 * Author:            Alex Zappa
 * Author URI:        https://alex.zappa.dev/
 * Donate link:       https://www.paypal.me/reatlat/5usd
 * Requires at least: 2.1.0
 * Tested up to:      6.1
 * Requires PHP:      5.6
 * Stable tag:        1.0.5
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
    // TODO: activate hooks
}


function deactivate_htmlGlobalLangAttribute()
{
    // TODO: deactivate hooks
}


register_activation_hook( __FILE__, 'activate_htmlGlobalLangAttribute' );
register_deactivation_hook( __FILE__, 'deactivate_htmlGlobalLangAttribute' );


if ( ! function_exists( 'set_HtmlGlobalLangAttribute' ) )
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


