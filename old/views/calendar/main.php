<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/mens.base.css"/>
    <link rel="stylesheet" href="style/mens.grid.css"/>
    <link rel="stylesheet" href="style/mens.table.css"/>
    <link rel="stylesheet" href="style/mens.box.css"/>
    <link rel="stylesheet" href="style/mens.form.css"/>
    <link rel="stylesheet" href="style/mens.control.css"/>
    <link rel="stylesheet" href="style/mens.calendar.css"/>
    <link rel="stylesheet" href="themes/default.css"/>
    <style>
        .m-box-h1,
        .m-box-h2>li,
        .m-box-h3>li{

        }
        .fix-col-left{
            width: 240px;
        }
        .hori-form .m-form-lb{
            width: 80px;
        }
        #calendar-handle-a,
        #calendar-handle-b{
            width: 300px;
        }
        .calendar-handle-date,
        .calendar-handle-time{
            width: 80px;
        }
    </style>
    <script src="dist/jquery-1.8.3.js"></script>
    <script src="dist/underscore-1.5.0.js"></script>
    <script src="dist/jquery.frame-animate-1.4.js"></script>
    <script src="dist/mens/mens.base.js"></script>
    <script src="dist/mens/mens.table.js"></script>
    <script src="dist/mens/mens.form.js"></script>
    <script src="dist/mens/mens.control.js"></script>
    <script src="dist/mens/mens.calendar.js"></script>
    <script src="dist/mens/mens.do.js"></script>
    <script>

        $(function(){

            var now = new Date(),
                startDate,
                endDate;
            $('#calendar-handle-a').mCalendar({
                date: now,
                validate: function(date){
                    return endDate ? date < endDate && date > (new Date(endDate).setDate(endDate.getDate() - 3)) : true;
                },
                callback: function(date, wrap){
                    $('#calendar-handle-a').val($.mCalendarOpts.format.datetime(date));
                    startDate = date;
                },
                clear: function(date, wrap){
                    $('#calendar-handle-a').val('');
                    startDate = null;
                },
                clock: true
            });
            $('#calendar-handle-b').mCalendar({
                date: now,
                validate: function(date){
                    return startDate ? date > startDate && date < (new Date(startDate).setDate(startDate.getDate() + 3)) : true;
                },
                callback: function(date, wrap){
                    $('#calendar-handle-b').val($.mCalendarOpts.format.datetime(date));
                    endDate = date;
                },
                clear: function(date, wrap){
                    $('#calendar-handle-b').val('');
                    endDate = null;
                },
                clock: true
            });

            $('.calendar-handle-date').each(function(){
                var $this = $(this);
                $this.mCalendar({
                    callback: function(date, wrap){
                        $this.val($.mCalendarOpts.format.date(date));
                    },
                    mode: 'date'
                });
            });
            $('.calendar-handle-time').each(function(){
                var $this = $(this);
                $this.mCalendar({
                    callback: function(date, wrap){
                        $this.val($.mCalendarOpts.format.time(date));
                    },
                    mode: 'time'
                });
            });

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
                        <h1 class="m-box-h1">Calendar</h1>
                        <ul class="m-box-h2"></ul>
                        <ul class="m-box-h3"></ul>
                    </div>
                    <div class="m-box-body">
                        <form action="">
                            <ul class="m-form hori-form">
                                <li class="m-form-uhori">
                                    <label class="m-form-lb">Label A</label>
                                    <div class="m-form-in">
                                        <input class="m-input" id="calendar-handle-a" type="text" readonly/>
                                    </div>
                                </li>
                                <li class="m-form-uhori">
                                    <label class="m-form-lb">Label B</label>
                                    <div class="m-form-in">
                                        <input class="m-input" id="calendar-handle-b" type="text" readonly/>
                                    </div>
                                </li>
                                <li class="m-form-uhori">
                                    <label class="m-form-lb">Label C</label>
                                    <div class="m-form-in calendar-handle-half">
                                        <input class="m-input align-center calendar-handle-date"type="text" readonly/>
                                    </div>
                                    <div class="m-form-in calendar-handle-half">
                                        <input class="m-input align-center calendar-handle-time"type="text" readonly/>
                                    </div>
                                </li>
                            </ul>
                        </form>
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