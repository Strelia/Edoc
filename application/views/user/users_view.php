<?php
if ($_SESSION["user"]["role_user"] != "admin") {
    header('Location:/main/');
}
?>

<div class="row">
    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
        <a class="btn btn-success" href="/user/addUser">Додати користувача</a>
    </div>
    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
        <?php
        if (count($data) == 0) {
            ?>
            <div class="alert alert-info">Данні відсутні</div>
            <?php
        } else {
            ?>
            <table class="table table-custom">
                <thead>
                <tr>
                    <th>П.І.Б</th>
                    <th>Мобільний телефон</th>
                    <th>Домашній телефон</th>
                    <th>Адреса</th>
                    <th>Електрона адреса</th>
                    <th>Статус</th>
                    <th colspan="2">Дії</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($data as $row) {
                    ?>
                    <tr>
                        <?php
                        foreach ($row as $name => $cell) {
                            if ($name != "id_user" && $name != "pass_user") {
                                ?>
                                <td><?php
                                    if (empty($cell)) {
                                        echo "Данні не надані";
                                    } else {
                                        switch ($cell) {
                                            case "admin":
                                                echo "Адміністратор";
                                                break;
                                            case "studen":
                                                echo "Студент";
                                                break;
                                            case "teacher":
                                                echo "Вчитель";
                                                break;
                                            case "dean":
                                                echo "Декан";
                                                break;
                                            default:
                                                echo $cell;
                                                break;
                                        }
                                    }
                                    ?></td>
                                <?php
                            }
                        }
                        ?>
                        <td>
                            <form action="/user/editUser" method="post">
                                <input name="id_user" type="hidden" value="<?php echo $row['id_user'] ?>">
                                <input type="submit" class="btn btn-info" value="Змінити">
                            </form>
                        </td>
                        <td>
                            <form action="/user/deleteUser" method="post">
                                <input name="id_user" type="hidden" value="<?php echo $row['id_user'] ?>">
                                <input type="submit" class="btn btn-danger" value="Видалити">
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