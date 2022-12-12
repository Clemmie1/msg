<form wire:submit.prevent="submitAuthRegister">
    <div class="row g-6">
        <div class="col-12">
            <div class="text-center">
                <h3 class="fw-bold mb-2">Зарегистрироваться</h3>
                <p>Следуйте простым шагам</p>
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating">
                <input type="text" class="form-control" name="signupusername" placeholder="Имя пользователя" wire:model="signupusername">
                <label for="signup-name">Имя пользователя</label>
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating">
                <input type="email" class="form-control" name="signupemail" placeholder="Почта" wire:model="signupemail">
                <label for="signup-email">Почта</label>
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating">
                <input type="password" class="form-control" name="signuppassword" placeholder="Пароль" wire:model="signuppassword">
                <label for="signup-password">Пароль</label>
            </div>
        </div>

        <div class="col-12">
            <button class="btn btn-block btn-lg btn-primary w-100" type="submit" wire:target="submitAuthRegister" wire:loading.remove>ЗАРЕГИСТРИРОВАТЬСЯ</button>
            <button class="btn btn-block btn-lg btn-primary w-100" type="submit" wire:loading wire:target="submitAuthRegister" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>
        </div>
    </div>
</form>
