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
<!-- Page hiding snippet (recommended) -->
<style>.async-hide { opacity: 0 !important} </style>
<script>
(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;
h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
(a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);
})(window,document.documentElement,'async-hide','dataLayer',4000,{'GTM-TG86RVH':true});
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TG86RVH');</script>
<!-- End Google Tag Manager -->
<?php
	if (!is_category()) {
?>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2223370846519658",
    enable_page_level_ads: true
  });
</script>

<?php
	}
?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="p:domain_verify" content="b8dc0e938a9441c9bdf98b0f27748a57"/>
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TG86RVH"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php
	$siteBorder = get_theme_mod('fora_theme_options_siteborder', '1');
	$socialHeader = get_theme_mod('fora_theme_options_socialheader', '1');
	$showSlider = '';
	$postsSlider = get_theme_mod('fora_theme_options_slidernumber', '4');
	$showSearch = get_theme_mod('fora_theme_options_showsearch', '1');
?>
<?php if($siteBorder == 1): ?>
	<div class="border-fixed border-top"></div>
	<div class="border-fixed border-bottom"></div>
	<div class="border-fixed border-left"></div>
	<div class="border-fixed border-right"></div>
<?php endif; ?>
<div class="site-social site-social-fixed">
	<?php fora_social_buttons(); ?>
</div>
<div class="hello-bar">
	Psst... Want freebies? <script src="//static.leadpages.net/leadboxes/current/embed.js" async defer></script> <button data-leadbox-popup="1401bda73f72a2:152575834946dc" >GET THEM HERE!</button>
</div>
<nav id="site-navigation" class="main-navigation" role="navigation">
	<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars spaceLeftRight"></i></button>
	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
	<button class="search-toggle" aria-expanded="false"><i class="fa fa-search"></i></button>
</nav><!-- #site-navigation -->
</div>
<?php get_search_form(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'fora' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="main_header">
			<div class="site-branding">
				<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a>
				<?php if($socialHeader == 1): ?>
					<div class="site-social below">
						<?php fora_social_buttons(); ?>
					</div><!-- .site-social -->
				<?php endif; ?>
			</div><!-- .site-branding -->
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
									<span class="cat-links"><i class="fa fa-folder-open-o spaceLeftRight"></i><?php $cat = get_the_category(); $cat = $cat[0]; echo $cats = get_category_parents($cat, TRUE, '');	?></span>
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
	<button class="category-toggle" aria-controls="category-menu" aria-expanded="false"><i class="fa fa-bars spaceLeftRight"></i></button>
	<ul id="category-menu" class="nav-menu category-menu">
		<li><a href="/archives/category/diy-and-decorating">DIY</a></li>
		<li><a href="/archives/category/organization">Organization</a></li>
		<li><a href="/archives/category/cleaning-and-laundry">Cleaning and Laundry</a></li>
		<li><a href="/archives/category/parenting">Parenting</a></li>
		<li><a href="/archives/category/cleaning-and-laundry">Healthy Living</a></li>
		<li><a href="/archives/category/cooking-and-meal-planning">Cooking and Meal Planning</a></li>
	</ul>
	<div class="category-images">
		<a href="/archives/category/diy-and-decorating" >
			<div>
				<div>
					Diy
				</div>
			</div>
		</a>
		<a href="/archives/category/organization" >
			<div>
				<div>
					Organization
				</div>
			</div>
		</a>
		<a href="/archives/category/cleaning-and-laundry" >
			<div>
				<div >
					Cleaning and Laundry
				</div>
			</div>
		</a>
		<a href="/archives/category/parenting" >
			<div>
				<div>
					Parenting
				</div>
			</div>
		</a>
		<a href="/archives/category/healthy-living" >
			<div>
				<div>
					Healthy Living
				</div>
			</div>
		</a>
		<a href="/archives/category/cooking-and-meal-planning" >
			<div>
				<div>
					Cooking and Meal Planning
				</div>
			</div>
		</a>
	</div>

	<div id="content" class="site-content">
		<div class="clear">
