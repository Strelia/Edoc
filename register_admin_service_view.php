<?php
if (!$_SESSION["user"]["is_admin"]) {
    header('Location:/');
}
?>
<div class="row">
    <form method="post" action="/main/save">
        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
        <div class="form-group">
            <label for="date_package_doc_RDA">Дата отримання пакета документів від РДА/МВК</label>
            <input required type="date" id="date_package_doc_RDA" name="date_package_doc_RDA" class="form-control"
                   value="<?php echo $data['date_package_doc_RDA'] ?>">
        </div>
        <div class="form-group">
            <label for="reg_num_doc">Реєстраційний № документа</label>
            <input required type="text" name="reg_num_doc" id="reg_num_doc" class="form-control"
                   placeholder="№ 220 від 09.03.2016" value="<?php echo $data['reg_num_doc'] ?>">
        </div>
        <div class="form-group">
            <label for="reg_num_doc">РДА/МВК</label>
            <input required list="rda" type="text" id="rda_id" name="rda_id" class="form-control">
            <datalist id="rda">
                <?php
                $req = DBUtil::connectDB()->query("SELECT * FROM rdas");
                if ($req->num_rows > 0) {
                while ($res = $req->fetch_assoc()) {
                ?>
                <option id="<?php echo $res["id"] ?>"
                        value="<?php echo $res["name_rda"] . "  |   " . $res["name_admin_services"]; ?>">
                    <?php
                    }
                    }
                    ?>
            </datalist>
        </div>
        <div class="form-group">
            <label for="correspondent">Кореспондент (суб`єкт звернення)</label>
            <input required type="text" name="correspondent" id="correspondent" class="form-control"
                   placeholder="Прометей, ТОВ" value="<?php echo $data['correspondent'] ?>">
        </div>
        <div class="form-group">
            <label for="snap_id">СНАП</label>
            <input required list="snap" type="text" id="snap_id" name="snap_id" class="form-control">
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
        </div>
        <div class="form-group">
            <label for="date_transmission_doc_snap">Дата передачі пакета документів до СНАП</label>
            <input type="date" name="date_transmission_doc_snap" id="date_transmission_doc_snap" class="form-control"
                   value="<?php echo $data['date_transmission_doc_snap'] ?>">
        </div>
        <div class="form-group">
            <label for="snap_name_receiv_doc">ПІБ посадової особи СНАП, яка отримала пакет документів</label>
            <input required type="text" name="snap_name_receiv_doc" id="snap_name_receiv_doc" class="form-control"
                   placeholder="Іванов І.І." value="<?php echo $data['snap_name_receiv_doc'] ?>">
        </div>
        <div class="form-group">
            <label for="deadline">Термін виконання</label>
            <input required type="date" name="deadline" id="deadline" class="form-control"
                   value="<?php echo $data['deadline'] ?>">
        </div>
        <div class="form-group">
            <label for="returning_res_admin_services_snap">2)Дата
                повернення результату адмініпослуги від СНАП</label>
            <input <?php echo $data["status"] > 0 ? "required" : "" ?>
                type="date" name="returning_res_admin_services_snap" id="returning_res_admin_services_snap"
                class="form-control" value="<?php echo $data['returning_res_admin_services_snap'] ?>">
        </div>
        <div class="form-group">
            <label for="date_representatives_rda_doc">3)Дата отримання представниками РДА/МВК оригіналів
                документів</label>
            <input <?php echo $data["status"] > 1 ? "required" : "" ?>
                type="date" name="date_representatives_rda_doc" id="date_representatives_rda_doc"
                class="form-control" value="<?php echo $data['date_representatives_rda_doc'] ?>">
        </div>
        <div class="form-group">
            <label for="snap_name_receiv_doc">3)ПІБ отримувача документів</label>
            <input <?php echo $data["status"] > 1 ? "required" : "" ?>
                type="text" name="recipient_name_doc" id="recipient_name_doc" class="form-control"
                placeholder="Іванов І.І." value="<?php echo $data['recipient_name_doc'] ?>">
        </div>
        <div class="form-group">
            <label for="note">Примітка</label>
            <textarea name="note" id="note" class="form-control"
                      placeholder="Примітка"><?php echo $data['note'] ?></textarea>
        </div>
        <input type="hidden" name="status" value="<?php echo $data["status"] ?>">
        <input class="btn btn-success" type="submit" value="Надіслати">
    </form>
</div>

<script src="/js/jquery.min.js"></script>
<script src="/js/datalist.js"></script>
<script src="/js/DataListId.js"></script>
<?php if (!empty($data["id"])) {
    ?>
    <script>
        SetValue(<?php echo $data["rda_id"];?>, "#rda_id", "#rda");
        SetValue(<?php echo $data["snap_id"];?>, "#snap_id", "#snap");
    </script>
    <?php
}
?>
