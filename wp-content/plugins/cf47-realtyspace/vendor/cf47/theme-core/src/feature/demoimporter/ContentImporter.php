<?php

namespace cf47\themecore\feature\demoimporter;

use cf47\themecore\helper\Util;

class ContentImporter
{

    private $debug = false;
    private $isSetup = false;

    public function __construct($debug = false)
    {
        $this->debug = $debug;
    }

    public function import($file)
    {
        $this->setup();

        $contentImporter = new \WP_Import();
        $contentImporter->fetch_attachments = true;

        if ($this->debug === false) {
            Util::captureOutput(function () use ($contentImporter, $file) {
                $contentImporter->import($file);
            });
        } else {
            $contentImporter->import($file);
        }

    }

    private function setup()
    {
        if ($this->isSetup === true) {
            return;
        }

        if (!defined('WP_LOAD_IMPORTERS')) {
            define('WP_LOAD_IMPORTERS', true);
        }

        require_once ABSPATH . 'wp-admin/includes/import.php';
        require_once ABSPATH . 'wp-admin/includes/class-wp-importer.php';

        if (!class_exists('WP_Import')) {
            require_once __DIR__ . '/vendor/wordpress-importer.php';
        }

        $this->isSetup = true;
    }

}