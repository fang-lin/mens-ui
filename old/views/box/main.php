<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/mens.base.css"/>
    <link rel="stylesheet" href="style/mens.grid.css"/>
    <link rel="stylesheet" href="style/mens.box.css"/>
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
                    <div class="m-col-3">
                        <div class="m-in-col">
                            <?php
                            load_view('box/box.php');
                            ?>
                        </div>
                    </div>
                    <div class="m-col-4">
                        <div class="m-in-col">
                            <?php
                            load_view('box/box.php');
                            ?>
                        </div>
                    </div>
                    <div class="m-col-5">
                        <div class="m-in-col">
                            <?php
                            load_view('box/box.php');
                            ?>
                        </div>
                    </div>
                    <br class="clr"/>
                </div>
                <!-- 3:4:5 end -->
                <!-- left:fit:right begin -->
                <div class="m-row">
                    <div class="m-col">
                        <div class="m-in-col">
                            <?php
                            load_view('box/box.php');
                            ?>
                        </div>
                    </div>
                    <div class="m-col">
                        <div class="m-in-col">
                            <?php
                            load_view('box/box.php');
                            ?>
                        </div>
                    </div>
                    <div class="m-col-fit">
                        <div class="m-in-col">
                            <?php
                            load_view('box/box.php');
                            ?>
                        </div>
                    </div>
                </div>
                <!-- left:fit:right end -->
            </div>
        </div>
    </div>
</body>
</html>