<?php

/**
 *  Examples for tokens
 */


// Init tokens
/**
 * Implements hook_token_info().
 */
function module_name_token_info() {
  $type = array(
    'name' => t('Title group'), // usually name module
    'description' => t('Description'),
    'needs-data' => 'module_name',
  );

  $tokens['token1'] = array(
    'name' => t('Title token1'),
    'description' => t('Description token1.'),
  );
  $tokens['token2'] = array(
    'name' => t('Title token2'),
    'description' => t('Description token2.'),
  );

  return array(
    'types' => array(
      'module_name' => $type,
    ),
    'tokens' => array(
      'module_name' => $tokens,
    ),
  );

}

/**
 * Implements hook_tokens().
 */
function module_name_tokens($type, $tokens, array $data = array(), array $options = array()) {
  $replacements = array();

  // If tokens1 or tokens2 dependes from user then need add to condtion $data['user']
  $condition = $type == 'module_name' && !empty($data['user']); 

  if ($condition) {
    foreach ($tokens as $name => $original) {
      switch ($name) {
        case 'token1':
          // logic for token1
          $replacements[$original] = custom_function('token1');
          break;
        case 'token2':
          // logic for token2
          $replacements[$original] = custom_function('token2');
          break;
      }
    }
  }

  return $replacements;
}


// Example how replace tokens
//****
    $data = array('user' => $user);
    $body = token_replace($text_with_text_tokens, $data);
//****