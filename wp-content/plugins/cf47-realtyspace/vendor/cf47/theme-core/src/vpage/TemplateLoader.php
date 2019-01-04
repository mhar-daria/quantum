<?php
namespace cf47\themecore\vpage;

/**
 * @author  Giuseppe Mazzapica <giuseppe.mazzapica@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT
 */
class TemplateLoader implements TemplateLoaderInterface
{
    private $template;
    private $handler;
    /** @var  PageInterface */
    private $page;

    public function init(PageInterface $page)
    {
        $this->page = $page;
    }

    public function load()
    {
        do_action('template_redirect');
        $template = locate_template(['virtual-page.php']);
        $filtered = apply_filters('template_include',
            apply_filters('virtual_page_template', $template)
        );
        if (empty($filtered) || file_exists($filtered)) {
            $template = $filtered;
        }
        if (!empty($template) && file_exists($template)) {
            $page = $this->page;
            require_once $template;
        }
    }
}