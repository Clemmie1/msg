{{--<form wire:submit.prevent="submit">--}}
{{--    <input type="text" name="name" wire:model="name">--}}

{{--    <button wire:click="submit" wire:loading.attr="disabled">--}}
{{--        <span wire:loading.remove>Save</span>--}}
{{--        <span wire:loading>Saving..</span>--}}
{{--    </button>--}}
{{--</form>--}}

<form wire:submit.prevent="submitAuthLogin">
    <div class="row g-6">
        <div class="col-12">
            <div class="text-center">
                <h3 class="fw-bold mb-2">Войти</h3>
                <p>Вход в свой аккаунт</p>
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating">
                <input type="email" class="form-control" name="signinEmail" wire:model="signinEmail" placeholder="Почта" required>
                <label for="signin-email">Почта</label>
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating">
                <input type="password" class="form-control" name="signinPassword"  wire:model="signinPassword" placeholder="Пароль" required>
                <label for="signin-password">Пароль</label>
            </div>
        </div>

        <div class="col-12">
            <button class="btn btn-block btn-lg btn-primary w-100" type="submit" wire:target="submitAuthLogin" wire:loading.remove>ВОЙТИ</button>
            <button class="btn btn-block btn-lg btn-primary w-100" type="submit" wire:loading wire:target="submitAuthLogin" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>
        </div>
    </div>
</form>
