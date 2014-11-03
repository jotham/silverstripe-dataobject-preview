<?PHP

GridFieldDetailForm_ItemRequest::add_extension('PreviewableDataObjectExt');

// TODO: We should be able to do this through the YAML instead of this hack?
$module_prefix = basename(__DIR__);
$items = Config::inst()->get('ModelAdmin', 'extra_requirements_javascript');
$items[] = $module_prefix . '/javascript/PDOLeftAndMain.Preview.js';
Config::inst()->update('ModelAdmin', 'extra_requirements_javascript', $items);

