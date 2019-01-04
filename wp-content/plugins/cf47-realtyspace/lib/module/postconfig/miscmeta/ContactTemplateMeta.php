<?php

namespace cf47\plugin\realtyspace\module\postconfig\miscmeta;

use cf47\themecore\acf\setting;
use cf47\themecore\acf\type;
use cf47\themecore\AcfManager;
use cf47\themecore\helper\PluginChecker;
use cf47\themecore\helper\WpdbQueries;

class ContactTemplateMeta
{
    /**
     * @var \cf47\themecore\AcfManager
     */
    private $acf;

    /**
     * @var array
     */
    private $post_types;
    /**
     * @var \cf47\themecore\helper\PluginChecker
     */
    private $plugin_checker;
    /**
     * @var \cf47\themecore\helper\WpdbQueries
     */
    private $query_helper;

    /**
     * @var \cf47\themecore\acf\Builder
     */
    private $builder;

    public function __construct(AcfManager $acf_manager, PluginChecker $plugin_checker, WpdbQueries $query_helper)
    {
        $this->acf = $acf_manager;
        $this->plugin_checker = $plugin_checker;
        $this->query_helper = $query_helper;
        $this->builder = $acf_manager->get_builder();
    }

    public function register()
    {
        $config = $this->builder
            ->group(esc_html__('Contact', 'realtyspace'), 'contact', 'contact')
            ->set_position(setting\Position::POSITION_AFTER_TITLE)
            ->set_menu_order(2)
            ->set_location(
                [
                    [
                        [
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'page-templates/template-page-contact.php',
                        ]
                    ]
                ]
            )
            ->set_fields([
                $this->create_section_fields(),
                $this->create_social_fields(),
                $this->create_cf7_field()
            ]);

        $this->acf->register_group($config);

    }

    private function create_section_fields()
    {
        return $this->builder
            ->repeater(esc_html__('Contact sections', 'realtyspace'), 'sections')
            ->with_settings([
                'min' => 1,
                'layout' => 'row',
            ])
            ->set_subfields(
                [
                    $this->builder
                        ->text(esc_html__('Section group name', 'realtyspace'), 'group_name'),
                    $this->builder
                        ->textarea(esc_html__('Address', 'realtyspace'), 'address')
                        ->set_rows(2),
                    $this->builder
                        ->textarea(esc_html__('Phone', 'realtyspace'), 'phone')
                        ->set_rows(2)
                        ->set_new_lines_mode(setting\NewLines::NEWLINE_NOFORMAT),
                    $this->builder
                        ->textarea(esc_html__('Fax', 'realtyspace'), 'fax')
                        ->set_rows(2)
                        ->set_new_lines_mode(setting\NewLines::NEWLINE_NOFORMAT),
                    $this->builder
                        ->repeater(esc_html__('Emails', 'realtyspace'), 'emails')
                        ->set_subfields([
                            $this->builder->email(esc_html__('Email', 'realtyspace'), 'email')
                        ]),
                    $this->builder->textarea(esc_html__('Working hours', 'realtyspace'), 'working_hours')
                ]
            );
    }

    private function create_social_fields()
    {
        return $this->builder
            ->repeater(esc_html__('Social profiles', 'realtyspace'), 'social_profiles')
            ->set_subfields([
                $this->builder
                    ->text(esc_html__('Profile icon', 'realtyspace'), 'icon')
                    ->with_settings([
                        'placeholder' => esc_html__('For example: facebook', 'realtyspace'),
                        'instructions' => sprintf(
                            wp_kses(
                                __(
                                    'Look up the icon name <a href="%s" target="_blank">here</a>',
                                    'realtyspace'
                                ),
                                ['a' => ['href' => [], 'target' => []]]
                            ),
                            'https://fortawesome.github.io/Font-Awesome/icons/#brand'
                        )

                    ]),
                $this->builder
                    ->url(esc_html__('Profile URL', 'cf47placeholder'), 'url')
            ]);
    }

    private function create_cf7_field()
    {
        $cf7_field = $this->builder
            ->select(esc_html__('Contact form 7', 'realtyspace'), 'form_cf7_id')
            ->enable_ui()
            ->allow_null();

        if (!$this->plugin_checker->is_contact_form_7_active()) {
            $cf7_field
                ->disable()
                ->set_instructions(
                    $this->plugin_checker->get_contact_form_7_warning()
                );

        } else {
            $cf7_posts = $this->query_helper->find_all_cf47_pairs();
            if (!count($cf7_posts)) {
                $cf7_field->set_instructions(
                    esc_html__('If the list below is empty, dont forget to create a contact form first!', 'realtyspace')
                );
            }
            $cf7_field->set_choices($cf7_posts);

        }

        return $cf7_field;
    }

}
