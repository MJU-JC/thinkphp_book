<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:82:"C:\xampp\htdocs\phpsystem\public/../application/front\view\book\book_frontAdd.html";i:1537967028;s:77:"C:\xampp\htdocs\phpsystem\public/../application/front\view\common\header.html";i:1538051848;s:77:"C:\xampp\htdocs\phpsystem\public/../application/front\view\common\footer.html";i:1538061378;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 , user-scalable=no">
    <title>图书添加</title>
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

    <div class="col-md-12 wow fadeInLeft">
        <ul class="breadcrumb">
            <li><a href="__PUBLIC__/index.jsp">首页</a></li>
            <li><a href="__PUBLIC__/Book/frontlist">图书管理</a></li>
            <li class="active">添加图书</li>
        </ul>
        <div class="row">
            <div class="col-md-10">
                <form class="form-horizontal" name="bookAddForm" id="bookAddForm" enctype="multipart/form-data" method="post"  class="mar_t15">
                    <div class="form-group">
                        <label for="book_barcode" class="col-md-2 text-right">图书条形码:</label>
                        <div class="col-md-8">
                            <input type="text" id="book_barcode" name="book_barcode" class="form-control" placeholder="请输入图书条形码">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="book_bookName" class="col-md-2 text-right">图书名称:</label>
                        <div class="col-md-8">
                            <input type="text" id="book_bookName" name="book_bookName" class="form-control" placeholder="请输入图书名称">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="book_bookTypeObj_bookTypeId" class="col-md-2 text-right">图书所在类别:</label>
                        <div class="col-md-8">
                            <select id="book_bookTypeObj_bookTypeId" name="book_bookTypeObj_bookTypeId" class="form-control">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="book_price" class="col-md-2 text-right">图书价格:</label>
                        <div class="col-md-8">
                            <input type="text" id="book_price" name="book_price" class="form-control" placeholder="请输入图书价格">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="book_count" class="col-md-2 text-right">库存:</label>
                        <div class="col-md-8">
                            <input type="text" id="book_count" name="book_count" class="form-control" placeholder="请输入库存">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="book_publishDateDiv" class="col-md-2 text-right">出版日期:</label>
                        <div class="col-md-8">
                            <div id="book_publishDateDiv" class="input-group date book_publishDate col-md-12" data-link-field="book_publishDate" data-link-format="yyyy-mm-dd">
                                <input class="form-control" id="book_publishDate" name="book_publishDate" size="16" type="text" value="" placeholder="请选择出版日期" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="book_publish" class="col-md-2 text-right">出版社:</label>
                        <div class="col-md-8">
                            <input type="text" id="book_publish" name="book_publish" class="form-control" placeholder="请输入出版社">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="book_bookPhoto" class="col-md-2 text-right">图书图片:</label>
                        <div class="col-md-8">
                            <img  class="img-responsive" id="book_bookPhotoImg" border="0px"/><br/>
                            <input type="hidden" id="book_bookPhoto" name="book_bookPhoto"/>
                            <input id="bookPhotoFile" name="bookPhotoFile" type="file" size="50" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="book_bookDesc" class="col-md-2 text-right">图书简介:</label>
                        <div class="col-md-8">
                            <textarea name="book_bookDesc" id="book_bookDesc" style="width:100%;height:500px;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="book_bookFile" class="col-md-2 text-right">图书文件:</label>
                        <div class="col-md-8">
                            <a id="book_bookFileImg" border="0px"></a><br/>
                            <input type="hidden" id="book_bookFile" name="book_bookFile"/>
                            <input id="bookFileFile" name="bookFileFile" type="file" size="50" />
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="col-md-2""></span>
                        <span onclick="ajaxBookAdd();" class="btn btn-primary bottom5 top5">添加</span>
                    </div>
                    <style>#bookAddForm .form-group {margin:5px;}  </style>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
<!--footer-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="http://www.baidu.com" target=_blank>© 大神开发网 from 2020</a> |
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
<script src="__PUBLIC__/plugins/bootstrapvalidator/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/plugins/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="__PUBLIC__/plugins/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/ueditor.all.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/lang/zh-cn/zh-cn.js"></script>
<script>
    var basePath = "";
    //实例化编辑器
    var book_bookDesc_editor = UE.getEditor('book_bookDesc'); //图书简介编辑器
    //提交添加图书信息
    function ajaxBookAdd() {
        //提交之前先验证表单
        $("#bookAddForm").data('bootstrapValidator').validate();
        if(!$("#bookAddForm").data('bootstrapValidator').isValid()){
            alert("请先按照格式填写好数据！");
            return;
        }
        jQuery.ajax({
            type : "post",
            url : "<?php echo url('Book/frontAdd'); ?>",
            dataType : "json" ,
            data: new FormData($("#bookAddForm")[0]),
            success : function(obj) {
                if(obj.success){
                    alert(obj.message);
                    $("#bookAddForm").find("input").val("");
                    $("#bookAddForm").find("textarea").val("");
                    book_bookDesc_editor.setContent("");
                } else {
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
        //验证图书添加表单字段
        $('#bookAddForm').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                "book_barcode": {
                    validators: {
                        notEmpty: {
                            message: "图书条形码不能为空",
                        }
                    }
                },
                "book_bookName": {
                    validators: {
                        notEmpty: {
                            message: "图书名称不能为空",
                        }
                    }
                },
                "book_price": {
                    validators: {
                        notEmpty: {
                            message: "图书价格不能为空",
                        },
                        numeric: {
                            message: "图书价格不正确"
                        }
                    }
                },
                "book_count": {
                    validators: {
                        notEmpty: {
                            message: "库存不能为空",
                        },
                        integer: {
                            message: "库存不正确"
                        }
                    }
                },
                "book_publishDate": {
                    validators: {
                        notEmpty: {
                            message: "出版日期不能为空",
                        }
                    }
                },
            }
        });
        //初始化图书所在类别下拉框值
        $.ajax({
            url: "<?php echo url('BookType/listAll'); ?>",
            type: "get",
            dataType : "json" ,
            success: function(bookTypes,response,status) {
                $("#book_bookTypeObj_bookTypeId").empty();
                var html="";
                $(bookTypes).each(function(i,bookType){
                    html += "<option value='" + bookType.bookTypeId + "'>" + bookType.bookTypeName + "</option>";
                });

                $("#book_bookTypeObj_bookTypeId").html(html);
            }
        });
        //出版日期组件
        $('#book_publishDateDiv').datetimepicker({
            language:  'zh-CN',  //显示语言
            format: 'yyyy-mm-dd',
            minView: 2,
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            minuteStep: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0
        }).on('hide',function(e) {
            //下面这行代码解决日期组件改变日期后不验证的问题
            $('#bookAddForm').data('bootstrapValidator').updateStatus('book_publishDate', 'NOT_VALIDATED',null).validateField('book_publishDate');
        });
    })
</script>
</body>
</html>
