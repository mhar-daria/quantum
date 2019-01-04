<?php
namespace cf47\themecore\user;

use cf47\themecore\controller\AbstractViewModel;

class Entity extends AbstractViewModel
{
    /**
     * @var \TimberUser
     */
    protected $timberUser;

    public function __construct(\TimberUser $timberUser)
    {
        $this->timberUser = $timberUser;
    }

    public function name()
    {
        return $this->timberUser->name();
    }

    public function profile_edit_url()
    {
        return admin_url('profile.php');
    }

    public function logout_url($redirect_to = null)
    {
        if ($redirect_to === null) {
            $redirect_to = home_url();
        }

        return wp_logout_url($redirect_to);
    }

    public function equals(Entity $user)
    {
        return $user->id() === $this->id();
    }

    public function id()
    {
        return $this->timberUser->id;
    }

    public function first_name()
    {
        return $this->timberUser->first_name;
    }

    public function last_name()
    {
        return $this->timberUser->last_name;
    }

    public function description()
    {
        return $this->timberUser->description;
    }

    public function phone()
    {
        return $this->timberUser->get_meta_field('phone');
    }

    public function password()
    {
        return $this->timberUser->user_pass;
    }

    public function email()
    {
        return $this->timberUser->user_email;
    }

    public function nickname()
    {
        return $this->timberUser->nickname;
    }

    public function website()
    {
        return $this->timberUser->user_url;
    }

}
