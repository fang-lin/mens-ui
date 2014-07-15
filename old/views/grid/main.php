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
        .cell{
            background: #DDDDDD;
            padding: 10px;
        }
        .cell p{
            margin: 5px 0;
        }
        .fix-col-left{
            width: 240px;
        }
    </style>
    <script src="dist/jquery-1.8.3.js"></script>
    <script src="dist/underscore-1.5.0.js"></script>
    <title>Mens 2.0 - Grid</title>
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
            <?php
                load_view('grid/1.php');
                load_view('grid/v11.php');
                load_view('grid/v7.php');
                load_view('grid/v5.php');
                load_view('grid/3_4_5.php');
                load_view('grid/l_fit_r.php');
                load_view('grid/l_3_3_3_3_r.php');
                load_view('grid/l_fit.php');
                load_view('grid/fit_r.php');
            ?>
            </div>
        </div>
    </div>
</body>
</html>