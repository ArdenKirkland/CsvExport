<?php
class CsvExportPlugin extends Omeka_plugin_AbstractPlugin
{
    protected $_filters = array(
        'response_contexts',
        'action_contexts',
    );
    
    // Sets the response MIME types
    public function filterResponseContexts($contexts) {
        $contexts['csv'] = array(
            'suffix' => 'csv',
            'headers' => array(
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename=export.csv'
            ),
        );
        return $contexts;
    }
    
    // Add as an export on browse and show
    public function filterActionContexts($contexts, $args) {
        $contexts['browse'][] = 'csv';
        $contexts['show'][] = 'csv';
        return $contexts;
    }
}

// Plugin-wide setup
if (!defined('CSV_EXPORT_PLUGIN_DIR')) {
    define('CSV_EXPORT_PLUGIN_DIR', dirname(__FILE__));
}
require_once(CSV_EXPORT_PLUGIN_DIR . '/helpers/CsvExportFunctions.php');
?>
