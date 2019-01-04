<?php
namespace cf47\theme\realtyspace\module\common\controller;

use cf47\themecore\helper\JsonResponse;
use cf47\themecore\helper\Util;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class GenericAction
{

    protected $skipSidebarRendering = false;

    public function render()
    {
        do_action('get_header', null);
        /** @var Request $request */
        $request = cf47rs_get('request');

        $twigVars = \Timber::get_context();

        $actionVars = $this->action($request);

        if ($actionVars instanceof RedirectResponse) {
            $actionVars->send();
            exit;
        } elseif ($actionVars instanceof Response && $actionVars->getStatusCode() === 403) {
            $templateName = 'modules/core/403.twig';
        } else {
            if (post_password_required()) {
                $templateName = 'modules/post/password.twig';
            } else {
                $templateName = $this->getTemplate();
            }
        }

        if (is_array($actionVars)) {
            $twigVars = array_merge($twigVars, $actionVars);
        }

        if ($templateName === null) {
            throw new \Exception('The template must not be null');
        }

        if ($request->isXmlHttpRequest() && $request->query->has('cf47') && !is_customize_preview()) {
            $html = \Timber::compile($templateName, $twigVars);
            $response = ['html' => $html, 'title' => wp_get_document_title()];
            $response = new JsonResponse($response);
            $response->send();
        } else {
            \Timber::render($templateName, $twigVars);
        }
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    abstract protected function action(Request $request);

    abstract protected function getTemplate();

    abstract protected function getModule();

    /**
     * Get container
     *
     * @param $name
     *
     * @return mixed
     */
    protected function get($name)
    {
        return cf47rs_get($name);
    }
}
