<?php

namespace cf47\plugin\realtyspace\module\faq;

use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['faq.repo'] = function ($c) {
            /** @var FaqPostType $faq_type */
            $faq_type = $c['faq.post_type'];

            return new Repository(Entity::FQCN, $faq_type->get_name());
        };
    }

    public function boot(Application $app)
    {
        $this->register_shortcodes($app);
    }

    private function register_shortcodes(Application $app)
    {
        /** @var ShortcodeBuilder $shortcodeBuilder */
        $shortcodeBuilder = $app['core.shortcode_builder'];

        $shortcodeBuilder->addUiShortcode('faq_list',
            function ($args) use ($app) {
                $atts = shortcode_atts([
                    'filter_by' => 'category_id',
                    'ids' => '',
                    'show_header' => 'false'
                ],
                    $args);

                if (!in_array($atts['filter_by'], ['category_id', 'post_id'], true)) {
                    return false;
                } else {
                    $filterBy = $atts['filter_by'];
                }

                $showHeader = filter_var($atts['show_header'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
                if ($showHeader === null) {
                    return false;
                }

                if ($atts['ids'] === '') {
                    $ids = [];
                } elseif (Util::isPositiveInteger($atts['ids'])) {
                    $ids = [$atts['ids']];
                } else {
                    $ids = Util::string_to_integer_array($atts['ids']);
                    if (!count($ids)) {
                        return false;
                    }
                }

                /** @var Repository $repo */
                $repo = $app['faq.repo'];

                if ($filterBy === 'category_id') {
                    if (count($ids) > 0) {
                        if ($showHeader) {
                            $entities = $repo->find_by_category_ids_grouped($ids);
                        } else {
                            $entities = $repo->find_by_category_ids($ids);
                        }
                    } else {
                        if ($showHeader) {
                            $entities = $repo->find_all_grouped_by_category();
                        } else {
                            $entities = $repo->find_all();
                        }
                    }
                } else {
                    if (count($ids) > 0) {
                        $entities = $repo->find_by_id($ids);
                    } else {
                        $entities = $repo->find_all_grouped_by_category();
                    }
                }

                return \Timber::compile('modules/faq/shortcode.twig',
                    [
                        'entities' => $entities,
                        'is_grouped' => $showHeader && ($filterBy === 'category_id' || ($filterBy === 'post_id' && !count($ids)))
                    ]);

            },
            [
                'label' => esc_html__('FAQ list', 'realtyspace'),
                'listItemImage' => 'dashicons-editor-help',
                'no_preview' => true,
                'attrs' => [
                    [
                        'label' => esc_html__('Filter by', 'realtyspace'),
                        'attr' => 'filter_by',
                        'type' => 'radio',
                        'options' => [
                            'category_id' => esc_html__('Category ID`s', 'realtyspace'),
                            'post_id' => esc_html__('Post ID`s', 'realtyspace'),
                        ]
                    ],
                    [
                        'label' => esc_html__('ID`s', 'realtyspace'),
                        'attr' => 'ids',
                        'type' => 'text',
                        'description' => esc_html__('Please separate ID`s with commas, for example: 1,2,3. If left empty, will display all existing entries.', 'realtyspace'),
                    ],
                    [
                        'label' => esc_html__('Show category header', 'realtyspace'),
                        'attr' => 'show_header',
                        'type' => 'checkbox',
                        'description' => esc_html__('Only applicable when filtering by category', 'realtyspace'),
                    ]
                ]
            ]);

    }

}