<?php

/**
 *  Example, add table for enabled module
 */

/**
 * Creates new table 'new_table'.
 */
function module_name_update_7001() {
  $table = 'new_table';
  $schema = module_name_schema();
  if (!db_table_exists($table)) {
    db_create_table($table, $schema[$table]);
  }
}
