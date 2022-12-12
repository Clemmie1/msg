<form wire:submit.prevent="UpdateProfilePassword" autocomplete="on">
    <div class="form-floating mb-6">
        <input type="password" class="form-control" name="profilecurrentpassword" wire:model="profilecurrentpassword" placeholder="Текущий пароль" autocomplete="" required>
        <label for="profile-current-password">Текущий пароль</label>
    </div>

    <div class="form-floating mb-6">
        <input type="password" class="form-control" name="profilenewpassword" wire:model="profilenewpassword" placeholder="Новый пароль" autocomplete="" required>
        <label for="profile-new-password">Новый пароль</label>
    </div>
    <button type="submit" class="btn btn-block btn-lg btn-primary w-100">СОХРАНИТЬ</button>
</form>
