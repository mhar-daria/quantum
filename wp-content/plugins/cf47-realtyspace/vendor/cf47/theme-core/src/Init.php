<?php

namespace cf47\themecore;

use cf47\themecore\acf\Builder;
use cf47\themecore\configuration\PanelBuilder as ConfigPanelBuilder;
use cf47\themecore\customizer\RequestListener;
use cf47\themecore\form\AttachmentType;
use cf47\themecore\form\ChoiceExtension;
use cf47\themecore\form\DropzoneAttachmentType;
use cf47\themecore\form\DynamicRowType;
use cf47\themecore\form\FormExtension as CoreFormExtension;
use cf47\themecore\form\HoneypotType;
use cf47\themecore\form\MapType;
use cf47\themecore\form\RangeSliderType;
use cf47\themecore\helper\Filesystem;
use cf47\themecore\helper\PluginChecker;
use cf47\themecore\helper\UrlBuilder;
use cf47\themecore\helper\WpdbQueries;
use cf47\themecore\herounit\CustomizerOptionBuilder;
use cf47\themecore\option\PanelBuilder as OptionPanelBuilder;
use cf47\themecore\section\GeneralSectionBulder;
use cf47\themecore\section\PanelBuilder;
use cf47\themecore\section\Registry;
use cf47\themecore\sharing\SocialBuilder;
use cf47\themecore\taxonomy\Finder;
use Symfony\Bridge\Twig\Extension\FormExtension;
use Symfony\Bridge\Twig\Extension\TranslationExtension;
use Symfony\Bridge\Twig\Form\TwigRenderer;
use Symfony\Bridge\Twig\Form\TwigRendererEngine;
use Symfony\Component\Form\Extension\Csrf\CsrfExtension;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Form\Forms;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Csrf\CsrfTokenManager;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Validator\Validation;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        if (defined('CF47RS_COMPANION_ACTIVE')) {
            $app['has_companion'] = true;
        } else {
            $app['has_companion'] = false;
        }

        $app['param.theme_prefix'] = 'cf47rs';

        $app['core.acf.manager'] = function ($app) {
            return new AcfManager(
                $app['param.theme_prefix'],
                new Builder($app['param.theme_prefix']),
                $app['wpml.manager']
            );
        };

        $app['core.helper.plugin_checker'] = function ($app) {
            return new PluginChecker();
        };

        $app['core.helper.wpdb_queries'] = function ($app) {
            global $wpdb;

            return new WpdbQueries($wpdb);
        };
        $app['core.shortcode_builder'] = function ($c) {
            return new ShortcodeBuilder(
                $c['param.theme_prefix']
            );
        };

        $app['form_factory'] = function ($c) {
            $translator = new Translator('en');
            $tokenManager = new CsrfTokenManager();

            add_filter('timber/loader/paths',
                function ($paths) {
                    $paths[] = __DIR__ . '/../../../symfony/twig-bridge/Resources/views/Form';

                    return $paths;
                });

            add_filter('timber/loader/twig',
                function (\Twig_Environment $twig) use ($tokenManager, $translator) {
                    $formEngine = new TwigRendererEngine(['modules/core/form-themes/global.twig']);
                    $formEngine->setEnvironment($twig);
                    $twig->addExtension(new TranslationExtension($translator));
                    $twig->addExtension(new FormExtension(new TwigRenderer($formEngine, $tokenManager)));

                    return $twig;
                });

            return Forms::createFormFactoryBuilder()
                        ->addExtension(new CsrfExtension($tokenManager))
                        ->addExtension(new ValidatorExtension(Validation::createValidator()))
                        ->addTypes([
                            new RangeSliderType(),
                            new HoneypotType(),
                            new DropzoneAttachmentType(),
                            new AttachmentType(),
                            new MapType(),
                            new DynamicRowType()
                        ])
                        ->addTypeExtension(new ChoiceExtension())
                        ->addTypeExtension(new CoreFormExtension())
                        ->getFormFactory();
        };
        $app['form_factory'];

        $app['request'] = function ($c) {
            /** @var Session $session */
            $session = $c['session'];
            $request = Request::createFromGlobals();
            $request->setSession($session);

            return $request;
        };

        $app['session'] = function ($c) {
            return new Session();
        };

        $app['mailer'] = function ($c) {
            return new Mailer();
        };

        $app['feature_registry'] = function ($c) {
            return new FeatureRegistry();
        };

        $app['ajax'] = function ($c) {
            return new Ajax($c['param.theme_prefix'], $c['core.helper.url_builder']);
        };

        $app['jsbridge'] = function ($c) {
            return new JavascriptBridge($c['param.theme_prefix'], $c['core.helper.url_builder']);
        };

        $app['options'] = function ($c) {
            return new Options($c['core.customizer']);
        };

        $app['core.archive_helper'] = function ($c) {
            return new ArchiveHelper($c['request']);
        };

        $app['core.customizer'] = function ($c) {
            return new customizer\Manager(
                'realtyspace',
                [
                    'capability' => 'edit_theme_options',
                    'option_type' => 'theme_mod',
                ]
            );
        };

        $app['core.request_listener'] = function ($c) {
            return new RequestListener();
        };

        $app['core.social_builder'] = function ($c) {
            return new SocialBuilder($c['request']);
        };

        $app['core.section.prefix'] = 'home_layout';
        $app['core.section.registry'] = function ($c) {
            return new Registry($c['options']);
        };

        $app['core.section.panel'] = function ($c) {
            $panel = new PanelBuilder($c['core.customizer'], $c['core.section.prefix']);
            $panel = $panel->build();

            return $panel;
        };

        $app['core.section.general_section'] = function ($c) {
            return new GeneralSectionBulder(
                $c['core.section.registry'],
                $c['core.section.panel'],
                $c['core.section.prefix']
            );
        };

        $app['core.configuration.prefix'] = 'config';
        $app['core.configuration.panel'] = function ($c) {
            $panel = new ConfigPanelBuilder($c['core.customizer'], $c['core.configuration.prefix']);
            $panel = $panel->build();

            return $panel;
        };

        $app['core.option.panel'] = function ($c) {
            $panel = new OptionPanelBuilder($c['core.customizer']);
            $panel = $panel->build();

            return $panel;
        };

        $app['core.helper.url_builder'] = function ($c) {
            return new UrlBuilder($c['request']);
        };


        $app['filesystem'] = function ($c) {
            return new Filesystem($c['param.theme_prefix']);
        };

        $app['core.post_db_manager'] = function ($c) {
            return new PostDbManager();
        };

        $app['core.file_uploader'] = function ($c) {
            return new FileUploader();
        };

        $app['core.taxonomy.finder'] = function ($c) {
            return new Finder();
        };

        $app['core.transients_manager'] = function ($c) {
            return new TransientsManager($c['param.theme_prefix']);
        };

        $app['common.hero_unit.option_builder'] = function ($c) {
            return new CustomizerOptionBuilder($c['core.customizer'], $c['core.option.panel']);
        };

        $app['common.customizer.archive_option_builder'] = function ($c) {
            return new ArchiveOptionBuilder($c['core.customizer'], $c['core.option.panel']);
        };

        $app->register_module(new timber\Init());
        $app->register_module(new kirki\Init());
        $app->register_module(new wpml\Init());
        $app->register_module(new post\Init());
        $app->register_module(new page\Init());
        $app->register_module(new user\Init());
        $app->register_module(new vc\Init());
        $app->register_module(new auth\Init());
        $app->register_module(new vpage\Init());
        $app->register_module(new helper\Init());
    }

    public function boot(Application $app)
    {
        $this->init_session();
        $this->record_last_query($app);
        $app['core.request_listener']->listen();
    }

    private function init_session()
    {
        add_action('init', function () {
            if (!session_id()) {
                session_start();
            }
        });
    }

    private function record_last_query(Application $app)
    {
        $app['last_query'] = null;
        add_action('pre_get_posts',
            function (\WP_Query $query) use ($app) {
                $app['last_query'] = $query;
            });
    }

}
