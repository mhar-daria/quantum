<?php
namespace cf47\themecore\helper;

class JsonErrorResponse extends JsonResponse
{
    private $message;
    private $data;
    private $code;

    public function __construct($message, $data = [], $error_code = null, $code = 400)
    {
        $this->message = $message;
        $this->code = $code;
        $this->data = $data;
    }

    public function send()
    {
        status_header($this->code);
        $data = [
            'error' => $this->message
        ];
        if (!empty($this->data)) {
            $data['result'] = $this->data;
        }
        wp_send_json($data);
    }
}
