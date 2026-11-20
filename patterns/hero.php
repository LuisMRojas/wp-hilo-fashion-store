<?php
/**
 * Title: Portada de colección
 * Slug: hilo/hero
 * Categories: hilo, banner
 * Keywords: portada, hero, colección
 * Viewport width: 1400
 */

$hilo_img = get_theme_file_uri( 'assets/products/vestido-lino-1.jpg' );
$hilo_img2 = get_theme_file_uri( 'assets/products/chaqueta-obrera-1.jpg' );
?>
<!-- wp:group {"align":"full","className":"hilo-hero","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"1360px"}} -->
<div class="wp-block-group alignfull hilo-hero" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"46%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:46%"><!-- wp:paragraph {"fontSize":"x-small","style":{"typography":{"fontWeight":"700","letterSpacing":"0.12em"}}} -->
<p class="has-x-small-font-size" style="font-weight:700;letter-spacing:0.12em"><span class="hilo-pill">COLECCIÓN OTOÑO 2026</span></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"fontSize":"huge"} -->
<h1 class="wp-block-heading has-huge-font-size">Básicos que <em>duran</em> más que la temporada</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"muted","fontSize":"large"} -->
<p class="has-muted-color has-text-color has-large-font-size">Lino, algodón orgánico y lana merino. Cortes atemporales confeccionados en pequeños talleres.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/?post_type=product">Comprar colección</a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"base","textColor":"contrast","style":{"border":{"width":"1px","color":"#1c1a17"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-contrast-color has-base-background-color has-text-color has-background has-border-color wp-element-button" href="#lookbook" style="border-color:#1c1a17;border-width:1px">Ver lookbook</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"54%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:54%"><!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"left":"1rem"}}}} -->
<div class="wp-block-columns is-not-stacked-on-mobile"><!-- wp:column {"width":"58%"} -->
<div class="wp-block-column" style="flex-basis:58%"><!-- wp:image {"aspectRatio":"4/5","scale":"cover","linkDestination":"none"} -->
<figure class="wp-block-image"><img src="<?php echo esc_url( $hilo_img ); ?>" alt="Vestido de lino color terracota" style="aspect-ratio:4/5;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom","width":"42%"} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:42%"><!-- wp:image {"aspectRatio":"4/5","scale":"cover","linkDestination":"none"} -->
<figure class="wp-block-image"><img src="<?php echo esc_url( $hilo_img2 ); ?>" alt="Chaqueta obrera índigo" style="aspect-ratio:4/5;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
<p class="has-muted-color has-text-color has-small-font-size">Chaqueta Obrera — sarga de algodón, botones de corozo.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
