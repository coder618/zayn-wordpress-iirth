<?php
require_once('../../../wp-load.php');
echo "Has action carbon_fields_register_fields: " . has_action('carbon_fields_register_fields') . "\n";
echo "Has action after_setup_theme: " . has_action('after_setup_theme') . "\n";
