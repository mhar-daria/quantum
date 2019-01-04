<?php

namespace cf47\plugin\realtyspace\module\property\section\calltoaction;

use cf47\themecore\section\AbstractSectionConfig;
use cf47\themecore\ShortcodeBuilder;
use cf47\themecore\vc\ParamBuilder;

class CallToActionVcConfig extends AbstractSectionConfig
{

    /**
     * @var \cf47\themecore\ShortcodeBuilder
     */
    private $builder;

    public function __construct(ShortcodeBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function get_vc_config()
    {

        $param_builder = new ParamBuilder();
        $param_builder
            ->add_field_html('text', esc_html__('HTML text', 'realtyspace'), [
                'options' => [
                    'value' => base64_encode($this->get_html_defaults())
                ]
            ])
            ->add_group_css();

        return [
            'base' => 'section_cta',
            'name' => esc_html__('Call To Action section', 'realtyspace'),
            'params' => $param_builder,
        ];
    }

    private function get_html_defaults()
    {
        return <<<HTML
 <div class="gosubmit__title">
    <div class="gosubmit__title__row gosubmit__title__row--first">
        Looking to
    </div>
    <div class="gosubmit__title__row gosubmit__title__row--second">
        <span class="gosubmit__title__option">
            Sell
        </span>
        or
        <span class="gosubmit__title__option">
            Rent
        </span>
    </div>
    <div class="gosubmit__title__row gosubmit__title__row--third">
        Your Property?
    </div>
</div>
<a href="/submit-a-property/" class="gosubmit__btn">Submit now</a>
HTML;

    }

    protected function get_template()
    {
        return 'modules/property/sections/call-to-action.twig';
    }

    protected function create_view(array $data)
    {
        return new CallToActionView($data, cf47_app());
    }

}