<?php
if (!$_SESSION["user"]["is_admin"]) {
    header('Location:/');
}
?>
<div class="row">
    <div>
        <?php
        if (count($data) == 0) {
            ?>
            <div class="alert alert-info">Дані відсутні</div>
            <?php
        } else {
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th>Назва РДА/МВК</th>
                    <th>Назва Центру надання адміністративних послуг РДА/МВК</th>
                    <th>E-mail РДА/МВК</th>
                    <th colspan="2">Дії</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($data as $cell) {
                    ?>
                    <tr>
                    <?php
                    foreach ($cell as $key => $value) {
                        if ($key != "id") {
                            ?>
                            <td>
                                <?php
                                echo $value;
                                ?>
                            </td>
                            <?php
                        }
                        ?>
                        <?php
                    }
                    ?>
                        <td>
                            <form method="post" action="/rda/edit">
                                <input type="hidden" value="<?php echo $cell["id"] ?>" name="id">
                                <input class="btn" type="submit" value="Змінити">
                            </form>
                        </td>
                        <td>
                            <form method="post" action="/rda/del">
                                <input type="hidden" value="<?php echo $cell["id"] ?>" name="id">
                                <input class="btn" type="submit" value="Видалити">
                            </form>
                        </td>
                    </tr>
                        <?php
                }
                ?>
                </tbody>
            </table>
            <?php
        }
        ?>
    </div>
</div>