<?php

/**
 * @file
 * Install, update and uninstall functions for the apivpn
 */



function hook_install() {
  //Creates fiels
  $fields = array(
    array(
      'field_name' => 'field_order',
      'label' => 'Orders',
      'field_type' => 'number_integer',
      'widget_type' => 'text',
    ),
    array(
      'field_name' => 'field_recurring',
      'label' => 'Direct Debit recurring',
      'field_type' => 'list_boolean',
      'widget_type' => 'options_onoff',
    )
  );

  foreach ($fields as $key => $item) {
    if (!field_info_field($item['field_name'])) {
      // Create the field base.
      $field = array(
        'field_name' => $item['field_name'],
        'type' => $item['field_type'],
      );
      field_create_field($field);

      // Create the field instance on the bundle.
      $instance = array(
        'field_name' => $item['field_name'],
        'entity_type' => 'user',
        'label' => $item['label'],
        'bundle' => 'user',
        'settings' => array(),
        'widget' => array(
          'type' => $item['widget_type'],
        ),
      );
      field_create_instance($instance);
    }
  }
}
