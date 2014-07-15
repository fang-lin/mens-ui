<div class="m-box">
    <div class="m-box-header">
        <h1 class="m-box-h1">
            class="m-table m-col-12 bor-less" type="col"
        </h1>
        <ul class="m-box-h2"></ul>
        <ul class="m-box-h3">
            <li>
                <a href="#">more</a>
            </li>
        </ul>
    </div>
    <div class="m-box-body">
        <table class="m-table m-col-12 bor-less" type="col:1" td-resize="on">
            <?php
            for($row = 0; $row < 100; $row++){
                echo '<tr>';
                for($col = 0; $col < 5; $col++){
                    if($row == 0){
                        echo '<th>row:'. $row. ' col:'. $col. '</th>';
                    }else{
                        echo '<td>row:'. $row. ' col:'. $col. '</td>';
                    }
                }
                echo '</tr>';
            }
            ?>
        </table>
    </div>
    <div class="m-box-footer">
        <div class="m-box-in-footer">

        </div>
    </div>
</div>