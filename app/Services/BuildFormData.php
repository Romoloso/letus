<?php
namespace App\Services;

/**
 * 构造一个multipart/form-data格式的类
 * 参考地址：https://blog.izgq.net/archives/1029/
 */
class BuildFormData
{
    /**
     * 带请求的 URI
     * @var string
     */
    protected $url;

    /**
     * 分界符
     * @var string
     */
    protected $boundary;

    /**
     * 实例化自身
     * @var object
     */
    protected $instance;

    /**
     * 实例化类
     *
     * @param string $url      请求的 url
     * @param null|string $boundary 自定义分界符
     */
    public function __construct($url = '', $boundary = null)
    {
        $this->url = $url;

        $boundary = substr($_SERVER['CONTENT_TYPE'], strpos($_SERVER['CONTENT_TYPE'], "=") + 1);
        $this->boundary = '--' . $boundary;
    }

    /**
     * 发送请求
     *
     * @param string $url      请求地址
     * @param string $boundary 分界符
     * @param $post
     * @param $file
     * @return mixed
     */
    public function request($post = [], $file = [])
    {
        return curl_request($this->getStr($post, $file), $this->url, $this->boundary);
    }

    /**
     * 拼接后的字符串
     *
     * @param array $post
     * @param array $file
     * @return string
     */
    public function getStr($post, $file = [])
    {
        $str = '';
        $str .= array_filter($post) ? $this->form($post) : '';
        $str .= array_filter($file) ? $this->file($file) : '';

        $str .= $this->boundary . "--\r\n";

        return $str;
    }

    /**
     * 拼接非表单文件
     *
     * @param  array $data 带拼接的数组
     * @return void|string
     */
    private function form($data)
    {
        if (! is_array($data) || ! array_filter($data)) return;

        $str = '';

        foreach ($data as $key=>$value) {
            if (! is_array($value)) {
                $str .= $this->boundary . "\r\n";
                $str .= 'Content-Disposition: form-data; name="' . $key . '"' . "\r\n\r\n";
                $str .= $value . "\r\n";
            } else {
                // 可能是多维数组
                $result = [];
                $this->convert_array_key($value, $key, $result);

                foreach ($result as $k=>$v) {
                    $str .= $this->boundary . "\r\n";
                    $str .= 'Content-Disposition: form-data; name="'.$k.'"' . "\r\n\r\n";
                    $str .= $v . "\r\n";
                }
            }
        }

        return $str;
    }

    /**
     * 拼接文件表单
     *
     *
     * @param  array $data
     * @return void|string
     */
    private function file($data)
    {
        if (! is_array($data) || ! array_filter($data)) return;

        $str = '';

        foreach ($data as $key=>$value) {
            if (! is_array($value['type'])) {
                $str .= $this->boundary . "\r\n";
                $str .= 'Content-Disposition: form-data; name="'.$key.'"; filename="' . $value['name'] . '"' . "\r\n";
                $str .= 'Content-type: ' . $value['type'] . "\r\n\r\n";
                $str .= file_get_contents($value['tmp_name']) . "\r\n";
            } else {
                // 可能是多维数组
                $result = [];
                $this->convert_array_key($value['type'], '', $result);

                foreach ($result as $k=>$v) {
                    $filename = $this->query_multidimensional_array($value['name'], $k);
                    $type = $this->query_multidimensional_array($value['type'], $k);
                    $tmp_name = $this->query_multidimensional_array($value['temp_name'], $k);
                    $str .= $this->boundary . "\r\n";
                    $str .= 'Content-Disposition: form-data; name="'.$key . $k .'"; filename="'. $filename .'"' . "\r\n";
                    $str .= 'Content-type: ' . $type . "\r\n\r\n";
                    $str .= file_get_contents($tmp_name) . "\r\n";
                }
            }
        }

        return $str;
    }

    /**
     * 直接访问多维数组元素
     *
     * @param  [type] &$array
     * @param  [type] $query  [0][0], [0][1]
     * @return string
     */
    private function query_multidimensional_array(&$array, $query)
    {
        $query = explode('][', substr($query, 1, -1));
        $temp = $array;
        foreach ($query as $key) {
            $temp = $temp[$key];
        }

        return $temp;
    }

    /**
     * 将二维数组转为一维数组
     * ['a'=>['b'=>'c']] => ['a']['b'] => 'c'
     *
     * @param  [type] $node    [description]
     * @param  [type] $prefix  [description]
     * @param  [type] &$result [description]
     */
    private function convert_array_key($node, $prefix, &$result)
    {
        if (! is_array($node)) {
            $result[$prefix] = $node;
        } else {
            foreach ($node as $k=>$v) {
                $this->convert_array_key($v, $prefix . '[' . $k . ']', $result);
            }
        }
    }

    /**
     * 二维数组转为一维数组时，a[][]变为a[0][0],会导致 POST BODY 的长度发生变化，
     * 如果用于发包，需要重新计算 Content-Length
     *
     */
    private function calculateLengthForFormData()
    {
        if (@$_SERVER['CONTENT_TYPE'] && strpos($_SERVER['CONTENT_TYPE'], "multipart/form-data") !== false) {
            $body = $this->getStr();
            $content_length = strlen($body);
        } else {
            $body = file_get_contents('php://input');
        }
    }
}
