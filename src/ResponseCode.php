<?php
namespace Steffenkong\JsonResult;

/**
 * 响应码类
 */
class ResponseCode
{

    // 响应码
    public const SUCCESS = '000';
    public const ERROR = '001';

    // 响应码对应的消息
    public const CODE_MESSAGE_MAP = [
        self::SUCCESS => '执行成功',
        self::ERROR => '执行失败'
    ];
}