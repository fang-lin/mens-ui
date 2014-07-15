<div class="m-box">
    <div class="m-box-header">
        <h1 class="m-box-h1">icon title</h1>
        <ul class="m-box-h2">
            <li>
                <a href="#">menu-0</a>
            </li>&nbsp;<li>
                <a href="#">menu-1</a>
            </li>&nbsp;<li>
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
        <form id="checkbox-form">
            <ul class="m-form checkbox-form">
                <li class="m-form-uhori-fix">
                    <label class="m-form-lb">
                        <div class="m-checkbox-item">
                            <label for="">Reverse</label>
                            <span class="m-checkbox" state="off" for="test-checkbox-a" rule="reverse"></span>
                        </div>
                    </label>
                    <div class="m-form-in">
                        <div class="m-form-in">
                            <?php
                            for($i = 0; $i < 50; $i++){
                                echo
                                '<div class="m-checkbox-item">
                                    <span class="m-checkbox" state="' . ($i % 3 ? 'on' : 'off') . '" type="check" name="test-checkbox-a"></span>
                                    <label>Item '. $i .'</label>
                                </div>';
                            }
                            ?>
                        </div>
                    </div>
                </li>
                <li class="m-form-uhori-fix">
                    <label class="m-form-lb">
                        <div class="m-checkbox-item">
                            <label for="">All</label>
                            <span class="m-checkbox" state="off" type="dot" for="test-checkbox-b" rule="all"></span>
                        </div>
                    </label>
                    <div class="m-form-in">
                        <?php
                            for($i = 0; $i < 50; $i++){
                                echo
                                '<div class="m-checkbox-item">
                                    <span class="m-checkbox" state="' . ($i % 3 ? 'on' : 'off') . '" type="dot" name="test-checkbox-b"></span>
                                    <label>Item '. $i .'</label>
                                </div>';
                            }
                        ?>
                    </div>
                </li>
                <li class="m-form-uhori-fix">
                    <label class="m-form-lb">Cross</label>
                    <div class="m-form-in">
                        <div class="m-checkbox-item">
                            <span class="m-checkbox" state="on" type="cross" name="test-checkbox-c"></span>
                            <label>Item A</label>
                        </div>
                        <div class="m-checkbox-item">
                            <span class="m-checkbox" state="off" type="cross" name="test-checkbox-c"></span>
                            <label>Item B</label>
                        </div>
                        <div class="m-checkbox-item">
                            <span class="m-checkbox" state="on" type="cross" name="test-checkbox-c" disabled></span>
                            <label>Item C</label>
                        </div>
                        <div class="m-checkbox-item">
                            <span class="m-checkbox" state="off" type="cross" name="test-checkbox-c" disabled></span>
                            <label>Item D</label>
                        </div>
                    </div>
                </li>
                <li class="m-form-uhori-fix">
                    <label class="m-form-lb">Add</label>
                    <div class="m-form-in">
                        <div class="m-checkbox-item">
                            <label>Item A</label>
                            <span class="m-checkbox" state="on" type="add" name="test-checkbox-d"></span>
                        </div>
                        <div class="m-checkbox-item">
                            <label>Item B</label>
                            <span class="m-checkbox" state="off" type="add" name="test-checkbox-d"></span>
                        </div>
                        <div class="m-checkbox-item">
                            <label>Item C</label>
                            <span class="m-checkbox" state="on" type="add" name="test-checkbox-d" disabled></span>
                        </div>
                        <div class="m-checkbox-item">
                            <label>Item D</label>
                            <span class="m-checkbox" state="off" type="add" name="test-checkbox-d" disabled></span>
                        </div>
                    </div>
                </li>
                <li class="m-form-uhori-fix">
                    <label class="m-form-lb">Minus</label>
                    <div class="m-form-in">
                        <div class="m-checkbox-item">
                            <label>A</label>
                            <span class="m-checkbox" state="on" type="minus" name="test-checkbox-e"></span>
                        </div>
                        <div class="m-checkbox-item">
                            <label>B</label>
                            <span class="m-checkbox" state="off" type="minus" name="test-checkbox-e"></span>
                        </div>
                        <div class="m-checkbox-item">
                            <label>C</label>
                            <span class="m-checkbox" state="on" type="minus" name="test-checkbox-e" disabled></span>
                        </div>
                        <div class="m-checkbox-item">
                            <label>D</label>
                            <span class="m-checkbox" state="off" type="minus" name="test-checkbox-e" disabled></span>
                        </div>
                    </div>
                </li>
                <li class="m-form-uhori-fix">
                    <label class="m-form-lb">Check</label>
                    <div class="m-form-in">
                        <div class="m-radio-item">
                            <label>Apple</label>
                            <span class="m-radio" state="off" type="check" name="test-radio-n" value="Apple"></span>
                        </div>
                        <div class="m-radio-item">
                            <label>Banana</label>
                            <span class="m-radio" state="off" type="check" name="test-radio-n" value="Banana"></span>
                        </div>
                        <div class="m-radio-item">
                            <label>Cat</label>
                            <span class="m-radio" state="off" type="check" name="test-radio-n" value="Cat"></span>
                        </div>
                        <div class="m-radio-item">
                            <label>Dog</label>
                            <span class="m-radio" state="off" type="check" name="test-radio-n" value="Dog"></span>
                        </div>
                        <div class="m-radio-item">
                            <label>Earth</label>
                            <span class="m-radio" state="on" type="check" name="test-radio-n" value="Earth"></span>
                        </div>
                        <div class="m-radio-item">
                            <label>Fish</label>
                            <span class="m-radio" state="off" type="check" name="test-radio-n" value="Fish"></span>
                        </div>
                        <div class="m-radio-item">
                            <label>Gear</label>
                            <span class="m-radio" state="off" type="check" name="test-radio-n" value="Gear"></span>
                        </div>
                        <div class="m-radio-item">
                            <label>Hook</label>
                            <span class="m-radio" state="off" type="check" name="test-radio-n" value="Hook"></span>
                        </div>
                    </div>
                </li>
                <li class="m-form-uhori-fix">
                    <label class="m-form-lb">Label A</label>
                    <div class="m-form-ntc"><br/></div>
                    <div class="m-form-in">
                        <div class="m-select" name="test-select-b">
                            <input type="text"/>
                            <span class=""></span>
                        </div>
                        <ul class="m-options" id="test-select-b">
                            <li><a href="#" data="A">Itme A</a></li>
                            <li><a href="#" selected="selected" data="B">Itme B</a></li>
                            <li><a href="#" data="C">Itme C</a></li>
                            <li><a href="#" data="D">Itme D</a></li>
                            <li><a href="#" data="E">Itme E</a></li>
                        </ul>
                    </div>
                </li>
                <li class="m-form-uhori-fix">
                    <label class="m-form-lb">&nbsp;</label>
                    <div class="m-form-in">
                        <input type="button" class="m-button" id="checkbox-submit" value="Submit"/>
                    </div>
                </li>
            </ul>
            <script>
                $(function(){
                    $('#checkbox-submit').click(function(){
                        var data = $('#checkbox-form').mSerialize();

                        console.log(data);
                    });
                });
            </script>
        </form>
    </div>
    <div class="m-box-footer">
        <div class="m-box-in-footer">
            class="m-box-footer"
        </div>
    </div>
</div>