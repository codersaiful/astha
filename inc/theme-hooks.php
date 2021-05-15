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
				wp_nav_menu( array(
					'theme_location'    => 'primary',
					'depth'             => 3,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse justify-content-center',
					'container_id'      => 'navbar-collapse',
					'menu_class'        => 'nav navbar-nav',
					'items_wrap'		=> '<ul class="nav navbar-nav" data-function="navbar">%3$s</ul>',
				) );
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
<footer class="footer sec-bg">
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
            <div class="col-md-12">
                <div class="mt-2">
				<?php do_action('astha_social');?>
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
        </div>
    </div>
</footer>
<?php
	}
endif;
add_action('astha_footer','astha_footer', 10);