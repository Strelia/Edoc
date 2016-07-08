<?php
if (!$_SESSION["user"]["is_admin"]) {
    header('Location:/');
}
?>
<div class="row">
    <form method="post" action="/snap/save">
        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
        <div class="form-group">
            <label for="name_entity_providing_admin_services">Назва суб`єкта надання адміністративної послуги (СНАП)</label>
            <textarea id="name_entity_providing_admin_services" name="name_entity_providing_admin_services" class="form-control" placeholder="Відділ превентивної діяльності Головного управління Національної поліції в Миколаївській області"><?php echo $data['name_entity_providing_admin_services'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="name_admin_services">Назва адмін послуги</label>
            <textarea name="name_admin_services" id="name_admin_services" class="form-control" placeholder="Дозвіл на участь у дорожньому русі транспортних засобів, вагові або габаритні параметри яких перевищують нормативні"><?php echo $data['name_admin_services'] ?></textarea>
        </div>
        <input class="btn btn-success" type="submit" value="Надіслати">
    </form>
</div>
