<?php
/** @var WPBakeryShortCode $this */
/** @var string $content */
/** @var callable $renderer */

$renderer = $this->settings('renderer');
echo $renderer($this, $content);