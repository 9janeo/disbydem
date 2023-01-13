<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$settings = get_query_var('custom_class');
print_r($settings);
?>

<article <?php post_class('card list-item'); ?> id="post-<?php the_ID(); ?>">
	<?php $thumb = (has_post_thumbnail())? '' : 'thumb';?>
	<div class="card-img-top <?php echo $thumb ?>">
		<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
	</div>
		
	<div class="card-body">
		<header class="entry-header">
		</header><!-- .entry-header -->
		<?php
			the_title(
				sprintf( '<h2 class="entry-title card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h2>'
			);
		?>
		<div class="entry-content card-text">
			<?php
				the_excerpt();
				understrap_link_pages();
			?>
		</div><!-- .entry-content -->
		
	</div>
	<footer class="entry-footer card-footer">
		<?php if ( 'post' === get_post_type() ) : ?>			
			<small class="entry-meta card-text text-muted">
				<?php understrap_posted_on(); ?>
			</small><!-- .entry-meta -->			
		<?php endif; ?>
		<?php // understrap_entry_footer(); ?>
	</footer>
	<!-- .entry-footer -->

</article><!-- #post-## -->
