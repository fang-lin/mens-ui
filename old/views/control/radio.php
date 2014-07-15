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
        <form action="">
            <ul class="m-form hori-fix-form">
                <li class="m-form-uhori-fix">
                    <label class="m-form-lb">Check</label>
                    <div class="m-form-in">
                        <?php
                        for($i = 0; $i < 50; $i++){
                            echo
                            '<div class="m-radio-item">
                                <label>Hook</label>
                                <span class="m-radio" state="off" type="check" name="test-radio-a"></span>
                            </div>';
                        }
                        ?>
                    </div>
                </li>
                <li class="m-form-uhori-fix">
                    <label class="m-form-lb">Dot</label>
                    <div class="m-form-in">
                        <div class="m-radio-item">
                            <span class="m-radio" state="off" type="dot" name="test-radio-b"></span>
                            <label>Item A</label>
                        </div>
                        <div class="m-radio-item">
                            <span class="m-radio" state="off" type="dot" name="test-radio-b"></span>
                            <label>Item A</label>
                        </div>
                        <div class="m-radio-item">
                            <span class="m-radio" state="off" type="dot" name="test-radio-b"></span>
                            <label>Item A</label>
                        </div>
                        <div class="m-radio-item">
                            <span class="m-radio" state="on" type="dot" name="test-radio-b"></span>
                            <label>Item A</label>
                        </div>
                        <div class="m-radio-item">
                            <span class="m-radio" state="off" type="dot" name="test-radio-b"></span>
                            <label>Item A</label>
                        </div>
                        <div class="m-radio-item">
                            <span class="m-radio" state="off" type="dot" name="test-radio-b"></span>
                            <label>Item A</label>
                        </div>
                        <div class="m-radio-item">
                            <span class="m-radio" state="off" type="dot" name="test-radio-b"></span>
                            <label>Item A</label>
                        </div>
                    </div>
                </li>
                <li class="m-form-uhori-fix">
                    <label class="m-form-lb">Cross</label>
                    <div class="m-form-in">
                        <div class="m-radio-item">
                            <span class="m-radio" state="on" type="cross" name="test-radio-c"></span>
                            <label>Item A</label>
                        </div>
                        <div class="m-radio-item">
                            <span class="m-radio" state="off" type="cross" name="test-radio-c"></span>
                            <label>Item B</label>
                        </div>
                        <div class="m-radio-item">
                            <span class="m-radio" state="off" type="cross" name="test-radio-c"></span>
                            <label>Item C</label>
                        </div>
                        <div class="m-radio-item">
                            <span class="m-radio" state="off" type="cross" name="test-radio-c"></span>
                            <label>Item D</label>
                        </div>
                    </div>
                </li>
                <li class="m-form-uhori-fix">
                    <label class="m-form-lb">Add</label>
                    <div class="m-form-in">
                        <div class="m-radio-item">
                            <label>Item A</label>
                            <span class="m-radio" state="off" type="add" name="test-radio-d"></span>
                        </div>
                        <div class="m-radio-item">
                            <label>Item B</label>
                            <span class="m-radio" state="off" type="add" name="test-radio-d"></span>
                        </div>
                        <div class="m-radio-item">
                            <label>Item C</label>
                            <span class="m-radio" state="on" type="add" name="test-radio-d"></span>
                        </div>
                        <div class="m-radio-item">
                            <label>Item D</label>
                            <span class="m-radio" state="off" type="add" name="test-radio-d"></span>
                        </div>
                    </div>
                </li>
                <li class="m-form-uhori-fix">
                    <label class="m-form-lb">Minus</label>
                    <div class="m-form-in">
                        <div class="m-radio-item">
                            <label>A</label>
                            <span class="m-radio" state="on" type="minus" name="test-radio-e" disabled></span>
                        </div>
                        <div class="m-radio-item">
                            <label>B</label>
                            <span class="m-radio" state="off" type="minus" name="test-radio-e" disabled></span>
                        </div>
                        <div class="m-radio-item">
                            <label>C</label>
                            <span class="m-radio" state="off" type="minus" name="test-radio-e" disabled></span>
                        </div>
                        <div class="m-radio-item">
                            <label>D</label>
                            <span class="m-radio" state="off" type="minus" name="test-radio-e" disabled></span>
                        </div>
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