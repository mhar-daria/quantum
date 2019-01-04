<?php

namespace cf47\theme\realtyspace\module\agent\viewmodel;

use cf47\themecore\user;

class UserViewModel
{
    /**
     * @var \cf47\themecore\user\Entity
     */
    private $user;

    public function __construct(user\Entity $entity)
    {
        $this->user = $entity;
    }

    public function id()
    {
        return $this->user->id();
    }

    public function link()
    {
        return false;
    }

    public function name()
    {
        $first_name = $this->user->first_name();
        $last_name = $this->user->last_name();
        if (!empty($first_name) || !empty($last_name)) {
            return trim($first_name . ' ' . $last_name);
        }

        return $this->user->name();
    }

    public function job_title()
    {
        return false;
    }

    public function is_user()
    {
        return true;
    }

    public function contact_numbers()
    {
        $output = [];
        $phone = $this->user->phone();
        if (!empty($phone)) {
            $output[] = [
                'type' => esc_html__('Tel.', 'realtyspace'),
                'number' => $phone
            ];
        }

        return $output;
    }

    public function email()
    {
        return $this->user->email();
    }

    public function additional_fields()
    {
        $output = [];
        $website = $this->user->website();
        if (!empty($website)) {
            $output[] = [
                'label' => esc_html__('Website', 'realtyspace'),
                'value' => $website
            ];
        }

        return $output;
    }

    public function content()
    {
        return $this->user->description();
    }

}