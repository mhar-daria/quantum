<?php

namespace cf47\themecore\helper;

class Filesystem
{
    private $themePrefix;

    public function __construct($themePrefix)
    {
        $this->themePrefix = $themePrefix;

    }

    private function isFallbackCacheDir(){
        $uploadDir = wp_upload_dir();
        $path = $uploadDir['basedir'].'/'.$this->themePrefix;
        return $path === $this->getCachePath();
    }

    public function getCachePath()
    {
        $path = WP_CONTENT_DIR . '/cache/' . $this->themePrefix;
        if (wp_mkdir_p($path)) {
            return $path;
        }

        $uploadDir = wp_upload_dir();
        $path = $uploadDir['basedir'].'/'.$this->themePrefix;
        $folderCreated = wp_mkdir_p($path);

        if(!$folderCreated){
            throw new \Exception('Could not create cache folder');
        }

        return $folderCreated;
    }


    public function getCacheUrl(){
        if ($this->isFallbackCacheDir()){
            $uploadDir = wp_upload_dir();
            return $uploadDir['baseurl'].'/'.$this->themePrefix;
        } else {
            return content_url() . '/cache/' . $this->themePrefix;
        }
    }
}