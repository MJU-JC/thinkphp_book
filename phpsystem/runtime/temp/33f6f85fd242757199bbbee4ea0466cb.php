<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"C:\xampp\htdocs\phpsystem\public/../application/back\view\book\book_modify.html";i:1538318845;}*/ ?>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/backcss/book.css" />
<div id="book_editDiv">
    <form id="bookEditForm" enctype="multipart/form-data"  method="post">
        <div>
            <span class="label">图书条形码:</span>
            <span class="inputControl">
				<input class="textbox" type="text" id="book_barcode_edit" name="book_barcode" value="<?php echo $barcode; ?>" style="width:200px" />
			</span>
        </div>

        <div>
            <span class="label">图书名称:</span>
            <span class="inputControl">
				<input class="textbox" type="text" id="book_bookName_edit" name="book_bookName" style="width:200px" />

			</span>

        </div>
        <div>
            <span class="label">图书所在类别:</span>
            <span class="inputControl">
				<input class="textbox"  id="book_bookTypeObj_bookTypeId_edit" name="book_bookTypeObj_bookTypeId" style="width: auto"/>
			</span>
        </div>
        <div>
            <span class="label">图书价格:</span>
            <span class="inputControl">
				<input class="textbox" type="text" id="book_price_edit" name="book_price" style="width:80px" />

			</span>

        </div>
        <div>
            <span class="label">库存:</span>
            <span class="inputControl">
				<input class="textbox" type="text" id="book_count_edit" name="book_count" style="width:80px" />

			</span>

        </div>
        <div>
            <span class="label">出版日期:</span>
            <span class="inputControl">
				<input class="textbox" type="text" id="book_publishDate_edit" name="book_publishDate" />

			</span>

        </div>
        <div>
            <span class="label">出版社:</span>
            <span class="inputControl">
				<input class="textbox" type="text" id="book_publish_edit" name="book_publish" style="width:200px" />

			</span>

        </div>
        <div>
            <span class="label">图书图片:</span>
            <span class="inputControl">
				<img id="book_bookPhotoImg" width="200px" border="0px"/><br/>
    			<input type="hidden" id="book_bookPhoto" name="book_bookPhoto"/>
				<input id="bookPhotoFile" name="bookPhotoFile" type="file" size="50" />
			</span>
        </div>
        <div>
            <span class="label">图书简介:</span>
            <span class="inputControl">
				<script id="book_bookDesc_edit" name="book_bookDesc" type="text/plain"   style="width:750px;height:500px;"></script>

                </span>

                </div>
                <div>
                <span class="label">图书文件:</span>
                <span class="inputControl">
                    <a id="book_bookFileA" style="color:red;margin-bottom:5px;" target="_blank">查看</a>&nbsp;&nbsp;
                    <input type="hidden" id="book_bookFile" name="book_bookFile"/>
                    <input id="bookFileFile" name="bookFileFile" value="重新选择文件" type="file" size="50" />
                    </span>
                    </div>
                    <div class="operation">
                    <a id="bookModifyButton" class="easyui-linkbutton">更新</a>
                    </div>
                    </form>
                    </div>
                    <script>
                        var publicURL = "__PUBLIC__/";
                        var backURL = "__PUBLIC__/index.php/back/";
                    </script>

                    <script src="__PUBLIC__/backjs/book/book_modify.js"></script>
