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
echo "<h4>".$settings."</h4>";
?>

<article <?php post_class('card'); ?> id="post-<?php the_ID(); ?>">
	<?php 
		$cover_id = get_field('post_card_cover', 'option');
		$cover_image = wp_get_attachment_url( $cover_id );
		$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
		$has_thumb = (has_post_thumbnail())? true : false;
		$thumb = (has_post_thumbnail())? $feat_image_url : $cover_image;

		// print_r($cover_image);s
	?>
	<div class="card-img-top" style="background-image: url('<?php echo $thumb ?>');">
 		<?php 
			if($has_thumb): 
				echo get_the_post_thumbnail( $post->ID, 'small' );
			else:
				echo wp_get_attachment_image($cover_id, 'small');
			endif;
		?>
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
