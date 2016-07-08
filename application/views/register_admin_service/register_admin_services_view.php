<div class="row">
    <div>
        <div class="input-group">
            
        </div>
    </div>
    <div>
        <?php
        if(count($data) == 0){
            ?>
            <div class="alert alert-info">Дані відсутні</div>
            <?php
        }else{
         ?>
            <table>
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
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($data as $key => $value) {
                    if ($key != "id") {
                        ?>
                        <tr>
                        <td>
                            <?php
                            echo $value;
                            ?>
                        </td>
                        <?php
                    }
                    ?>
                    <td>
                        <form method="post" action="/main/edit">
                            <input type="hidden" value="<?php echo data["id"]?>" name="id">
                            <input type="submit" value="Змінити" name="id">
                        </form>
                    </td>
                    <td>
                        <form method="post" action="/main/del">
                            <input type="hidden" value="<?php echo data["id"]?>" name="id">
                            <input type="submit" value="Видалити" name="id">
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