<?php
namespace Steffenkong\JsonResult;

/**
 * 字符串工具
 */
class StringUtils
{

    /**
     * @param array $data
     * @return false|string
     * 数组转json字符串
     */
    public static function jsonEncode(array $data) {
        return \json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param string $data
     * @return mixed
     * json字符串转数组
     */
    public static function jsonDecode(string $data) {
        return \json_decode($data,true);
    }
}