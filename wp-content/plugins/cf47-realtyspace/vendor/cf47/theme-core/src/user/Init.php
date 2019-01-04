<?php

namespace cf47\themecore\user;

use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['user.repo'] = function ($c) {
            return new Repository();
        };

        $app['user.twig_extension'] = function ($c) {
            return new TwigExtension($c['user.repo']);
        };

        $app['user.frontend_form'] = function ($c) {
            return new FrontendFormManager($c['form_factory'], $c['user.repo']);
        };
    }

    public function boot(Application $app)
    {
        $this->addToTwig($app);
        $this->register_user_profile_fields();
    }

    private function addToTwig(Application $app)
    {
        add_filter('timber/twig',
            function (\Twig_Environment $twig) use ($app) {
                /** @var TwigExtension $extension */
                $extension = $app['user.twig_extension'];
                $twig->addExtension($extension);

                return $twig;
            }
        );
    }

    private function register_user_profile_fields()
    {
        $field_renderer = function ($user) {
            ?>
            <h3><?php esc_html_e("Extra profile information", "realtyspace"); ?></h3>
            <table class="form-table">
                <tr>
                    <th><label for="phone"><?php esc_html_e("Phone", "realtyspace"); ?></label></th>
                    <td>
                        <input type="text" name="phone" id="phone" class="regular-text"
                               value="<?php echo esc_attr(get_the_author_meta('phone', $user->ID)); ?>"/><br/>
                        <span class="description"><?php esc_html_e("Please enter your phone.", "realtyspace"); ?></span>
                    </td>
                </tr>
            </table>
            <?php
        };

        $saver = function ($user_id) {
            $saved = false;
            if (current_user_can('edit_user', $user_id)) {
                update_user_meta($user_id, 'phone', $_POST['phone']);
                $saved = true;
            }

            return true;
        };

        add_action('show_user_profile', $field_renderer);
        add_action('edit_user_profile', $field_renderer);

        add_action('personal_options_update', $saver);
        add_action('edit_user_profile_update', $saver);

    }
}
