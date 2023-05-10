<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"C:\xampp\htdocs\phpsystem\public/../application/front\view\book\book_frontlist.html";i:1538574425;s:77:"C:\xampp\htdocs\phpsystem\public/../application/front\view\common\header.html";i:1539175641;s:77:"C:\xampp\htdocs\phpsystem\public/../application/front\view\common\footer.html";i:1539174675;}*/ ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1 , user-scalable=no">
            <title>图书查询</title>
            <link href="__PUBLIC__/plugins/bootstrap.css" rel="stylesheet">
            <link href="__PUBLIC__/plugins/bootstrap-dashen.css" rel="stylesheet">
            <link href="__PUBLIC__/plugins/font-awesome.css" rel="stylesheet">
            <link href="__PUBLIC__/plugins/animate.css" rel="stylesheet">
            <link href="__PUBLIC__/plugins/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        </head>
        <body style="margin-top:70px;">
        <div class="container">
            <!--导航开始-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!--小屏幕导航按钮和logo-->
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="__PUBLIC__/index.php" class="navbar-brand">php设计网</a>
        </div>
        <!--小屏幕导航按钮和logo-->
        <!--导航-->
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="__PUBLIC__/index.php">首页</a></li>
                <li><a href="<?php echo url('BookType/frontlist'); ?>">图书类型</a></li>
                <li><a href="<?php echo url('Book/frontlist'); ?>">图书</a></li>
                <li><a href="http://www.shuangyulin.com" target="_blank" style="color:red">【作者网站】</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php if(\think\Session::get('user_name') == null): ?>
                <li><a href="#" onclick="register();"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;注册</a></li>
                <li><a href="#" onclick="login();"><i class="fa fa-user"></i>&nbsp;&nbsp;登录</a></li>
                    <?php else: ?>
                <li class="dropdown">
                    <a id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo \think\Session::get('user_name'); ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li><a href="<%=basePath %>index.jsp"><span class="glyphicon glyphicon-screenshot"></span>&nbsp;&nbsp;首页</a></li>
                        <li><a href="<%=basePath %>index.jsp"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;发布信息</a></li>
                        <li><a href="<%=basePath %>index.jsp"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;我发布的信息</a></li>
                        <li><a href="<%=basePath %>index.jsp"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp;修改个人资料</a></li>
                        <li><a href="<%=basePath %>index.jsp"><span class="glyphicon glyphicon-heart"></span>&nbsp;&nbsp;我的收藏</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo url('Index/logout'); ?>"><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;退出</a></li>
                <?php endif; ?>
            </ul>

        </div>
        <!--导航-->
    </div>
</nav>
<!--导航结束-->


<div id="loginDialog" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-key"></i>&nbsp;系统登录</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" name="loginForm" id="loginForm" enctype="multipart/form-data" method="post"  class="mar_t15">

                    <div class="form-group">
                        <label for="userName" class="col-md-3 text-right">用户名:</label>
                        <div class="col-md-9">
                            <input type="text" id="userName" name="userName" class="form-control" placeholder="请输入用户名">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-3 text-right">密码:</label>
                        <div class="col-md-9">
                            <input type="password" id="password" name="password" class="form-control" placeholder="登录密码">
                        </div>
                    </div>

                </form>
                <style>#bookTypeAddForm .form-group {margin-bottom:10px;}  </style>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" onclick="ajaxLogin();">登录</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





<div id="registerDialog" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-sign-in"></i>&nbsp;用户注册</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" name="registerForm" id="registerForm" enctype="multipart/form-data" method="post"  class="mar_t15">



                </form>
                <style>#bookTypeAddForm .form-group {margin-bottom:10px;}  </style>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" onclick="ajaxRegister();">注册</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->






<script>

    function register() {
        $("#registerDialog input").val("");
        $("#registerDialog textarea").val("");
        $('#registerDialog').modal('show');
    }
    function ajaxRegister() {
        $("#registerForm").data('bootstrapValidator').validate();
        if(!$("#registerForm").data('bootstrapValidator').isValid()){
            return;
        }

        jQuery.ajax({
            type : "post" ,
            url : basePath + "UserInfo/add",
            dataType : "json" ,
            data: new FormData($("#registerForm")[0]),
            success : function(obj) {
                if(obj.success){
                    alert("注册成功！");
                    $("#registerForm").find("input").val("");
                    $("#registerForm").find("textarea").val("");
                }else{
                    alert(obj.message);
                }
            },
            processData: false,
            contentType: false,
        });
    }


    function login() {
        $("#loginDialog input").val("");
        $('#loginDialog').modal('show');
    }
    function ajaxLogin() {
        $.ajax({
            url : "<?php echo url('Index/frontLogin'); ?>",
            type : 'post',
            dataType: "json",
            data : {
                "userName" : $('#userName').val(),
                "password" : $('#password').val(),
            },
            success : function (obj, response, status) {
                if (obj.success) {
                    location.href = "__PUBLIC__/index.php";
                } else {
                    alert(obj.msg);
                }
            }
        });
    }


</script>

            <div class="col-md-9 wow fadeInLeft">
                <ul class="breadcrumb">
                    <li><a href="__PUBLIC__/index.php">首页</a></li>
                    <li><a href="<?php echo url('Book/frontlist'); ?>">图书信息列表</a></li>
                    <li class="active">查询结果显示</li>
                    <a class="pull-right" href="<?php echo url('Book/frontAdd'); ?>" style="">添加图书</a>
                </ul>
                <div class="row">
                    <?php
                    /*计算起始序号*/
                    $startIndex = ($currentPage-1) * $rows;
                    $currentIndex = $startIndex+1;
                    /*遍历记录*/
                  if(is_array($bookRs) || $bookRs instanceof \think\Collection): $i = 0; $__LIST__ = $bookRs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book): $mod = ($i % 2 );++$i;
                    $clearLeft = "";
                    if(($i-1)%4 == 0) $clearLeft = "style=\"clear:left;\"";
                  ?>
                    <div class="col-md-3 bottom15" <?php echo $clearLeft; ?>>
                    <a  href="<?php echo url('Book/frontshow',array('barcode'=>$book['barcode'])); ?>"><img class="img-responsive" src="__PUBLIC__/<?php echo $book['bookPhoto']; ?>" /></a>
                    <div class="showFields">
                        <div class="field">
                            图书条形码:<?php echo $book['barcode']; ?>
                        </div>
                        <div class="field">
                            图书名称:<?php echo $book['bookName']; ?>
                        </div>
                        <div class="field">
                            图书所在类别:<?php echo $book['bookTypeObjF']['bookTypeName']; ?>
                        </div>
                        <div class="field">
                            图书价格:<?php echo $book['price']; ?>
                        </div>
                        <div class="field">
                            库存:<?php echo $book['count']; ?>
                        </div>
                        <div class="field">
                            出版日期:<?php echo $book['publishDate']; ?>
                        </div>
                        <div class="field">
                            出版社:<?php echo $book['publish']; ?>


                        </div>
                        <div class="field">
                            图书文件:
                            <?php if($book['bookFile'] != ''): ?>
                            <a href='__PUBLIC__/<?php echo $book['bookFile']; ?>' target='_blank'><?php echo $book['bookFile']; ?></a>
                            <?php else: ?>
                            暂无文件
                            <?php endif; //echo $book['bookFile']==""?"暂无文件":"<a href='__PUBLIC__".$book['bookFile']."' target='_blank'>".$book['bookFile']."</a>" ?>
                        </div>
                        <a class="btn btn-primary top5" href="<?php echo url('Book/frontshow',array('barcode'=>$book['barcode'])); ?>">详情</a>
                        <a class="btn btn-primary top5" onclick="bookEdit('<?php echo $book['barcode']; ?>');" style="">修改</a>
                        <a class="btn btn-primary top5" onclick="bookDelete('<?php echo $book['barcode']; ?>');" style="">删除</a>
                    </div>
                </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                <div class="row">
                    <div class="col-md-12">
                        <nav class="pull-left">
                            <ul class="pagination">
                                <li><a href="#" onclick="GoToPage(<?php echo $currentPage-1; ?>,<?php echo $totalPage; ?>);" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                                <?php
                                $startPage = $currentPage - 5;
                                $endPage = $currentPage + 5;
                                if($startPage < 1) $startPage=1;
                                if($endPage > $totalPage) $endPage = $totalPage;
                                    for($i=$startPage;$i<=$endPage;$i++) {
                                ?>
                                <li class="<?php echo $currentPage==$i?"active":""; ?>"><a href="#"  onclick="GoToPage(<?php echo $i; ?>,<?php echo $totalPage; ?>);"><?php echo $i; ?></a></li>
                                <?php } ?>
                                <li><a href="#" onclick="GoToPage(<?php echo $currentPage+1; ?>,<?php echo $totalPage; ?>);"><span aria-hidden="true">&raquo;</span></a></li>
                            </ul>
                        </nav>
                        <div class="pull-right" style="line-height:75px;" >共有<?php echo $recordNumber; ?>条记录，当前第 <?php echo $currentPage; ?>/<?php echo $totalPage; ?> 页</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 wow fadeInRight">
            <div class="page-header">
                <h1>图书查询</h1>
            </div>
            <form name="bookQueryForm" id="bookQueryForm" action="<?php echo url('Book/frontlist'); ?>" class="mar_t15" method="post">
                <div class="form-group">
                    <label for="barcode">图书条形码:</label>
                    <input type="text" id="barcode" name="barcode" value="<?php echo $barcode; ?>" class="form-control" placeholder="请输入图书条形码">
                </div>
                <div class="form-group">
                    <label for="bookName">图书名称:</label>
                    <input type="text" id="bookName" name="bookName" value="<?php echo $bookName; ?>" class="form-control" placeholder="请输入图书名称">
                </div>
                <div class="form-group">
                    <label for="bookTypeObj_bookTypeId">图书所在类别：</label>
                    <select id="bookTypeObj_bookTypeId" name="bookTypeObj_bookTypeId" class="form-control">
                        <option value="0">不限制</option>
                        <?php
                        foreach($bookTypeList as $bookType) {
                            $selected = "";
                            if($bookTypeObj['bookTypeId'] == $bookType['bookTypeId'])
                                $selected = "selected";
                       ?>
                        <option value="<?php echo $bookType['bookTypeId']; ?>" <?php echo $selected; ?>><?php echo $bookType['bookTypeName']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="publishDate">出版日期:</label>
                    <input type="text" id="publishDate" name="publishDate" class="form-control"  placeholder="请选择出版日期" value="<?php echo $publishDate; ?>" onclick="SelectDate(this,'yyyy-MM-dd')" />
                </div>
                <input type=hidden name=currentPage id="currentPage" value="<?php echo $currentPage; ?>" />
                <button type="submit" class="btn btn-primary" onclick="$('#currentPage').val(1);return true;" >查询</button>
            </form>
        </div>

        </div>
        </div>
        <div id="bookEditDialog" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" style="width:900px;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i>&nbsp;图书信息编辑</h4>
                    </div>
                    <div class="modal-body" style="height:450px; overflow: scroll;">
                        <form class="form-horizontal" name="bookEditForm" id="bookEditForm" enctype="multipart/form-data" method="post"  class="mar_t15">
                            <div class="form-group">
                                <label for="book_barcode_edit" class="col-md-3 text-right">图书条形码:</label>
                                <div class="col-md-9">
                                    <input type="text" id="book_barcode_edit" name="book_barcode" class="form-control" placeholder="请输入图书条形码" readOnly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_bookName_edit" class="col-md-3 text-right">图书名称:</label>
                                <div class="col-md-9">
                                    <input type="text" id="book_bookName_edit" name="book_bookName" class="form-control" placeholder="请输入图书名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_bookTypeObj_bookTypeId_edit" class="col-md-3 text-right">图书所在类别:</label>
                                <div class="col-md-9">
                                    <select id="book_bookTypeObj_bookTypeId_edit" name="book_bookTypeObj_bookTypeId" class="form-control">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_price_edit" class="col-md-3 text-right">图书价格:</label>
                                <div class="col-md-9">
                                    <input type="text" id="book_price_edit" name="book_price" class="form-control" placeholder="请输入图书价格">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_count_edit" class="col-md-3 text-right">库存:</label>
                                <div class="col-md-9">
                                    <input type="text" id="book_count_edit" name="book_count" class="form-control" placeholder="请输入库存">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_publishDate_edit" class="col-md-3 text-right">出版日期:</label>
                                <div class="col-md-9">
                                    <div class="input-group date book_publishDate_edit col-md-12" data-link-field="book_publishDate_edit" data-link-format="yyyy-mm-dd">
                                        <input class="form-control" id="book_publishDate_edit" name="book_publishDate" size="16" type="text" value="" placeholder="请选择出版日期" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_publish_edit" class="col-md-3 text-right">出版社:</label>
                                <div class="col-md-9">
                                    <input type="text" id="book_publish_edit" name="book_publish" class="form-control" placeholder="请输入出版社">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_bookPhoto_edit" class="col-md-3 text-right">图书图片:</label>
                                <div class="col-md-9">
                                    <img  class="img-responsive" id="book_bookPhotoImg" border="0px"/><br/>
                                    <input type="hidden" id="book_bookPhoto_edit" name="book_bookPhoto"/>
                                    <input id="bookPhotoFile" name="bookPhotoFile" type="file" size="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_bookDesc_edit" class="col-md-3 text-right">图书简介:</label>
                                <div class="col-md-9">
                                    <textarea name="book_bookDesc" id="book_bookDesc_edit" style="width:100%;height:500px;"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_bookFile_edit" class="col-md-3 text-right">图书文件:</label>
                                <div class="col-md-9">
                                    <a id="book_bookFileA" target="_blank"></a><br/>
                                    <input type="hidden" id="book_bookFile_edit" name="book_bookFile"/>
                                    <input id="bookFileFile" name="bookFileFile" type="file" size="50" />
                                </div>
                            </div>
                        </form>
                        <style>#bookEditForm .form-group {margin-bottom:5px;}  </style>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-primary" onclick="ajaxBookModify();">提交</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!--footer-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="http://www.shuangyulin.com" target=_blank>© 大神开发网 from 2020</a> |
                <a href="http://www.baidu.com">本站招聘</a> |
                <a href="http://www.baidu.com">联系站长</a> |
                <a href="http://www.baidu.com">意见与建议</a> |
                <a href="http://www.baidu.com" target=_blank>蜀ICP备0343346号</a> |
                <a href="__PUBLIC__/back/login">后台登录</a>
            </div>
        </div>
    </div>
</footer>
<!--footer-->





        <script src="__PUBLIC__/plugins/jquery.min.js"></script>
        <script src="__PUBLIC__/plugins/bootstrap.js"></script>
        <script src="__PUBLIC__/plugins/wow.min.js"></script>
        <script src="__PUBLIC__/plugins/bootstrap-datetimepicker.min.js"></script>
        <script src="__PUBLIC__/plugins/locales/bootstrap-datetimepicker.zh-CN.js"></script>
        <script type="text/javascript" src="__PUBLIC__/js/jsdate.js"></script>
        <script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/ueditor.config.js"></script>
        <script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/ueditor.all.js"> </script>
        <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
        <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
        <script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/lang/zh-cn/zh-cn.js"></script>
        <script>
            //实例化编辑器
            var book_bookDesc_edit = UE.getEditor('book_bookDesc_edit'); //图书简介编辑器
            /*跳转到查询结果的某页*/
            function GoToPage(currentPage,totalPage) {
                if(currentPage==0) return;
                if(currentPage>totalPage) return;
                document.bookQueryForm.currentPage.value = currentPage;
                document.bookQueryForm.submit();
            }

            /*可以直接跳转到某页*/
            function changepage(totalPage)
            {
                var pageValue=document.bookQueryForm.pageValue.value;
                if(pageValue>totalPage) {
                    alert('你输入的页码超出了总页数!');
                    return ;
                }
                document.bookQueryForm.currentPage.value = pageValue;
                documentbookQueryForm.submit();
            }

            /*弹出修改图书界面并初始化数据*/
            function bookEdit(barcode) {
                $.ajax({
                    url :  "<?php echo url('Book/update'); ?>?barcode=" + barcode ,
                    type : "get",
                    dataType: "json",
                    success : function (book, response, status) {
                        if (book) {
                            $("#book_barcode_edit").val(book.barcode);
                            $("#book_bookName_edit").val(book.bookName);
                            $.ajax({
                                url: "<?php echo url('BookType/listAll'); ?>",
                                type: "get",
                                dataType: "json",
                                success: function(bookTypes,response,status) {
                                    $("#book_bookTypeObj_bookTypeId_edit").empty();
                                    var html="";
                                    $(bookTypes).each(function(i,bookType){
                                        html += "<option value='" + bookType.bookTypeId + "'>" + bookType.bookTypeName + "</option>";
                                    });
                                    $("#book_bookTypeObj_bookTypeId_edit").html(html);
                                    $("#book_bookTypeObj_bookTypeId_edit").val(book.bookTypeObj);
                                }
                            });
                            $("#book_price_edit").val(book.price);
                            $("#book_count_edit").val(book.count);
                            $("#book_publishDate_edit").val(book.publishDate);
                            $("#book_publish_edit").val(book.publish);
                            $("#book_bookPhoto_edit").val(book.bookPhoto);
                            $("#book_bookPhotoImg").attr("src", "__PUBLIC__/" +　book.bookPhoto);
                            book_bookDesc_edit.setContent(book.bookDesc, false);
                            $("#book_bookFile_edit").val(book.bookFile);
                            $("#book_bookFileA").text(book.bookFile);
                            $("#book_bookFileA").attr("href", "__PUBLIC__/" +　book.bookFile);
                            $('#bookEditDialog').modal('show');
                        } else {
                            alert("获取信息失败！");
                        }
                    }
                });
            }

            /*删除图书信息*/
            function bookDelete(barcode) {
                if(confirm("确认删除这个记录")) {
                    $.ajax({
                        type : "POST",
                        url: "<?php echo url('Book/deletes'); ?>",
                        data : {
                            barcodes : barcode,
                        },
                        dataType: "json",
                        success : function (obj) {
                            if (obj.success) {
                                alert(obj.message);
                                $("#bookQueryForm").submit();
                                //location.href= "<?php echo url('Book/frontlist'); ?>";
                            }
                            else
                                alert(obj.message);
                        },
                    });
                }
            }

            /*ajax方式提交图书信息表单给服务器端修改*/
            function ajaxBookModify() {
                $.ajax({
                    url :  "<?php echo url('Book/update'); ?>",
                    type : "post",
                    dataType: "json",
                    data: new FormData($("#bookEditForm")[0]),
                    success : function (obj, response, status) {
                        if(obj.success){
                            alert(obj.message);
                            $("#bookQueryForm").submit();
                        }else{
                            alert(obj.message);
                        }
                    },
                    processData: false,
                    contentType: false,
                });
            }

            $(function(){
                /*小屏幕导航点击关闭菜单*/
                $('.navbar-collapse a').click(function(){
                    $('.navbar-collapse').collapse('hide');
                });
                new WOW().init();

                /*出版日期组件*/
                $('.book_publishDate_edit').datetimepicker({
                    language:  'zh-CN',  //语言
                    format: 'yyyy-mm-dd',
                    minView: 2,
                    weekStart: 1,
                    todayBtn:  1,
                    autoclose: 1,
                    minuteStep: 1,
                    todayHighlight: 1,
                    startView: 2,
                    forceParse: 0
                });
            })
        </script>
        </body>
        </html>

