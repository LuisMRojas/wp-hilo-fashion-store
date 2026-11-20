<?php
/**
 * Title: Categorías en tarjetas
 * Slug: hilo/categories
 * Categories: hilo
 * Keywords: categorías, colecciones, tarjetas
 * Viewport width: 1400
 */

$hilo_cats = array(
	array( 'Mujer', 'mujer', 'falda-plisada-1.jpg', '5 prendas' ),
	array( 'Hombre', 'hombre', 'chaqueta-obrera-2.jpg', '3 prendas' ),
	array( 'Accesorios', 'accesorios', 'bolso-tote-1.jpg', '2 piezas' ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"1360px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"1.25rem"}}}} -->
<div class="wp-block-columns"><?php foreach ( $hilo_cats as $c ) : ?><!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/products/' . $c[2] ) ); ?>","dimRatio":10,"overlayColor":"contrast","minHeight":420,"contentPosition":"bottom left","className":"hilo-cat","layout":{"type":"constrained"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left hilo-cat" style="min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-10 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_theme_file_uri( 'assets/products/' . $c[2] ) ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"backgroundColor":"white","textColor":"contrast","style":{"border":{"radius":"999px"},"spacing":{"padding":{"top":"0.6rem","bottom":"0.6rem","left":"1.2rem","right":"1.2rem"},"blockGap":"0.75rem"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group has-contrast-color has-white-background-color has-text-color has-background" style="border-radius:999px;padding-top:0.6rem;padding-right:1.2rem;padding-bottom:0.6rem;padding-left:1.2rem"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}}} -->
<p style="font-weight:700"><a href="/?product_cat=<?php echo esc_attr( $c[1] ); ?>"><?php echo esc_html( $c[0] ); ?> →</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"muted","fontSize":"x-small"} -->
<p class="has-muted-color has-text-color has-x-small-font-size"><?php echo esc_html( $c[3] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --><?php endforeach; ?></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
