<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fora
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-3675234348680689",
    enable_page_level_ads: true
  });
</script>
<script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/signup-forms/popup/embed.js"
        data-dojo-config="usePlainJson: true, isDebug: false">
</script>
<script type="text/javascript">
  require(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us15.list-manage.com","uuid":"2be84c805c8e552dd2f94b776","lid":"a85296aafd"}) })
</script>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="p:domain_verify" content="1c90f88bd4944dc6a90c7547685a4390"/>
<link rel="profile" href="http://gmpg.org/xfn/11">

<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	$siteBorder = get_theme_mod('fora_theme_options_siteborder', '1');
	$socialHeader = get_theme_mod('fora_theme_options_socialheader', '1');
	$showSlider = get_theme_mod('fora_theme_options_postslider', '');
	$postsSlider = get_theme_mod('fora_theme_options_slidernumber', '4');
	$showSearch = get_theme_mod('fora_theme_options_showsearch', '1');
?>
<?php if($siteBorder == 1): ?>
	<div class="border-fixed border-top"></div>
	<div class="border-fixed border-bottom"></div>
	<div class="border-fixed border-left"></div>
	<div class="border-fixed border-right"></div>
<?php endif; ?>
<nav id="site-navigation" class="main-navigation" role="navigation">
	<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Main Menu', 'fora' ); ?><i class="fa fa-bars spaceLeftRight"></i></button>
	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
	<button class="email-toggle" aria-expanded="false"><i class="fa fa-envelope"></i></button>
	<button class="search-toggle" aria-expanded="false"><i class="fa fa-search"></i></button>
</nav><!-- #site-navigation -->
<div class="signup-dropdown">
	<p>
		Sign up for our email list
	</p>
	<div id="mc_embed_signup">
		<form action="//homemakersynonymous.us15.list-manage.com/subscribe/post?u=2be84c805c8e552dd2f94b776&amp;id=a85296aafd" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			<div id="mc_embed_signup_scroll">

				<div class="mc-field-group">
					<label for="mce-EMAIL">Email Address </label>
					<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL">
				</div>
				<div class="mc-field-group">
					<label for="mce-FNAME">First Name </label>
					<input type="text" value="" name="FNAME" class="" id="mce-FNAME">
				</div>
				<div id="mce-responses" class="clear">
					<div class="response" id="mce-error-response" style="display:none"></div>
					<div class="response" id="mce-success-response" style="display:none"></div>
				</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
				<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_2be84c805c8e552dd2f94b776_a85296aafd" tabindex="-1" value=""></div>
				<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
			</div>
		</form>
	</div>

	<!--End mc_embed_signup-->
</div>
<?php get_search_form(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'fora' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="main_header">
			<div class="header_wrapper">
				<div class="header_top">
					<?php if($socialHeader == 1): ?>
						<div class="site-social">
							<?php fora_social_buttons(); ?>
						</div><!-- .site-social -->
					<?php endif; ?>
				</div>
				<div class="site-branding">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?= get_theme_root_uri() . '/loffle/images/hsLogo.svg'?>" alt="Homemaker Synonymous - Where traditional skills meet modern lifesytles" />
					</a>
					<?php if($socialHeader == 1): ?>
						<div class="site-social below">
							<?php fora_social_buttons(); ?>
						</div><!-- .site-social -->
					<?php endif; ?>
				</div><!-- .site-branding -->
			</div><!-- .header_wrapper -->
		</div><!-- .main_header -->

	</header><!-- #masthead -->
	<?php if(is_home() && $showSlider == 1): ?>
		<div id="mainslider" class="fora_slider">
			<div class="blockSliderImage" id="owl-main-slide">
				<?php
					$args = array( 'posts_per_page' => intval($postsSlider),'post_status'=>'publish','post_type'=>'post', 'ignore_sticky_posts' => 1 );
					$the_query = new WP_Query( $args );
					while( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="singleSliderItem">
						<?php
							if ( '' != get_the_post_thumbnail() ) {
								the_post_thumbnail('fora-slider');
							} else {
								echo '<img src="' . esc_url(get_template_directory_uri()) . '/images/no-image-slide.png" alt="'. esc_attr__( 'No image', 'fora' ) .'" />';
							}
						?>
					</div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
			</div>
			<div class="blockSliderContent" id="owl-post-nav-content">
				<?php
					$args = array( 'posts_per_page' => intval($postsSlider),'post_status'=>'publish','post_type'=>'post', 'ignore_sticky_posts' => 1 );
					$the_query = new WP_Query( $args );
					while( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="foraSliderCaption">
						<div class="singleSliderItem">
							<?php
								if ( '' != get_the_post_thumbnail() ) {
									the_post_thumbnail('fora-slider');
								} else {
									echo '<img src="' . esc_url(get_template_directory_uri()) . '/images/no-image-slide.png" alt="'. esc_attr__( 'No image', 'fora' ) .'" />';
								}
							?>
						</div>
						<div class="inner-item">
							<div class="caption">
								<h3><a href="<?php echo esc_url(get_permalink()); ?>" class="flexTitle"><?php echo wp_trim_words( get_the_title(), 7 ); ?></a></h3>
								<div class="entry-slider">
									<span class="posted-on"><i class="fa fa-calendar-o spaceRight"></i><?php the_time(get_option('date_format')); ?></span>
									<span class="cat-links"><i class="fa fa-folder-open-o spaceLeftRight"></i><?php $cat = get_the_category(); $cat = $cat[0]; echo $cats = get_category_parents($cat, TRUE, '');  ?></span>
								</div>
								<div class="sliderMore"><a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'Read More', 'fora' ); ?><i class="fa spaceLeft fa-caret-right"></i></a></div>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
			</div>
		</div>
	<?php endif; ?>

	<div id="content" class="site-content">
		<div class="clear">
