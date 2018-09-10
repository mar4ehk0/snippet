<?php

/**
 *  Examples for theme_table sortable
 */


function module_name_form($form, $form_state) {
  $header = array(
    'id' => array('data' => '#'),
    'account' => array('data' => t('Account')),
    'close_date' => array('data' => t('Close date'), 'field' => 'close_date'),
    'recurring' => array('data' => t('Active recurring'), 'field' => 'recurring'),
  );

  $query = db_select('table_name', 'alias_table')
    ->extend('PagerDefault')
    ->extend('TableSort');
  $query->fields('alias_table', array('field_name1', 'filed_name2'));
  $result = $query->limit(COUNT)
    ->orderByHeader($header)
    ->execute();

    // Fetch rows
  $rows = array();
  foreach ($result as $item) {
    $rows[] = array(
      ++$i,
      //link_to_account,
      format_date(intval($item->close_date), 'custom', 'm-d-Y'),
      //recuring staturs,
    );
  }

  // Generates html-table
  $output = theme(
    'table',
    array('header' => $header, 'rows' => $rows, 'empty' => t('List is empty'))
  );
  $output .= theme('pager');    

  $form['wrapper_table'] = array(
  '#markup' => $output
  );

  return $form;  
}