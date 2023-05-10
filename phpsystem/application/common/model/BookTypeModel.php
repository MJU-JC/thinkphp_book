<?php
namespace  app\common\model;
use think\Model;

class BookTypeModel extends  Model
{
    /*关联表名*/
    protected $table  = 't_bookType';

    /*每页显示记录数目*/
    public $rows = 6;
    /*保存查询后总的页数*/
    public $totalPage;
    /*保存查询到的总记录数*/
    public $recordNumber;


    public function setRows($rows) {
        $this->rows = $rows;
    }


    /*添加图书类型记录*/
    public function addBookType($bookType) {
        $this->insert($bookType);
    }

    /*更新图书类型记录*/
    public function updateBookType($bookType) {
        $this->update($bookType);
    }

    /*删除多条图书类型信息*/
    public function deleteBookTypes($bookTypeIds){
        $bookTypeIdArray = explode(",",$bookTypeIds);
        foreach ($bookTypeIdArray as $bookTypeId) {
            $this->bookTypeId = $bookTypeId;
            $this->delete();
        }
    	return count($bookTypeIdArray);
    }

    /*根据主键获取图书类型记录*/
    public function getBookType($bookTypeId) {
        $bookType = BookTypeModel::where("bookTypeId",$bookTypeId)->find();
        return $bookType;
    }


    /*前台按照查询条件分页查询图书类型信息*/
    public function queryBookType($currentPage) {
        $startIndex = ($currentPage-1) * $this->rows;
        $bookTypeRs = BookTypeModel::where(null)->limit($startIndex,$this->rows)->select();
        $bookTypeArray = [];
        foreach ($bookTypeRs as $bookTypeRow)
            $bookTypeArray[] = $bookTypeRow->data;
        /*计算总的页数和总的记录数*/
        $this->recordNumber = BookTypeModel::where(null)->count();
        $mod = $this->recordNumber % $this->rows;
        $this->totalPage = (int)($this->recordNumber / $this->rows);
        if($mod != 0) $this->totalPage++;
        return $bookTypeRs;
    }

    /*前台按照查询条件分页查询图书类型信息*/
    public function queryOutputBookType() {
        $where = null;
        $bookTypeRs = BookTypeModel::where($where)->select();
        $bookTypeArray = [];
        foreach ($bookTypeRs as $bookTypeRow)
            $bookTypeArray[] = $bookTypeRow->data;

        return $bookTypeRs;
    }

    /*查询所有图书类型记录*/
    public function queryAllBookType(){
        $bookTypeRs = BookTypeModel::where(null)->select();
        //$bookTypeArray = [];
        //foreach ($bookTypeRs as $bookTypeRow)
            //$bookTypeArray[] = $bookTypeRow->data;
        return $bookTypeRs;
    }

}