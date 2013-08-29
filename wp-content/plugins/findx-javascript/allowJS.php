<?php

/*
Plugin Name: FindX Javascript
version: 1.0
Description: Include Javascript inside pages, whilst retaining HTML tags and functional script
Author: V.V.T | Örestad-Linux
Author URI: http://www.vvt-mediadesign.se
*/

add_shortcode('js','js_handler');
add_action('admin_menu', 'allow_js_menu');


function js_handler($args, $content=null){
	define("ALLOWJSVERSION","0.0.1");
	if(function_exists("is_comment")){ if(is_comment()){return "[js] is not allowed in comments";}}
	extract( shortcode_atts(array('debug' => 0), $args));  if($args['debug'] != 1){  error_reporting(E_NONE);  }
	/*Strip out the Poor Tags*/$content =(htmlspecialchars($content,ENT_QUOTES)); $content = str_replace("&amp;#8217;","'",$content); $content = str_replace("&amp;#8216;","'",$content); $content = str_replace("&amp;#8242;","'",$content); $content = str_replace("&amp;#8220;","\"",$content); $content = str_replace("&amp;#8221;","\"",$content); $content = str_replace("&amp;#8243;","\"",$content); $content = str_replace("&amp;#039;","'",$content); $content = str_replace("&#039;","'",$content); $content = str_replace("&amp;#038;","&",$content); $content = str_replace("&amp;lt;br /&amp;gt;"," ", $content); $content = htmlspecialchars_decode($content); $content = str_replace("<br />"," ",$content); $content = str_replace("<p>"," ",$content); $content = str_replace("</p>"," ",$content); $content = str_replace("[br/]","<br/>",$content); $content = str_replace("\\[","&#91;",$content); $content = str_replace("\\]","&#93;",$content); $content = str_replace("[","<",$content); $content = str_replace("]",">",$content); $content = str_replace("&#91;",'[',$content); $content = str_replace("&#93;",']',$content); $content = str_replace("&gt;",'>',$content); $content = str_replace("&lt;",'<',$content);
	/*Buffer the output*/ ob_start();
	echo "<script type='text/javascript'>". $content ."</script>";
	if($args['debug'] == 1){ $content =(htmlspecialchars($content,ENT_QUOTES)); echo ("<pre>&lt;script type='text/javascript' &gt;".$content."&lt;script/&gt;</pre>"); }
	$returned = ob_get_clean();
	return $returned;
}

function allow_js_menu(){

	add_submenu_page('options-general.php','Allow Javascript in posts and pages', 'Allow JS in posts', 'edit_posts', 'allow-js-admin', 'allow_js_options');
}


function allow_js_options()
{
	?>
	<h2>UseJavascript in posts and pages</h2>
	<div style='float:right; display:inline; margin-left:25px; margin-bottom:10px; margin-right:15px; padding:5px; background-color:#ffffcc; border:1px solid #ddddaa;'>
	<span style='font-size:1em; color:#999; display:block; line-height:1.2em;'>Developed by <a href='http://www.hitreach.co.uk' target="_blank" style='text-decoration:none;'>V.V.T</a></span>
<span style='font-size:1em; color:#999; display:block; line-height:1.2em;'>Version: 0.0.1 <a href='http://www.vvt-mediadesign.se/' target="_blank" style='text-decoration:none;'>Support, Comments &amp; questions</a></span></div>

	<p>Allow Javascript in posts and pages adds full functionality for javascript in wordpress posts and pages by adding a simple shortcode <span style='color:green'>[js]</span><em>.code.</em><span style='color:green'>[/js]</span></p>
	<p>This plugin strips away the automatically generated wordpress &lt;p&gt; and &lt;br/&gt; tags but still allows the addition of your own &lt;p&gt; and &lt;br/&gt; tags
	<h3>Usage</h3>
	<p>To add the Javascript code to your post or page simply place any Javascript code inside the shortcode tags.<p>
	<em>For example: </em>a simple alert<br/>
	<pre>
	[js]
	 alert('findX');
	[/js]
	</pre>
	<p>This code will cause a popup when the page is loaded</p>
	<p>in addition, should this code not be working (for example a missing ";") simply just change the [js] to be [js debug=1]</p>
	<pre>
     [js debug=1]
      alert('findX');
      [/js]
	</pre>
	<h3>Some Important Notes</h3>
	This plugin strips away all instances of &lt;p&gt; and &lt;br /&gt; therefore code has been added so that if you wish to use tags in your output (e.g.):
	<pre>
     [js]
      alert("find &lt;br /&gt; X");
     [/js]
	</pre>
	the &lt; and &gt; tags will need to be swapped for [ and ] respectively so &lt;p&gt; becomes [p] and  &lt;/p&gt; becomes [/p] which is converted back to &lt;p&gt; at runtime.  these [ ] work for all tags (p, strong, em etc.).
	<pre>
     [js]
      alert("find [br /] X");
     [/js]
	</pre>
<h3>Tag list</h3>
	<table cellpadding="5" cellspacing="1" style='border:1px #ddd solid' width='60%'>

		<tr>
			<th align="left" style="padding:5px; background:#ffffcc">For</th>
			<th align="left" style="padding:5px; background:#ffffcc">Write as</th>
		</tr>
		<tr>
			<td align="left"  style="padding:5px; background:#ffffcc">&lt;p&gt; ... &lt;/p&gt;</td>
			<td align="left" style="padding:5px; background:#ffffcc">[p] ... [/p]</td>
		</tr>
		<tr>
			<td align="left"  style="padding:5px; background:#ffffcc">&lt;em&gt;...&lt;/em&gt;</td>
			<td align="left"  style="padding:5px; background:#ffffcc">[em]...[/em]</td>
		</tr>
		<tr>
			<td align="left"  style="padding:5px; background:#ffffcc">&lt;p style=''&gt; ... &lt;/p&gt;</td>
			<td align="left"  style="padding:5px; background:#ffffcc">[p style=''] ... [/p]</td>
		</tr>
		<tr>
			<td align="left"  style="padding:5px; background:#ffffcc">&lt;u&gt; ... &lt;/u&gt;</td>
			<td align="left"  style="padding:5px; background:#ffffcc">[u] ... [/u]</td>
		</tr>
		<tr>
			<td align="left"  style="padding:5px; background:#ffffcc">&lt;br /&gt;</td>
			<td align="left"  style="padding:5px; background:#ffffcc">[br /]</td>
		</tr>

	</table>
	<?php
}
if(!function_exists('hitreach_menu')){
	function hitreach_menu(){
	}
}
?>
