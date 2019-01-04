<?php

namespace cf47\themecore\user\viewmodel;

use cf47\themecore\timber\PostAdapter;
use cf47\themecore\user\FrontendFormManager;

class TemplateViewmodel extends PostAdapter
{

    public function form()
    {
        /** @var FrontendFormManager $profile_manager */
        $profile_manager = cf47rs_get('user.frontend_form');

        return $profile_manager->create_form()->createView();
    }

}