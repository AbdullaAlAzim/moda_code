<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

    //
    // Set a unique slug-like ID
    $prefix = '_moda_nav';

    //
    // Create profile options
    CSF::createNavMenuOptions($prefix, array(
        'data_type' => 'unserialize', // The type of the database save options. `serialize` or `unserialize`
    ));

    //
    // Create a section
    CSF::createSection($prefix, array(
        'fields' => array(

            array(
                'id' => 'icon',
                'type' => 'icon',
                'title' => 'Icon',
            ),
            array(
                'id' => 'mega_switch',
                'type' => 'switcher',
                'title' => 'Mega menu',
            ),
            array(
                'id' => 'mega_menu',
                'type' => 'select',
                'title' => 'Select Mega Menu Template',
                'chosen' => true,
                'multiple' => false,
                'dependency' => array('mega_switch', '==', 'true'),
                'options' => modaelement_footer_select('moda_builders'),
            ),
        )
    ));

}