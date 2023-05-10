<?php
namespace app\front\controller;
use think\Exception;
use think\Request;
use app\common\model\BookTypeModel;

class BookType extends Base
{


    protected $request = null;
    protected $bookTypeModel; //图书类型业务模型层

    //控制层对象初始化：注入业务逻辑层对象等
    public function _initialize() {
        parent::_initialize();
        $this->request = Request::instance();
        $this->bookTypeModel = new BookTypeModel();
    }


    /*添加图书类型信息*/
    public function frontAdd() {
        if($this->request->isPost()) {
            $message = "";
            $success = false;
            $bookType = $this->getBookTypeForm();
            try {
                $this->bookTypeModel->addBookType($bookType);
                $message = "图书类型添加成功!";
                $success = true;
                $this->writeJsonResponse($success, $message);
            } catch (Exception $ex) {
                $message = "图书类型添加失败!";
                $this->writeJsonResponse($success,$message);
            }
        } else {
            return $this->fetch('booktype/frontAdd');
        }
    }


    /*ajax方式查询图书类型信息*/
    public function listAll() {
        $bookRs = $this->bookTypeModel->queryAllBookType();
        echo json_encode($bookRs);
    }


    /*前台按照查询条件分页查询图书类型信息*/
    public function frontlist() {
        if($this->request->param("currentPage") != null)
            $this->currentPage = $this->request->param("currentPage");
        $bookTypeRs = $this->bookTypeModel->queryBookType($this->currentPage);
        $this->assign("bookTypeRs",$bookTypeRs);
        /*获取到总的页码数目*/
        $this->assign("totalPage",$this->bookTypeModel->totalPage);
        /*当前查询条件下总记录数*/
        $this->assign("recordNumber", $this->bookTypeModel->recordNumber);
        $this->assign("currentPage",$this->currentPage);
        $this->assign("rows",$this->bookTypeModel->rows);
        return $this->fetch('booktype/frontlist');
    }


    /*前台查询图书类型信息*/
    public function frontshow() {
        $bookTypeId = input("bookTypeId");
        $bookType = $this->bookTypeModel->getBookType($bookTypeId);
        $this->assign("bookType",$bookType);
        return $this->fetch("booktype/frontshow");
    }

    /*更新图书类型信息*/
    public function update() {
        $message = "";
        $success = false;
        if($this->request->isPost()) {
            $bookType = $this->getBookTypeForm();
            try {
                $this->bookTypeModel->updateBookType($bookType);
                $message = "图书类型更新成功!";
                $success = true;
                $this->writeJsonResponse($success, $message);
            } catch (Exception $ex) {
                $message = "图书类型更新失败!";
                $this->writeJsonResponse($success,$message);
            }
        } else {
            /*根据主键bookTypeId获取BookType对象*/
            $bookTypeId = input("bookTypeId");
            $bookType = $this->bookTypeModel->getBookType($bookTypeId);
            echo json_encode($bookType);
        }
    }


    /*删除多条图书类型记录*/
    public function deletes() {
        $message = "";
    	$success = false;
    	$bookTypeIds = input("bookTypeIds");
        try {
            echo $bookTypeIds;
            die;
            $count = $this->bookTypeModel->deleteBookTypes($bookTypeIds);
        	$success = true;
        	$message = $count."条记录删除成功";
        	$this->writeJsonResponse($success, $message);
        } catch (Exception $ex) {
            $message = "有记录存在外键约束,删除失败";
            $this->writeJsonResponse($success, $message);
        }
    }

}