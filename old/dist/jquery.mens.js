(function($, _) {

    // (private) Make an element has a damping vibration.
    // damping function : f(x) = R*d^x (R > 0, 0 < d < 1, x > 0).
    // ==========================================================

    var _shakeBounce = function(el, args, isHoriz) {

        var opts = {
            range: 10,
            damping: .8,
            duration: 75,
            easing: 'swing',
            isHoriz: isHoriz
        },
        fn = function() {};

        if(args.length == 1) {
            _.isFunction(args[0]) && (fn = args[0]) || _.isObject(args[0]) && (opts = $.extend(opts, args[0]));
        }else if(args.length == 2) {
            _.isObject(args[0]) && (opts = $.extend(opts, args[0]));
            _.isFunction(args[1]) && (fn = args[1]);
        }
        var _reShakeBounce = function(i) {
            i++;
            var range = [+Math.floor(opts.range*Math.pow(opts.damping,i)), -Math.floor(opts.range*Math.pow(opts.damping,i))];
            i%2 || (range = range.reverse());

            var ranges = opts.isHoriz ? {
                left : range[0] + 'px',
                right : range[1] + 'px'
            } : {
                top : range[0] + 'px',
                bottom : range[1] + 'px'
            };

            $(el).stop().animate(ranges, opts.duration, opts.easing, function() {
                range[0] ? _reShakeBounce(i) : fn($(el).css('position', '')[0]);
            });
        };
        $(el).css('position', 'relative');
        _reShakeBounce(0);
    };
    
    // Make an element has a damping vibration (horizontal direction).
    // ===============================================================
    // $(el),uiShake();
    // $(el),uiShake(function(el){});
    // $(el),uiShake(opts);
    // $(el),uiShake(opts, function(el){});
    // opts : {
    //     range: 10,
    //     damping: 0.8,
    //     duration: 75,
    //     easing: 'swing'
    // }

    $.fn.mensShake = function() {
        var args = arguments;
        return this.each(function(i, el) {
            _shakeBounce(el, args, 1);
        });
    };

    // Make an element has a damping vibration (vertical direction).
    // =============================================================
    // $(el),uiBounce();
    // $(el),uiBounce(function(el){});
    // $(el),uiBounce(opts);
    // $(el),uiBounce(opts, function(el){});
    // opts : {
    //     range: 10,
    //     damping: 0.8,
    //     duration: 75,
    //     easing: 'swing'
    // }

    $.fn.mensBounce = function() {
        var args = arguments;
        return this.each(function(i, el) {
            _shakeBounce(el, args, 0);
        });
    };

    // set table style, supply ergodic callback to control td style.
    // =============================================================
    // $(table).mensTable(Boolean isReverse);
    // $(table).mensTable(function(index){ #return true/false to set td[index] style. });
    // $(table).mensTable(Boolean isReverse, function(index){ #return true/false to set td[index] style, was reversed by isReverse });

    $.fn.mensTable = function() {

        var args = arguments;
        return this.each(function(i, el) {

            var reverse = false, fn = false;
            if(args.length == 1) {
                _.isFunction(args[0]) ? (fn = args[0]) : (reverse = args[0]);
            }else if(args.length == 2) {
                reverse = args[0];
                _.isFunction(args[1]) && (fn = args[1]);
            }

            if(fn) {
                $(el).find('td').each(function(i, el) {
                    $(el).addClass(!(reverse ^ fn(i)) ? 'mens_tab_tr_odd' : 'mens_tab_tr_even');
                });
                $(el).find('tr').each(function(i, el) {
                    $(el).find('td:last, th:last').addClass('mens_tab_td_last');
                });

            }else{
                var cls = ['mens_tab_tr_odd', 'mens_tab_tr_even'];
                reverse && (cls = cls.reverse());
                $(el).find('tr:odd').addClass(cls[0]);
                $(el).find('tr:even').addClass(cls[1]);
                $(el).find('tr').each(function(i, el) {
                    $(el).find('td:last, th:last').addClass('mens_tab_td_last');
                });
            }
        });
    };
    
    // unrealized...
    // =============

    $.fn.mensTabHover = function() {
        return this.each(function(i, el) {
        });
    };
    
    // Progress.
    // =========
    // $(progressWrap).mensProgress('75%');

    $.fn.mensProgress = function(percent) {
        return this.each(function(i, el) {
            if( ! $(el).find('div').length) {
                var per = percent || $(el).html() || 0;
                $(el).html('<div></div>') && $(el).find('div').animate({
                    width: per
                });
            }
        });
    };

    // Form controls Trigger.
    // ======================
    // $(trigger).mensTriggerCilck(function(el, state){ #state: on/off });

    $.fn.mensTriggerCilck = function(fn) {

        return this.each(function(i, el) {
            $(el).click(function(event) {
                var args = ($(el).attr('state') == 'on') ? [0, 19, 'off'] : [-57, -19, 'on'];
                $(el).frameAnimate({
                    initY: args[0],
                    intervalY: args[1],
                    count: 0,
                    interval: 40,
                    total: 4
                }, function(count, total) {
                    (count == total-1) && $(el).stopFrameAnimate().attr('state', args[2]) && _.isFunction(fn) && fn(el, args[2]);
                });
            });
        });
    };

    // (private) form controls animate and callback.
    // =============================================

    var _uiCheckBtnCilck = function(el, initX, fn) {

        $(el).click(function(event) {

            var args = ($(el).attr('state') == 'on') ? [0, 18, 'off'] : [-36, -18, 'on'];
            $(el).frameAnimate({
                initX: initX,
                initY: args[0],
                intervalY: args[1],
                count: 0,
                interval: 40,
                total: 3
            }, function(count, total) {
                (count == total-1) && $(el).stopFrameAnimate().attr('state', args[2]) && _.isFunction(fn) && fn(el, args[2]);
            });
        });

    };

    // Form controls, callback was fired when its clicked.
    // ===================================================
    // $(controls).mensCheckboxCilck(function(el, state){ #state: on/off });

    $.fn.mensCheckboxCilck = function(fn) {
        return this.each(function(i, el) {

            _uiCheckBtnCilck(el, 0, fn);
        });
    };

    // $(controls).mensRadioCilck(function(el, state){ #state: on/off });

    $.fn.mensRadioCilck = function(fn) {
        var self = this;
        return this.each(function(i, el) {

            $(el).click(function(event) {

                if(! $(event.currentTarget).is('[state=on]')){

                    $(el).frameAnimate({
                        initX: -16,
                        initY: -36,
                        intervalY: -18,
                        count: 0,
                        interval: 40,
                        total: 3
                    }, function(count, total) {
                        (count == total-1) && $(el).stopFrameAnimate().attr('state', 'on') && _.isFunction(fn) && fn(el, 'on');
                    });
                    self.each(function(i, ele){
                        $(ele).is('[state=on]') && $(ele).frameAnimate({
                            initX: -16,
                            initY: 0,
                            intervalY: 18,
                            count: 0,
                            interval: 40,
                            total: 3
                        }, function(count, total) {
                            (count == total-1) && $(ele).stopFrameAnimate().attr('state', 'off');
                        });
                    });
                }
            });
        });
    };

    // $(controls).mensCrossboxCilck(function(el, state){ #state: on/off });

    $.fn.mensCrossboxCilck = function(fn) {
        return this.each(function(i, el) {
            
            _uiCheckBtnCilck(el, -32, fn);
        });
    };

    // $(controls).mensAddboxCilck(function(el, state){ #state: on/off });

    $.fn.mensAddboxCilck = function(fn) {
        return this.each(function(i, el) {
            
            _uiCheckBtnCilck(el, -48, fn);
        });
    };

    // $(controls).mensHrboxCilck(function(el, state){ #state: on/off });

    $.fn.mensHrboxCilck = function(fn) {
        return this.each(function(i, el) {
            
            _uiCheckBtnCilck(el, -64, fn);
        });
    };

    // LED number display.
    // ===================

    $.fn.mensLedNum = function(num, color) {
        return this.each(function(i, el) {
            var led = '';
            var nu = num || $.trim($(el).html()) || '-';
            var colo = 'green';
            color && (colo = 'red');
            for(i in nu) {
                led += '<span num="' + colo + '_' + nu[i] + '"></span>';
            }
            $(el).html(led);
        });
    };
    
    // (private) set position of express menu.
    // =======================================

    $.fn._setExpressTop = function() {
        return this.each(function(i, el) {
            $(el).css('top', ($('body').height() - $(el).outerHeight())/2)
        });
    };
    
    // Express menu in CI detail page.
    // ===============================

    $.fn.mensExpress = function() {
        return this.each(function(i, el) {
            $(el).css('right', - $(el).find('.mens_express_menu').outerWidth());
            $(el).find('.mens_express_handle').attr('state', 'off');

            $(el)._setExpressTop();
            var resizeThrottle = _.throttle(function() {
                $(el)._setExpressTop();
            }, 50);
            $(window.event?window:'body').resize(resizeThrottle);

            $(el).find('.mens_express_handle').click(function(event) {
                var args = ($(event.currentTarget).attr('state') == 'on') ? [-$(el).find('.mens_express_menu').outerWidth()+'px', 'off'] : [0, 'on'];
                $(el).stop().animate({
                    right: args[0]
                }, 100, function() {
                    $(event.currentTarget).attr('state', args[1]);
                });
            });

            $(el).find('a').each(function(i, el) {
                $(el).click(function(event) {
                    event.preventDefault();
                    $(window.webkitURL?'body':'html' + ':not(:animated)').animate({
                        scrollTop: $('#' + $(event.currentTarget).attr('href').split('#')[1]).offset().top - 20
                    }, 250);
                });
            });
        });
    };
    
    // multicolumns table, left-mid OR mid-right OR left-mid-right, the left and right can be slide out/in.
    // ====================================================================================================
    // $(mens_tabcard).mensFitTable();
    // $(mens_tabcard).mensFitTable(slideDuration);
    // $(mens_tabcard).mensFitTable(function(li, section){});
    // $(mens_tabcard).mensFitTable(slideDuration ,function(li, section){});

    $.fn.mensFitTable = function() {
        
        var time = 150, fn = function() {};
        if(arguments.length == 1) {
            _.isFunction(arguments[0]) && (fn = arguments[0]) || _.isNumber(arguments[0]) && (time = arguments[0]);
        }else if(arguments.length == 2) {
            _.isNumber(arguments[0]) && (time = arguments[0]);
            _.isFunction(arguments[1]) && (fn = arguments[1]);
        }

        return this.each(function(i, el) {

            var tab = $(el);
            // (private) apply height to left/right hiehgt.
            var _fitHeight = function(height) {
                $(el).find('.mens_fitab_l').height(height);
                $(el).find('.mens_fitab_r').height(height);
                $(el).find('.mens_fitab_lr').height(height);
                $(el).find('.mens_fitab_rl').height(height);
            };
            // (private) bind click events to each table card title bar.
            $.fn._uiFitabBar = function() {

                return this.each(function(i, el) {

                    $(el).find('.mens_fitab_lt,.mens_fitab_rt').each(function(i, ul) {
                        // Bind click to each incoming element.
                        $(ul).find('li').click(function(event) {
                            $(event.currentTarget).addClass('mens_fitab_t_press').siblings('li').removeClass('mens_fitab_t_press');
                            $(el).find('.fitab_section').eq($(event.currentTarget).index()).show().siblings('.fitab_section').hide();
                            fn(event.currentTarget, $(el).find('.fitab_section').eq($(event.currentTarget).index())[0]);
                            _fitHeight(tab.find('.mens_fitab_m').height());
                        }).eq(0).click();
                    });
                    // Fix height of title bar to make it nowrap when slide out.
                    $('.mens_fitab_lt,.mens_fitab_rt').each(function(i, el) {
                        $(el).height($(el).height());
                    });
                });
            };
            // fired above.
            $('.mens_fit_cols_l,.mens_fit_cols_r,.mens_fit_cols_m')._uiFitabBar();
            // set left/right height
            _fitHeight($(el).find('.mens_fitab_m').height());
            // when the browser window resize, set left/right height.
            $(window.event?window:'body').resize(function(event) {
                _fitHeight($(el).find('.mens_fitab_m').height());
            });
            // singleton fired, save inital width of left/right. 
            $(el).find('.mens_fit_cols_l,.mens_fit_cols_r').each(function(i, el) {
                $(el).data('_wid', $(el).width());
            });
            // bind click event to left/right narrow slit, action are slide closing/opening.
            $(el).find('.mens_fitab_lr,.mens_fitab_rl').each(function(i, rl) {
                
                $(rl).click(function(event) {
                    
                    var col = $(event.currentTarget).parent().parent('.mens_fit_cols_l,.mens_fit_cols_r');
                    // slide left/right to open.
                    if($(event.currentTarget).data('state')) {
                        col.animate({
                            width: col.data('_wid') + 'px'
                        }, {
                            duration: time,
                            step: function(step, tween) {
                                _fitHeight(tab.find('.mens_fitab_m').height());
                            },
                            complete: function() {
                                _fitHeight(tab.find('.mens_fitab_m').height());
                                col.find('.mens_fit_cols_m').show(0);
                                col.find('.mens_fitab_lt li,.mens_fitab_rt li').show(0);
                                $(event.currentTarget).data('state', false);
                            }
                        });
                    // slide left/right to close.
                    }else{
                        col.find('.mens_fitab_lt li,.mens_fitab_rt li').hide(0);
                        col.animate({
                            width: '7px'
                        }, {
                            duration: time,
                            step: function(step, tween) {
                                _fitHeight(tab.find('.mens_fitab_m').height());
                            },
                            complete: function() {
                                col.find('.mens_fit_cols_m').hide(0);
                                $(event.currentTarget).data('state', true);
                            }
                        });
                    }
                });
            });
        });
    };
    
    // Set Table card all things.
    // ==========================
    // $(mens_tabcard).mensTabCard(fucntion(li, section){ #li was clicked, section was showed context });

    $.fn.mensTabCard = function() {

        var evt = 'click', fn = false;
        if(arguments.length == 1) {
            _.isString(arguments[0]) && (evt = arguments[0]) || _.isFunction(arguments[0]) && (fn = arguments[0]);
        }else if(arguments.length == 2) {
            _.isString(arguments[0]) && (evt = arguments[0]);
            _.isString(arguments[1]) && (fn = arguments[1]);
        }

        return this.each(function(i, el) {

            var eventDeal = function(event) {
                $(event.currentTarget).addClass('mens_tabcard_t_press').siblings('li').removeClass('mens_tabcard_t_press');
                $(el).find('.mens_tabcard_section').eq($(event.currentTarget).index()).show().siblings('.mens_tabcard_section').hide();
                _.isFunction(fn) && fn(event.currentTarget, $(el).find('.mens_tabcard_section').eq($(event.currentTarget).index())[0]);
            };

            $(el).find('.mens_tabcard_t li').each(function(i, li){
                $(li).on(evt, eventDeal);

            }).eq(0).trigger(evt);
        });
    };

    // Set Step card all things.
    // ==========================
    // $(mens_tabcard).mensStepCard(fucntion(li, section){ #li was clicked, section was showed context });

    $.fn.mensStepCard = function() {

        var evt = 'step', fn = false;
        if(arguments.length == 1) {
            _.isString(arguments[0]) && (evt = arguments[0]) || _.isFunction(arguments[0]) && (fn = arguments[0]);
        }else if(arguments.length == 2) {
            _.isString(arguments[0]) && (evt = arguments[0]);
            _.isString(arguments[1]) && (fn = arguments[1]);
        }

        return this.each(function(i, el) {

            var eventDeal = function(event) {
                $(event.currentTarget).removeClass('mens_stepcard_t_pass').addClass('mens_stepcard_t_press').prevAll('li').removeClass('mens_stepcard_t_press').addClass('mens_stepcard_t_pass').end().nextAll('li').removeClass('mens_stepcard_t_press mens_stepcard_t_pass');
                $(el).find('.mens_stepcard_section').eq($(event.currentTarget).index()).show().siblings('.mens_stepcard_section').hide();
                _.isFunction(fn) && fn(event.currentTarget, $(el).find('.mens_stepcard_section').eq($(event.currentTarget).index())[0]);
            };

            $(el).find('.mens_stepcard_t li').each(function(i, li){
                $(li).on(evt, eventDeal);

            }).eq(0).trigger(evt);
        });
    };

    // Set droplist and binding click event and callback to options.
    // =============================================================
    // $(droplist).mensDroplist(fucntion(li){ #li was clicked });

    $.fn.mensDroplist = function(fn) {

        return this.each(function(i, el) {    
            $(el).prev().click(function(event) {
                event.stopPropagation();
                $('.mens_droplist').fadeOut(100);
                $(el).fadeToggle(100);
            });
            $(el).find('li').click(function(event) {
                _.isFunction(fn) && fn(event.currentTarget);
            });
        });
    };
    
    // Toggle mask.
    // ============

    // $.mensMaskToggle = $.fn.mensMaskToggle = function() {
    //     // $('body').toggleClass('no_scroll');
    //     $('#mask').fadeToggle(100);
    //     return this;
    // }
    
    // Show mask and set its z-index.
    // ==============================

    $.mensMaskShow = $.fn.mensMaskShow = function(zIndex) {
        var zI = zIndex || '';
        // $('body').addClass('no_scroll');
        $('#mask').css('z-index', zI).stop().fadeIn(100);
        return this;
    };
    
    // Hide mask and clear its z-index.
    // ================================

    $.mensMaskHide = $.fn.mensMaskHide = function() {
        // $('body').removeClass('no_scroll');
        $('#popups_wrap').data('maxZIndex', null);
        $('#mask').fadeOut(100, function(){
            $('#mask').css('z-index', '');
        });
        return this;
    };
    
    // Slide down slide_box.
    // =====================
    // $(el).mensSlideDownBox(html, [function(el){}]);

    $.mensSlideDownBox = function(html, fn) {
        $('#mens_slide_box_wrap').show(0).html(html).css('top', -$('#mens_slide_box_wrap').height()+'px').animate({
            top: 0
        }, 150, function() {
            _.isFunction(fn) && fn($(html));
        });
        return this;
    };

    // Slide up slide_box.
    // ===================

//    $.mensSlideUpBox = function() {
//        $('#mens_slide_box_wrap').animate({
//            top: -$('#mens_slide_box_wrap').height()+'px'
//        }, 150, function() {
//            $('#mens_slide_box_wrap').html('').hide(0).css('top', '-10000px');
//        });
//        return this;
//    };

    // Append pop box to #popups_wrap.
    // ===================================
    // $(el).mensAppendPopBox(html);
    // $(el).mensAppendPopBox([x,y], html);
    // $(el).mensAppendPopBox(html, function(el){ #Execute at pop box appeared }, function(el){ #Execute at pop box was closed });
    // $(el).mensAppendPopBox([x,y], html, function(el){ #Execute at pop box appeared }, function(el){ #Execute at pop box was closed });

    $.mensAppendPopBox = function() {

        var xy = false, html = '', fnIn = false, fnOut = false;
        if(arguments.length == 1) {
            _.isString(arguments[0]) && (html = arguments[0]);
        }else if(arguments.length == 2) {
            _.isArray(arguments[0]) && (xy = arguments[0]);
            _.isString(arguments[1]) && (html = arguments[1]);
        }else if(arguments.length == 3) {
            _.isString(arguments[0]) && (html = arguments[0]);
            _.isFunction(arguments[1]) && (fnIn = arguments[1]);
            _.isFunction(arguments[2]) && (fnOut = arguments[2]);
        }else if(arguments.length == 4) {
            _.isArray(arguments[0]) && (xy = arguments[0]);
            _.isString(arguments[1]) && (html = arguments[1]);
            _.isFunction(arguments[2]) && (fnIn = arguments[2]);
            _.isFunction(arguments[3]) && (fnOut = arguments[3]);
        }

        // append html to wrap, add z-index date to .mens_pop_boxes_wrap.
        $('#popups_wrap').append(html).data('maxZIndex') ? $('#popups_wrap').data('maxZIndex', $('#popups_wrap').data('maxZIndex')*1+2) : $('#popups_wrap').data('maxZIndex', 40);
        // xy is undefined, set the pop box in center of window
        xy || $('.mens_pop_box_wrap:last').css('top', ($('body').height()-$('.mens_pop_box_wrap:last').height())/2).css('left', ($('body').width()-$('.mens_pop_box_wrap:last').width())/2);
        // set xy
        xy && $('.mens_pop_box_wrap:last').css('left', xy[0]).css('top', xy[1]);
        // when mousedown fired in pop_box, config its z-index to make it on top.
        $('.mens_pop_box_wrap:last').width($('.mens_pop_box_wrap:last').width()).hide(0).fadeIn(100).css('z-index', $('#popups_wrap').data('maxZIndex')).mousedown(function(event) {        
            if($(event.currentTarget).css('z-index') != $('#popups_wrap').data('maxZIndex')){
                $(event.currentTarget).css('z-index', $('#popups_wrap').data('maxZIndex')*1 + 2);
                $('#popups_wrap').data('maxZIndex', $(event.currentTarget).css('z-index'));
            }
        // binding close pop box action.
        }).find('.mens_pop_box_close').click(function(event) {
            $(event.currentTarget).offsetParent('.mens_pop_box_wrap').fadeOut(200, function(){
                // Execute close callback.
                _.isFunction(fnOut) && fnOut(this);
                $(this).remove();
            });
        }).end().find('.mens_pop_box_max').click(function(event) {
            var _box = $(event.currentTarget).offsetParent('.mens_pop_box_wrap');
            _box.css('top', 0).css('right', 0).css('bottom', 0).css('left', 0).css('width', 'auto');
            _box.hasClass('can_be_draged') && _box.removeClass('can_be_draged');
        });
        // Execute fade in callback
        _.isFunction(fnIn) && fnIn($('.mens_pop_box_wrap:last')[0]);

        // When mousedown event was fired, bind darging action to .mens_pop_box.
        $('.mens_pop_box_bar:last').mousedown(function(event) {
            event.preventDefault();

            if($(event.currentTarget).parent().parent('.mens_pop_box_wrap').hasClass('can_be_draged')){
                $(event.currentTarget).parent().parent('.mens_pop_box_wrap').addClass('drag_box');
                $('body').addClass('draging');
                // get mouse offset to pop_box_bar.
                var offset = {};
                offset.x = $(event.currentTarget).offset().left - event.pageX;
                offset.y = $(event.currentTarget).offset().top - event.pageY;

                $('body').mousemove(function(event) {
                    $('.drag_box').css('left', event.clientX + offset.x).css('top', event.clientY + offset.y);
                // mouseup, unbind draging action.
                }).mouseup(function(event) {
                    $('body').off('mousemove').removeClass('draging');
                    $('.mens_pop_box_wrap').removeClass('drag_box');
                // mouse leave body, trigger mouseup.
                }).mouseleave(function(event) {
                    $('body').mouseup();
                });
            }
        });
    };
    
    // Remove all pop boxes form wrap.
    // ===============================
    // $(pop_box).mensRemovePopBox(html);

    $.fn.mensRemovePopBox = function() {

        return this.each(function(i, el) {
            $(el).find('.mens_pop_box_close').click();
        });
    };
    
    // A decorative UI gear, supply strings animate.
    // =============================================
    // $(pop_box).mensMarbles(arr, speed);

    $.fn.mensMarbles = function() {
        var list = ['...&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;','..&nbsp;.&nbsp;&nbsp;&nbsp;&nbsp;','..&nbsp;&nbsp;.&nbsp;&nbsp;&nbsp;','.&nbsp;.&nbsp;&nbsp;.&nbsp;&nbsp;','.&nbsp;&nbsp;.&nbsp;&nbsp;.&nbsp;','&nbsp;.&nbsp;&nbsp;.&nbsp;&nbsp;.','&nbsp;&nbsp;.&nbsp;&nbsp;.&nbsp;.','&nbsp;&nbsp;&nbsp;&nbsp;.&nbsp;..','&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...','&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...','&nbsp;&nbsp;&nbsp;&nbsp;.&nbsp;..','&nbsp;&nbsp;.&nbsp;&nbsp;.&nbsp;.','&nbsp;.&nbsp;&nbsp;.&nbsp;&nbsp;.','.&nbsp;&nbsp;.&nbsp;&nbsp;.&nbsp;','.&nbsp;.&nbsp;&nbsp;.&nbsp;&nbsp;','..&nbsp;&nbsp;.&nbsp;&nbsp;&nbsp;','..&nbsp;.&nbsp;&nbsp;&nbsp;&nbsp;','...&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'];
        var speed = 100;
        if(arguments.length == 1) {
            _.isArray(arguments[0]) && (list = arguments[0]) || _.isNumber(arguments[0]) && (speed = arguments[0]);
        }else if(arguments.length == 2) {
            _.isArray(arguments[0]) && (list = arguments[0]);
            _.isNumber(arguments[1]) && (speed = arguments[1]);
        }
        return this.each(function(i, el) {
            var i = 0;
            setInterval(function(){
                $(el).html(list[i]);
                (i == list.length - 1) ? (i = 0) : i++;
            }, speed);
        });
    };

    // (private) Make main menu to response mouse hover event.
    // =============================================
    // $(pop_box).mensMarbles(opts);
    // opts : {
    // magic: true, # on/off magic mode.
    //     delay: 800, # mouse leaving menu area to reset menu.
    //     spurt: 500, # magic mode delay.
    //     angle: .01, # mouse track check angle.
    //     tracksLength: 5 # length of tracks queue.
    // }

    $._magicMenu = function(opts){

        var _t = null, // mouse leaving timeout handle.
        _opts = $.extend({
            magic: true, // on/off magic mode.
            delay: 800, // mouse leaving menu area to reset menu.
            spurt: 500, // magic mode delay.
            angle: .01, // mouse track check angle.
            tracksLength: 10 // length of tracks queue.
        }, opts);
        // Set Pressed button class.
        $('.submenu_btn a').each(function(i, el){
            if( $(el)[0].href == window.location.href ){
                $(el).parent('li').addClass('submenu_btn_press').removeClass('submenu_btn');
                $('.menu_btn').eq($(el).parent('li').parent('.submenu').index()).addClass('menu_btn_press').removeClass('menu_btn');
            }
        });
        // (private) change menu branch.
        var _pressBtn = function(el){

            $('.menu_btn_press').removeClass('menu_btn_press').addClass('menu_btn');
            $(el).addClass('menu_btn_press').removeClass('menu_btn');

            $('.submenu:visible').hide(0);
            $('.submenu').eq($(el).index()).show(0);
        };
        // Display current menu branch.
        $('.submenu_btn_press').parent().show(0);
        // Binding mouseenter event to main menu button, if magic is on, deal with tracks queue.
        $('#menu li').mouseenter(function(event) {
            var el = event.currentTarget;

            var duration = 0;
            // Magic mode
            if(_opts.magic){
                clearTimeout($(event.currentTarget).data('fired'));
                // Get average of tracks queue.
                var sum = 0;
                for(var i in $('#menu_wrap').data('tracks')) {
                    sum += $('#menu_wrap').data('tracks')[i];
                }
                // Set menu change duration with tracks angle.
                duration = sum / $('#menu_wrap').data('tracks').length > _opts.angle ? _opts.spurt : 0;
                // Delayed fired menu change.
                $(el).data('fired', setTimeout(function() {
                    _pressBtn(el);
                }, duration));
            }else{
                // Off magic mode.
                _pressBtn(el);
            }
        });
        // If magic mode on, bind clear action when mouse leave menu button.
        _opts.magic && $('#menu li').mouseleave(function(event) {
            clearTimeout($(event.currentTarget).data('fired'));
        });
        // Mouse leave menu area, delayed deal with reset action. 
        $('#menu_wrap').mouseleave(function(event) {

            _t = setTimeout(function(){
                $('.submenu:visible').hide(0);
                $('.submenu_btn_press').parent().show(0);

                $('.menu_btn_press').removeClass('menu_btn_press').addClass('menu_btn');
                $('.submenu_btn_press').length && $('#menu li').eq($('.submenu_btn_press').parent('.submenu').index()).addClass('menu_btn_press').removeClass('menu_btn');
            
            }, _opts.delay);
        // mouse reenter the menu, clear the menu reset aciton.
        }).mouseover(function() {
            clearTimeout(_t);
        });
        // If magic mode is on, record mouse move tracks.
        if(_opts.magic){

            $('#menu_wrap').mousemove(function(event) {
                // Get last mouse move event object.
                if($(event.currentTarget).data('eRec')) {
                    // Get difference of current and last mouse XY.
                    var dif = [event.clientX - $(event.currentTarget).data('eRec').clientX, event.clientY - $(event.currentTarget).data('eRec').clientY];
                    // If have tracks queue, push in and pop out record.
                    if($(event.currentTarget).data('tracks')){
                        // the queue was not full.
                        if($(event.currentTarget).data('tracks').length < _opts.tracksLength){
                            // Push only.
                            $(event.currentTarget).data('tracks').push((Math.atan2(dif[1], Math.abs(dif[0])) / Math.PI*2));
                        }else{
                            // Queue was full, push and pop.
                            $(event.currentTarget).data('tracks').shift();
                            $(event.currentTarget).data('tracks').push((Math.atan2(dif[1], Math.abs(dif[0])) / Math.PI*2));
                        }
                    }else{
                        // Initialize tracks queue.
                        $(event.currentTarget).data('tracks', []);
                    }
                }
                // Initialize mouse event record.
                $(event.currentTarget).data('eRec', event);
            });
        }
    };

    // singleton firing.
    // =================

    $(function() {
        // fade droplist automaticly.
        $('body').click(function() {
            $('.mens_droplist').fadeOut(100);
        });
        // Bind hover event to main menu and submenu.
        $._magicMenu({magic:false});
    });

})(jQuery, _);