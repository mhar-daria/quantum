<?php
namespace cf47\themecore\helper;

class JsonValidationResponse
{
    private $valid;
    /**
     * @var null
     */
    private $message;

    public function __construct($valid, $message = null)
    {
        $this->valid = $valid;
        $this->message = $message;
    }

    public function send()
    {
        status_header(200);
        $data = [
            'valid' => $this->valid
        ];
        if ($this->message) {
            $data['message'] = $this->message;
        }
        wp_send_json($data);
    }
}
