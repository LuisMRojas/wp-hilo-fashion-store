<?php
/**
 * Title: Beneficios de la tienda
 * Slug: hilo/benefits
 * Categories: hilo
 * Keywords: envío, devoluciones, beneficios
 * Viewport width: 1400
 */

$hilo_benefits = array(
	array( '01', 'Envío gratis', 'En pedidos desde $80. Entregas en 2–4 días hábiles.' ),
	array( '02', '30 días para cambiar', 'Si no te queda, la cambiamos o te devolvemos el dinero.' ),
	array( '03', 'Fibras naturales', 'Lino, algodón orgánico y lana merino con trazabilidad.' ),
	array( '04', 'Hecho en talleres locales', 'Producción en pequeñas series, sin sobrestock.' ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"1360px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:columns -->
<div class="wp-block-columns"><?php foreach ( $hilo_benefits as $b ) : ?><!-- wp:column {"className":"hilo-benefit","style":{"spacing":{"padding":{"top":"1.25rem"}}}} -->
<div class="wp-block-column hilo-benefit" style="padding-top:1.25rem"><!-- wp:paragraph {"textColor":"accent","fontSize":"small","style":{"typography":{"fontWeight":"700"}}} -->
<p class="has-accent-color has-text-color has-small-font-size" style="font-weight:700"><?php echo esc_html( $b[0] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html( $b[1] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
<p class="has-muted-color has-text-color has-small-font-size"><?php echo esc_html( $b[2] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --><?php endforeach; ?></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
