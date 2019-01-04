<?php

namespace cf47\themecore\timber\twig\extension;

use cf47\themecore\JavascriptBridge;
use Twig_SimpleFunction;

class JsTemplate extends \Twig_Extension
{

    /**
     * @var JavascriptBridge
     */
    private $javascriptBridge;

    public function __construct(JavascriptBridge $javascriptBridge)
    {

        $this->javascriptBridge = $javascriptBridge;
    }

    public function getFunctions()
    {
        $jsBridge = $this->javascriptBridge;

        return [
            new Twig_SimpleFunction('js_template', function ($templateName, $templatePath) use ($jsBridge) {
                return $jsBridge->expose_template($templateName, $templatePath);
            }),
            new Twig_SimpleFunction('js_inline_template', function ($templateName, $content) use ($jsBridge) {
                return $jsBridge->expose_template($templateName,
                    null,
                    [
                        'content' => $content
                    ]);
            })
        ];
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'js_template';
    }
}
