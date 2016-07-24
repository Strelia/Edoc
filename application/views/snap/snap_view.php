<form action="/snap/save" method="post">
    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
    <div class="form-group">
        <div class="form-group">

            <label for="name_entity_providing_admin_services">Назва суб`єкта надання адміністративної послуги
                (СНАП)</label>

            <textarea required id="name_entity_providing_admin_services" name="name_entity_providing_admin_services"
                      class="form-control"
                      placeholder="Відділ превентивної діяльності Головного управління Національної поліції в Миколаївській області"><?php echo $data['name_entity_providing_admin_services'] ?></textarea>

        </div>
        <label for="email">
            Email
        </label>
        <input id="email" name="email" value="<?php echo $data["email"]; ?>" type="email" class="form-control">
    </div>

    <input class="btn btn-success" type="submit" value="Надіслати">
    </div>
</form>

<script src="/js/jquery.min.js"></script>