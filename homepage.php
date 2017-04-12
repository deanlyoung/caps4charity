<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>" rel="bookmark" class="article-url">
  	<header class="home-header">
    	<span class="sticky-post">
      	<?php
					if ( is_sticky() && is_home() && ! is_paged() ) {
						_e( 'Featured', 'twentysixteen' );
					} elseif ( ! is_sticky() && is_home() && ! is_paged() ) {
						_e( '&nbsp;', 'twentysixteen' );
					}
				?>
      </span>
  		<h2 class="entry-title"><?php the_title_attribute(); ?></h2>
  	</header><!-- .home-header -->
	<?php
		$id = intval( get_post_meta($post->ID, 'auction_id', true) );
		
		global $wpdb;
		
		$options = get_option( 'wp_auctions' );
		$currencysymbol = $options['currencysymbol'];
		
		$table_name = $wpdb->prefix . "wpa_auctions";
		$query = mysql_query("SELECT start_price, current_price, image_url FROM ".$table_name." WHERE id=".$id) or die(mysql_error());
		$row = mysql_fetch_object($query);
		
		// Values
		$current_price = $row->current_price;
		$start_price = $row->start_price;
		$image_url = $row->image_url;
		
		if ( $row != null ) {
			if ( $current_price > $start_price ) {
				$price_info = $currencysymbol . number_format($current_price, 2, '.', ',');
			} else {
				$price_info = $currencysymbol . number_format($start_price, 2, '.', ',');
			}
			
			$auction_image_url = wp_get_attachment_url( $image_url );
		} else {
			$price_info = "Stay Tuned!";
			$auction_image_url = "http://caps4charity.org/wp-content/uploads/2016/04/coming-soon-hat.png";
		}
		
		echo '<div class="main-auction-image"><img src="'.$auction_image_url.'" width="200px" height="150px"></div><div class="current-price">'.$price_info.'</div>';
	?>
	</a>
</article><!-- #post-## -->




<?php
/**
 * OLD
**/
?>






<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href='<?php the_permalink(); ?>' rel="bookmark" class="article-url">
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'twentysixteen' ); ?></span>
		<?php endif; ?>
		<?php if ( ! is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"></span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->
  <div class="main-auction-image">
  	<?php
    	$id = intval( get_post_meta($post->ID, 'auction_id', true) );
			
			global $wpdb;
			
			$table_name = $wpdb->prefix . "wpa_auctions";
			$query = mysql_query("SELECT start_price, current_price FROM ".$table_name." WHERE id=".$id) or die(mysql_error());
			$row = mysql_fetch_object($query);
      
      // Values
      
  </div>
  <?php twentysixteen_post_thumbnail(); ?>
  <div class="current-price">
  	<?php
			$id = intval( get_post_meta($post->ID, 'auction_id', true) );
			
			global $wpdb;
			
			$options = get_option( 'wp_auctions' );
			$currencysymbol = $options['currencysymbol'];
			
			$table_name = $wpdb->prefix . "wpa_auctions";
			$query = mysql_query("SELECT start_price, current_price FROM ".$table_name." WHERE id=".$id) or die(mysql_error());
			$row = mysql_fetch_object($query);
			
			// Values
			$current_price = $row->current_price;
			$start_price = $row->start_price;
			
			if ( $row != null ) {
				if ( $current_price > $start_price ) {
        	$price_info = $currencysymbol . number_format($current_price, 2, '.', ',');
        } else {
        	$price_info = $currencysymbol . number_format($start_price, 2, '.', ',');
        }
			} else {
      	$price_info = "Stay Tuned!";
      }
      
      echo $price_info;
  	?>
   </div>
   </a>
</article><!-- #post-## -->