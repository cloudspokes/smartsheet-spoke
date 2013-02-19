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


	<?php /* A feed of the SmartSheet Blog */ ?>
	<section id="smartsheet-blog">
		<h2><?php echo get_option('ssBlogLabel'); ?></h2>
		<ul>
		<?php		
			// get the smartsheet feed
			$rss = fetch_feed( get_option('ssBlogURL') );
			
			if (!is_wp_error( $rss ) ) :
				 $maxitems 	= $rss->get_item_quantity(get_option('ssBlogItems'));
				 $rss_items = $rss->get_items(0, $maxitems); 
				 if ($maxitems == 0) :
					echo '<li>No items.</li>';						 
				 else :
					foreach ( $rss_items as $item ) :
		?>
			<li>
				<strong><?php echo $item->get_title(); ?></strong>
				<p><?php echo $item->get_description(); ?></p>
			</li>
		<?php
					endforeach;
				endif;
			endif;
		?>
		</ul>		

		<?php if (get_option('ssBlogAll')) : // show only if there is view all url ?>
		<a href="<?php echo get_option('ssBlogAll'); ?>" class="view-all">View All</a>
		<?php endif; ?>
	</section>
	<!-- end of #smartsheet-blog section -->


	<?php /* A feed of the SmartSheet Twitter */ ?>
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
	<!-- end of #twitter section -->
	
	
</aside>