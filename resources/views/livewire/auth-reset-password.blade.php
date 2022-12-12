<form wire:submit.prevent="submitAuthResetPassword">
    <div class="row g-6">
        <div class="col-12">
            <div class="text-center">
                <h3 class="fw-bold mb-2">Восстановление пароля</h3>
                <p>Введите свой адрес электронной почты, чтобы сбросить пароль</p>
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating">
                <input type="email" class="form-control" name="resetpasswordemail" wire:model="resetpasswordemail" placeholder="Почта" required>
                <label for="resetpassword-email">Почта</label>
            </div>
        </div>

        <div class="col-12">
            <button class="btn btn-block btn-lg btn-primary w-100" type="submit">ОТПРАВИТЬ ССЫЛКУ</button>
        </div>
    </div>
</form>
