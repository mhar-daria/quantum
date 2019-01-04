<?php

namespace cf47\plugin\realtyspace\module\property\customizer;

use cf47\themecore\controller\AbstractViewModel;
use cf47\themecore\Options;

class PropertyCardView extends AbstractViewModel
{
    /**
     * @var \cf47\themecore\Options
     */
    private $options;

    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    public function hover_style()
    {
        return $this->options->property_card_hover_style;
    }

    public function hover_fields()
    {
        return $this->options->property_card_hover_fields;
    }

    public function hover_show_desciption()
    {
        return $this->options->property_card_hover_show_descr;
    }

    public function hover_show_date()
    {
        return $this->options->property_card_hover_show_added_date;
    }

    public function excerpt_length(){
        return (int) $this->options['property_card_description_length'];
    }

}