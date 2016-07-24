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
            <form id="form_f" hidden="hidden" class="form-horizontal" method="post" action="/main/">
                <div class="form-group">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">№ з/п</div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><input class="form-control" type="number"
                                                                             name="id_st_f"
                                                                             placeholder="Початковий номер">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><input class="form-control" type="number"
                                                                             name="id_fin_f"
                                                                             placeholder="Кінцевий номер"></div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">Дата отримання пакета документів від
                        РДА/МВК
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><input class="form-control" type="date"
                                                                             name="date_package_doc_RDA_st_f">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><input class="form-control" type="date"
                                                                             name="date_package_doc_RDA_fin_f">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">Реєстраційний № документа</div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><input type="text" name="reg_num_doc_f"
                                                                             class="form-control"
                                                                             placeholder="№ 220 від 09.03.2016"></div>
                </div>
                <?php
                if ($_SESSION["user"]["role"] != "rda") {
                    ?>
                    <div class="form-group">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">Назва РДА/МВК</div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><input list="rda" type="text" id="rda_id"
                                                                                 name="name_rda_f"
                                                                                 class="form-control"></div>
                        <datalist id="rda">
                            <?php
                            $req = DBUtil::connectDB()->query("SELECT * FROM rdas");
                            if ($req->num_rows > 0) {
                            while ($res = $req->fetch_assoc()) {
                            ?>
                            <option
                                value="<?php echo $res["name_rda"]; ?>">
                                <?php
                                }
                                }
                                ?>
                        </datalist>
                    </div>
                    <?php
                }
                ?>
                <div class="form-group">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">Кореспондент (суб`єкт звернення)</div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><input type="text" name="correspondent_f"
                                                                             class="form-control"
                                                                             placeholder="Прометей, ТОВ">
                    </div>
                </div>
                <?php
                if ($_SESSION["user"]["role"] != "snap") {
                    ?>
                    <div class="form-group">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">Назва адмін послуги</div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><input list="snap" type="text"
                                                                                 id="snap_id" name="snap_id_f"
                                                                                 class="form-control">
                        </div>
                    </div>
                    <datalist id="snap">
                        <?php
                        $req = DBUtil::connectDB()->query("SELECT * FROM snaps");
                        if ($req->num_rows > 0) {
                        while ($res = $req->fetch_assoc()) {
                        ?>
                        <option id="<?php echo $res["id"] ?>"
                                value="<?php echo substr($res["name_entity_providing_admin_services"], 0, 90) . "  |   " . substr($res["name_admin_services"], 0, 90); ?>">
                            <?php
                            }
                            }
                            ?>
                    </datalist>
                <?php }
                ?>
                <div class="form-group">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">Дата передачі пакета документів до СНАП</div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <input class="form-control" type="date" name="date_transmission_doc_snap_st_f">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <input class="form-control" type="date" name="date_transmission_doc_snap_fin_f">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">ПІБ посадової особи СНАП, яка отримала пакет
                        документів
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <input class="form-control" type="text" name="snap_name_receiv_doc_f">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">Термін виконання</div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <input class="form-control" type="date" name="deadline_st_f">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <input class="form-control" type="date" name="deadline_fin_f">
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">Дата повернення результату адмініпослуги від
                        СНАП
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <input class="form-control" type="date" name="returning_res_admin_services_snap_st_f">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <input class="form-control" type="date" name="returning_res_admin_services_snap_fin_f">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">Дата отримання представниками РДА/МВК оригіналів
                        документів
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <input class="form-control" type="date" name="date_representatives_rda_doc_st_f">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <input class="form-control" type="date" name="date_representatives_rda_doc_fn_f">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">ПІБ отримувача документів</div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <input class="form-control" type="text" name="recipient_name_doc_f">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">Примітка</div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <input class="form-control" type="text" name="note_f">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">Стан виконання</div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="checkbox">
                            <label><input type="checkbox" name="status_f[]" value="0">Файл відправили</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="status_f[]" value="1">у роботі</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="status_f[]" value="2">надіслано відповідь</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="status_f[]" value="3">не отримано РДА/МВК</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="status_f[]" value="4">завершено справу</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input class="btn btn-default" type="submit" value="Пошук">
                </div>
            </form>
            <input id="show_hide" type="button" class="btn bg-info" value="Розгорнути фільтр">
            <table class="table table-custom">
                <thead>
                <tr>
                    <th>№ з/п</th>
                    <th>Дата отримання пакета документів від РДА/МВК</th>
                    <th>Реєстраційний № документа</th>
                    <th>Назва РДА/МВК</th>
                    <th>E-mail РДА/МВК</th>
                    <th>Надісланий файл</th>
                    <th>Кореспондент (суб`єкт звернення)</th>
                    <th>Назва суб`єкта надання адміністративної послуги (СНАП)</th>
                    <th>Назва адмін послуги</th>
                    <th>Дата передачі пакета документів до СНАП</th>
                    <th>ПІБ посадової особи СНАП, яка отримала пакет документів</th>
                    <th>Термін виконання</th>
                    <th>Дата повернення результату адмініпослуги від СНАП</th>
                    <th>Відповідь від СНАП</th>
                    <th>Дата отримання представниками РДА/МВК оригіналів документів</th>
                    <th>ПІБ отримувача документів</th>
                    <th>Примітка</th>
                    <th>Стан виконання</th>
                    <?php
                    if ($_SESSION["user"]["is_admin"]) {
                        ?>
                        <th colspan="2">Дії</th>
                        <?php
                    }
                    ?>
                </tr>
                </thead>
                <tbody class="">
                <?php
                foreach ($data as $cell) {
                    ?>
                    <tr class="<?php
                    switch ($cell['status']) {
                        case 0:
                            echo 'yellow';
                            break;
                        case 1:
                            echo 'green';
                            break;
                        case 2:
                            echo 'blue';
                            break;
                        case 3:
                            echo 'red';
                            break;
                        case 4:
                            echo 'grey';
                            break;
                    }
                    ?>">
                        <?php
                        foreach ($cell as $key => $value) {
                            //if ($key != "id") {
                            ?>
                            <td>
                                <?php
                                if ($key == "status") {
                                    switch ($value) {
                                        case 0:
                                            echo "файл відправили";
                                            break;
                                        case 1:
                                            echo "у роботі";
                                            break;
                                        case 2:
                                            echo "надіслано відповідь";
                                            break;
                                        case 3:
                                            echo "не отримано РДА/МВК";
                                            break;
                                        case 4:
                                            echo "завершено справу";
                                            break;
                                    }
                                } elseif ($key == "send_file" || $key == "get_file") {
                                    echo "<a href='http://" . $_SERVER["HTTP_HOST"] . $value . "'>" . str_replace("/resourse/", "", $value) . "</a>";
                                } else {
                                    echo empty($value) ? " " : $value;
                                }
                                ?>
                            </td>
                            <?php
                            //}
                            ?>
                            <?php
                        }
                        ?>
                        <?php
                        if ($_SESSION["user"]["is_admin"] || $_SESSION["user"]["role"] == "snap") {
                            ?>
                            <td>
                                <form method="post" action="/main/edit">
                                    <input type="hidden" value="<?php echo $cell["id"] ?>" name="id">
                                    <input <?php echo $cell["status"] > 2 ? "disabled" : "" ?> class="btn" type="submit"
                                                                                               value="Змінити">
                                </form>
                            </td>
                            <!--                            <td>-->
                            <!--                                <form method="post" action="/main/del">-->
                            <!--                                    <input type="hidden" value="--><?php //echo $cell["id"] ?><!--" name="id">-->
                            <!--                                    <input --><?php //echo $cell["status"] > 2 ? "disabled" : "" ?><!-- class="btn" type="submit"-->
                            <!--                                                                                               value="Видалити">-->
                            <!--                                </form>-->
                            <!--                            </td>-->
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

<script src="/js/jquery.min.js"></script>
<script src="/js/Show_hide.js"></script>
<script>
    $(document).ready(function () {

        showHide("#show_hide", "#form_f", " фільтр");

        $("#form_f").submit(function () {

            GetValue("#snap_id", "#snap");


        });

    });

    function GetValue(nameInput, nameList) {

        var x = $(nameInput).val();

        var z = $(nameList);

        var val = $(z).find('option[value="' + x + '"]');

        var endval = val.attr('id');

        var x = $(nameInput).val(endval);

    }

</script>