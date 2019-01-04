<?php

namespace cf47\themecore;

class ShortcodeBuilder
{
    private $themePrefix;

    public function __construct($themePrefix)
    {
        $this->themePrefix = $themePrefix;
    }

    public function addSimpleUIShortcode($name, $templatePath, array $expectedAtts, array $uiArgs = [])
    {
        $body = $this->renderShortcode($templatePath, $expectedAtts);
        $this->addUiShortcode($name, $body, $uiArgs);
    }

    private function renderShortcode($templatePath, array $expectedAtts)
    {
        return function ($atts) use ($templatePath, $expectedAtts) {
            $atts = shortcode_atts($expectedAtts, $atts);
            ob_start();
            include get_template_directory() . '/views/' . $templatePath;

            return ob_get_clean();
        };
    }

    /**
     * @param $name
     * @param $body
     * @param array $uiArgs
     */
    public function addUiShortcode($name, $body, array $uiArgs = [])
    {
        $noPreview = false;

        if (array_key_exists('no_preview', $uiArgs)) {
            $noPreview = true;
            unset($uiArgs['no_preview']);
        }
        $that = $this;

        if (is_admin()) {
            $bodyWrapper = function ($atts) use ($body, $noPreview, $uiArgs, $that) {
                if ($noPreview === true && defined('SHORTCODE_UI_DOING_PREVIEW')) {
                    $noPreview = $that->renderShortcode('modules/core/shortcodes/no-preview.php',
                        [
                            'shortcode_label' => $uiArgs['label'],
                            'shortcode_icon' => $uiArgs['listItemImage'],
                        ]);

                    return $noPreview($atts);
                } else {
                    return $body($atts);
                }
            };
            $body = $bodyWrapper;
        }

        $this->addShortcode($name, $body);

        add_action('register_shortcode_ui',
            function () use ($name, $uiArgs) {

                if (is_array($uiArgs['attrs'])) {
                    foreach ($uiArgs['attrs'] as &$attr) {
                        if (array_key_exists('options', $attr) && is_callable($attr['options'])) {
                            $attr['options'] = $attr['options']();
                        }
                    }
                }
                unset($attr);
                shortcode_ui_register_for_shortcode($this->getShortcodeName($name), $uiArgs);
            });
    }

    public function addShortcode($name, $body)
    {
        add_shortcode($this->getShortcodeName($name), $body);
    }

    public function getShortcodeName($name)
    {
        return "{$this->themePrefix}_$name";
    }

}
