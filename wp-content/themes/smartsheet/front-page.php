<?php get_header(); ?>

<!-- main content -->
<div role="main">

	<?php /* this will display the excerpt field from the About Us page */ ?>
	<section id="about">
		<?php
			$about = get_page_by_path('about-us', OBJECT, 'page');	
		?>
		<p>
			<?php echo $about->post_excerpt; ?>
			<a href="<?php echo get_permalink($about->ID); ?>" class="more-link">read more &raquo;</a>
		</p>
		
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
	
</div>
<!-- end of main content -->
			
<?php get_sidebar(); ?>
<?php get_footer(); ?>