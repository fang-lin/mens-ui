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
        .fix-col-left{
            width: 240px;
        }
        .hori-form .m-form-lb{
            width: 80px;
        }
        .hori-fix-form .m-form-lb{
            width: 60px;
        }
        .m-form-hori .m-input,
        .m-form-hori .m-textarea,
        .m-form-uhori .m-input,
        .m-form-uhori .m-textarea{
            width: 240px;
        }
        .m-form-hori .m-select,
        .m-form-uhori .m-select{
            width: 223px;
        }
        .uhori{
            padding: 5px 0;
        }
        .uhori+.uhori{
            border: solid #999999;
            border-width: 1px 0 0 0;
        }
        .uhori .m-form-lb{
            width: 65px;
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
    <!-- </mens> -->

    <script>

        $(function(){
            $('#test-form .submit').click(function(){
                $('#test-form').mFormData(function(data){
                    console.log(data);
                });
            });
            $('#test-select-b a').click(function(event){
                $('#test-select-a a').eq(_.random(0, 4)).click();
            });

            $('#to-dialog').click(function(){
                var dialog = $.mDialog({
                    title: 'TITLE',
                    id: 'dialog-a',
                    class: 'aaa bbb',
                    open: function(dom, dialog){
                        console.log(dom, dialog);
                    },
                    close: function(dom, dialog){
                        console.log(dom, dialog);
                    },
                    width: '640',
                    height: '320'
                });
            });

        });
    </script>
    <title>Mens 2.0 - From</title>
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
                <div class="m-in-col">
                    <?php
                        load_view('form/box_form_inli.php');
                    ?>
                </div>
                <div class="m-row">
                    <div class="m-col-6">
                        <div class="m-in-col">
                            <?php
                                load_view('form/box_form_uhori.php');
                            ?>
                        </div>
                        <div class="m-in-col">
                            <?php
                                load_view('form/box_form_doub.php');
                            ?>
                        </div>
                        <div class="m-in-col">
                            <?php
                                load_view('form/box_form_ufix.php');
                            ?>
                        </div>
                    </div>
                    <div class="m-col-6">
                        <div class="m-in-col">
                            <?php
                                load_view('form/box_form_mix.php');
                            ?>
                        </div>
                        <div class="m-in-col">
                            <?php
                                load_view('form/box_form_hori.php');
                            ?>
                        </div>
                        <div class="m-in-col">
                            <?php
                                load_view('form/box_form_fix.php');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>