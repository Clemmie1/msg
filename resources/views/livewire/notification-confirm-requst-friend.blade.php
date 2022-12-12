@foreach(DB::table('users_notifications')->where('recived_id', \App\Http\Controllers\AccountCoreInfoController::getAccountID(\App\Http\Controllers\UtilCoreAccountController::setTokenSessionToUsername(session()->get('tokenSession'))))->get() as $NotificationsKey)
    @if($NotificationsKey->type == 'RequestFriend')
        <div class="card border-0 mb-5">
            <div class="card-body">

                <div class="row gx-5">
                    <div class="col-auto">
                        <!-- Avatar -->
                        <a href="#" class="avatar">
                            <img class="avatar-img" src="assets/img/avatars/11.jpg" alt="">

                            <div class="badge badge-circle bg-primary border-outline position-absolute bottom-0 end-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            </div>
                        </a>
                    </div>

                    <div class="col">
                        <div class="d-flex align-items-center mb-2">
                            <h5 class="me-auto mb-0">
                                <a href="#">{{\App\Http\Controllers\AccountCoreInfoController::getNameAccountID($NotificationsKey->sender_id)}}</a>
                            </h5>
                            <span class="extra-small text-muted ms-2">{{$NotificationsKey->date_time}}</span>
                        </div>

                        <div class="d-flex">
                            <div class="me-auto">Запрос на добавление в друзья.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <form wire:submit.prevent="submitConfirmFriendRequest({{$NotificationsKey->sender_id}})">
                    <div class="row gx-4">
{{--                        <div class="col">--}}
{{--                            <button type="submit" class="btn btn-sm btn-soft-primary w-100">ОТМЕНИТЬ</button>--}}
{{--                        </div>--}}
                        <div class="col">

                            <button wire:target="submitConfirmFriendRequest" wire:loading.remove type="submit" class="btn btn-sm btn-primary w-100">ДОБАВИТЬ</button>
                            <button wire:loading wire:target="submitConfirmFriendRequest" type="submit" class="btn btn-sm btn-primary w-100" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <span class="sr-only">Loading...</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endforeach
