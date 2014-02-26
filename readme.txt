=== Adbusters ===
Contributors: DJPaul, batmoo, automattic
Tags: ads, iframe busters, ad network
Requires at least: 3.7
Tested up to: 3.7.20
Stable tag: 1.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

A set of iframe busters for popular ad networks

== Description ==

Are you troubled by strange iframe ad files in the middle of the night? Do you experience feelings of dread in your revision control and source code management system? Have you or any of your colleagues ever had to manually add these files to your site as your ads team keeps making new deals?

If the answer is yes, don't wait another minute! ADBUSTERS! Download this plugin today and let us take care of your ad file serving needs.

Caveat: while we have reviewed the included templates for obvious security issues (like XSS), we cannot guarantee the reliability of external scripts referenced by most of the adbusters. We highly recommend discussing with your ad network representative to discuss this if you have any concerns.

== Changelog ==
= 1.0 =
* First release.

== Frequently Asked Questions ==
= What ad network iframes are supported? =

* /atlas/atlas_rm.htm
* /blogads/iframebuster-4.html
* /doubleclick/DARTIframe.html
* /eyeblaster/addineyeV2.html
* /mediamind/MMbuster.html
* /pictela/Pictela_iframeproxy.html
* /pointroll/PointRollAds.htm
* /undertone/UT_iframe_buster.html

== Installation ==
1. Install via WordPress Plugins administration page.
1. Activate the plugin.

== Guidelines for iFrame Busters ==

The following are common XSS vulnerabilities found in iFrame busters.

1. Unescaped URL parameter values
1. Parameters that accept any domain

= Unescaped URL parameter values =

Special characters should be removed or converted into their equivalent HTML/hex entity. The characters in the following table can be used to write malicious code on the page.

`example.com/iframebuster.html?parameter="></script><script>alert('XSS')</script>`

	Character => HTML Entity
	    &     =>    &amp;   
	    <     =>    &lt;    
	    >     =>    &gt;    
	    "     =>    &quot;  
	    '     =>    &#x27;  
	    /     =>    &#x2F;  


= Parameters that accept any domain =

When passing a domain as a parameter to write a script tag onto the page, it should be restricted to an approved domain(s). 

`example.com/iframebuster.html?server=evildomain.com`

= Examples of Safe iFrame Busters =

* [DARTIframe.html](https://github.com/Automattic/Adbusters/blob/master/templates/doubleclick/DARTIframe.html)
* [ifr_b.html](https://github.com/Automattic/Adbusters/blob/master/templates/adcentric/ifr_b.html)
* [Pictela_iframeproxy.html](https://github.com/Automattic/Adbusters/blob/master/templates/pictela/Pictela_iframeproxy.html)

= XSS Attack Prevention Guidelines =

Further guidelines can be found at [ha.ckers.org/xss.html](http://ha.ckers.org/xss.html), which covers the above rules as well as many others.

== License ==
"Adbusters"
Copyright (C) 2013 Automattic

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
