<?php

namespace cf47\theme\realtyspace\module\dsidxpress;

use cf47\theme\realtyspace\module\dsidxpress\customizer\SingleOptions;
use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {

    }

    public function boot(Application $app)
    {
        if (!defined("DSIDXPRESS_OPTION_NAME")) {
            return;
        }

        add_action('widgets_init', function (){
            unregister_widget('dsSearchAgent_SingleListingWidget');
        });

        add_filter('option_'.DSIDXPRESS_OPTION_NAME, function ($value){

            if (!is_array($value)){
                return $value;
            }

            $template_fields = [
                'DetailsTemplate',
                'ResultsTemplate',
                'AdvancedTemplate',
                'IDXTemplate',
                '404Template',
            ];

            foreach ($template_fields as $template_field){
                if (array_key_exists($template_field, $value)){
                    continue;
                }

                $value[$template_field] = 'page-templates/template-dsidxpress.php';
            }

            return $value;
        });

        $single_options = new SingleOptions(
            $app['common.customizer.archive_option_builder'],
            $app['common.hero_unit.option_builder'],
            $app['ihomefinder.template']
        );
        $single_options->register();

    }
}