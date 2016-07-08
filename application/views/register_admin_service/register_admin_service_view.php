<?php
if (!$_SESSION["user"]["is_admin"]) {
    header('Location:/');
}
?>
<div class="row">
    <form method="post" action="/snap/save">
        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
        <div class="form-group">
            <label for="date_package_doc_RDA">Дата отримання пакета документів від РДА/МВК</label>
            <input type="date" id="date_package_doc_RDA" name="date_package_doc_RDA" class="form-control"
                   value="<?php echo $data['date_package_doc_RDA'] ?>">
        </div>
        <div class="form-group">
            <label for="reg_num_doc">Реєстраційний № документа</label>
            <input type="text" name="reg_num_doc" id="reg_num_doc" class="form-control"
                   placeholder="№ 220 від 09.03.2016" value="<?php echo $data['name_admin_services'] ?>">
        </div>
        <div class="form-group">
            <label for="reg_num_doc">РДА/МВК</label>
            <input list="rda" type="text" id="rda_id" name="rda_id" class="form-control">
            <datalist id="rda">
                <?php
                $req = DBUtil::connectDB()->query("SELECT * FROM rdas");
                if ($req->num_rows > 0) {
                while ($res = $req->fetch_assoc()) {
                ?>
                <option id="<?php echo $res["id"]?>" value="<?php echo $res["name_rda"] . "\n" . $res["name_admin_services"]; ?>">
                    <?php
                    }
                    }
                    ?>
            </datalist>
        </div>
        <div class="form-group">
            <label for="correspondent">Кореспондент (суб`єкт звернення)</label>
            <input type="text" name="correspondent" id="correspondent" class="form-control"
                   placeholder="Прометей, ТОВ" value="<?php echo $data['correspondent'] ?>">
        </div>
        <div class="form-group">
            <label for="snap_id">СНАП</label>
            <input list="snap" type="text" id="snap_id" name="snap_id" class="form-control">
            <datalist id="snap">
                <?php
                $req = DBUtil::connectDB()->query("SELECT * FROM snaps");
                if ($req->num_rows > 0) {
                while ($res = $req->fetch_assoc()) {
                ?>
                <option id="<?php echo $res["id"]?>" value="<?php echo $res["name_entity_providing_admin_services"] . "\n" . $res["name_admin_services"]; ?>">
                    <?php
                    }
                    }
                    ?>
            </datalist>
        </div>
        <div class="form-group">
            <label for="snap_name_receiv_doc">Кореспондент (суб`єкт звернення)</label>
            <input type="date" name="snap_name_receiv_doc" id="snap_name_receiv_doc" class="form-control"
                  value="<?php echo $data['snap_name_receiv_doc'] ?>">
        </div>
        <input class="btn btn-success" type="submit" value="Надіслати">
    </form>
</div>
