<?php

namespace cf47\themecore\section;

use cf47\themecore\AbstractQueryRepository;
use cf47\themecore\vc\AbstractShortcodeView;

abstract class AbstractSectionView extends AbstractShortcodeView
{

    public function title()
    {
        return $this->get_data('title');
    }

    public function subtitle()
    {
        return $this->get_data('subtitle');
    }

    public function inner_content()
    {
        return $this->is_vc() ? parent::inner_content() : '';
    }

    public function container_styles()
    {
        return '';
    }

    public function container_classes()
    {
        $classes = '';
        if (!$this->is_vc()) {
            $classes .= 'widget--cz';
        }
        $css = $this->get_data('css');
        if (!empty($css) && $this->is_vc()) {
            $classes .= vc_shortcode_custom_css_class($css);
        }

        return esc_attr($classes);
    }

    protected function get_items(AbstractQueryRepository $repo)
    {
        if (!$this->is_vc() && count((array)$this->get_data('items'))) {
            return $repo->find_by_id($this->get_data('items'));
        }

        if ($this->is_vc()) {
            return parent::get_items($repo);
        }

        return [];
    }

    public function is_vc()
    {
        return array_key_exists('is_vc', $this->data) && $this->data['is_vc'] === true;
    }

}