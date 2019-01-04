<?php
namespace cf47\plugin\realtyspace\module\property\currency;

class TwigExtension extends \Twig_Extension
{

    /**
     * @var Manager
     */
    private $currency_manager;
    /**
     * @var View
     */
    private $view;
    /**
     * @var Manager
     */
    private $manager;
    /**
     * @var PriceFormatter
     */
    private $formatter;
    /**
     * @var PriceConverter
     */
    private $price_converter;

    public function __construct(View $view, PriceFormatter $formatter, PriceConverter $price_converter)
    {
        $this->view = $view;
        $this->formatter = $formatter;
        $this->price_converter = $price_converter;
    }

    public function getGlobals()
    {
        return [
            'wpcurrency' => $this->view
        ];
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter(
                'price',
                function ($value, array $options = []) {
                    return $value;
                },
                ['is_safe' => ['html']]
            )
        ];
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'property_currency';
    }
}
