<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style/mens.base.css"/>
        <link rel="stylesheet" href="style/mens.grid.css"/>
        <link rel="stylesheet" href="style/mens.box.css"/>
        <link rel="stylesheet" href="style/mens.radial.css"/>
        <link rel="stylesheet" href="themes/default.css"/>
        <style>
            .box-body{
                height: 400px;
                position: relative;
            }
            .m-radial-wrap-0{
                width: 32px;
                float: left;
            }
            .m-radial-wrap-1{
                width: 32px;
                float: right;
            }
            .m-radial-wrap-2{
                width: 32px;
                position: absolute;
                bottom: 15px;
                right: 15px;
            }
            .m-radial-wrap-3{
                width: 32px;
                position: absolute;
                bottom: 15px;
                left: 15px;
            }
        </style>

        <script src="dist/jquery-1.8.3.js"></script>
        <script src="dist/underscore-1.5.0.js"></script>
        <script src="dist/jquery.easing.1.3.js"></script>
        <!-- <mens> -->
        <script src="dist/mens/mens.base.js"></script>
        <script src="dist/mens/mens.table.js"></script>
        <script src="dist/mens/mens.form.js"></script>
        <script src="dist/mens/mens.control.js"></script>
        <script src="dist/mens/mens.tabs.js"></script>
        <script src="dist/mens/mens.radial.js"></script>
        <script src="dist/mens/mens.do.js"></script>
        <!-- </mens> -->
        <script>


            function derivative(f, dx) {
                return function(x){
                    return (f(x + dx) - f(x)) / dx;
                };
            }
            $(function(){
                $('.m-radial-wrap-0 .m-radial').mRadial({
                    defer: 200,
                    duration: 200,
                    start: 3/2,
                    end: 2
                });
                $('.m-radial-wrap-1 .m-radial').mRadial({
                    defer: 0,
                    duration: 300,
                    start: 1,
                    end: 3/2
                });
                $('.m-radial-wrap-2 .m-radial').mRadial({
                    radius: 160,
                    start: 1/2,
                    end: 1
                });
                $('.m-radial-wrap-3 .m-radial').mRadial({
                    start: 0,
                    end: 1/2
                });
            });
        </script>

        <title>Document</title>
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
                        load_view('radial/box.php');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>