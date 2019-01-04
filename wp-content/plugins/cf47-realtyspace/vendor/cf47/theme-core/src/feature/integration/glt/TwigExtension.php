<?php

namespace cf47\themecore\feature\integration\glt;


class TwigExtension extends \Twig_Extension
{
    public function getGlobals()
    {
        return [
          'wpglt' => new ViewModel()
        ];
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'glt_extension';
    }
}
