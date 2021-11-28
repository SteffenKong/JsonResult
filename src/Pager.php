<?php
namespace Steffenkong\JsonResult;

/**
 * 分页对象
 */
class Pager
{
    private $page;
    private $pageSize;
    private $totalPage;
    private $total;

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return mixed
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param mixed $pageSize
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @return mixed
     */
    public function getTotalPage()
    {
        return $this->totalPage;
    }

    /**
     * @param mixed $totalPage
     */
    public function setTotalPage($totalPage)
    {
        $this->totalPage = $totalPage;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }


    /**
     * @param int $page
     * @param int $pageSize
     * @param int $total
     * 初始化分页对象数据
     */
    public function __construct(int $page,int $pageSize,int $total) {
        $this->setPage($page);
        $this->setPageSize($pageSize);
        $this->setTotal($total);
        $this->setTotalPage($pageSize > 0 ? ceil($total / $pageSize) : 0);
    }

    /**
     * 获取分页对象数据
     */
    public function getPagerInfo() :array {
        return [
            'page' => $this->getPage(),
            'pageSize' => $this->getPageSize(),
            'total' => $this->getTotal(),
            'totalPage' => $this->getTotalPage()
        ];
    }
}