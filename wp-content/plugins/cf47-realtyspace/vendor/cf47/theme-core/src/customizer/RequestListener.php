<?php

namespace cf47\themecore\customizer;

class RequestListener
{

    public $public_options = [];
    private $prefix = 'opt_';

    public function register_public_option(array $option)
    {

        if (!array_key_exists('public', $option)) {
            throw new \InvalidArgumentException('No public index found');
        }

        if (is_array($option['public'])) {
            $public_id = $this->get_full_option_name($option['public']['id']);
            $values = $option['public']['values'];
        } else {
            $public_id = $this->get_full_option_name($option['public']);
            $values = $this->infer_allowed_values($option);
        }

        $this->public_options[$public_id] = [
            'internal_id' => $option['settings'],
            'allowed_values' => $values
        ];
    }

    private function get_full_option_name($short_name)
    {
        return $this->prefix . $short_name;
    }

    private function infer_allowed_values(array $option)
    {

        if (array_key_exists('choices', $option)) {
            return array_keys($option['choices']);
        } elseif ($option['type'] === 'switch') {
            return ['1', '0'];
        }

        throw new \Exception('Unable to guess allowed options');
    }

    public function listen()
    {
        add_action('wp', function () {
            foreach ($_GET as $key => $unsafe_value) {
                if (strpos($key, $this->prefix) !== 0) {
                    continue;
                }

                if (array_key_exists($key, $this->public_options)) {
                    $option = $this->public_options[$key];
                    add_filter('theme_mod_' . $option['internal_id'],
                        function ($orig_value) use ($unsafe_value, $option) {

                            if (is_array($option['allowed_values'])) {
                                if (in_array($unsafe_value, $option['allowed_values'], true)) {
                                    return $unsafe_value;
                                } else {
                                    return $orig_value;
                                }
                            } elseif (is_callable($option['allowed_values'])) {
                                throw new \Exception('Not implemented');
                            } else {
                                throw new \Exception('Invalid "allowed values" type');
                            }
                        }
                    );
                    do_action('cf47_theme_mod_switched_'.$option['internal_id']);
                }
            }
        });
    }
}