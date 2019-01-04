<?php
namespace cf47\themecore\timber;

use cf47\themecore\helper\Util;
use cf47\themecore\JavascriptBridge;

class Extension extends \Twig_Extension
{

    public function getFunctions()
    {
        return [

            new \Twig_SimpleFunction('is_front_page', function () {
                return is_front_page();
            }),
            new \Twig_SimpleFunction('is_customizer', function () {
                return is_customize_preview();
            }),
            new \Twig_SimpleFunction('category_list', function ($postId, $separator = '', $parents = '') {
                return get_the_category_list($separator, $parents, $postId);
            }, ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('tag_list', function ($postId, $separator = '') {
                return get_the_tag_list('', $separator, '', $postId);
            }, ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('term_list', function ($postId, $taxonomy, $separator = '') {
                return get_the_term_list($postId, $taxonomy, '', $separator, '');
            }, ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('comments_number_text', function ($postId) {
                return Util::set_post($postId,
                    function () {
                        return get_comments_number_text();
                    });
            }, ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('content', function ($moreLinkText = null, $postId = false) {
                return Util::captureOutput(function () use ($moreLinkText) {
                    the_content($moreLinkText);
                },
                    $postId);
            }, ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('excerpt', function ($postId) {
                return Util::captureOutput(function () {
                    the_excerpt();
                },
                    $postId);
            }, ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('search_form', function () {
                return get_search_form(false);
            }, ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('js_module', function ($name, $options = []) {
                /** @var JavascriptBridge $js */
                $js = cf47rs_get('jsbridge');

                return $js->init_module($name, $options);
            }, ['is_safe' => ['html']]),

        ];
    }

    public function getGlobals()
    {
        return [
            'wpcond'
//            'wp' => [
//                'page' => new PageHelper(),
//                'site' => new SiteHelper()
//            ]
        ];
    }

    public function getName()
    {
        return 'wp_core_helpers';
    }
}
