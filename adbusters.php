<?php
/*
Plugin Name: Adbusters
Plugin URI: https://github.com/Automattic/Adbusters
Description: Iframe busters for popular ad networks.
Version: 1.0
Requires at least: 3.7
Tested up to: 3.7.20
License: GPLv3
Author: Paul Gibbs, Mohammad Jangda, Automattic
Author URI: http://automattic.com/
Text Domain: adbusters

"Adbusters"
Copyright (C) 2013 Automattic

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License version 3 as published by
the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see http://www.gnu.org/licenses/.
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * If an appropriate request comes in, load an iframe ad buster file.
 *
 * Note: the following networks/scripts are insecure and will not be added to the plugin:
 * > EyeReturn (/eyereturn/eyereturn.html)
 * > Unicast (/unicast/unicastIFD.html)
 * > Yahoo - AdInterax (/adinterax/adx-iframe-v2.html)
 * > Jivox (/jivox/jivoxIBuster.html)
 *
 * @since Adbusters (1.0)
 */
function wpcom_vip_maybe_load_ad_busters() {

	$ad_busters = array(
		'adcentric/ifr_b.html',              // AdCentric
		'atlas/atlas_rm.htm',                // Atlas
		'doubleclick/DARTIframe.html',       // Google - DoubleClick
		'eyeblaster/addineyeV2.html',        // MediaMind - EyeBlaster
		'flite/fif.html',                    // Flite
		'gumgum/iframe_buster.html',         // gumgum
		'interpolls/pub_interpolls.html',    // Interpolls
		'klipmart/km_ss.html',               // Google - DoubleClick - Klipmart
		'mediamind/MMbuster.html',           // MediaMind - addineye (?)
		'oggifinogi/oggiPlayerLoader.htm',   // Collective - OggiFinogi
		'pictela/Pictela_iframeproxy.html',  // AOL - Pictela
		'pointroll/PointRollAds.htm',        // PointRoll
		'saymedia/iframebuster.html',        // Say Media
		'smartadserver/iframeout.html',      // SmartAdserver
		'undertone/iframe-buster.html',      // Intercept Interactive - Undertone
		'undertone/UT_iframe_buster.html',   // Intercept Interactive - Undertone
		'viewpoint/vwpt.html',               // Enliven Marketing Technologies Corporation - Viewpoint
		'_uac/adpage.html',                  // AOL - atwola.com
	);

	// To ignore an ad network, use this filter and return an array containing the values of $ad_busters to not load
	$block_ads  = apply_filters( 'wpcom_vip_maybe_load_ad_busters', array() );
	$ad_busters = array_diff( $ad_busters, $block_ads );

	$request = ltrim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );

	// Do we have a request for a supported network?
	$index  = array_search( $request, $ad_busters );
	if ( false === $index )
		return;

	// Spit out the template
	$file = plugin_dir_path( __FILE__ ) . 'templates/' . $ad_busters[$index];
	if ( ! file_exists( $file ) )
		return;

	header( 'Content-type: text/html' );
	readfile( $file );

	exit;
}
add_action( 'init', 'wpcom_vip_maybe_load_ad_busters', -1 );
