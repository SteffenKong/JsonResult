<?php
namespace Steffenkong\JsonResult;

use Illuminate\Http\JsonResponse;

/**
 * JSON工具类
 */
class Result
{

    // 响应的应用信息
    private $message;

    // 应用系统响应码
    private $code;

    // 操作是否属于成功
    private $success;

    // 额外数据
    private $extra;

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * @return mixed
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return null
     */
    public function getPager()
    {
        return $this->pager;
    }

    // 数据集
    private $data;

    // 分页对象
    private $pager = null;

    public function setPager(Pager $pager) {
        $this->pager = $pager;
        return $this;
    }

    public function data(array $data) {
        $this->data = $data;
        return $this;
    }

    public function extra(array $extra) {
        $this->extra = $extra;
        return $this;
    }

    public function success(bool $isSuccess) {
        $this->success = $isSuccess;
        return $this;
    }

    public function code($code) {
        $this->code = $code;
        return $this;
    }

    /**
     * @param $message
     * @return $this
     */
    public function message($message) {
        $this->message = $message;
        return $this;
    }

    public function output() {
        $output = [
            'code' => $this->getCode(),
            'message' => $this->getMessage(),
            'success' => $this->getSuccess()
        ];

        if (!empty($this->getData())) {
            $output['data'] = $this->getData();
        }

        if (!empty($this->getExtra())) {
            $output['extra'] = $this->getExtra();
        }

        if (!empty($this->getPager()) && $this->getPager() !== null) {
            $output['pager'] = $this->getPager()->getPagerInfo();
        }

        $jsonResponse = new JsonResponse();
        $jsonResponse->setJson(StringUtils::jsonEncode($output));
        return $jsonResponse->send();
    }


    /**
     * @return Result
     * 构造执行成功的json
     */
    public static function ok(): Result
    {
        $result = new self();
        $code = '000';
        $result->code($code)->message(ResponseCode::CODE_MESSAGE_MAP[$code])->success(true);
        return $result;
    }


    /**
     * @return Result
     * 构造执行失败的json
     */
    public static function fail(): Result
    {
        $result = new self();
        $code = '001';
        $result->code($code)->message(ResponseCode::CODE_MESSAGE_MAP[$code])->success(false);
        return $result;
    }


    /**
     * @param int $page
     * @param int $pageSize
     * @param int $total
     * @return Result
     * 构造数据分页格式的json
     */
    public static function pager(int $page,int $pageSize,int $total): Result
    {
        $result = new self();
        $code = '000';
        $result->code($code)->message(ResponseCode::CODE_MESSAGE_MAP[$code])->success(true)->setPager(new Pager($page,$pageSize,$total));
        return $result;
    }
}