<?php
/**
 * Feature Image Section
 *
 * @package simplex-munk
 */

 $simplex_feature_image_caption = get_theme_mod( 'simplex_feature_image_caption' , '0' );
 $sticky_post     = get_option( 'sticky_posts' ); //get all sticky posts 
 rsort( $sticky_post ); /* Sort the stickies with the newest ones at the top http://justintadlock.com/archives/2009/03/28/get-the-latest-sticky-posts-in-wordpress */
 $sticky = array_slice( $sticky_post, 0, 2 ); 

 if ( $sticky_post ) {

    $feature_img_qry = new WP_Query( array(	
        'post_type'           => 'post', 
        'post_status'         => 'publish',
        'posts_per_page'      => 2,
        'post__in'            => $sticky,
        'orderby'       => 'post__in',		
        'ignore_sticky_posts' => 1,	
    ) );

    	?>
    <div class="static-image">
    	<ul>
    		<?php
    			if ( $feature_img_qry->have_posts() ){
    				 while( $feature_img_qry->have_posts() ){
    				 $feature_img_qry->the_post();
    				 echo '<li>';
				 if( has_post_thumbnail() ){ ?>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'simplex-munk-feature' ); ?></a>
					<?php if($simplex_feature_image_caption){?>
					<div class="text">
					<span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
					<?php the_excerpt(); ?>
					</div>
					<?php } ?>
			<?php
        		}
					echo '</li>';
        	}
 			}
	        wp_reset_postdata(); ?>
        </ul>
	</div>
<?php } ?>
