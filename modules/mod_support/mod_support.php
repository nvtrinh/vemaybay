<?php
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

$params->def('count', 10);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$list            = ModSupportHelper::getList($params);

require JModuleHelper::getLayoutPath('mod_support', $params->get('layout', 'default'));
