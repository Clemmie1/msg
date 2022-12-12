<form wire:submit.prevent="UpdateProfileLocationAndPhone">

    <div class="accordion-body">

        @if(\App\Http\Controllers\AccountCoreInfoController::getAccountLocation(session()->get('tokenSession')) != null)
            <div class="form-floating mb-6">
                <input type="text" class="form-control" name="profileLocation"  placeholder="Расположение" value="{{\App\Http\Controllers\AccountCoreInfoController::getAccountLocation(session()->get('tokenSession'))}}" wire:model="profileLocation">
                <label for="profile-name">Расположение</label>
            </div>
        @else
            <div class="form-floating mb-6">
                <input type="text" class="form-control" name="profileLocation" placeholder="Расположение" wire:model="profileLocation">
                <label for="profile-name">Расположение</label>
            </div>
        @endif

        @if(\App\Http\Controllers\AccountCoreInfoController::getAccountPhone(session()->get('tokenSession')) != null)
            <div class="form-floating mb-6">
                <input type="text" class="form-control" name="profilePhone" placeholder="Телефон" value="{{\App\Http\Controllers\AccountCoreInfoController::getAccountPhone(session()->get('tokenSession'))}}" wire:model="profilePhone">
                <label for="profile-phone">Телефон</label>
            </div>
        @else
            <div class="form-floating mb-6">
                <input type="text" class="form-control" name="profilePhone"  placeholder="Телефон" wire:model="profilePhone">
                <label for="profile-phone">Телефон</label>
            </div>
        @endif
        <button type="submit" class="btn btn-block btn-lg btn-primary w-100">СОХРАНИТЬ</button>
    </div>
</form>

