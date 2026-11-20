<?php
/**
 * Hilo — funciones del tema.
 *
 * @package Hilo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Catálogo de demostración compartido por los patrones y el importador.
 * Cada producto tiene dos imágenes (colorways) en assets/products/.
 */
function hilo_demo_products() {
	return array(
		'camiseta-esencial' => array( 'name' => 'Camiseta Esencial', 'price' => 24, 'sale' => null, 'cats' => array( 'hombre', 'mujer' ), 'colors' => array( 'Hueso' => '#efe9df', 'Pino' => '#2f3a34' ), 'short' => 'Algodón orgánico de 220 g, corte relajado y cuello reforzado.' ),
		'sudadera-nube'     => array( 'name' => 'Sudadera Nube', 'price' => 58, 'sale' => 46, 'cats' => array( 'mujer' ), 'colors' => array( 'Niebla' => '#a9b7c6', 'Arcilla' => '#d8a48f' ), 'short' => 'Felpa cepillada por dentro, capucha amplia y bolsillo canguro.' ),
		'chaqueta-obrera'   => array( 'name' => 'Chaqueta Obrera', 'price' => 89, 'sale' => null, 'cats' => array( 'hombre' ), 'colors' => array( 'Índigo' => '#3d5a80', 'Tabaco' => '#7a6a4f' ), 'short' => 'Sarga de algodón resistente, cuatro botones de corozo y bolsillos de parche.' ),
		'vestido-lino'      => array( 'name' => 'Vestido Lino', 'price' => 72, 'sale' => null, 'cats' => array( 'mujer' ), 'colors' => array( 'Terracota' => '#c56b4a', 'Crudo' => '#e8dcc6' ), 'short' => 'Lino europeo lavado a la piedra, tirantes ajustables y falda con vuelo.' ),
		'pantalon-wide'     => array( 'name' => 'Pantalón Wide', 'price' => 64, 'sale' => 52, 'cats' => array( 'mujer', 'hombre' ), 'colors' => array( 'Arena' => '#d8ccb4', 'Carbón' => '#262626' ), 'short' => 'Pierna amplia, tiro alto y pinzas delanteras. Tela fresca de algodón y lyocell.' ),
		'falda-plisada'     => array( 'name' => 'Falda Plisada', 'price' => 49, 'sale' => null, 'cats' => array( 'mujer' ), 'colors' => array( 'Oliva' => '#6d7f5c', 'Vino' => '#8c3b3b' ), 'short' => 'Plisado permanente, cintura elástica oculta y largo midi.' ),
		'bolso-tote'        => array( 'name' => 'Bolso Tote', 'price' => 35, 'sale' => null, 'cats' => array( 'accesorios' ), 'colors' => array( 'Natural' => '#d9c7a3', 'Negro' => '#1f1f1f' ), 'short' => 'Lona de 16 oz con bolsillo interior y asas reforzadas.' ),
		'gorro-lana'        => array( 'name' => 'Gorro de Lana', 'price' => 22, 'sale' => null, 'cats' => array( 'accesorios' ), 'colors' => array( 'Óxido' => '#b5532f', 'Pizarra' => '#58708a' ), 'short' => 'Lana merino tejida en canalé con pompón desmontable.' ),
	);
}

/**
 * Soportes del tema.
 */
function hilo_setup() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_editor_style( array( hilo_fonts_url(), 'assets/css/hilo.css' ) );

	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 600,
			'single_image_width'    => 900,
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'hilo_setup' );

function hilo_fonts_url() {
	return 'https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..700;1,6..96,400..700&family=Manrope:wght@400;500;600;700&display=swap';
}

function hilo_enqueue() {
	$ver = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'hilo-fonts', hilo_fonts_url(), array(), null );
	wp_enqueue_style( 'hilo', get_theme_file_uri( 'assets/css/hilo.css' ), array(), $ver );
	wp_enqueue_script( 'hilo', get_theme_file_uri( 'assets/js/hilo.js' ), array(), $ver, array( 'strategy' => 'defer', 'in_footer' => true ) );
}
add_action( 'wp_enqueue_scripts', 'hilo_enqueue' );

function hilo_pattern_category() {
	register_block_pattern_category( 'hilo', array( 'label' => __( 'Hilo · Tienda', 'hilo' ) ) );
}
add_action( 'init', 'hilo_pattern_category' );

/* -------------------------------------------------------------------------
 * Visualización de productos en el catálogo
 * ---------------------------------------------------------------------- */

/**
 * Segunda imagen (primera de la galería) para el efecto de cambio al pasar el cursor.
 */
function hilo_loop_hover_image() {
	global $product;
	if ( ! $product ) {
		return;
	}
	$ids = $product->get_gallery_image_ids();
	if ( $ids ) {
		echo wp_get_attachment_image(
			$ids[0],
			'woocommerce_thumbnail',
			false,
			array(
				'class'       => 'hilo-hover-image',
				'loading'     => 'lazy',
				'aria-hidden' => 'true',
				'alt'         => '',
			)
		);
	}
}
add_action( 'woocommerce_before_shop_loop_item_title', 'hilo_loop_hover_image', 11 );

/**
 * Muestras de color bajo el título. Se leen del meta _hilo_swatches
 * (array nombre => hex) que puede definirse por producto.
 */
function hilo_loop_swatches() {
	global $product;
	if ( ! $product ) {
		return;
	}
	$swatches = $product->get_meta( '_hilo_swatches' );
	if ( empty( $swatches ) || ! is_array( $swatches ) ) {
		return;
	}
	echo '<ul class="hilo-swatches" aria-label="' . esc_attr__( 'Colores disponibles', 'hilo' ) . '">';
	foreach ( $swatches as $label => $hex ) {
		printf(
			'<li><span class="hilo-swatch" style="--swatch:%1$s" title="%2$s"></span><span class="screen-reader-text">%2$s</span></li>',
			esc_attr( sanitize_hex_color( $hex ) ),
			esc_html( $label )
		);
	}
	echo '</ul>';
}
add_action( 'woocommerce_after_shop_loop_item_title', 'hilo_loop_swatches', 4 );

/**
 * Etiqueta "Nuevo" para productos publicados en los últimos 30 días que no estén en oferta.
 */
function hilo_new_badge() {
	global $product;
	if ( ! $product || $product->is_on_sale() ) {
		return;
	}
	$created = $product->get_date_created();
	if ( $created && $created->getTimestamp() > time() - 30 * DAY_IN_SECONDS ) {
		echo '<span class="hilo-badge hilo-badge--new">' . esc_html__( 'Nuevo', 'hilo' ) . '</span>';
	}
}
add_action( 'woocommerce_before_shop_loop_item_title', 'hilo_new_badge', 9 );

/**
 * Etiqueta de oferta con el porcentaje de descuento.
 */
function hilo_sale_flash( $html, $post, $product ) {
	if ( $product && $product->is_type( 'simple' ) && $product->get_regular_price() ) {
		$pct = round( 100 - ( (float) $product->get_sale_price() / (float) $product->get_regular_price() ) * 100 );
		return '<span class="onsale hilo-badge hilo-badge--sale">-' . esc_html( $pct ) . '%</span>';
	}
	return $html;
}
add_filter( 'woocommerce_sale_flash', 'hilo_sale_flash', 10, 3 );

/**
 * URL de un producto de demostración por su slug (con fallback si WooCommerce no está activo).
 */
function hilo_product_url( $slug ) {
	if ( function_exists( 'wc_get_products' ) ) {
		$found = get_page_by_path( $slug, OBJECT, 'product' );
		if ( $found ) {
			return get_permalink( $found );
		}
	}
	return home_url( '/?product=' . rawurlencode( $slug ) );
}
