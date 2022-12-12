
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no, viewport-fit=cover">
    <meta name="color-scheme" content="light dark">

    <title>Мессенджер</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./assets/img/favicon/favicon.ico" type="image/x-icon">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700" rel="stylesheet">

    <!-- Template CSS -->
    <link class="css-lt" rel="stylesheet" href="./assets/css/template.bundle.css" media="(prefers-color-scheme: light)">
    <link class="css-dk" rel="stylesheet" href="./assets/css/template.dark.bundle.css" media="(prefers-color-scheme: dark)">

    <!-- Theme mode -->
    <script>
        if (localStorage.getItem('color-scheme')) {
            let scheme = localStorage.getItem('color-scheme');

            const LTCSS = document.querySelectorAll('link[class=css-lt]');
            const DKCSS = document.querySelectorAll('link[class=css-dk]');

            [...LTCSS].forEach((link) => {
                link.media = (scheme === 'light') ? 'all' : 'not all';
            });

            [...DKCSS].forEach((link) => {
                link.media = (scheme === 'dark') ? 'all' : 'not all';
            });
        }
    </script>
    @livewireStyles
</head>

<body>
<!-- Layout -->
<div class="layout overflow-hidden">
    <!-- Navigation -->
    <nav class="navigation d-flex flex-column text-center navbar navbar-light hide-scrollbar">
        <!-- Brand -->
        <a href="index.html" title="Messenger" class="d-none d-xl-block mb-6">
            <svg version="1.1" width="46px" height="46px" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 46 46" enable-background="new 0 0 46 46" xml:space="preserve">
                        <polygon opacity="0.7" points="45,11 36,11 35.5,1 "/>
                <polygon points="35.5,1 25.4,14.1 39,21 "/>
                <polygon opacity="0.4" points="17,9.8 39,21 17,26 "/>
                <polygon opacity="0.7" points="2,12 17,26 17,9.8 "/>
                <polygon opacity="0.7" points="17,26 39,21 28,36 "/>
                <polygon points="28,36 4.5,44 17,26 "/>
                <polygon points="17,26 1,26 10.8,20.1 "/>
                    </svg>

        </a>

        <!-- Nav items -->
        <ul class="d-flex nav navbar-nav flex-row flex-xl-column flex-grow-1 justify-content-between justify-content-xl-center align-items-center w-100 py-4 py-lg-2 px-lg-3" role="tablist">
            <!-- Invisible item to center nav vertically -->
            <li class="nav-item d-none d-xl-block invisible flex-xl-grow-1">
                <a class="nav-link py-0 py-lg-8" href="#" title="">
                    <div class="icon icon-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </div>
                </a>
            </li>

            <!-- New chat -->
            <li class="nav-item">
                <a class="nav-link py-0 py-lg-8" id="tab-create-chat" href="#tab-content-create-chat" title="Create chat" data-bs-toggle="tab" role="tab">
                    <div class="icon icon-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                    </div>
                </a>
            </li>

            <!-- Friends -->
            <li class="nav-item">
                <a class="nav-link py-0 py-lg-8" id="tab-friends" href="#tab-content-friends" title="Friends" data-bs-toggle="tab" role="tab">
                    <div class="icon icon-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                </a>
            </li>

            <!-- Chats -->
            <li class="nav-item">
                <a class="nav-link active py-0 py-lg-8" id="tab-chats" href="#tab-content-chats" title="Chats" data-bs-toggle="tab" role="tab">
                    <div class="icon icon-xl icon-badged">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                        <div class="badge badge-circle bg-primary">
                            <span>0</span>
                        </div>
                    </div>
                </a>
            </li>

            <!-- Notification -->
            <li class="nav-item">
                <a class="nav-link py-0 py-lg-8" id="tab-notifications" href="#tab-content-notifications" title="Notifications" data-bs-toggle="tab" role="tab">
                    <div class="icon icon-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                    </div>
                </a>
            </li>

            <!-- Support -->
            <li class="nav-item d-none d-xl-block flex-xl-grow-1">
                <a class="nav-link py-0 py-lg-8" id="tab-support" href="#tab-content-support" title="Support" data-bs-toggle="tab" role="tab">
                    <div class="icon icon-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                    </div>
                </a>
            </li>

            <!-- Switcher -->
            <li class="nav-item d-none d-xl-block">
                <a class="switcher-btn nav-link py-0 py-lg-8" href="#!" title="Themes">
                    <div class="switcher-icon switcher-icon-dark icon icon-xl d-none" data-theme-mode="dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                    </div>
                    <div class="switcher-icon switcher-icon-light icon icon-xl d-none" data-theme-mode="light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                    </div>
                </a>
            </li>

            <!-- Settings -->
            <li class="nav-item">
                <a class="nav-link py-0 py-lg-8" id="tab-settings" href="#tab-content-settings" title="Settings" data-bs-toggle="tab" role="tab">
                    <div class="icon icon-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                    </div>
                </a>
            </li>

            <!-- Profile -->
            <li class="nav-item d-none d-xl-block">
                <a href="#" class="nav-link p-0 mt-lg-2" data-bs-toggle="modal" data-bs-target="#modal-profile">
                    <div class="avatar avatar-online mx-auto">
                        <img class="avatar-img" src="assets/img/avatars/1.jpg" alt="">
                    </div>
                </a>
            </li>
        </ul>
    </nav>


    <aside class="sidebar bg-light">
        <div class="tab-content h-100" role="tablist">
            @include('tabpanel/tabFriends')
            @include('tabpanel/tabChats')
            @include('tabpanel/tabNotifications')
            @include('tabpanel/tabSsettings')
        </div>
    </aside>

    <main class="main">
        <div class="container h-100">

            <div class="d-flex flex-column h-100 justify-content-center text-center">
                <div class="mb-6">
                            <span class="icon icon-xl text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                            </span>
                </div>

                <p class="text-muted">Выберите человека из левого меню, <br> и начните свой разговор.</p>
            </div>

        </div>
    </main>

</div>

@include('modal/SendFriendRequest')
@include('modal/MyProfile')


<div class="modal fade" id="modal-user-profile" tabindex="-1" aria-labelledby="modal-user-profile" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
        <div class="modal-content">

            <!-- Modal body -->
            <div class="modal-body py-0">
                <!-- Header -->
                <div class="profile modal-gx-n">
                    <div class="profile-img text-primary rounded-top-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 400 140.74"><defs><style>.cls-2{fill:#fff;opacity:0.1;}</style></defs><g><g><path d="M400,125A1278.49,1278.49,0,0,1,0,125V0H400Z"/><path class="cls-2" d="M361.13,128c.07.83.15,1.65.27,2.46h0Q380.73,128,400,125V87l-1,0a38,38,0,0,0-38,38c0,.86,0,1.71.09,2.55C361.11,127.72,361.12,127.88,361.13,128Z"/><path class="cls-2" d="M12.14,119.53c.07.79.15,1.57.26,2.34v0c.13.84.28,1.66.46,2.48l.07.3c.18.8.39,1.59.62,2.37h0q33.09,4.88,66.36,8,.58-1,1.09-2l.09-.18a36.35,36.35,0,0,0,1.81-4.24l.08-.24q.33-.94.6-1.9l.12-.41a36.26,36.26,0,0,0,.91-4.42c0-.19,0-.37.07-.56q.11-.86.18-1.73c0-.21,0-.42,0-.63,0-.75.08-1.51.08-2.28a36.5,36.5,0,0,0-73,0c0,.83,0,1.64.09,2.45C12.1,119.15,12.12,119.34,12.14,119.53Z"/><circle class="cls-2" cx="94.5" cy="57.5" r="22.5"/><path class="cls-2" d="M276,0a43,43,0,0,0,43,43A43,43,0,0,0,362,0Z"/></g></g></svg>

                        <div class="position-absolute top-0 start-0 p-5">
                            <button type="button" class="btn-close btn-close-white btn-close-arrow opacity-100" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>

                    <div class="profile-body">
                        <div class="avatar avatar-xl">
                            <img class="avatar-img" src="./assets/img/avatars/9.jpg" alt="#">

                            <a href="#" class="badge badge-lg badge-circle bg-primary text-white border-outline position-absolute bottom-0 end-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </a>
                        </div>

                        <h4 class="mb-1">William Wright</h4>
                        <p>last seen 5 minutes ago</p>
                    </div>
                </div>
                <!-- Header -->

                <hr class="hr-bold modal-gx-n my-0">

                <!-- List -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row align-items-center gx-6">
                            <div class="col">
                                <h5>Location</h5>
                                <p>USA, Houston</p>
                            </div>

                            <div class="col-auto">
                                <div class="btn btn-sm btn-icon btn-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row align-items-center gx-6">
                            <div class="col">
                                <h5>E-mail</h5>
                                <p>william@studio.com</p>
                            </div>

                            <div class="col-auto">
                                <div class="btn btn-sm btn-icon btn-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row align-items-center gx-6">
                            <div class="col">
                                <h5>Phone</h5>
                                <p>1-800-275-2273</p>
                            </div>

                            <div class="col-auto">
                                <div class="btn btn-sm btn-icon btn-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone-call"><path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- List -->

                <hr class="hr-bold modal-gx-n my-0">

                <!-- List -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row align-items-center gx-6">
                            <div class="col">
                                <h5>Notifications</h5>
                                <p>Enable sound notifications</p>
                            </div>

                            <div class="col-auto">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="user-notification-check">
                                    <label class="form-check-label" for="user-notification-check"></label>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- List -->

                <hr class="hr-bold modal-gx-n my-0">

                <!-- List -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="#" class="text-reset">Send Message</a>
                    </li>

                    <li class="list-group-item">
                        <a href="#" class="text-danger">Block User</a>
                    </li>
                </ul>
                <!-- List -->
            </div>
            <!-- Modal body -->

        </div>
    </div>
</div>

<!-- Modal: Media Preview -->
<div class="modal fade" id="modal-media-preview" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-xl-down">
        <div class="modal-content">

            <!-- Modal: Header -->
            <div class="modal-header">
                <button type="button" class="btn-close btn-close-arrow" data-bs-dismiss="modal" aria-label="Close"></button>

                <div>
                    <!-- Dropdown -->
                    <div class="dropdown">
                        <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    Download
                                    <div class="icon ms-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download-cloud"><polyline points="8 17 12 21 16 17"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path></svg>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    Share
                                    <div class="icon ms-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
                                    </div>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center text-danger" href="#">
                                    <span class="me-auto">Delete</span>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Dropdown -->
                </div>
            </div>
            <!-- Modal: Header -->

            <!-- Modal: Body -->
            <div  class="modal-body p-0">
                <div class="d-flex align-items-center justify-content-center h-100">
                    <img class="img-fluid modal-preview-url" src="#" alt="#">
                </div>
            </div>
            <!-- Modal: Body -->

            <!-- Modal: Footer -->
            <div class="modal-footer">
                <div class="w-100 text-center">
                    <h6><a href="#">Marshall Wallaker</a></h6>
                    <p class="small">Today at 14:43</p>
                </div>
            </div>
            <!-- Modal: Footer -->
        </div>
    </div>
</div>
@livewireScripts
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="./assets/js/vendor.js"></script>
<script src="./assets/js/template.js"></script>
</body>
</html>
