<?php

/**
 *  Example, adds table by hook_update_N().
 */

/**
 * Implements hook_schema.
 */
function mymodule_schema() {
  $schema['table1'] = array(
    'description' => 'Description table1.',
    'fields' => array(
      'id' => array(
        'type' => 'int',
        'unsigned' => TRUE,
        'not null' => TRUE
      ),
      'field1' => array(
        'description' => 'Feild 1.',
        'type' => 'int',
        'not null' => TRUE,
        'default' => 0,
      ),
      'field2' => array(
        'description' => 'Feild 2.',
        'type' => 'varchar',
        'not null' => TRUE,
        'default' => 0,
      ),
      'time' => array(
        'type' => 'int',
        'not null' => TRUE,
        'default' => 0,
        'description' => 'Timestamp',
      ),
    ),
    'primary key' => array('id'),
  );

  $schema['table2'] = array(
    'description' => 'Description table2.',
    'fields' => array(
      'id' => array(
        'type' => 'int',
        'unsigned' => TRUE,
        'not null' => TRUE
      ),
      'field1' => array(
        'description' => 'Feild 1.',
        'type' => 'int',
        'not null' => TRUE,
        'default' => 0,
      ),
      'field2' => array(
        'description' => 'Feild 2.',
        'type' => 'varchar',
        'not null' => TRUE,
        'default' => 0,
      ),
      'time' => array(
        'type' => 'int',
        'not null' => TRUE,
        'default' => 0,
        'description' => 'Timestamp',
      ),
    ),
    'primary key' => array('id'),
  );


  return $schema;
}

/**
 * Creates new table table2
 */
function mymodule_update_7101() {
  $table_name = 'table2';
  $schema = drupal_get_schema_unprocessed('mymodule', $table_name);
  db_create_table($table_name, $schema);

  return $table_name . ' table created.';
}


// OR 
/**
 * Creates new table table2
 */
function mymodule_update_7007() {
  $table = 'table2';
  $schema = mymodule_schema();
  if (!db_table_exists($table)) {
    db_create_table($table, $schema[$table]);
  }
}
