<?php

namespace cf47\themecore\timber;

interface PageEntityInterface
{
    public function id();

    public function title();

    public function preview();

    public function featured_image();
}
