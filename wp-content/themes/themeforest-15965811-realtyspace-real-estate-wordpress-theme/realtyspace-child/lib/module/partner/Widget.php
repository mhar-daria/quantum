<?php
namespace cf47\theme\realtyspace\module\partner;

use cf47\plugin\realtyspace\module\partner\Repository;
use cf47\themecore\helper\Widget as BaseWidget;

class Widget extends BaseWidget
{
    public function __construct()
    {
        parent::__construct('cf47rs-partners', esc_html__('Partners', 'realtyspace'));
        $this->field_defaults = [
            'title' => null,
            'partner_ids' => [],
            'subtext' => null,
            'limit' => 5
        ];
        $this->template_path = 'modules/partner/widgets/partners/widget.twig';
        $this->form_template_path = 'modules/partner/widgets/partners/form.twig';
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        /** @var Repository $partner_repo */
        $partner_repo = cf47rs_get('partner.repo');
        $fields = $this->get_instance_fields($instance);

        if (!empty($fields['partner_ids'])) {
            $partners = $partner_repo->find_by_id($fields['partner_ids']);
        } else {
            $partners = $partner_repo->find_all();
        }

        $this->add_js_vars([
            'limit' => $fields['limit'],
        ]);

        $this->render_widget([
            'title' => $fields['title'],
            'subtext' => $fields['subtext'],
            'partners' => $partners,
            'widget' => $args
        ]);
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update($new_instance, $old_instance)
    {
        return $this->update_fields($new_instance, $old_instance);
    }
}

