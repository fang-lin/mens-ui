<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/mens.base.css"/>
    <link rel="stylesheet" href="style/mens.grid.css"/>
    <link rel="stylesheet" href="style/mens.box.css"/>
    <link rel="stylesheet" href="style/mens.form.css"/>
    <link rel="stylesheet" href="style/mens.control.css"/>
    <link rel="stylesheet" href="style/mens.tabs.css"/>
    <link rel="stylesheet" href="themes/default.css"/>
    <style>
        .fix-col-left{
            width: 240px;
        }
        .m-tabs-section{
            min-height: 120px;
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
    <script src="dist/mens/mens.do.js"></script>
    <!-- </mens> -->
    <script>
        $(function(){
            $('.m-step-next').click(function(event){
                event.stopPropagation();
            });
        });
    </script>
    <title>Mens 2.0 - Tabs</title>
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
                    load_view('tabs/top.php');
                ?>
            </div>
            <div class="m-in-col">
                <?php
                    load_view('tabs/left.php');
                ?>
            </div>
            <div class="m-in-col">
                <?php
                    load_view('tabs/step.php');
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>