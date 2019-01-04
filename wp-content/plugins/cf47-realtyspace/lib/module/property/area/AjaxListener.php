<?php

namespace cf47\plugin\realtyspace\module\property\area;

use cf47\themecore\Ajax;
use cf47\themecore\helper\JsonResponse;
use Respect\Validation\Validator as v;
use Symfony\Component\HttpFoundation\Request;

class AjaxListener
{
    const ROUTE_NAME = 'switchAreaUnit';
    const ARGUMENT_NAME = 'unit';
    /**
     * @var Ajax
     */
    private $ajax;
    /**
     * @var Manager
     */
    private $manager;

    public function __construct(Ajax $ajax, Manager $manager)
    {
        $this->ajax = $ajax;
        $this->manager = $manager;
    }

    public function listen()
    {
        $this->ajax->add_listener(
            self::ROUTE_NAME,
            function (Request $request) {
                $unit = $request->query->get(self::ARGUMENT_NAME);
                v::trueVal()->assert($this->manager->is_valid_unit($unit));
                $this->manager->set_unit($unit);

                return new JsonResponse([]);
            }
        );
    }
}
