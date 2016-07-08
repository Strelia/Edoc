<?php
if ($_SESSION["user"]["role_user"] != "admin") {
    header('Location:/main/');
}
?>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
        <form method="post" action="/user/addOrEditUser">
            <input type="hidden" id="id_user" name="id_user" value="<?php echo $data['id_user'];?>">
            <div class="form-group">
                <label for="full_name_user">П.І.Б</label>
                <input type="text" class="form-control" id="full_name_user"
                       value="<?php echo $data['full_name_user']; ?>"
                       name="full_name_user" required placeholder="П.І.Б">
            </div>
            <div class="form-group">
                <label for="tel_user">Домашній телефон</label>
                <div class="input-group">
                    <div class="input-group-addon">+380</div>
                    <input type="text" class="form-control" id="tel_user" name="tel_user"
                           value="<?php echo substr($data['tel_user'],4); ?>"
                           placeholder="000000000" maxlength="9">
                </div>
            </div>
            <div class="form-group">
                <label for="mob_user">Мобільний телефон</label>
                <div class="input-group">
                    <div class="input-group-addon">+380</div>
                    <input type="tel" class="form-control" id="mob_user" name="mob_user"
                           value="<?php echo substr($data['mob_user'],4); ?>" placeholder="000000000" maxlength="9">
                </div>
            </div>
            <div class="form-group">
                <label for="address_user">Адреса проживання</label>
                <input type="tel" class="form-control" id="address_user" name="address_user"
                       value="<?php echo $data['address_user']; ?>" required placeholder="м. Миколаїв">
            </div>
            <div class="form-group">
                <label for="mail_user">E-Mail</label>
                <input type="email" required class="form-control" id="mail_user"
                       value="<?php echo $data['mail_user']; ?>" name="mail_user" placeholder="use@mail.com">
            </div>
            <div class="form-group">
                <label for="pass_user">Пароль</label>
                <input type="password" class="form-control" id="pass_user" name="pass_user"
                       placeholder="password">
            </div>
            <div class="horizontal-center" style="display: none"  id="pass_label">
                <label class="alert alert-danger">Паролі не співпадають</label>
            </div>
            <div class="form-group">
                <label for="rep_pass_user">Повторний ввод пароля</label>
                <input type="password" class="form-control" id="rep_pass_user"
                       placeholder="password">
            </div>
            <div class="form-group">
                <label for="role_user">Статус користувача</label>
                <select class="form-control" id="role_user" name="role_user">
                    <option value="student" <?php echo $data['role_user'] == 'student' ? 'selected' : '' ?>>Студент
                    </option>
                    <option value="admin" <?php echo $data['role_user'] == 'admin' ? 'selected' : '' ?>>Адміністратор
                    </option>
                    <option value="teacher" <?php echo $data['role_user'] == 'teacher' ? 'selected' : '' ?>>Вчитель
                    </option>
                    <option value="dean" <?php echo $data['role_user'] == 'dean' ? 'selected' : '' ?>>Декан</option>
                </select>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
<script src="/js/jquery.min.js"></script>
