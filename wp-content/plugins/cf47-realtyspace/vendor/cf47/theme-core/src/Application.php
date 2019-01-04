<?php
namespace cf47\themecore;

use Pimple\Container;

class Application extends Container
{

    protected $providers = [];
    protected $booted = false;

    /**
     * Registers a service provider.
     *
     * @param ServiceProviderInterface $provider A ServiceProviderInterface instance
     * @param array $values An array of values that customizes the provider
     *
     * @return Application
     */
    public function register_module(ServiceProviderInterface $provider, array $values = [])
    {
        $this->providers[] = $provider;

        $provider->register($this);

        foreach ($values as $key => $value) {
            $this[$key] = $value;
        }

        return $this;
    }

    /**
     * Boots all service providers.
     *
     * This method is automatically called by handle(), but you can use it
     * to boot all service providers when not handling a request.
     */
    public function boot()
    {
        if (!$this->booted) {
            foreach ($this->providers as $provider) {
                $provider->boot($this);
            }

            foreach ($this->providers as $provider) {
                if (method_exists($provider, 'after_boot')) {
                    $provider->after_boot($this);
                }
            }

            $this->booted = true;
        }
    }
}
