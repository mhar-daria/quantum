<?php
namespace cf47\themecore\vpage;

/**
 * @author  Giuseppe Mazzapica <giuseppe.mazzapica@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT
 */
interface PageInterface
{

    public function getUrl();

    public function getTemplate();

    public function getHandler();

    public function getTitle();

    /**
     * @return $this
     */
    public function setTitle($title);

    /**
     * @return $this
     */
    public function setContent($content);

    /**
     * @return $this
     */
    public function setTemplate($template);

    /**
     * @return $this
     */
    public function setHandler($template);

    /**
     * Get a WP_Post build using viryual Page object
     *
     * @return \WP_Post
     */
    public function asWpPost();
}