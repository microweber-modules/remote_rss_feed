<?php
require_once __DIR__ . '/functions.php'; // ????

$defaults = [
    'primaryText' => lang('Remote Rss Feed', 'modules/remote_rss_feed'),
    'secondaryText' => 'Missing settings.',
];

$url = get_option('rss_url', $params['id']) ;
$limit = get_option('rss_post_limit', $params['id']);

$rss_data = get_rss_data($url, $limit);

$module_template = get_option('data-template', $params['id']);

if ($module_template == false && isset($params['template'])) {
    $module_template = $params['template'];
}

if ($module_template != false) {
    $template_file = module_templates($config['module'], $module_template);
} else {
    $template_file = module_templates($config['module'], 'default');
}

if (is_file($template_file) != false) {
    include($template_file);
} else {
    print lnotif("No template found. Please choose template.");
}

if (is_admin() && is_live_edit()) {
    print notif(_e('Click here to edit settings of RSS module', true));
}
