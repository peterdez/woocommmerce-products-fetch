<?php
/*
Plugin Name: WooCommerce Plugin to Fetch Products
Description: Fetches products from the database.
Version: 1.0
Author: Oluwafemi Adebanjo
*/

// Hook into WooCommerce to display products
add_action('woocommerce_before_main_content', 'display_custom_products');

function display_custom_products() {
    // Fetch products from your database
    global $wpdb;
    $products = $wpdb->get_results("SELECT * FROM my_custom_products_table");

    // Display products
    if ($products) {
        echo '<ul class="products">';
        foreach ($products as $product) {
            echo '<li>';
            echo '<h2>' . $product->name . '</h2>';
            echo '<p>' . $product->description . '</p>';
            echo '<span class="price">' . $product->price . '</span>';
            // Add to cart button
            echo '<a href="#" class="button add_to_cart_button">Add to cart</a>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo 'No products found.';
    }
}
