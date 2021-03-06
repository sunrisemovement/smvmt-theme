<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package smvmt
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( smvmt_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php smvmt_primary_class(); ?>>

		<?php smvmt_primary_content_top(); ?>

		<?php smvmt_archive_header(); ?>

		<?php smvmt_content_loop(); ?>

		<?php smvmt_pagination(); ?>

		<?php smvmt_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( smvmt_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
