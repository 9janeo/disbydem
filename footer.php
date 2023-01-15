<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper bg-dark" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">
			<?php 
				$social_links = get_field('social_links', 'option');
				if($social_links) :
					foreach($social_links as $social) {
						$link = $social['link'];
					?>
						<a href="<?php echo $link['url']?>" target="<?= $link['target'] ?>"><?php echo $link['title']?></a>
					<?php
					}
				endif;
			?>

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">

						<?php understrap_site_info(); ?>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

