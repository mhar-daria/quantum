<?php

namespace cf47\themecore;

use Respect\Validation\Validator as v;

class FileUploader
{
    public function __construct()
    {

    }

    public function upload($file_id, $post_id = 0)
    {
        v::key($file_id)->assert($_FILES);
        v::intVal()->min(0)->assert($post_id);

        // These files need to be included as dependencies when on the front end.
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/media.php');

        $attachment_id = media_handle_upload($file_id, $post_id);

        if ($attachment_id instanceof \WP_Error) {
            cf47_errlog_throw('File upload failed', $attachment_id->get_error_messages());
        }

        return $attachment_id;
    }
}
