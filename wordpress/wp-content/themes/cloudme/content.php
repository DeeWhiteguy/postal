<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php if(has_post_thumbnail()) { ?><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="" /><?php } ?>
		<p><?php echo cloudme_excerpt(); ?></p>

		<a href="<?php the_permalink(); ?>" class="small radius button"><?php esc_html_e('Read More','cloudme'); ?></a>

		<div class="meta"><?php the_time( get_option( 'date_format' ) ); ?>, <?php esc_html_e('Written by','cloudme'); ?> <?php the_author_posts_link(); ?> <i class="fa fa-comment-o"></i><a href=""><?php comments_number( '0 comment', '1 comment', '% comments' ); ?></a></div>
	</div>
</div>