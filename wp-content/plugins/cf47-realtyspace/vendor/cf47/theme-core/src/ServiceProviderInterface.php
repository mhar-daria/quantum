<?php
namespace cf47\themecore;

interface ServiceProviderInterface
{
    public function register(Application $app);

    public function boot(Application $app);
}
