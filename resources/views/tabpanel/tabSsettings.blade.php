<div class="tab-pane fade h-100" id="tab-content-settings" role="tabpanel">
    <div class="d-flex flex-column h-100">
        <div class="hide-scrollbar">
            <div class="container py-8">
                <div class="mb-8">
                    <h2 class="fw-bold m-0">Настройки</h2>
                </div>

                <div class="card border-0">
                    <div class="card-body">
                        <div class="row align-items-center gx-5">
                            <div class="col-auto">
                                <div class="avatar">
                                    <img src="assets/img/avatars/1.jpg" alt="#" class="avatar-img">

                                    <div class="badge badge-circle bg-secondary border-outline position-absolute bottom-0 end-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                                    </div>
                                    <input id="upload-profile-photo" class="d-none" type="file">
                                    <label class="stretched-label mb-0" for="upload-profile-photo"></label>
                                </div>
                            </div>
                            <div class="col">
                                <h5>{{\App\Http\Controllers\AccountCoreInfoController::getUserName(session()->get('tokenSession'))}}</h5>
                                <p>{{\App\Http\Controllers\AccountCoreInfoController::getAccountEmail(session()->get('tokenSession'))}}</p>
                            </div>
                            <div class="col-auto">
                                <a href="{{url('/logout')}}" class="text-muted">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Profile -->

                <!-- Account -->
                <div class="mt-8">
                    <div class="d-flex align-items-center mb-4 px-6">
                        <small class="text-muted me-auto">Аккаунт</small>
                    </div>

                    <div class="card border-0">
                        <div class="card-body py-2">
                            <!-- Accordion -->
                            <div class="accordion accordion-flush" id="accordion-profile">
                                <div class="accordion-item">
                                    <div class="accordion-header" id="accordion-profile-1">
                                        <a href="#" class="accordion-button text-reset collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-profile-body-1" aria-expanded="false" aria-controls="accordion-profile-body-1">
                                            <div>
                                                <h5>Настройки профиля</h5>
                                                <p>Измените настройки своего профиля</p>
                                            </div>
                                        </a>
                                    </div>

                                    <div id="accordion-profile-body-1" class="accordion-collapse collapse" aria-labelledby="accordion-profile-1" data-parent="#accordion-profile">
                                        @livewire('account-profile-settings')
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h5>Внешний вид</h5>
                                                <p>Выберите светлую или темную тему</p>
                                            </div>
                                            <div class="col-auto">
                                                <a class="switcher-btn text-reset" href="#!" title="Themes">
                                                    <div class="switcher-icon switcher-icon-dark icon icon-lg d-none" data-theme-mode="dark">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                                                    </div>
                                                    <div class="switcher-icon switcher-icon-light icon icon-lg d-none" data-theme-mode="light">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Account -->

                <!-- Security -->
                <div class="mt-8">
                    <div class="d-flex align-items-center my-4 px-6">
                        <small class="text-muted me-auto">Безопасность</small>
                    </div>

                    <div class="card border-0">
                        <div class="card-body py-2">
                            <!-- Accordion -->
                            <div class="accordion accordion-flush" id="accordion-security">
                                <div class="accordion-item">
                                    <div class="accordion-header" id="accordion-security-1">
                                        <a href="#" class="accordion-button text-reset collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-security-body-1" aria-expanded="false" aria-controls="accordion-security-body-1">
                                            <div>
                                                <h5>Пароль</h5>
                                                <p>Сменить старый пароль</p>
                                            </div>
                                        </a>
                                    </div>

                                    <div id="accordion-security-body-1" class="accordion-collapse collapse" aria-labelledby="accordion-security-1" data-parent="#accordion-security">
                                        <div class="accordion-body">
                                            @livewire('update-profile-password')
                                        </div>
                                    </div>
                                </div>

                                <!-- Switch -->
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h5>Двухэтапная проверка</h5>
                                                <p>Включить двухэтапную проверку</p>
                                            </div>
                                            <div class="col-auto">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="accordion-security-check-1">
                                                    <label class="form-check-label" for="accordion-security-check-1"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <div class="d-flex align-items-center my-4 px-6">
                        <small class="text-muted me-auto">Устройства</small>

                        <div class="flex align-items-center text-muted">
                            <a href="{{url('/logout')}}" class="text-muted small">Завершить все сеансы</a>

                            <div class="icon icon-xs">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0">
                        <div class="card-body py-3">

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5>Windows ⋅ KZ, Almaty</h5>
                                            <p>Today at 2:48 pm ⋅ Browser: Chrome</p>
                                        </div>
                                    </div>
                                </li>

                            </ul>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
