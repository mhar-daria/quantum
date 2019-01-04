<?php

namespace cf47\themecore\kirki\control;

class IconDropdown extends \Kirki_Customize_Control
{
    public $type = 'icon_select2';

    public static function FQCN()
    {
        return get_called_class();
    }

    public function enqueue()
    {
        wp_enqueue_script('select2');
        wp_enqueue_style('font-awesome');
    }

    /**
     * Render the control's content.
     */
    protected function render_content()
    {
    }

    protected function content_template()
    {
        ?>
        <# if ( data.tooltip ) { #>
            <a href="#" class="tooltip hint--left" data-hint="{{ data.tooltip }}"><span class='dashicons dashicons-info'></span></a>
            <# } #>
                <label>
                    <# if ( data.label ) { #>
                        <span class="customize-control-title">{{ data.label }}</span>
                        <# } #>
                            <# if ( data.description ) { #>
                                <span class="description customize-control-description">{{{ data.description }}}</span>
                                <# } #>
                                    <input type="hidden" value="{{ data.value }}" data-reset_value="{{ data.default }}">
                </label>
        <?php
    }

}