/*
 * jQuery Plugin : Frame Animate v1.4
 * http://www.oglen.net/demo/jFrameAnimate/
 * Copyright 2013, Justin Fang
 * Date: 2013-12-20
 *
 */

(function($){

    var FrameAnimate = function(initX, initY){
        this.initX = initX;
        this.initY = initY;
        this.x = this.initX;
        this.y = this.initY;
        this.count = 0;
    };
    FrameAnimate.prototype.next = function(intervalX, intervalY, total){
        this.x = this.initX - intervalX * (this.count % total);
        this.y = this.initY - intervalY * (this.count % total);
        this.count++;
    };

    $.fn.frameAnimate = function(init, fn){

        var init = $.extend({
            initX: 0,
            initY: 0,
            intervalX: 0,
            intervalY: 0,
            interval: 100,
            total: 1
        }, init);

        return this.each(function(){

            var $this = $(this)
              , f = new FrameAnimate(init.initX, init.initY);

            clearInterval( $(this).data('play') );

            $this.data('play', setInterval(function(){
                f.next(init.intervalX, init.intervalY, init.total);
                $this.css('background-position', f.x + 'px ' + f.y + 'px');
                (typeof fn == 'function') && fn(f.count, init.total);
            }, init.interval));
        });
    };

    $.fn.stopFrameAnimate = function(){
        return this.each(function(){
            clearInterval( $(this).data('play') );
        });
    }
})(jQuery);