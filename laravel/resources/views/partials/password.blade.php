<!-- Basic Information
               ================================================= -->
<div class="edit-profile-container">
    <div class="edit-block">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="form-group col-xs-12">
                <label>
                    Старый пароль
                    <input type="password" name="old_password" class="form-control" required>
                </label>
            </div>
        </div>
        <div class="row">
                    <div class="form-group col-xs-12">
                    <label>
                    Новый пароль
                    <input type="password" name="password" class="form-control" required>
                    </label>
                    </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-12">
                <label>
                    Подтверждение пароля
                    <input type="password" name="password_confirm" class="form-control" required>
                </label>
            </div>
        </div>
    </div>
</div>
