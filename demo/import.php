<?php
/**
 * Importa el catálogo de demostración de Hilo en WooCommerce.
 *
 * Uso (WP-CLI):   wp eval-file wp-content/themes/hilo/demo/import.php
 * Uso (Playground): se ejecuta automáticamente desde blueprint.json.
 *
 * @package Hilo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'WooCommerce' ) ) {
	echo "WooCommerce no está activo.\n";
	return;
}

require_once ABSPATH . 'wp-admin/includes/image.php';

// Ajustes de tienda para la demo.
update_option( 'woocommerce_coming_soon', 'no' );
update_option( 'woocommerce_store_pages_only', 'no' );
update_option( 'woocommerce_thumbnail_cropping', 'uncropped' );
update_option( 'woocommerce_currency', 'USD' );
update_option( 'woocommerce_onboarding_profile', array( 'skipped' => true ) );
update_option( 'woocommerce_task_list_hidden', 'yes' );

/**
 * Copia una imagen del tema a uploads y crea el adjunto.
 */
function hilo_demo_attach( $file, $title, $parent = 0 ) {
	$upload = wp_upload_dir();
	$dest   = trailingslashit( $upload['path'] ) . basename( $file );
	copy( $file, $dest );
	$id = wp_insert_attachment(
		array(
			'post_mime_type' => 'image/jpeg',
			'post_title'     => $title,
			'post_status'    => 'inherit',
		),
		$dest,
		$parent
	);
	wp_update_attachment_metadata( $id, wp_generate_attachment_metadata( $id, $dest ) );
	update_post_meta( $id, '_wp_attachment_image_alt', $title );
	return $id;
}

// Categorías.
$cat_ids = array();
foreach ( array( 'mujer' => 'Mujer', 'hombre' => 'Hombre', 'accesorios' => 'Accesorios' ) as $slug => $name ) {
	$term = term_exists( $slug, 'product_cat' );
	if ( ! $term ) {
		$term = wp_insert_term( $name, 'product_cat', array( 'slug' => $slug ) );
	}
	$cat_ids[ $slug ] = (int) $term['term_id'];
}

$dir   = get_theme_file_path( 'assets/products/' );
$order = 0;
foreach ( hilo_demo_products() as $slug => $p ) {
	if ( get_page_by_path( $slug, OBJECT, 'product' ) ) {
		continue;
	}
	$product = new WC_Product_Simple();
	$product->set_name( $p['name'] );
	$product->set_slug( $slug );
	$product->set_status( 'publish' );
	$product->set_regular_price( (string) $p['price'] );
	if ( $p['sale'] ) {
		$product->set_sale_price( (string) $p['sale'] );
	}
	$product->set_short_description( $p['short'] );
	$product->set_description(
		$p['short'] . "\n\nComposición y cuidado: lavar en frío, secar a la sombra, planchar a temperatura media. Confeccionado en pequeños talleres con producción por series."
	);
	$product->set_category_ids( array_map( function ( $c ) use ( $cat_ids ) { return $cat_ids[ $c ]; }, $p['cats'] ) );
	$product->set_menu_order( $order++ );
	$product->set_manage_stock( false );
	$product->set_stock_status( 'instock' );

	$attr = new WC_Product_Attribute();
	$attr->set_name( 'Color' );
	$attr->set_options( array_keys( $p['colors'] ) );
	$attr->set_visible( true );
	$size = new WC_Product_Attribute();
	$size->set_name( 'Talla' );
	$size->set_options( 'accesorios' === $p['cats'][0] ? array( 'Única' ) : array( 'XS', 'S', 'M', 'L', 'XL' ) );
	$size->set_visible( true );
	$product->set_attributes( array( $attr, $size ) );

	$product->update_meta_data( '_hilo_swatches', $p['colors'] );
	$id = $product->save();

	$colors = array_keys( $p['colors'] );
	$img1   = hilo_demo_attach( $dir . $slug . '-1.jpg', $p['name'] . ' — ' . $colors[0], $id );
	$img2   = hilo_demo_attach( $dir . $slug . '-2.jpg', $p['name'] . ' — ' . $colors[1], $id );
	$product->set_image_id( $img1 );
	$product->set_gallery_image_ids( array( $img2 ) );
	$product->save();
}

echo "Catálogo de Hilo importado.\n";
