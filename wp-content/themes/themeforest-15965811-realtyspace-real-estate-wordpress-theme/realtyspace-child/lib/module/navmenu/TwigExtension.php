<?php
namespace cf47\theme\realtyspace\module\navmenu;

use cf47\theme\realtyspace\module\navmenu\mainmenu\Builder;

class TwigExtension extends \Twig_Extension
{

    /**
     * @var Builder[]
     */
    private $builders;

    public function __construct(array $builders)
    {

        /** @var Builder[] $builders */
        foreach ($builders as $builder) {
            foreach ($builder->get_locations() as $location) {
                $this->builders[$location] = $builder;
            }
        }
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('nav_menu', function ($name) {
                if (array_key_exists($name, $this->builders)) {
                    $builder = $this->builders[$name];
                    $builder->add_filters();

                    return wp_nav_menu($builder->get_args($name));
                } else {
                    return '';
                }
            }, ['is_safe' => ['html']])
        ];
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'navmenu_extension';
    }
}
