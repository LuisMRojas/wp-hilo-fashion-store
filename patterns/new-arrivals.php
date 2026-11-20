<?php
/**
 * Title: Novedades (rejilla de productos)
 * Slug: hilo/new-arrivals
 * Categories: hilo, featured
 * Keywords: productos, novedades, tienda, woocommerce
 * Viewport width: 1400
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"1360px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--30)"><!-- wp:heading {"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size">Recién llegado</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="font-weight:600"><a href="/?post_type=product">Ver toda la tienda →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<?php if ( class_exists( 'WooCommerce' ) ) : ?>
<!-- wp:shortcode -->
[products limit="8" columns="4" orderby="menu_order" order="ASC"]
<!-- /wp:shortcode -->
<?php else : ?>
<!-- wp:paragraph {"textColor":"muted"} -->
<p class="has-muted-color has-text-color">Activa WooCommerce para mostrar aquí tus productos.</p>
<!-- /wp:paragraph -->
<?php endif; ?></div>
<!-- /wp:group -->
