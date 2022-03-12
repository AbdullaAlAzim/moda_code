<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

    //
    // Set a unique slug-like ID
    $prefix = '_moda_product_cat';

    //
    // Create taxonomy options
    CSF::createTaxonomyOptions($prefix, array(
        'taxonomy' => 'product_cat',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ));

    //
    // Create a section
    CSF::createSection($prefix, array(
        'fields' => array(

            array(
                'id' => 'cate_icon',
                'type' => 'icon',
                'title' => 'Icon',
            ),

        )
    ));

}