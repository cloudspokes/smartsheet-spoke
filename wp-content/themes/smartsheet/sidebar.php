<aside role="complementary">



	<?php /* A feed of the current and past SmartSheet CloudSpokes challenges */ ?>
	<section id="challenges">
		<h2><?php echo get_option('ssChallengeLabel'); ?></h2>
				
		<ul>
		<?php		
			// get the challenge feed
			$rss = fetch_feed( get_option('ssChallengeURL') );
			
			if (!is_wp_error( $rss ) ) :
				 $maxitems 	= $rss->get_item_quantity(get_option('ssChallengeItems'));
				 $rss_items = $rss->get_items(0, $maxitems); 
				 if ($maxitems == 0) :
					echo '<li>No items.</li>';						 
				 else :
					foreach ( $rss_items as $item ) :
		?>
			<li>
				<strong><?php echo $item->get_title(); ?></strong>
				<a href="<?php echo $item->get_link(); ?>">View Details &raquo;</a>	
			</li>
		<?php
					endforeach;
				endif;
			endif;
		?>
		</ul>		
		
		<?php if (get_option('ssChallengeAll')) : // show only if there is view all url ?>
		<a href="<?php echo get_option('ssChallengeAll'); ?>" class="view-all">View All</a>
		<?php endif; ?>

	</section>
	<!-- end of #challenges section -->
	
	
	<?php /* A feed of the recent SmartSheet CloudSpokes challenges */ ?>
	<?php if ( get_option('ssRecentChallengeURL')!='' ) : ?>
	<section id="recent-challenges">
		<h2><?php echo get_option('ssRecentChallengeLabel'); ?></h2>
				
		<ul>
		<?php		
			// get the challenge feed
			$rss = fetch_feed( get_option('ssRecentChallengeURL') );
			
			if (!is_wp_error( $rss ) ) :
				 $maxitems 	= $rss->get_item_quantity(get_option('ssRecentChallengeItems'));
				 $rss_items = $rss->get_items(0, $maxitems); 
				 if ($maxitems == 0) :
					echo '<li>No items.</li>';						 
				 else :
					foreach ( $rss_items as $item ) :
		?>
			<li>
				<strong><?php echo $item->get_title(); ?></strong>
				<?php echo $item->get_description(); ?>
				<a href="<?php echo $item->get_link(); ?>">View Details &raquo;</a>	
			</li>
		<?php
					endforeach;
				endif;
			endif;
		?>
		</ul>		
		
		<?php if (get_option('ssRecentChallengeAll')) : // show only if there is view all url ?>
		<a href="<?php echo get_option('ssRecentChallengeAll'); ?>" class="view-all">View All</a>
		<?php endif; ?>
	</section>
	<!-- end of #challenges section -->	
	<?php endif; ?>
	
	
	<?php /* Resources */ ?>
	<section id="resources">
		<h2>Resources</h2>
				
		<ul>
			<li>
				<strong>Smartsheet</strong><br />
				<a href="http://smartsheet.com">http://smartsheet.com</a>
			</li>
			<li>
				<strong>Product Overview</strong><br />
				<a href="http://smartsheet.com/product-tour/collaboration">http://smartsheet.com/product-tour/collaboration</a>
			</li>
			<li>
				<strong>Developer Portal</strong><br />
				<a href="http://smartsheet.com/developers">http://smartsheet.com/developers</a>
			</li>
			<li>
				<strong>API Docs</strong><br />
				<a href="http://smartsheet.com/developers/api-documentation">http://smartsheet.com/developers/api-documentation</a>
			</li>
		</ul>		
		
	</section>
	<!-- end of #resources section -->	

	<?php /* Badges */ ?>
	<section id="badges">
		<h2>Badges</h2>

		<table style="text-align:center" width="316">
			<tbody>
				<tr>
					<td valign="top">
						<img src="http://2.bp.blogspot.com/-WNcpa3yLVD8/UgOXuNWeIwI/AAAAAAAAvd8/Lj-m9bwZJuk/s1600/silver_white_sm.png"/>
						<p><strong>Silver</strong></p>
						<p>Valid submission on any Smartsheet challenge
					</td>
					<td valign="top">
						<img src="http://2.bp.blogspot.com/-UvCSDrRq5wI/UgOXuOMyMeI/AAAAAAAAveE/YPaHtqTWgtE/s1600/gold_white_sm.png"/>
						<p><strong>Gold</strong></p>
						<p>3 valid Smartsheet submissions and one placement
					</td>
					<td valign="top">
						<img src="http://1.bp.blogspot.com/-VLEbjAet-Mk/UgOXuE7f-fI/AAAAAAAAveA/9hsbYMvpOSs/s1600/platinum_white_sm.png"/>
						<p><strong>Platinum</strong></p>
						<p>5 valids, 2 placements, and one community judge
					</td>
			</tbody>
		</table>
	</section>
	<!-- end of #badges section -->


	<?php /* A feed of the SmartSheet Twitter */ ?>
	<a class="twitter-timeline" href="https://twitter.com/SmartsheetAPI" data-widget-id="349770854143504385">Tweets by @SmartsheetAPI</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

	<?php /* deprecated twitter api 

	<section id="twitter">
	
		<h2><?php echo get_option('ssTweetLabel'); ?></h2>
		<ul>
		<?php		
			// get the smartsheet twitter feed
			$rss = fetch_feed( get_option('ssTweetURL') );
			
			if (!is_wp_error( $rss ) ) :
				 $maxitems 	= $rss->get_item_quantity(get_option('ssTweetItems'));
				 $rss_items = $rss->get_items(0, $maxitems); 
				 if ($maxitems == 0) :
					echo '<li>No items.</li>';						 
				 else :
					foreach ( $rss_items as $item ) :
		?>
			<li>
				<?php echo twitterify($item->get_title()); ?>
				<a href="<?php echo $item->get_link(); ?>">View Tweet</a>	
			</li>
		<?php
					endforeach;
				endif;
			endif;
		?>
		</ul>	

		<?php if (get_option('ssTweetAll')) : // show only if there is view all url ?>
		<a href="<?php echo get_option('ssTweetAll'); ?>" class="view-all">View All</a>
		<?php endif; ?>
	</section>
		*/ ?>
	<!-- end of #twitter section -->
	
	
</aside>