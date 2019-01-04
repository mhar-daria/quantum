<?php
namespace cf47\theme\realtyspace\module\user;

use cf47\themecore\helper\Widget as BaseWidget;
use Symfony\Component\Validator\Constraints as Constraint;

class UserWidget extends BaseWidget
{
    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        parent::__construct('cf47-user-profile', esc_html__('User profile', 'realtyspace'));
        $this->template_path = 'modules/user/widgets/user-profile/widget.twig';
        $this->form_template_path = 'modules/user/widgets/user-profile/form.twig';
    }

    public function config()
    {
        $this->field_defaults = [
            'title' => null,
            'subtext' => null,
        ];

    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        $fields = $this->get_instance_fields($instance);
        $this->render_widget([
            'title' => $fields['title'],
            'subtext' => $fields['subtext'],
            'widget' => $args
        ], true);
    }
}

