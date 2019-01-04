<?php

namespace cf47\themecore\feature\demoimporter;

use cf47\themecore\feature\demoimporter\vendor\CustomizeImporter;

class Importer
{
    private $importPath;

    public function __construct($importPath)
    {
        $this->importPath = $importPath;
    }

    /**
     * @param string $demoGroup
     *
     * @throws \Exception
     */
    public function run($demoGroup = '')
    {
        if ($demoGroup && !ctype_alnum($demoGroup)){
            throw new \InvalidArgumentException('Invalid demo group format');
        }

        $path = $this->importPath . '/' . $demoGroup;
        $this->importContent($path.'/content.xml');
//        $this->importCustomizerOptions($path.'/options.dat');
//        $this->importWidgets($path.'/widgets.json');
    }

    private function importContent($file)
    {
        $importer = new ContentImporter();
        $importer->import($file);
    }

    public function importCustomizerOptions($file){
        CustomizeImporter::import($file);
    }

    private function importWidgets($file)
    {
        $data = file_get_contents( $file );
        $data = json_decode( $data );
//        wie_import_data( $data );
    }
}