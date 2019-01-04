<?php
namespace cf47\themecore\helper;

class JsonResponse
{
    private $result = [];
    private $code;

    public function __construct($result, $code = 200)
    {
        $this->result = $result;
        $this->code = $code;
    }

    public function send()
    {
        status_header($this->code);
        wp_send_json([
            'result' => $this->result
        ]);
    }
}
