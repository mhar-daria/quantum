<?php

namespace cf47\theme\realtyspace\module\ihomefinder;

use cf47\plugin\realtyspace\module\ihomefinder\Ihomefinder;
use cf47\theme\realtyspace\module\ihomefinder\customizer\SingleOptions;
use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;
use iHomefinderConstants;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['ihomefinder.template'] = 'page-templates/template-ihomefinder.php';

    }

    public function boot(Application $app)
    {
        if (!Ihomefinder::isEnabled()){
            return;
        }

        $this->set_default_template($app);
        $this->unregister_scripts();
        $this->unregister_widgets();
        $this->register_options($app);
    }

    private function register_options(Application $app)
    {
        $single_options = new SingleOptions(
            $app['common.customizer.archive_option_builder'],
            $app['common.hero_unit.option_builder'],
            $app['ihomefinder.template']
        );
        $single_options->register();
    }

    /**
     * @param \cf47\themecore\Application $app
     */
    private function set_default_template(Application $app)
    {

        $refl = new \ReflectionClass('iHomefinderConstants');
        foreach ($refl->getConstants() as $constant_name => $constant_value){
            if (strpos($constant_name, 'OPTION_VIRTUAL_PAGE_TEMPLATE_') === 0){
                $filter_name = 'default_option_' . $constant_value;
                add_filter($filter_name, function ($default) use ($app) {
                    if (!$default) {
                        return $app['ihomefinder.template'];
                    } else {
                        return $default;
                    }
                });
            }
        }

    }

    private function unregister_scripts()
    {
        add_action('init', function () {
            wp_deregister_script('ihf-bootstrap');
            wp_deregister_style('ihf-bootstrap');

            wp_deregister_script('chosen-js');
            wp_deregister_script('ihf-chosen-js');
            wp_deregister_style('ihf-chosen');
            wp_deregister_style('ihf-layout');
            wp_deregister_style('ihf-bundle-css');
        }, 11);

        add_action('wp_enqueue_scripts', function (){
            wp_dequeue_script('cf47rs-bs');
        }, 100);
    }

    private function unregister_widgets()
    {
        add_action('widgets_init', function (){
            unregister_widget('iHomefinderSocialWidget');
            unregister_widget('iHomefinderLinkWidget');
        });
    }

}