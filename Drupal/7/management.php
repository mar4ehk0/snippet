<?php

// Mnagement Enable/Disable modules

/**
 * hook_update_N
 */
function hook_update_7001() {
  module_enable(array('module_name_1'));
  cache_clear_all();

  module_disable(array('module_name_2'));
}
