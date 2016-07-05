<?
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\web\widget;

?>
<link rel="stylesheet" href="/admin/plugins/iCheck/flat/blue.css">
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box  box-primary collapsed-box">
                <div class="box-header">
                    <h3 class="box-title">新增数据库备份
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button class="btn btn-primary btn-sm" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse"><i class="fa fa-plus"></i></button>
                        <button class="btn btn-primary btn-sm" data-widget="remove" data-toggle="tooltip"
                                title="Remove"><i class="fa fa-times"></i></button>
                    </div><!-- /. tools -->
                </div>

                <div class="box-body no-padding">
                    <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button class="btn btn-default btn-sm checkbox-toggle" id="addsqlbackstore"><i
                                class="fa fa-square-o"></i>
                        </button>
                        <div class="btn-group">
                            <button class="btn btn-default btn-sm" id="addbackup"><i class="fa  fa-plus"></i>备份选中表
                            </button>
                        </div><!-- /.btn-group -->
                        <button class="btn btn-default btn-sm" id="addbackups"><i class="fa  fa-plus"></i>备份全部</button>
                        <div class="pull-right">
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" placeholder="Search Mail">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div><!-- /.pull-right -->
                    </div>
                    <div class="table-responsive mailbox-messages" id="sqltableslist">
                        <table class="table table-hover table-striped" id="sqltables">
                            <tbody>
                            <?php if (!empty($tables)) { ?>
                                <?php foreach ($tables as $key => $item) { ?>
                                    <tr>
                                        <td><input type="checkbox"></td>

                                        <td class="mailbox-name"><?= $item ?></td>

                                        <td class="mailbox-date"></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>

                            </tbody>
                        </table><!-- /.table -->
                    </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
            </div>
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">数据库备份列表</h3>
                </div><!-- /.box-header -->
                <div class="mailbox-controls">
                    <div class="btn-group">
                        <button class="btn btn-default btn-sm" id="delbackup"><i class="fa fa-trash-o"></i>删除选中
                        </button>
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm" id="delbackups"><i class="fa fa-trash-o"></i>删除全部</button>
                    <div class="pull-right">
                        <div class="has-feedback">
                            <input type="text" class="form-control input-sm" placeholder="Search Mail">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </div><!-- /.pull-right -->
                </div>
                <div id="sqlbackstorelist" class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped" id="sqltables">
                        <thead>
                        <tr>
                            <th width="5%">
                                <!-- Check all button -->
                                <button style="padding:1px 4px" id="delsqlbackstore" class="btn btn-default btn-sm checkbox-toggle"><i
                                        class="fa fa-square-o"></i>
                                </button>
                            </th>
                            <th>编号</th>
                            <th>名称</th>
                            <th>大小</th>
                            <th>创建时间</th>
                            <th>备份的数据表名称</th>
                            <th width="25%">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($sqlbackstores)) { ?>
                            <?php foreach ($sqlbackstores as $key => $item) { ?>
                                <tr class="odd gradeX">
                                    <td><input type="checkbox" class="checkboxes" value=<?= $item['id']?> ></td>
                                    <td><?= $item['id']?></td>
                                    <td><?= $item['sql_name'] ?></td>
                                    <td><?= $item['sql_size'] ?></td>
                                    <td><?= date('Y年m月d日 H时m分s秒',$item['sql_addtime']) ?></td>
                                    <td><?= $item['sql_content'] ?></td>
                                    <td>
                                        <button onclick="deletebackup(<?= $item['id'] ?>);"
                                                class="btn btn-primary btn-sm checkbox-toggle" type="button">
                                            <i class="fa fa-trash-o"></i> 删除
                                        </button>
                                        <button onclick="restorebackup('<?= $item['sql_name'] ?>');"
                                                class="btn btn-primary btn-sm checkbox-toggle" type="button">
                                            <i class="fa fa-reply"></i>还原备份
                                        </button>
                                        <a href="<?=Url::toRoute(['/admin/bdbbackuprestore/download', 'file' => $item['sql_name']])?>"
                                                class="btn btn-primary btn-sm checkbox-toggle" type="button">
                                            <i class="fa fa-download"></i>导出备份
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr class="odd gradeX">
                                <td style ="text-align: center" colspan="7">当前没有任何备份！为了及时有效的恢复数据，请您尽快添加备份！</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                </div><!-- /.box-body -->
                <div class="mailbox-controls">
                    <?php
                    echo LinkPager::widget([
                            'pagination' => $pages,
                            'firstPageLabel' => '首页',
                            'lastPageLabel' => '末页',
                            'prevPageLabel' => '上一页',
                            'nextPageLabel' => '下一页',
                            'maxButtonCount' => 13
                        ]
                    );
                    ?>
                </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<script src="/admin/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#sqlbackstorelist, #sqltableslist input[type="checkbox"]').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
        });

        $("#addsqlbackstore").click(function () {
            var clicks = $(this).data('clicks');
            if (clicks) {
                $("#sqltableslist input[type='checkbox']").iCheck("uncheck");
                $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
            } else {
                $("#sqltableslist input[type='checkbox']").iCheck("check");
                $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
            }
            $(this).data("clicks", !clicks);
        });

        $("#delsqlbackstore").click(function () {
            var clicks = $(this).data('clicks');
            if (clicks) {
                $("#sqlbackstorelist input[type='checkbox']").iCheck("uncheck");
                $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
            } else {
                $("#sqlbackstorelist input[type='checkbox']").iCheck("check");
                $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
            }
            $(this).data("clicks", !clicks);
        });

        $(".mailbox-star").click(function (e) {
            e.preventDefault();
            var $this = $(this).find("a > i");
            var glyph = $this.hasClass("glyphicon");
            var fa = $this.hasClass("fa");
            if (glyph) {
                $this.toggleClass("glyphicon-star");
                $this.toggleClass("glyphicon-star-empty");
            }
            if (fa) {
                $this.toggleClass("fa-star");
                $this.toggleClass("fa-star-o");
            }
        });
    });
    $("#addbackups").click(function () {
        dialog({
            title: prompttitle,
            content: databasebackup,
            okValue: '确定',
            ok: function () {
                this.title('提交中…');
                $.ajax({
                    //提交数据的类型 POST GET
                    type: "POST",
                    //提交的网址
                    url: "<?=Url::toRoute("/admin/bdbbackuprestore/create")?>",
                    //提交的数据
                    data: {tables: 'all', _csrf: "<?=yii::$app->request->getCsrfToken()?>"},
                    //返回数据的格式
                    datatype: "json",//"xml", "html", "script", "json", "jsonp", "text".
                    //在请求之前调用的函数
                    //成功返回之后调用的函数
                    success: function (data) {
                        data = eval("(" + data + ")");
                        dialog({
                            title: prompttitle,
                            content: data.status ? databasebackupsucc : databasebackuperror,
                            cancel: false,
                            okValue: '确定',
                            ok: function () {
                                window.location.reload();
                            }
                        }).showModal();
                    }
                });
            },
            cancelValue: '取消',
            cancel: function () {
            }
        }).showModal();
    });

    $("#addbackup").click(function () {
        //获取选中需要备份的表的表名称
        var chk_value = [];
        $(".checked").each(function () {
            chk_value.push($(this).parent().next().text());
        });
        if (chk_value.length == 0) {
            dialog({
                title: prompttitle,
                content: checklength0,
                cancel: false,
                okValue: '确定',
                ok: function () {
                }
            }).showModal();
        } else {
            dialog({
                title: prompttitle,
                content: databasebackup,
                okValue: '确定',
                ok: function () {
                    this.title('提交中…');
                    $.ajax({
                        //提交数据的类型 POST GET
                        type: "POST",
                        //提交的网址
                        url: "<?=Url::toRoute("/admin/bdbbackuprestore/create")?>",
                        //提交的数据
                        data: {tables: chk_value, _csrf: "<?=yii::$app->request->getCsrfToken()?>"},
                        //返回数据的格式
                        datatype: "json",//"xml", "html", "script", "json", "jsonp", "text".
                        //在请求之前调用的函数
                        //成功返回之后调用的函数
                        success: function (data) {
                            data = eval("(" + data + ")");
                            dialog({
                                title: prompttitle,
                                content: data.status ? databasebackupsucc : databasebackuperror,
                                cancel: false,
                                okValue: '确定',
                                ok: function () {
                                    window.location.reload();
                                }
                            }).showModal();
                        }
                    });
                },
                cancelValue: '取消',
                cancel: function () {
                }
            }).showModal();
        }
    });
    function deletebackup(id) {
        dialog({
            title: prompttitle,
            content: databasedelete,
            okValue: '确定',
            ok: function () {
                this.title('提交中…');
                $.ajax({
                    //提交数据的类型 POST GET
                    type: "POST",
                    //提交的网址
                    url: "<?=Url::toRoute("/admin/bdbbackuprestore/delete")?>",
                    //提交的数据
                    data: {id: id, _csrf: "<?=yii::$app->request->getCsrfToken()?>"},
                    //返回数据的格式
                    datatype: "json",//"xml", "html", "script", "json", "jsonp", "text".
                    //在请求之前调用的函数
                    //成功返回之后调用的函数
                    success: function (data) {
                        data = eval("(" + data + ")");
                        dialog({
                            title: prompttitle,
                            content: data.status ? delbasebackupsucc : delbasebackuperror,
                            cancel: false,
                            okValue: '确定',
                            ok: function () {
                                window.location.reload();
                            }
                        }).showModal();
                    }
                });
            },
            cancelValue: '取消',
            cancel: function () {
            }
        }).showModal();
    }

    $("#delbackup").click(function () {
        //获取选中需要备份的表的表名称
        var chk_value = [];
        $("#sqlbackstorelist .checked").each(function () {
            chk_value.push($(this).find('input').val());
        });
        if (chk_value.length == 0) {
            dialog({
                title: prompttitle,
                content: checklength0,
                cancel: false,
                okValue: '确定',
                ok: function () {
                }
            }).showModal();
        } else {
            dialog({
                title: prompttitle,
                content: databasedelete,
                okValue: '确定',
                ok: function () {
                    this.title('提交中…');
                    $.ajax({
                        //提交数据的类型 POST GET
                        type: "POST",
                        //提交的网址
                        url: "<?=Url::toRoute("/admin/bdbbackuprestore/deletes")?>",
                        //提交的数据
                        data: {ids: chk_value, _csrf: "<?=yii::$app->request->getCsrfToken()?>"},
                        //返回数据的格式
                        datatype: "json",
                        success: function (data) {
                            data = eval("(" + data + ")");
                            dialog({
                                title: prompttitle,
                                content: delsuccess+data.success+ge + delerror+data.error+ge,
                                cancel: false,
                                okValue: '确定',
                                ok: function () {
                                    window.location.reload();
                                }
                            }).showModal();
                        }
                    });
                },
                cancelValue: '取消',
                cancel: function () {
                }
            }).showModal();
        }
    });

    $("#delbackups").click(function () {
        dialog({
            title: prompttitle,
            content: databasedelete,
            okValue: '确定',
            ok: function () {
                this.title('提交中…');
                $.ajax({
                    //提交数据的类型 POST GET
                    type: "POST",
                    //提交的网址
                    url: "<?=Url::toRoute("/admin/bdbbackuprestore/deletes")?>",
                    //提交的数据
                    data: {ids: 'all', _csrf: "<?=yii::$app->request->getCsrfToken()?>"},
                    //返回数据的格式
                    datatype: "json",
                    success: function (data) {
                        data = eval("(" + data + ")");
                        dialog({
                            title: prompttitle,
                            content: delsuccess+data.success+ge + delerror+data.error+ge,
                            cancel: false,
                            okValue: '确定',
                            ok: function () {
                                window.location.reload();
                            }
                        }).showModal();
                    }
                });
            },
            cancelValue: '取消',
            cancel: function () {
            }
        }).showModal();
    });

    function restorebackup(filename) {
        dialog({
            title: prompttitle,
            content: restoredatabackup,
            okValue: '确定',
            ok: function () {
                this.title('提交中…');
                $.ajax({
                    //提交数据的类型 POST GET
                    type: "POST",
                    //提交的网址
                    url: "<?=Url::toRoute("/admin/bdbbackuprestore/restore")?>",
                    //提交的数据
                    data: {filename: filename, _csrf: "<?=yii::$app->request->getCsrfToken()?>"},
                    //返回数据的格式
                    datatype: "json",//"xml", "html", "script", "json", "jsonp", "text".
                    //在请求之前调用的函数
                    //成功返回之后调用的函数
                    success: function (data) {
                        data = eval("(" + data + ")");
                        dialog({
                            title: prompttitle,
                            content: data.status ? restoredatabackupsucc : restoredatabackuperror,
                            cancel: false,
                            okValue: '确定',
                            ok: function () {
                                window.location.reload();
                            }
                        }).showModal();
                    }
                });
            },
            cancelValue: '取消',
            cancel: function () {
            }
        }).showModal();
    }
</script>