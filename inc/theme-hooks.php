<?php
if ( ! function_exists( 'astha_header' ) ) :
	function astha_header(){?>

<header class="nav-header">
	<!--Navbar -->
	<nav class="navbar navbar-expand-lg">
		<div class="container">
			<div class="site-info">
				<?php astha_site_logo();?>
				<?php astha_site_description();?>
			</div>
			 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
				aria-controls="navbar-collapse" aria-expanded="false"
				aria-label="<?php esc_attr_e( 'Toggle navigation', 'astha' ); ?>">
				<span class="toggle-menu fa fa-bars"></span>
			</button>
			<?php
			if ( has_nav_menu( 'primary' ) ) :
				wp_nav_menu( array(
					'theme_location'    => 'primary',
					'depth'             => 3,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse justify-content-center',
					'container_id'      => 'navbar-collapse',
					'menu_class'        => 'nav navbar-nav',
					'items_wrap'		=> '<ul class="nav navbar-nav" data-function="navbar">%3$s</ul>',
				) );
			else:
			wp_page_menu(
				array(
					'container'  => 'div',
					'menu_id'    => 'navbar-collapse',
					'menu_class' => 'nav navbar-nav',
					'menu_class' => 'collapse navbar-collapse justify-content-center',
					'before'     => '<ul class="nav navbar-nav" data-function="navbar">',
					'after'      => '</ul>',
				)
			); 
		 endif; 
		 ?>
		</div>
	</nav>
</header>
<?php
}
endif;
add_action('astha_header','astha_header', 10);

/**
Footer hook function
**/
if ( ! function_exists( 'astha_footer' ) ) :
	function astha_footer(){?>
<!--Footer-->
<footer class="footer">
    <div class="container">
        <div class="row text-left mt-4 mb-4">
		<?php
			if (is_active_sidebar('footer_menu')) {
				dynamic_sidebar('footer_menu');
			}
		?>
        </div>
        <hr>
        <div class="row copyright_info">
            <div class="col-md-6">
                <div class="mt-2">
                    <?php
					if (!is_active_sidebar('copyright')) {
					?>
                    <div class="footer-credits">
                        <p class="footer-copyright powered-by-wordpress">
                            &copy;
                            <?php
							echo date_i18n(
								/* translators: Copyright date format, see https://secure.php.net/date */
								_x( 'Y', 'copyright date format', 'astha' )
							);
							?>
									
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?>.</a>
							<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'astha' ) ); ?>">
							<?php _e( 'Powered by WordPress', 'astha' ); ?>
							</a>
                        </p><!-- .powered-by-wordpress -->
                    </div><!-- .footer-credits -->
					
                    <?php } else{?>
                    <small><?php dynamic_sidebar('copyright');?> </small>
                    <?php }?>
                </div>
            </div>
			<div class="col-md-6 text-right">
				<?php 
					/**
					 * Hook - astha_social
					 * @hooked astha_social - 10
					 */
					do_action('astha_social');
				?>
			</div>
        </div>
    </div>
</footer>
<?php
	}
endif;
add_action('astha_footer','astha_footer', 10);

/**
astha Social 
*/
function astha_social(){
	$facebook	= get_theme_mod('facebook');
	$twitter	= get_theme_mod('twitter');
	$linkedin	= get_theme_mod('linkedin');
	$pinterest	= get_theme_mod('pinterest');
	$instagram	= get_theme_mod('instagram');
	
	if($facebook || $twitter || $linkedin || $pinterest || $instagram ):
?>
	<div class="social-network-wrap">
		<ul class="social-network">
			<?php if($facebook): ?>
				<li>
					<a href="<?php echo esc_url($facebook); ?>">
						<i class="fa fa-facebook"></i>
					</a>
				</li>
			<?php endif; ?>
			<?php if($twitter): ?>
				<li>
					<a href="<?php echo esc_url($twitter); ?>">
						<i class="fa fa-twitter"></i>
					</a>
				</li>
			<?php endif; ?>
			<?php if($linkedin): ?>
				<li>
					<a href="<?php echo esc_url($linkedin); ?>">
						<i class="fa fa-linkedin"></i>
					</a>
				</li>
			<?php endif; ?>
			<?php if($pinterest): ?>
				<li>
					<a href="<?php echo esc_url($pinterest); ?>">
						<i class="fa fa-pinterest"></i>
					</a>
				</li>
			<?php endif; ?>
			<?php if($instagram): ?>
				<li>
					<a href="<?php echo esc_url($instagram); ?>">
						<i class="fa fa-instagram"></i>
					</a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
	<?php endif;?>
<?php }
add_action('astha_social', 'astha_social', 10);