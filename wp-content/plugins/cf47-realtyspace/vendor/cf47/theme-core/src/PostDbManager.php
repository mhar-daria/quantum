<?php

namespace cf47\themecore;

class PostDbManager
{

    public function update($id, array $data)
    {
        $errors = wp_update_post(array_merge([
            'ID' => absint($id),
        ],
            $data),
            true);

        if (is_wp_error($errors)) {
            cf47_errlog('Errors during post update', $errors->get_error_messages());

            return false;
        }

        return true;
    }
}
