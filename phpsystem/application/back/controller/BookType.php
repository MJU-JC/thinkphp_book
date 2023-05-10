<?php
namespace app\back\controller;
use app\common\model\BookTypeModel;
use think\Exception;
use think\Request;

class BookType extends BackBase
{


    protected $request = null;
    protected $bookTypeModel;

    //控制层对象初始化：注入业务逻辑层对象等
    public function _initialize() {
        parent::_initialize();
        $this->request = Request::instance();
        $this->bookTypeModel = new BookTypeModel();
    }

    /*添加图书类型*/
    public function add(){
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
            return view("bookType/bookType_add");
        }
    }


    /*ajax方式查询图书类型信息*/
    public function listAll() {
        $bookRs = $this->bookTypeModel->queryAllBookType();
        echo json_encode($bookRs);
    }


    /*ajax方式按照查询条件分页查询图书类型信息*/
    public function backList() {
        if($this->request->isPost()) {
            if($this->request->param("page") != null)
                $this->currentPage = $this->request->param("page");
            if($this->request->param("rows") != null)
                $this->bookTypeModel->setRows($this->request->param("rows"));
            $bookTypeRs = $this->bookTypeModel->queryBookType($this->currentPage);
            /*当前查询条件下总记录数*/
            $data["total"] =$this->bookTypeModel->recordNumber;
            $data["rows"] = $bookTypeRs;
            echo json_encode($data);
        } else {
            return view("bookType/bookType_query");
        }
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
            $count = $this->bookTypeModel->deleteBookTypes($bookTypeIds);
            $success = true;
            $message = $count."条记录删除成功";
            $this->writeJsonResponse($success, $message);
        } catch (Exception $ex) {
            $message = "有记录存在外键约束,删除失败";
            $this->writeJsonResponse($success, $message);
        }
    }


    /*按照查询条件导出图书类型信息到Excel*/
    public function outToExcel() {

        $bookTypeRs = $this->bookTypeModel->queryOutputBookType();
        $expTableData = [];
        foreach($bookTypeRs as $bookTypeRow) {
            $expTableData[] = $bookTypeRow;
        }
        $xlsName = "BookType";
        $xlsCell = array(
            array('bookTypeId','图书类别id','int'),
            array('bookTypeName','图书类别名称','string'),
        );//查出字段输出对应Excel对应的列名
        //公共方法调用
        $this->export_excel($xlsName,$xlsCell,$expTableData);
    }





}