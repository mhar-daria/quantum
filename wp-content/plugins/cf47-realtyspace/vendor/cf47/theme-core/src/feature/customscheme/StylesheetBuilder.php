<?php

namespace cf47\themecore\feature\customscheme;

use cf47\themecore\helper\Filesystem;

class StylesheetBuilder
{

    /**
     * @var \cf47\themecore\helper\Filesystem
     */
    private $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function compileOrGet($templateStylesheetPath, array $replacements)
    {
        $location = $this->getOutputLocation($templateStylesheetPath);
        if (file_exists($location['path'])) {
            return $location['url'];
        } else {
            return $this->compile($templateStylesheetPath, $replacements);
        }
    }

    private function getOutputLocation($inputPath, $outputFilePrefix = '')
    {
        $file = new \SplFileInfo($inputPath);

        return [
            'url' => $this->filesystem->getCacheUrl() . '/' . $outputFilePrefix . $file->getBasename(),
            'path' => $this->filesystem->getCachePath() . '/' . $outputFilePrefix . $file->getBasename(),
        ];
    }

    public function compile($templateStylesheetPath, array $replacements, $outputPrefix = '')
    {

        $replacements = array_filter($replacements, function($replacement){
            return !empty($replacement);
        });

        $location = $this->getOutputLocation($templateStylesheetPath, $outputPrefix);
        $output = str_ireplace(
            array_keys($replacements),
            $replacements,
            file_get_contents($templateStylesheetPath)
        );
        file_put_contents($location['path'], $output);

        return $location['url'];
    }

    public function invalidate($templateStylesheetPath, $outputPrefix = ''){
        $location = $this->getOutputLocation($templateStylesheetPath, $outputPrefix);
        unlink($location['path']);
    }
}