<?php

namespace cf47\themecore\sharing;

use cf47\themecore\timber\PostAdapter;
use Symfony\Component\HttpFoundation\Request;

class SocialBuilder
{
    private static $iconServiceMap = [
        'plus' => 'google-plus',
    ];
    /**
     * @var Request
     */
    private $request;

    /**
     * SocialBuilder constructor.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function makePageShareable(PostAdapter $pageEntity, array $services = [])
    {
        $image = $pageEntity->featured_image();
        if ($image !== null){
            $image = $image->src('medium');
        }
        $socialPage = new \SocialLinks\Page([
            'url' => $this->request->getUri(),
            'title' => html_entity_decode($pageEntity->title()),
            'text' => $pageEntity->excerpt(),
            'image' => $image
        ]);

        $this->hook($socialPage);

        $output = [];
        foreach ($services as $service) {

            if (array_key_exists($service, self::$iconServiceMap)) {
                $iconName = self::$iconServiceMap[$service];
            } else {
                $iconName = $service;
            }

            try {
                $output[$iconName] = $socialPage->{$service}->shareUrl();
            } catch (\Exception $e) {
                continue;
            }
        }

        return $output;
    }

    private function hook(\SocialLinks\Page $socialPage)
    {

        add_action('wp_head',
            function () use ($socialPage) {
                foreach ($socialPage->openGraph() as $tag) {
                    if (!empty($tag)){
                    echo $tag . "\n";
                    }
                }
                echo "\n";
                foreach ($socialPage->twitterCard() as $tag) {
                    echo $tag . "\n";
                }
            });
    }
}
