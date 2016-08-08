<div class="row">
    <form method="post" action="/main/save" enctype="multipart/form-data">
        <input type="hidden" name="id">
        <div class="form-group">
            <label for="reg_num_doc">Реєстраційний № документа</label>
            <input required type="text" name="reg_num_doc" id="reg_num_doc" class="form-control"
                   placeholder="№ 220 від 09.03.2016">
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
                $req = DBUtil::connectDB()->query("SELECT snaps_service.id, name_entity_providing_admin_services, name_admin_services FROM snaps_service INNER JOIN snaps ON snaps_service.snap_id = snaps.id");
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
            <div class="col-md-12"><label for="date_representatives_rda_doc">Файл передачі
                документів</label>
            </div>
            <div class="col-md-3">
                <input required type="file" name="send_file" class="form-control">
            </div>
            <div class="col-md-3">
                <input id="clear" type="button" class="form-control" value="Очистити">
            </div>
        </div>
        <input class="btn btn-success" type="submit" value="Надіслати">
    </form>
</div>


<script src="/js/jquery.min.js"></script>
<script src="/js/DataListId.js"></script>
<script src="/js/clearFile.js"></script>
<?php if (!empty($data["id"])) {
    ?>
    <script>
        SetValue(<?php echo $data["rda_id"];?>, "#rda_id", "#rda");
        SetValue(<?php echo $data["snap_id"];?>, "#snap_id", "#snap");
    </script>
    <?php
}
?>
