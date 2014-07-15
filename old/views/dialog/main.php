<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style/mens.base.css"/>
        <link rel="stylesheet" href="style/mens.grid.css"/>
        <link rel="stylesheet" href="style/mens.box.css"/>
        <link rel="stylesheet" href="style/mens.table.css"/>
        <link rel="stylesheet" href="style/mens.form.css"/>
        <link rel="stylesheet" href="style/mens.control.css"/>
        <link rel="stylesheet" href="style/mens.dialog.css"/>
        <link rel="stylesheet" href="themes/default.css"/>
        <style>
            .m-box-h1,
            .m-box-h2>li,
            .m-box-h3>li{

            }
            .uhori-fix-form .m-form-lb{
                width: 65px;
            }
            .m-form-lb{
                width: 60px;
            }
        </style>
        <script src="dist/jquery-1.8.3.js"></script>
        <script src="dist/underscore-1.5.0.js"></script>
        <!-- <mens> -->
        <script src="dist/mens/mens.base.js"></script>
        <script src="dist/mens/mens.table.js"></script>
        <script src="dist/mens/mens.form.js"></script>
        <script src="dist/mens/mens.control.js"></script>
        <script src="dist/mens/mens.tabs.js"></script>
        <script src="dist/mens/mens.dialog.js"></script>
        <script src="dist/mens/mens.do.js"></script>
        <script>
            $(function(){
                $('#to-dialog-a').click(function(){
                    var dialog = $.mDialog({
                        id: 'dialog-a',
                        cls: 'aaa bbb',
                        open: function(dom, dialog){
                            console.log('open dialog');
                            dom.find('.m-dialog-body p').click(function(){
                                $.mDialog({
                                    title: 'TITLE',
                                    id: 'dialog-b',
                                    cls: 'aaa bbb',
                                    open: function(dom, dialog){
//                                        console.log(dom, dialog);
                                        dom.find('#submit').click(function(){
                                            $.mDialog({
                                                title: 'TITLE',
                                                id: 'dialog-c',
                                                cls: 'aaa bbb',
                                                open: function(dom, dialog){
                                                    console.log(dom, dialog);
                                                    dom.find('.m-dialog-body p').click(function(){

                                                    });
                                                },
                                                close: function(dom, dialog){
                                                    console.log(dom, dialog);
                                                },
                                                content: '<div class="m-dialog-in-body"><p>Mens 2.0</p></div>',
                                                mask: true,
                                                resize: [false, true]
                                            });
                                        });
                                        dom.find('#cancel').click(function(){
                                            dialog.remove();
                                        });
                                        $.mDo();
                                    },
                                    close: function(dom, dialog){
                                        console.log(dom, dialog);
                                    },
                                    content:
                                        '<div class="m-dialog-in-body">' +
                                            '<form action="">' +
                                                '<ul class="m-form hori-fix-form">' +
                                                    '<li class="m-form-hori-fix">' +
                                                        '<label class="m-form-lb">Label A</label>' +
                                                        '<label class="m-form-ntc">' +
                                                            '<input type="button" class="m-button" value="Check"/>' +
                                                        '</label>' +
                                                        '<div class="m-form-in">' +
                                                            '<div class="m-select" name="test-select-e">' +
                                                                '<input type="text"/>' +
                                                                '<span class=""></span>' +
                                                            '</div>' +
                                                            '<ul class="m-options" id="test-select-e">' +
                                                                '<li><a href="#" data="A">Itme A</a></li>' +
                                                                '<li><a href="#" data="B">Itme B</a></li>' +
                                                                '<li><a href="#" data="C">Itme C</a></li>' +
                                                                '<li><a href="#" selected="selected" data="D">Itme D</a></li>' +
                                                                '<li><a href="#" data="E">Itme E</a></li>' +
                                                            '</ul>' +
                                                        '</div>' +
                                                    '</li>' +
                                                    '<li class="m-form-hori-fix">' +
                                                        '<label class="m-form-lb">Label B</label>' +
                                                        '<label class="m-form-ntc">' +
                                                            '<input type="button" class="m-button" value="Check"/>' +
                                                        '</label>' +
                                                        '<div class="m-form-in">' +
                                                            '<input type="text" class="m-input"/>' +
                                                        '</div>' +
                                                    '</li>' +
                                                    '<li class="m-form-hori-fix">' +
                                                        '<label class="m-form-lb">Label C</label>' +
                                                        '<label class="m-form-ntc">' +
                                                            '<input type="button" class="m-button" value="Check"/>' +
                                                        '</label>' +
                                                        '<div class="m-form-in">' +
                                                            '<input type="text" class="m-input"/>' +
                                                        '</div>' +
                                                    '</li>' +
                                                    '<li class="m-form-hori-fix">' +
                                                        '<label class="m-form-lb">Label D</label>' +
                                                        '<label class="m-form-ntc">' +
                                                            '<input type="button" class="m-button" value="Check"/>' +
                                                        '</label>' +
                                                        '<div class="m-form-in">' +
                                                            '<textarea name="" id="" class="m-textarea" rows="3">I\'m a textarea, rows="3"</textarea>' +
                                                        '</div>' +
                                                    '</li>' +
                                                    '<li class="m-form-hori-fix">' +
                                                        '<label class="m-form-lb">&nbsp;</label>' +
                                                        '<div class="m-form-in">' +
                                                            '<input type="button" class="m-button" value="Submit" id="submit"/>' +
                                                            '<input type="button" class="m-button" value="Cancel" id="cancel"/>' +
                                                        '</div>' +
                                                    '</li>' +
                                                '</ul>' +
                                            '</form>' +
                                        '</div>',
                                    mask: false,
                                    max: false,
                                    width: 480,
                                    resize: [true, false]
                                });
                            });
                        },
                        close: function(dom, dialog){
                            console.log('close dialog');
                        },
                        width: '640',
                        content: function(dom, dialog){
                            console.log('request content');
                            $.get('?action=asyn', function(data, state, xhr){
                                console.log('receive content');
                                dialog.render('TITLE', data);
                                $('#blue-lotus p', dom).each(function(){
                                    $(this).data('text', $(this).html());
                                    $(this).html('&nbsp;');
                                });
                                var i = 0,
                                    interval = setInterval(function(){
                                    var p = $('#blue-lotus p').eq(i);
                                    p.append(p.data('text').slice(0, 1));
                                    p.data('text', p.data('text').slice(1, p.data('text').length));
                                    if(p.data('text').length == 0){
                                        i++;
                                    }
                                    if(i == $('#blue-lotus p').size()){
                                        clearInterval(interval);
                                    }
                                }, 100);
                            });
                        },
                        mask: true,
                        drag: false
                    });
                });
                $('#rock-wrap').mRock();
            });
        </script>
        <title>Mens 2.0 - Box</title>
    </head>
    <body>
        <div class="m-out-row">
            <div class="m-row">
                <div class="m-col fix-col-left">
                    <div class="m-in-col">
                        <?php
                        load_view('nav.php');
                        ?>
                    </div>
                </div>
                <div class="m-col-fit">
                    <!-- 3:4:5 begin -->
                    <div class="m-row">
                        <div class="m-in-col">
                            <?php
                            load_view('dialog/box.php');
                            ?>
                        </div>
                    </div>
                    <!-- 3:4:5 end -->
                </div>
            </div>
        </div>
    </body>
</html>