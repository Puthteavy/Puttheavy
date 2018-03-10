<section id="newsSection">
	<div class="newsContent contentWidth">
		<?php   
			$newsQuery = new WP_Query( 
				array( 
					'category_name' => 'news',
					'post_status' => 'publish',
					'posts_per_page' => -1,
					'orderby' => 'date',
					'order' => 'DESC' 
				) 
			);
		?>
		<?php if( $newsQuery->have_posts() ) : ?>
			<ul class="list01">
				<?php while ( $newsQuery->have_posts() ) :  $newsQuery->the_post(); ?>
				 <li>
				 	<a href="<?php the_permalink(); ?>"><span class="date"><?php echo get_the_date( 'Y.m.d' ); ?></span><span class="info"><?php the_title(); ?></span></a>
				 </li> 
				<?php endwhile; ?>
			</ul> 
		<?php endif; ?>
	</div>
</section>