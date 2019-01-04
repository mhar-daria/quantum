<?php

namespace cf47\theme\realtyspace\module\common\controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class StandaloneAction extends GenericAction
{

    protected $skipSidebarRendering = false;
    /**
     * @var
     */
    private $templatePath;
    /**
     * @var Response
     */
    private $response;

    public function __construct($templatePath, $response)
    {
        $instance = cf47rs_get_app();
        $this->templatePath = $templatePath;

        if ($response === false) {
            $this->response = [];
        } else {
            $this->response = $response($instance);
        }

    }

    public function render()
    {
        if (is_single() || is_page()) {
            while (have_posts()) {
                the_post();
                parent::render();
            }
        } else {
            parent::render();
        }
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    protected function action(Request $request)
    {
        return $this->response;
    }

    protected function getModule()
    {
        // Deprecated
    }

    protected function getTemplate()
    {
        return $this->templatePath;
    }
}
