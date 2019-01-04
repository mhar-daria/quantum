<?php
namespace cf47\themecore\timber;

use cf47\themecore\Application;
use cf47\themecore\helper\UrlBuilder;
use cf47\themecore\helper\UrlGenerator;
use cf47\themecore\helper\Util;
use cf47\themecore\Options;
use cf47\themecore\Site;
use Symfony\Component\HttpFoundation\Request;

class WpHelperExtension extends \Twig_Extension
{

    /**
     * @var Application
     */
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('js_vars', function () {
                $output = call_user_func(
                    [
                        'cf47\plugin\realtyspace\module\core\Site',
                        'get_js_appdata'
                    ]
                );

                return json_encode($output, \JSON_FORCE_OBJECT);
            }, ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('add_jsvar', function ($name, $value) {
                Site::add_jsvar($name, $value);
            }),
            new \Twig_SimpleFunction('nonce_field', function ($action) {
                $field = wp_nonce_field($action, '_wpnonce', true, false);

                return str_replace('id="_wpnonce"', '', $field);
            }, ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('preview_hook', function ($class) {
                if (is_customize_preview()) {
                    return $class;
                }

                return '';
            }),
            new \Twig_SimpleFunction('dynamic_sidebar', function ($name) {
                return Util::captureOutput(function () use ($name) {
                    dynamic_sidebar($name);
                });
            }, ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('archive_path', function ($type, $args = []) {
                return UrlGenerator::archive($type, $args);
            }, ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('home_path', function () {
                return get_home_url();
            }, ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('comment_path', 'comment_link', ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('comment_edit_link', 'edit_comment_link', ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('comment_reply_link', 'get_comment_reply_link', ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('edit_post_link', function ($postId) {
                edit_post_link(null, '', '', $postId);
            }, ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('label_id', function () {
                return 'label-' . uniqid();
//                } else {
//                    if (is_scalar($seed)) {
//                        $hash = md5($seed);
//                    } elseif (is_object($seed)) {
//                        $hash = spl_object_hash($seed);
//                    } else {
//                        $hash = md5(serialize($seed));
//                    }
//                }

//                return 'label-' . substr($hash, 0, 8);
            }),
            new \Twig_SimpleFunction('once', function ($id, $value) {
                static $cache_id;
                if ($id === $cache_id) {
                    return null;
                } else {
                    $cache_id = $id;

                    return $value;
                }
            }),
            new \Twig_SimpleFunction('page_title', function () {
                $title = explode('|', wp_title('|', false, 'right'));

                return $title[0];
            }),
            new \Twig_SimpleFunction('is_ajax', function () {
                /** @var Request $request */
                $request = $this->app['request'];

                return $request->isXmlHttpRequest() && !is_customize_preview();
            }),
            new \Twig_SimpleFunction('_n', function ($single, $plural, $number, $domain = 'default') {
                return _n($single, $plural, $number, $domain);
            }),

        ];
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('antispambot', 'antispambot', ['is_safe' => ['html']]),
            new \Twig_SimpleFilter('i18n_time_ago', function (
                $from,
                $to = null,
                $format_past = null,
                $format_future = null
            ) {
                $to = $to === null ? time() : $to;
                $to = is_int($to) ? $to : strtotime($to);
                $from = is_int($from) ? $from : strtotime($from);

                if ($format_past === null) {
                    $format_past = esc_html__('%s ago', 'cf47placeholder');
                }

                if ($format_future === null) {
                    $format_future = esc_html__('%s from now', 'cf47placeholder');
                }

                if ($from < $to) {
                    return sprintf($format_past, human_time_diff($from, $to));
                } else {
                    return sprintf($format_future, human_time_diff($to, $from));
                }

            }),
        ];
    }

    public function getGlobals()
    {
        /** @var Request $request */
        $request = $this->app['request'];
        /** @var UrlBuilder $url_builder */
        $url_builder = $this->app['core.helper.url_builder'];

        /** @var Options $options */
        $options = $this->app['options'];

        return [
            'logged_in' => is_user_logged_in(),
            'can_register' => get_option('users_can_register'),
            'cookie' => $_COOKIE,
            'wprequest' => $request,
            'wpurl' => $url_builder,
            'option' => $options,
            'config' => \Timber::get_context()
        ];
    }

    public function getTests()
    {
        return [
            new \Twig_SimpleTest('activated', function ($name) {
                return Util::is_active_plugin($name);
            }),
            new \Twig_SimpleTest('available', function ($feature) {
                return $this->app['feature_registry']->isFeatureRegistered($feature);
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
        return 'wp_helper';
    }
}
