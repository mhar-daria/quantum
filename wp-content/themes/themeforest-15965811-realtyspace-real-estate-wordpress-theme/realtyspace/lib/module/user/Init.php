<?php

namespace cf47\theme\realtyspace\module\user;

use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;
use cf47\themecore\vpage\Page;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
    }

    public function boot(Application $app)
    {
        register_widget(UserWidget::FQCN());
        $this->register_virtual_pages($app);
    }

    private function register_virtual_pages(Application $app)
    {
        // first page
        $app['virtual_page']
            ->addPage(new Page('/login/'))
            ->setTitle(esc_html__('Please login to access this page', 'cf47placeholder'))
            ->setTemplate('/modules/core/login.twig')
            ->setHandler(function (Application $app){
                if (is_user_logged_in()){
                    return new RedirectResponse(home_url());
                }

                return [
                    'page' => $app['page.repo']->find_from_loop()
                ];
            });
        ;

        $app['virtual_page']
            ->addPage(new Page('/register/'))
            ->setTitle(esc_html__('Account registration', 'cf47placeholder'))
            ->setTemplate('/modules/core/register.twig')
            ->setHandler(function (Application $app){
                if (is_user_logged_in()){
                    return new RedirectResponse(home_url());
                }

                return [

                ];
            });
        ;
    }
}