<div class="row">
    <div>
        <div class="input-group">

        </div>
    </div>
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
                    <th>№ з/п</th>
                    <th>Дата отримання пакета документів від РДА/МВК</th>
                    <th>Реєстраційний № документа</th>
                    <th>Назва РДА/МВК</th>
                    <th>E-mail РДА/МВК</th>
                    <th>Кореспондент (суб`єкт звернення)</th>
                    <th>Назва адмін послуги</th>
                    <th>Назва суб`єкта надання адміністративної послуги (СНАП)</th>
                    <th>Дата передачі пакета документів до СНАП</th>
                    <th>ПІБ посадової особи СНАП, яка отримала пакет документів</th>
                    <th>Термін виконання</th>
                    <th>Дата повернення результату адмініпослуги від СНАП</th>
                    <th>Дата отримання представниками РДА/МВК оригіналів документів</th>
                    <th>ПІБ отримувача документів</th>
                    <th>Стан виконання</th>
                    <th>Примітка</th>
                    <?php
                    if ($_SESSION["user"]["is_admin"]) {
                        ?>
                        <th colspan="2">Дії</th>
                        <?php
                    }
                    ?>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($data as $cell) {
                    ?>
                    <tr class="<?php
                        switch ($cell['status']){
                            case 1: echo 'alert-success'; break;
                            case 2: echo 'alert-danger'; break;
                            case 3: echo 'alert-info'; break;
                        }
                    ?>">
                        <?php
                        foreach ($cell as $key => $value) {
                            if ($key != "id") {
                                ?>
                                <td>
                                    <?php
                                    if($key == "status"){
                                        switch ($value){
                                            case 1: echo "у роботі"; break;
                                            case 2: echo "не отримано РДА/МВК"; break;
                                            case 3: echo "завершено справу"; break;
                                        }
                                    }else {
                                        echo empty($value) ? " " : $value;
                                    }
                                    ?>
                                </td>
                                <?php
                            }
                            ?>
                            <?php
                        }
                        ?>
                        <?php
                        if ($_SESSION["user"]["is_admin"]) {
                            ?>
                            <td>
                                <form method="post" action="/main/edit">
                                    <input type="hidden" value="<?php echo $cell["id"] ?>" name="id">
                                    <input <?php echo $cell["status"] > 2 ? "disabled" : "" ?> class="btn" type="submit"
                                                                                               value="Змінити">
                                </form>
                            </td>
                            <td>
                                <form method="post" action="/main/del">
                                    <input type="hidden" value="<?php echo $cell["id"] ?>" name="id">
                                    <input <?php echo $cell["status"] > 2 ? "disabled" : "" ?> class="btn" type="submit"
                                                                                               value="Видалити">
                                </form>
                            </td>
                            <?php
                        }
                        ?>
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