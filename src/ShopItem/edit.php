<div class='right-button-margin'>
    <a href='/' class='btn btn-default pull-right'>Shop Item List</a>
</div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Description</td>
            <td>
                <input type="hidden" name="id" id="id" value=<?php echo isset($_GET['id'])? $_GET['id'] : "" ?> />
                <input
                    type="text"
                    name="description"
                    id="description"
                    value="<?php echo isset($shop_item->description)?$shop_item->description:'' ?>"
                    class="form-control"
                />
            </td>
        </tr>
        <tr>
            <td>Checked</td>
            <td>
                <label class="switch">
                    <?php
                        $check_item = isset($shop_item->checked) && $shop_item->checked? 'checked' : '';
                    ?>
                    <input
                        type="checkbox"
                        name="checked"
                        id="checked"
                        <?php echo $check_item; ?>
                        value="<?php echo isset($shop_item->checked)? $shop_item->checked : '0'; ?>"
                    >
                    <span class="slider round"></span>
                </label>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary <?php echo $submit_type;?>">Save</button>
            </td>
        </tr>
    </table>
</form>