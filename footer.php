<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package astha
 */

?>
<?php
/**
 * Hook - astha_footer
 * @hooked astha_footer - 10
 */
	do_action( 'astha_footer' );
?>
<!--Scroll To Top-->
<div id="back-top" class="scroll-top"><i class="fa fa-angle-up"></i></div>

<?php wp_footer();?>
</body>

</html>