<?php
/**
 * Template for displaying search forms in BuzzPress
 *
 * @package WordPress
 * @subpackage BuzzPress
 * @since 1.0
 * @version 1.0
 */
?>
<div class="widget widget-search">
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="search-form input-group">
        <input type="text" name="s" id="search" class="form-control input-lg" value="<?php the_search_query(); ?>"
            placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'buzzpress' ); ?>">
        <span class="input-group-addon"><button type="submit"><i class="fa fa-search"></i></button></span>
    </form>
</div>