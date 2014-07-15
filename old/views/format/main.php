<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/mens.base.css"/>
    <link rel="stylesheet" href="style/mens.form.css"/>
    <link rel="stylesheet" href="style/mens.grid.css"/>
    <link rel="stylesheet" href="style/mens.box.css"/>
    <link rel="stylesheet" href="style/mens.msg.css"/>
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
    <script src="dist/mens/mens.base.js"></script>
    <script src="dist/mens/mens.msg.js"></script>
    <script>
        var words = 'abcdefghijklmnopqrstuvwxyz';

        var getText = function(){
            var str = '';
            for(var i = 0; i < _.random(3, 1000); i++){
//                console.log(i % _.random(3, 9))
                str += words.split('')[_.random(0, words.length - 1)] + (i % _.random(3, 4) ? '' : ' ');
            }
            return str;
        };

        $(function(){

            for(var i = 0; i < 1000; i++){
                $.mMsg({
                    cls: 'msg-l' + i % 10,
                    text: i + ' : ' + getText(),
                    xy: [0, 2],
                    life: i % 10 ? 5000: 60000,
                    open: function(wrap, msg){
                    },
                    close: function(wrap, msg){
                    }
                });
            }
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
            <div class="m-in-col">
                <div class="m-box">
                    <div class="m-box-header">
                        <h1 class="m-box-h1">icon title</h1>
                        <ul class="m-box-h2">
                            <li>
                                <a href="#">menu-0</a>
                            </li>
                            <li>
                                <a href="#">menu-1</a>
                            </li>
                            <li>
                                <a href="#">menu-2</a>
                            </li>
                        </ul>
                        <ul class="m-box-h3">
                            <li>
                                <a href="#">more</a>
                            </li>
                        </ul>
                    </div>
                    <div class="m-box-body">
                        <div class="m-box-in-body">
                            <div class="m-wall">
                                <h1>Viva la Vida</h1>
                                <h2>Viva la Vida</h2>
                                <h3>Viva la Vida</h3>
                                <h4>Viva la Vida</h4>
                                <h5>Viva la Vida</h5>
                                <h6>Viva la Vida</h6>
                                <hr/>
                                <h1>Coldplay</h1>
                                <hr/>
                                <p>I used to rule the world. Seas would rise when I gave the word. Now in the morning I sleep alone. Sweep the streets I used to own. I used to roll the dice. Feel the fear in my enemy's eyes. Listened as the crowd would sing. Now the old king is dead. I used to rule the world. Seas would rise when I gave the word. Now in the morning I sleep alone. Sweep the streets I used to own. I used to roll the dice. Feel the fear in my enemy's eyes. Listened as the crowd would sing. Now the old king is dead.</p>
                                <div class="m-button-line">
                                    <input type="button" class="m-button" value="Button A"/>
                                    <input type="button" class="m-button" value="Button B"/>
                                    <button class="m-button">Button C</button>
                                </div>
                                <p>Long live the king</p>
                                <p>One minute I held the key</p>
                                <blockquote>
                                    <p>I used to rule the world. Seas would rise when I gave the word. Now in the morning I sleep alone. Sweep the streets I used to own. I used to roll the dice. Feel the fear in my enemy's eyes. Listened as the crowd would sing. Now the old king is dead. I used to rule the world. Seas would rise when I gave the word. Now in the morning I sleep alone. Sweep the streets I used to own. I used to roll the dice. Feel the fear in my enemy's eyes. Listened as the crowd would sing. Now the old king is dead.</p>
                                    <p>I hear Jerusalem bells a-ringing</p>
                                    <p>Roman cavalry choirs are singing</p>
                                    <p>Be my mirror my sword and shield</p>
                                    <p>Missionaries in a foreign field</p>
                                </blockquote>
                                <p>never an honest word</p>
                                <p>That was when I ruled the world</p>
                                <div class="m-button-line">
                                    <input type="button" class="m-button" value="Button A"/>
                                    <input type="button" class="m-button" value="Button B"/>
                                    <button class="m-button">Button C</button>
                                </div>
                                <ul>
                                    <li>I used to roll the dice</li>
                                    <ul>
                                        <li>I used to rule the world</li>
                                        <li>Seas would rise when I gave the word</li>
                                        <ul>
                                            <li>I used to rule the world</li>
                                            <ul>
                                                <li>I used to rule the world</li>
                                                <li>Seas would rise when I gave the word</li>
                                                <li>Now in the morning I sleep alone</li>
                                                <li>Sweep the streets I used to own</li>
                                            </ul>
                                            <li>Now in the morning I sleep alone</li>
                                            <li>Sweep the streets I used to own</li>
                                        </ul>
                                        <li>Sweep the streets I used to own</li>
                                    </ul>
                                    <li>Feel the fear in my enemy's eyes</li>
                                    <li>Listened as the crowd would sing</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="m-box-footer">
                        <div class="m-box-in-footer">
                            class="m-box-footer"
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>