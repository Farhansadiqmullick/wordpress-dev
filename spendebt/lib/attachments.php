<?php
define( 'ATTACHMENTS_SETTINGS_SCREEN', false );
add_filter( 'attachments_default_instance', '__return_false' );

function spendebt_attachments($attachments){
    $fields = array(
       array(
           'name'      => 'title',
           'type'      => 'text',
           'label'     => __( 'Title', 'spendebt' ),
       ),
       array(
        'name'      => 'caption',
        'type'      => 'textarea',
        'label'     => __( 'Caption', 'spendebt' ),
    ),
        array(
        'name'      => 'author-name',
        'type'      => 'text',
        'label'     => __( 'Author Name', 'spendebt' ),
    ),
    array(
        'name'      => 'author-place',
        'type'      => 'textarea',
        'label'     => __( 'Author Place', 'spendebt' ),
    ),
    array(
        'name'      => 'author-image',
        'type'      => 'wysiwyg',
        'label'     => __( 'Author Image', 'spendebt' ),
    ),
    array(
        'name'      => 'author-video',
        'type'      => 'wysiwyg',
        'label'     => __( 'Author Video', 'spendebt' ),
    ),
    );

    $args = array(

        'label'         => 'Featured Slider',
        'post_type'     => array( 'post', 'page'),
        'filetype'      => array("image"),
        'note'          => 'Add Slider Images',
        'button_text'   => __( 'Attach Files', 'spendebt' ),
        'fields'        => $fields,
    );

    $attachments->register( 'slider', $args );
}
add_action( 'attachments_register', 'spendebt_attachments' );