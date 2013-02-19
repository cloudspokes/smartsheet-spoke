<?php

// add menu support
add_theme_support( 'menus' );

// add featured thumbnail support
add_theme_support( 'post-thumbnails' ); 


// add custom header support
$defaults = array(
	'default-image' => get_template_directory_uri() . '/i/smartsheet-logo-navy.png',
	'flex-width'    => true,
	'width'         => 205,
	'flex-height'   => true,
	'height'		=> 57,	
	'header-text'   => false,
	'uploads'       => true
);
add_theme_support( 'custom-header', $defaults );


// add excerpt support in pages
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}


// make twitter links
function twitterify($ret) {
	$ret = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $ret);
	$ret = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $ret);
	$ret = preg_replace("/@(\w+)/", "<a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a>", $ret);
	$ret = preg_replace("/#(\w+)/", "<a href=\"http://search.twitter.com/search?q=\\1\" target=\"_blank\">#\\1</a>", $ret);
return $ret;
}


/**
 * Start of Theme Options Support
 */
function themeoptions_admin_menu() {
    add_theme_page("Theme Options", "Theme Options", 'edit_themes', basename(__FILE__), 'themeoptions_page');
}
add_action('admin_menu', 'themeoptions_admin_menu');

function themeoptions_page()
{
	if ( $_POST['update_themeoptions'] == 'true' ) { themeoptions_update(); }  //check options update
	// here's the main function that will generate our options page
	?>

	<div class="wrap">
		<div id="icon-themes" class="icon32"><br /></div>
		<h2>SmartSheet Theme Options</h2>

		<form method="POST" action="" enctype="multipart/form-data">
			<input type="hidden" name="update_themeoptions" value="true" />			
			
			<h3>SmartSheet CloudSpokes Challenges</h3>
			<table width="100%">
				<tr><?php $field = 'ssChallengeLabel'; ?>
					<td width="150"><label for="<?php echo $field; ?>">Section Title:</label></td>
					<td><input type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" size="100" value="<?php echo get_option($field); ?>"/></td>
				</tr>
				<tr><?php $field = 'ssChallengeURL'; ?>
					<td><label for="<?php echo $field; ?>">Feed URL:</label></td>
					<td><input type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" size="100" value="<?php echo get_option($field); ?>"/></td>
				</tr>
				<tr><?php $field = 'ssChallengeItems'; ?>
					<td><label for="<?php echo $field; ?>">Number of Items to show:</label></td>
					<td><input type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" size="100" value="<?php echo get_option($field); ?>"/></td>
				</tr>
				<tr><?php $field = 'ssChallengeAll'; ?>
					<td><label for="<?php echo $field; ?>">View All URL:</label></td>
					<td><input type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" size="100" value="<?php echo get_option($field); ?>"/></td>
				</tr>
			</table>
			
			<br />

			<h3>SmartSheet Blog</h3>
			<table width="100%">
				<tr><?php $field = 'ssBlogLabel'; ?>
					<td width="150"><label for="<?php echo $field; ?>">Section Title:</label></td>
					<td><input type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" size="100" value="<?php echo get_option($field); ?>"/></td>
				</tr>
				<tr><?php $field = 'ssBlogURL'; ?>
					<td><label for="<?php echo $field; ?>">Feed URL:</label></td>
					<td><input type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" size="100" value="<?php echo get_option($field); ?>"/></td>
				</tr>
				<tr><?php $field = 'ssBlogItems'; ?>
					<td><label for="<?php echo $field; ?>">Number of Items to show:</label></td>
					<td><input type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" size="100" value="<?php echo get_option($field); ?>"/></td>
				</tr>
				<tr><?php $field = 'ssBlogAll'; ?>
					<td><label for="<?php echo $field; ?>">View All URL:</label></td>
					<td><input type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" size="100" value="<?php echo get_option($field); ?>"/></td>
				</tr>
			</table>
			
			<br />
			
			<h3>SmartSheet Twitter Feed</h3>
			<table width="100%">
				<tr><?php $field = 'ssTweetLabel'; ?>
					<td width="150"><label for="<?php echo $field; ?>">Section Title:</label></td>
					<td><input type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" size="100" value="<?php echo get_option($field); ?>"/></td>
				</tr>
				<tr><?php $field = 'ssTweetURL'; ?>
					<td><label for="<?php echo $field; ?>">Feed URL:</label></td>
					<td><input type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" size="100" value="<?php echo get_option($field); ?>"/></td>
				</tr>
				<tr><?php $field = 'ssTweetItems'; ?>
					<td><label for="<?php echo $field; ?>">Number of Items to show:</label></td>
					<td><input type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" size="100" value="<?php echo get_option($field); ?>"/></td>
				</tr>
				<tr><?php $field = 'ssTweetAll'; ?>
					<td><label for="<?php echo $field; ?>">View All URL:</label></td>
					<td><input type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" size="100" value="<?php echo get_option($field); ?>"/></td>
				</tr>				
			</table>
			
			<br />
			
			<h3>Social Media Links</h3>
			<table width="100%">
				<tr><?php $field = 'ssFacebookURL'; ?>
					<td width="150"><label for="<?php echo $field; ?>">Facebook URL:</label></td>
					<td><input type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" size="100" value="<?php echo get_option($field); ?>"/></td>
				</tr>
				<tr><?php $field = 'ssTwitterURL'; ?>
					<td><label for="<?php echo $field; ?>">Twitter URL:</label></td>
					<td><input type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" size="100" value="<?php echo get_option($field); ?>"/></td>
				</tr>
				<tr><?php $field = 'ssYoutubeURL'; ?>
					<td><label for="<?php echo $field; ?>">Youtube URL:</label></td>
					<td><input type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" size="100" value="<?php echo get_option($field); ?>"/></td>
				</tr>
				<tr><?php $field = 'ssLinkedInURL'; ?>
					<td><label for="<?php echo $field; ?>">LinkedIn URL:</label></td>
					<td><input type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" size="100" value="<?php echo get_option($field); ?>"/></td>
				</tr>
			</table>
			
			
			<h3>Other Options</h3>
			<table width="100%">
				<tr><?php $field = 'ssCopyright'; ?>
					<td width="150"><label for="<?php echo $field; ?>">Copyright Text:</label></td>
					<td><input type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" size="100" value="<?php echo get_option($field); ?>"/></td>
				</tr>				
			</table>
			
			<br />
			
			<p><input type="submit" name="submit" value="Update Options" class="button button-primary" /></p>
		</form>

	</div>
	<?php
}

// Update options function
function themeoptions_update() {
	
	// Challenge		
	update_option('ssChallengeLabel', 	$_POST['ssChallengeLabel']);
	update_option('ssChallengeURL', 	$_POST['ssChallengeURL']);
	update_option('ssChallengeItems', 	$_POST['ssChallengeItems']);
	update_option('ssChallengeAll', 	$_POST['ssChallengeAll']);

	// Blog Feed
	update_option('ssBlogLabel', 		$_POST['ssBlogLabel']);
	update_option('ssBlogURL', 			$_POST['ssBlogURL']);
	update_option('ssBlogItems', 		$_POST['ssBlogItems']);
	update_option('ssBlogAll', 			$_POST['ssBlogAll']);

	// Twitter Feed
	update_option('ssTweetLabel', 		$_POST['ssTweetLabel']);
	update_option('ssTweetURL', 		$_POST['ssTweetURL']);
	update_option('ssTweetItems', 		$_POST['ssTweetItems']);
	update_option('ssTweetAll', 		$_POST['ssTweetAll']);

	// Social Media
	update_option('ssFacebookURL', 		$_POST['ssFacebookURL']);
	update_option('ssTwitterURL', 		$_POST['ssTwitterURL']);
	update_option('ssYoutubeURL', 		$_POST['ssYoutubeURL']);
	update_option('ssLinkedInURL', 		$_POST['ssLinkedInURL']);

	// Other Options
	update_option('ssCopyright', 		$_POST['ssCopyright']);

}
/* END OF THEME OPTIONS SUPPORT

?>