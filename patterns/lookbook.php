<?php
/**
 * Title: Lookbook interactivo (puntos de producto)
 * Slug: hilo/lookbook
 * Categories: hilo, gallery
 * Keywords: lookbook, hotspots, compra el look
 * Viewport width: 1400
 */

$hilo_products = hilo_demo_products();
// slug => posición del punto (en %) sobre la imagen del lookbook.
$hilo_spots = array(
	'chaqueta-obrera' => array( 23, 52 ),
	'vestido-lino'    => array( 50, 48 ),
	'pantalon-wide'   => array( 73, 64 ),
	'gorro-lana'      => array( 87.5, 22 ),
	'bolso-tote'      => array( 88, 76 ),
);

ob_start();
?>
<figure class="hilo-lookbook">
	<img src="<?php echo esc_url( get_theme_file_uri( 'assets/products/lookbook.jpg' ) ); ?>" alt="Lookbook de otoño: chaqueta obrera, vestido de lino, pantalón wide, gorro y bolso tote" width="1600" height="1000" loading="lazy" />
	<?php
	foreach ( $hilo_spots as $slug => $pos ) :
		$p     = $hilo_products[ $slug ];
		$price = $p['sale'] ? $p['sale'] : $p['price'];
		?>
	<div class="hilo-spot" style="--x:<?php echo esc_attr( $pos[0] ); ?>%;--y:<?php echo esc_attr( $pos[1] ); ?>%">
		<button class="hilo-spot__dot" type="button" aria-expanded="false" aria-label="<?php echo esc_attr( $p['name'] ); ?>">+</button>
		<a class="hilo-spot__card" href="<?php echo esc_url( hilo_product_url( $slug ) ); ?>">
			<img src="<?php echo esc_url( get_theme_file_uri( 'assets/products/' . $slug . '-1.jpg' ) ); ?>" alt="" loading="lazy" />
			<div><strong><?php echo esc_html( $p['name'] ); ?></strong><span>$<?php echo esc_html( number_format( $price, 2 ) ); ?> · Ver prenda →</span></div>
		</a>
	</div>
	<?php endforeach; ?>
</figure>
<?php
$hilo_lookbook_html = ob_get_clean();
?>
<!-- wp:group {"anchor":"lookbook","align":"full","backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"1360px"}} -->
<div id="lookbook" class="wp-block-group alignfull has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:columns {"verticalAlignment":"bottom","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns are-vertically-aligned-bottom" style="margin-bottom:var(--wp--preset--spacing--30)"><!-- wp:column {"verticalAlignment":"bottom"} -->
<div class="wp-block-column is-vertically-aligned-bottom"><!-- wp:paragraph {"textColor":"accent","fontSize":"x-small","style":{"typography":{"fontWeight":"700","letterSpacing":"0.12em"}}} -->
<p class="has-accent-color has-text-color has-x-small-font-size" style="font-weight:700;letter-spacing:0.12em">LOOKBOOK · COMPRA EL LOOK</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size">Capas para días <em>templados</em></h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom"} -->
<div class="wp-block-column is-vertically-aligned-bottom"><!-- wp:paragraph {"textColor":"muted"} -->
<p class="has-muted-color has-text-color">Pasa el cursor (o toca) sobre cada punto para ver la prenda y su precio. Todo combina con todo: así se construye un armario de pocas piezas.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:html -->
<?php echo $hilo_lookbook_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escapado arriba. ?>
<!-- /wp:html --></div>
<!-- /wp:group -->
