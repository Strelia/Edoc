<?php
if (!$_SESSION["user"]["is_admin"]) {
    header('Location:/');
}
?>
<div class="row">
    <form method="post" action="/rda/save">
        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
        <div class="form-group">
            <label for="name_rda">Назва РДА/МВК</label>
            <input name="name_rda" id="name_rda" class="form-control" type="text" placeholder="Миколаїв місто"
                   value="<?php echo $data['name_rda'] ?>">
        </div>
        <div class="form-group">
            <label for="name_admin_services">Назва Центру надання адміністративних послуг РДА/МВК</label>
            <input id="name_admin_services" name="name_admin_services" class="form-control" type="text"
                   placeholder="Центр надання адміністративних послуг Миколаївської міської ради"
                   value="<?php echo $data['name_admin_services'] ?>">
        </div>
        <div class="form-group">
            <label for="email">E-mail РДА/МВК</label>
            <input name="email" id="email" class="form-control" type="text" placeholder="email@mail.com" value="<?php echo $data['email'] ?>">
        </div>
        <input class="btn btn-success" type="submit" value="Надіслати">
    </form>
</div>
