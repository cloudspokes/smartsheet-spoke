<?php get_header(); ?>

<!-- main content -->
<div role="main">

	<?php /* this will display the excerpt field from the About Us page */ ?>
	<section id="about">
		<?php
			$about = get_page_by_path('about-us', OBJECT, 'page');	
		?>
		<?php echo apply_filters('the_content', $about->post_excerpt); ?>
		
	</section>
	<!-- end of #about section -->


	
	<?php /* Display post as Announcements here */ ?>
	<section id="announcements">
		<h2>Announcements</h2>
		
		<?php  
			// query post type
			$args 		= array('post_type' => 'post');
			$the_query 	= new WP_Query( $args );		
			if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 
				global $more;    
				$more = 0;
		?>
			<article id="post-<?php the_ID(); ?>" role="article">
	
			<!-- article title -->
			<h3 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
					
			<!-- article metas -->
			<span class="meta">
				<time datetime="<?php echo get_the_date('c'); ?>" pubdate><?php echo get_the_date('F d, Y'); ?></time> 
			</span>
	
			<div class="entry-content">
				<?php the_content('read more &raquo;'); ?>
			</div>
			
		</article>
		<?php  endwhile; endif; /* end of post type loop */ ?>
	
	</section>
	<!-- end of #announcements section -->

	<?php /* A feed of the SmartSheet Blog */ ?>
	<section id="smartsheet-blog">
		<h2><?php echo get_option('ssBlogLabel'); ?></h2>
		<?php		
			// get the smartsheet feed
			$rss = fetch_feed( get_option('ssBlogURL') );
			
			if (!is_wp_error( $rss ) ) :
				 $maxitems 	= $rss->get_item_quantity(get_option('ssBlogItems'));
				 $rss_items = $rss->get_items(0, $maxitems); 
				 if ($maxitems == 0) :
					echo '<article role="article">No items.</article>';						 
				 else :
					foreach ( $rss_items as $item ) :
		?>
			<article role="article">
				<h3 class="entry-title"><a href="<?php echo $item->get_permalink(); ?>"><strong><?php echo $item->get_title(); ?></strong></a></h3>
				<div class="entry-content">
				<?php 
					$content = $item->get_description();
			      	$content = strip_tags($content);
				    echo word_limiter($content, 60);
				?> <a href="<?php echo $item->get_permalink(); ?>"><em>read more &raquo;</em></a>
				</div>
			</article>
		<?php
					endforeach;
				endif;
			endif;
		?>

		
		<?php if (get_option('ssBlogAll')) : // show only if there is view all url ?>
		<a href="<?php echo get_option('ssBlogAll'); ?>" class="view-all">View All</a>
		<?php endif; ?>
	</section>
	<!-- end of #smartsheet-blog section -->

	
</div>
<!-- end of main content -->
			
<?php get_sidebar(); ?>

<?php get_footer(); ?>