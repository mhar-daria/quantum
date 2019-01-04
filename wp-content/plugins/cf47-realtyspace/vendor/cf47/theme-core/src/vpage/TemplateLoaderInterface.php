<?php
namespace cf47\themecore\vpage;

/**
 * @author  Giuseppe Mazzapica <giuseppe.mazzapica@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT
 */
interface TemplateLoaderInterface
{

    public function init(PageInterface $page);

    /**
     * Trigger core and custom hooks to filter templates,
     * then load the found template.
     */
    public function load();
}