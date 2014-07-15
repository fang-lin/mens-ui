<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/mens.base.css"/>
    <link rel="stylesheet" href="style/mens.grid.css"/>
    <link rel="stylesheet" href="style/mens.box.css"/>
    <link rel="stylesheet" href="style/mens.table.css"/>
    <link rel="stylesheet" href="themes/default.css"/>
    <style>
        .m-box-h1,
        .m-box-h2>li,
        .m-box-h3>li{

        }
        .fix-col-left{
            width: 240px;
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
    <title>Mens 2.0 - Table</title>
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
                    load_view('table/tab_row.php');
                ?>
                </div>
                <div class="m-in-col">
                <?php
                    load_view('table/tab_chess.php');
                ?>
                </div>
                <div class="m-in-col">
                <?php
                    load_view('table/tab_col.php');
                ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>