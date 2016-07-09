<?php
if (!$_SESSION["user"]["is_admin"]) {
    header('Location:/');
}
?>
<div class="row">
    <div>

        <div class="alert alert-info">Пароль: [<?php echo empty($data[0]["pass"])?"": $data[0]["pass"]?>]</div>
        <form action="/key/update" method="post">
            <input class="btn btn-success" type="submit" value="Оновити пароль">
        </form>
    </div>
</div>
