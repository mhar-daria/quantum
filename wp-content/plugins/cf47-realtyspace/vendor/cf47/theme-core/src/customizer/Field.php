<?php

namespace cf47\themecore\customizer;

use cf47\themecore\JavascriptBridge;
use cf47\themecore\wpml\WpmlManager;

class Field
{
    public function __construct($configId, $sectionId, array $options = [])
    {
        /** @var Manager $customizer */
        $customizer = cf47rs_get('core.customizer');

        if ($customizer->hasDefault($options['settings'])) {
            $options['default'] = $customizer->getDefault($options['settings']);
        } elseif (array_key_exists('default', $options)) {
            $customizer->addDefaults($options['settings'], $options['default']);
        }

        if (class_exists('\Kirki')) {
            \Kirki::add_field($configId, array_merge($options, ['section' => $sectionId]));
        }

        if (array_key_exists('wpml', $options)) {
            /** @var WpmlManager $wpmlManager */
            $wpmlManager = cf47rs_get('wpml.manager');
            $wpmlManager->register_theme_option(
                $options['settings'],
                $customizer->getOption($options['settings']),
                $options['type'] === 'repeater'
            );
        }

        if (array_key_exists('expose', $options)) {
            add_action('wp_loaded', function () use ($customizer, $options) {
                /** @var JavascriptBridge $jsBridge */
                $jsBridge = cf47rs_get('jsbridge');
                $value = $customizer->getOption($options['settings']);
                if ($options['type'] === 'checkbox') {
                    $value = (bool)$value;
                }
                $jsBridge->expose_var($options['expose'], $value);
            }, 11);
        }

        if (array_key_exists('public', $options)) {
            $app = cf47_app();
            /** @var RequestListener $listener */
            $listener = $app['core.request_listener'];
            $listener->register_public_option($options);
        }
    }
}
