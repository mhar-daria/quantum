<?php

namespace cf47\themecore\helper;

use Symfony\Component\HttpFoundation\Request;

class UrlBuilder
{
    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param bool|array $params
     *
     * @return string
     */
    public function current_url($params = false)
    {
        $url = $this->url($this->request->getPathInfo());

        if ($params === false) {
            return $url;
        }

        $qs = $this->request->getQueryString();
        if ($qs !== null) {
            $url .= '?' . $qs;
        }
        $url = $this->add_params($url, $params);

        return $url;
    }

    public function url($path = '/', $params = false)
    {
        $url = home_url($path);

        return $this->add_params($url, $params);
    }

    /**
     * @param string $url
     * @param bool|array $params
     *
     * @return string
     */
    private function add_params($url, $params = false)
    {
        if (is_array($params) && count($params)) {
            $url = add_query_arg($params, $url);
        }

        return $url;
    }

    /**
     * @param integer $id
     * @param bool $params
     *
     * @return array
     */
    public function page_url_with_name($id, $params = false)
    {
        return [
            'url' => $this->page_url($id, $params),
            'name' => get_the_title($id)
        ];
    }

    public function page_url($id, $params = false)
    {
        $url = get_page_link($id);

        return $this->add_params($url, $params);
    }

    public function archive_url($post_type, $params)
    {
        UrlGenerator::archive($post_type, $params);
    }

    public function post_format_url($format)
    {
        return get_post_format_link($format);
    }

    public function ajax_url($action, $nonce_modifier = '', array $params = [])
    {
        $url = admin_url('admin-ajax.php');
        $params['action'] = $action;
        $params['_ajax_nonce'] = wp_create_nonce($action . $nonce_modifier);

        return $this->add_params($url, $params);
    }

    public function route_ajax_url($route_name, array $params = [])
    {
        $url = admin_url('admin-ajax.php');
        $params['action'] = $this->action_name($route_name);
        $params['_ajax_nonce'] = wp_create_nonce($route_name);

        return $this->add_params($url, $params);
    }

    public function action_name($route_name)
    {
        return cf47rs_get('param.theme_prefix') . '_' . Util::decamelize($route_name);
    }
}
