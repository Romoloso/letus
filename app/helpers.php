<?php
if (! function_exists('curl_request')) {
    /**
     * cURL 获取数据
     *
     * @param  array|string   $data      发送的数据
     * @param  string  $url              请求的地址
     * @param  string|null  $boundary    分界符
     * @param  boolean $method           请求方式 true: post请求，false: get请求
     * @param  integer $body_type        文本类型 1：form-data; 2：x-www-form-urlencoded
     * @return mixed
     */
    function curl_request($data, $url, $boundary = null, $method = true, $body_type = 1) {
        $url = $method === false ? $url . '?' . http_build_query($data, '', '&') : $url;
        $data = $body_type === 1 ? $data : http_build_query($data, '', '&');

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: multipart/form-data; boundary=" . $boundary,
            "Content-Length: " . strlen($data)
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $result = curl_exec($ch);
        if ($errNo = curl_errno($ch)) {
            print_r(curl_error($ch));
        }

        curl_close($ch);

        return $result;
    }
}