<?php
session_start();

if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
        header('Location:/main/');
}
?>
<div class="flex horizontal-center vertical-center height-full">
    <div>
        <?php extract($data); ?>
        <?php if ($login_status == "access_granted") { ?>
            <div class="alert alert-success">Авторизація пройшла успішно</div>
        <?php } elseif ($login_status == "access_denied") { ?>
            <div class="alert alert-danger">Логін і/або пароль невірно введені.</div>
        <?php } ?>
        <form style=" border-radius:10px; box-shadow: 0px 0px 25px #000;padding:25px; width: 400px; background: #EEE; "
              action="/login" method="post">
            <div class="form-group">
                <label for="login">Електронна пошта/ Пароль</label>
                <input type="text" class="form-control" id="login" name="login" placeholder="Email/Password">
            </div>
            <button type="submit" class="btn btn-default">Увійти</button>
        </form>
    </div>
</div>
