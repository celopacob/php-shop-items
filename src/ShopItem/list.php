<div class='right-button-margin'>
    <a href='src/ShopItem/create.php' class='btn btn-default pull-right'>Create Shop Item</a>
</div>
<table class="tbl-qa">
    <thead>
        <tr>
            <th class="table-header" width="5%"></th>
            <th class="table-header" width="50%">Description</th>
            <th class="table-header" width="10%">Actions</th>
        </tr>
    </thead>
    <tbody id="table-body">
        <?php
        if (!empty($result)) {
            foreach($result as $item) {
        ?>
            <tr class="table-row">
                <td>
                    <?php
                        $item_id = $item['id'];
                        $item_checked = $item["checked"];
                        $check_uncheck = $item["checked"] == 1? "glyphicon-check" : "glyphicon-unchecked";
                        echo "<i edit-id='$item_id' edit-checked='$item_checked' class='glyphicon $check_uncheck switch-checked'></i>"
                    ?>
                </td>
                <td><?php echo $item["description"]; ?></td>
                <td>
                    <a href='src/ShopItem/update.php?id=<?php echo $item['id']; ?>'>
                        <i class='glyphicon glyphicon-edit'></i>
                    </a>
                </td>
                <td>
                    <a delete-id="<?php echo $item['id'] ?>" id="delete-item">
                        <i class='glyphicon glyphicon-remove'></i>
                    </a>
                </td>
            </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>