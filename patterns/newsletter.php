<?php
/**
 * Title: Newsletter
 * Slug: hilo/newsletter
 * Categories: hilo, call-to-action
 * Keywords: newsletter, suscripción, correo
 * Viewport width: 1400
 */
?>
<!-- wp:group {"align":"full","className":"hilo-newsletter","backgroundColor":"contrast","textColor":"base","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull hilo-newsletter has-base-color has-contrast-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:heading {"textAlign":"center","fontSize":"x-large"} -->
<h2 class="wp-block-heading has-text-align-center has-x-large-font-size">10 % en tu primera compra</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#bdb4a8"}}} -->
<p class="has-text-align-center has-text-color" style="color:#bdb4a8">Un correo al mes con lanzamientos, reposiciones y consejos para cuidar tu ropa. Nada de spam.</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<form action="#" method="post">
	<label class="screen-reader-text" for="hilo-email">Correo electrónico</label>
	<input id="hilo-email" type="email" required placeholder="tu@correo.com" />
	<button type="submit">Suscribirme</button>
</form>
<!-- /wp:html --></div>
<!-- /wp:group -->
