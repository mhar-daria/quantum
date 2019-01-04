<?php
namespace cf47\themecore\user;

class TwigExtension extends \Twig_Extension
{
    /**
     * @var Repository
     */
    private $repository;

    public function __construct(Repository $repository)
    {

        $this->repository = $repository;
    }

    public function getGlobals()
    {
        return [
            'current_user' => $this->repository->find_current(),
        ];
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'user_extension';
    }
}
