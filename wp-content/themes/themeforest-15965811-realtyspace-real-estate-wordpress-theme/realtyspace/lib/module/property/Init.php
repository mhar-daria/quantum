<?php

namespace cf47\theme\realtyspace\module\property;

use cf47\plugin\realtyspace\module\property\section\calltoaction\CallToActionConfig;
use cf47\theme\realtyspace\module\property\customizer\ArchiveOptions;
use cf47\theme\realtyspace\module\property\customizer\SingleOptions;
use cf47\theme\realtyspace\module\property\widget\Filter;
use cf47\theme\realtyspace\module\property\widget\Listing;
use cf47\themecore\Application;
use cf47\themecore\section\Registry;
use cf47\themecore\ServiceProviderInterface;
use cf47\themecore\Site;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app->register_module(new submit\Init());
    }

    public function boot(Application $app)
    {
        $this->register_sections($app);
        $this->register_options($app);
        $this->register_dropzone_translations();

        register_widget(Filter::FQCN());
        register_widget(Listing::FQCN());

        add_action('wp', function(){
            if ( is_post_type_archive('cf47rs_property')){
                add_action('wp_enqueue_scripts',
                    function () {
                        wp_enqueue_script('google-maps', false, [], false, true);
                    },
                    101);
            }
        });

    }

    private function register_sections(Application $app)
    {
        /** @var Registry $registry */
        $registry = $app['core.section.registry'];
        $registry->register_section($app['property.section.hero_config']);
        $registry->register_section($app['property.section.group_config']);
        $registry->register_section($app['property.section.search_config']);

        $registry->register_section($app['property.section.slider_config']);
        $registry->register_section($app['property.section.map_config']);

        $registry->register_section(new CallToActionConfig(
            $app['options'],
            $app['core.section.panel'],
            $app['core.section.prefix']
        ));
    }

    private function register_options(Application $app)
    {
        $archive_options = new ArchiveOptions(
            $app['common.customizer.archive_option_builder'],
            $app['common.hero_unit.option_builder'],
            $app['property.post_type']
        );
        $archive_options->register();

        $single_options = new SingleOptions(
            $app['common.customizer.archive_option_builder'],
            $app['common.hero_unit.option_builder'],
            $app['property.post_type']
        );
        $single_options->register();
    }

    private function register_dropzone_translations()
    {
        Site::add_i18n_string('dictDefaultMessage', esc_html__('Drop files here to upload', 'cf47placeholder'));
        Site::add_i18n_string('dictFallbackMessage', esc_html__('Your browser does not support drag\'n\'drop file uploads.', 'cf47placeholder'));
        Site::add_i18n_string('dictFallbackText', esc_html__('Please use the fallback form below to upload your files like in the olden days.', 'cf47placeholder'));
        Site::add_i18n_string('dictInvalidFileType', esc_html__('You can\'t upload files of this type.', 'cf47placeholder'));
        Site::add_i18n_string('dictResponseError', esc_html__('Server responded with {{statusCode}} code.', 'cf47placeholder'));
        Site::add_i18n_string('dictCancelUpload', esc_html__('Cancel upload', 'cf47placeholder'));
        Site::add_i18n_string('dictCancelUploadConfirmation', esc_html__('Are you sure you want to cancel this upload?', 'cf47placeholder'));
        Site::add_i18n_string('dictRemoveFile', esc_html__('Remove file', 'cf47placeholder'));
        Site::add_i18n_string('dictMaxFilesExceeded', esc_html__('You can not upload any more files.', 'cf47placeholder'));
    }
}
