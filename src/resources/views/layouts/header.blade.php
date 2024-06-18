@php
    use Lexontech\Root\app\Models\Setting;
    use Lexontech\Root\app\Infrastructures\Media;
    use Lexontech\Root\app\Infrastructures\Translations;
 @endphp

<!-- app-header -->
<header class="app-header">

    <!-- Start::main-header-container -->
    <div class="main-header-container container-fluid">

        <!-- Start::header-content-left -->
        <div class="header-content-left">

            <!-- Start::header-element -->
            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="/panel" class="header-logo-responsive">
                        @php
                            $img       = Media::CheckImage($settings[Setting::Logo]['image'],$settings[Setting::ReplaceProfilePicture]['image']);
                        @endphp

                        @if(!is_null($img))
                            <img src="{{$img}}" alt="logo" class="panel-logo">
                        @endif
                    </a>
                </div>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link -->
                <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle" data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="main-header-center  d-none d-lg-block header-link">
                <input type="text" class="form-control" id="typehead" placeholder="Search for results..."
                       autocomplete="off">
                <button type="button"  aria-label="button" class="btn pe-1"><i class="fe fe-search" aria-hidden="true"></i></button>
                <div id="headersearch" class="header-search">
                    <div class="p-3">
                        <div class="">
                            <p class="fw-semibold text-muted mb-2 fs-13">Recent Searches</p>
                            <div class="ps-0">
                                <a  href="javascript:void(0)" class="search-tags"><i class="fe fe-search me-2"></i>People<span></span></a>
                                <a  href="javascript:void(0)" class="search-tags"><i class="fe fe-search me-2"></i>Pages<span></span></a>
                                <a  href="javascript:void(0)" class="search-tags"><i class="fe fe-search me-2"></i>Articles<span></span></a>
                            </div>
                        </div>
                        <div class="mt-3">
                            <p class="fw-semibold text-muted mb-3 fs-13">Apps and pages</p>
                            <ul class="ps-0">
                                <li class="p-1 d-flex align-items-center text-muted mb-3 search-app">
                                    <a class="d-inline-flex align-items-center" href="full-calendar.html"><i class="fe fe-calendar me-2 fs-14 bg-primary-transparent p-2 rounded-circle"></i><span>Calendar</span></a>
                                </li>
                                <li class="p-1 d-flex align-items-center text-muted mb-3 search-app">
                                    <a class="d-inline-flex align-items-center" href="mail.html"><i class="fe fe-mail me-2 fs-14 bg-primary-transparent p-2 rounded-circle"></i><span>Mail</span></a>
                                </li>
                                <li class="p-1 d-flex align-items-center text-muted mb-3 search-app">
                                    <a class="d-inline-flex align-items-center" href="buttons.html"><i class="fe fe-globe me-2 fs-14 bg-primary-transparent p-2 rounded-circle"></i><span>Buttons</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-3">
                            <p class="fw-semibold text-muted mb-2 fs-13">Links</p>
                            <ul class="ps-0 list-unstyled mb-0">
                                <li class="p-1 align-items-center text-muted mb-1 search-app">
                                    <a href="javascript:void(0)" class="text-primary"><u>http://spruko/spruko.com</u></a>
                                </li>
                                <li class="p-1 align-items-center text-muted mb-0 pb-0 search-app">
                                    <a href="javascript:void(0)" class="text-primary"><u>http://spruko/spruko.com</u></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="py-3 border-top px-0">
                        <div class="text-center">
                            <a href="javascript:void(0)" class="text-primary text-decoration-underline fs-15">View all</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End::header-element -->

        </div>
        <!-- End::header-content-left -->

        <!-- Start::header-content-right -->
        <div class="header-content-right">

            <!-- Start::header-element -->
            <div class="header-element header-search d-lg-none d-block">
                <!-- Start::header-link -->
                <a aria-label="anchor" href="javascript:void(0);" class="header-link" data-bs-toggle="modal" data-bs-target="#searchModal">
                    <i class="fe fe-search header-link-icon"></i>
                </a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element header-theme-mode">
                <!-- Start::header-link|layout-setting -->
                <a aria-label="anchor" href="javascript:void(0);" class="header-link layout-setting">
                            <span class="light-layout">
                                <!-- Start::header-link-icon -->
                            <i class="fe fe-moon header-link-icon"></i>
                                <!-- End::header-link-icon -->
                            </span>
                    <span class="dark-layout">
                                <!-- Start::header-link-icon -->
                            <i class="fe fe-sun header-link-icon"></i>
                        <!-- End::header-link-icon -->
                            </span>
                </a>
                <!-- End::header-link|layout-setting -->
            </div>
            <!-- End::header-element -->


            <!-- Start::header-element -->
            <div class="header-element main-profile-user">
                <!-- Start::header-link|dropdown-toggle -->
                <a  class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <a class="ms-4" href="/logout">خروج</a>
                        <div class="ms-xxl-2 me-0">

                            @php
                                $img       = Media::CheckImage(auth()->user()->ProfileURL ?? null,$settings[Setting::ReplaceProfilePicture]['image']);
                            @endphp

                            @if(!is_null($img))
                                <a href="/panel/users/{{auth()->user()->id}}/edit">
                                    <img src="{{$img}}" alt="{{$user->FullName ?? null}}" width="32" height="32" class="rounded-circle">
                                </a>
                            @endif

                        </div>
                        <div class="d-xxl-block d-none my-auto">
                            <a href="/panel/users/{{auth()->user()->id}}/edit">
                                <h6 class="fw-semibold mb-0 lh-1 fs-14">{{auth()->user()->lex_PhoneNumber ?? null}}
                                    @if(!is_null(auth()->user()->FullName))
                                        ({{auth()->user()->FullName ?? null}})
                                    @endif
                                </h6>
                                <span class="op-7 fw-normal d-block fs-11 text-muted">{{Translations::translations(auth()->user()->Type ?? null)}}</span>
                            </a>
                        </div>
                    </div>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <ul class="main-header-dropdown dropdown-menu pt-0 header-profile-dropdown dropdown-menu-end" aria-labelledby="mainHeaderProfile">
                    <li class="drop-heading d-xxl-none d-block">
                        <div class="text-center">
                            <h5 class="text-dark mb-0 fs-14 fw-semibold">{{auth()->user()->lex_PhoneNumber ?? null}}({{auth()->user()->FullName ?? null}})</h5>
                            <small class="text-muted">{{Translations::translations(auth()->user()->Type ?? null)}}</small>
                        </div>
                    </li>
                    <li class="dropdown-item"><a class="d-flex w-100" href="profile.html"><i class="fe fe-user fs-18 me-2 text-primary"></i>Profile</a></li>
                    <li class="dropdown-item"><a class="d-flex w-100" href="mail.html"><i class="fe fe-mail fs-18 me-2 text-primary"></i>Inbox <span class="badge bg-danger ms-auto">25</span></a></li>
                    <li class="dropdown-item"><a class="d-flex w-100" href="mail-settings.html"><i class="fe fe-settings fs-18 me-2 text-primary"></i>Settings</a></li>
                    <li class="dropdown-item"><a class="d-flex w-100" href="chat.html"><i class="fe fe-headphones fs-18 me-2 text-primary"></i>Support</a></li>
                    <li class="dropdown-item"><a class="d-flex w-100" href="lockscreen.html"><i class="fe fe-lock fs-18 me-2 text-primary"></i>Lockscreen</a></li>
                    <li class="dropdown-item"><a class="d-flex w-100" href="sign-in.html"><i class="fe fe-info fs-18 me-2 text-primary"></i>Log Out</a></li>
                </ul>
            </div>
            <!-- End::header-element -->

        </div>
        <!-- End::header-content-right -->

    </div>
    <!-- End::main-header-container -->

</header>
<!-- /app-header -->
<!-- app-header -->
{{--<header class="app-header" style="margin-top: 100px">--}}

{{--    <!-- Start::main-header-container -->--}}
{{--    <div class="main-header-container container-fluid">--}}

{{--        <!-- Start::header-content-left -->--}}
{{--        <div class="header-content-left d-flex align-items-center">--}}

{{--            <a href="/panel" class="header-logo-responsive">--}}
{{--                @php--}}
{{--                    $img       = Media::CheckImage($settings[Setting::Logo]['image'],$settings[Setting::ReplaceProfilePicture]['image']);--}}
{{--                @endphp--}}

{{--                @if(!is_null($img))--}}
{{--                    <img src="{{$img}}" alt="logo" class="panel-logo">--}}
{{--                @endif--}}
{{--            </a>--}}

{{--            <!-- Start::header-element -->--}}
{{--            <div class="header-element">--}}
{{--                <!-- Start::header-link -->--}}
{{--                <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle" data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>--}}
{{--                <!-- End::header-link -->--}}
{{--            </div>--}}
{{--            <!-- End::header-element -->--}}

{{--            <!-- Start::header-element -->--}}
{{--            <div class="main-header-center  d-none d-lg-block header-link">--}}
{{--                <input type="text" class="form-control" id="typehead" placeholder="جست و جو کنید..."--}}
{{--                       autocomplete="off">--}}
{{--                <button type="button"  aria-label="button" class="btn pe-1"><i class="fe fe-search" aria-hidden="true"></i></button>--}}
{{--                <div id="headersearch" class="header-search">--}}
{{--                    <div class="p-3">--}}
{{--                        <div class="">--}}
{{--                            <p class="fw-semibold text-muted mb-2 fs-13">Recent Searches</p>--}}
{{--                            <div class="ps-0">--}}
{{--                                <a  href="javascript:void(0)" class="search-tags"><i class="fe fe-search me-2"></i>People<span></span></a>--}}
{{--                                <a  href="javascript:void(0)" class="search-tags"><i class="fe fe-search me-2"></i>Pages<span></span></a>--}}
{{--                                <a  href="javascript:void(0)" class="search-tags"><i class="fe fe-search me-2"></i>Articles<span></span></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="mt-3">--}}
{{--                            <p class="fw-semibold text-muted mb-3 fs-13">Apps and pages</p>--}}
{{--                            <ul class="ps-0">--}}
{{--                                <li class="p-1 d-flex align-items-center text-muted mb-3 search-app">--}}
{{--                                    <a class="d-inline-flex align-items-center" href="mail.html"><i class="fe fe-mail me-2 fs-14 bg-primary-transparent p-2 rounded-circle"></i><span>Mail</span></a>--}}
{{--                                </li>--}}
{{--                                <li class="p-1 d-flex align-items-center text-muted mb-3 search-app">--}}
{{--                                    <a class="d-inline-flex align-items-center" href="buttons.html"><i class="fe fe-globe me-2 fs-14 bg-primary-transparent p-2 rounded-circle"></i><span>Buttons</span></a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="mt-3">--}}
{{--                            <p class="fw-semibold text-muted mb-2 fs-13">Links</p>--}}
{{--                            <ul class="ps-0 list-unstyled mb-0">--}}
{{--                                <li class="p-1 align-items-center text-muted mb-1 search-app">--}}
{{--                                    <a href="javascript:void(0)" class="text-primary"><u>http://spruko/spruko.com</u></a>--}}
{{--                                </li>--}}
{{--                                <li class="p-1 align-items-center text-muted mb-0 pb-0 search-app">--}}
{{--                                    <a href="javascript:void(0)" class="text-primary"><u>http://spruko/spruko.com</u></a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="py-3 border-top px-0">--}}
{{--                        <div class="text-center">--}}
{{--                            <a href="javascript:void(0)" class="text-primary text-decoration-underline fs-15">View all</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- End::header-element -->--}}

{{--        </div>--}}
{{--        <!-- End::header-content-left -->--}}

{{--        <!-- Start::header-content-right -->--}}
{{--        <div class="header-content-right">--}}

{{--            <!-- Start::header-element -->--}}
{{--            <div class="header-element header-search d-lg-none d-block">--}}
{{--                <!-- Start::header-link -->--}}
{{--                <a aria-label="anchor" href="javascript:void(0);" class="header-link" data-bs-toggle="modal" data-bs-target="#searchModal">--}}
{{--                    <i class="fe fe-search header-link-icon"></i>--}}
{{--                </a>--}}
{{--                <!-- End::header-link -->--}}
{{--            </div>--}}
{{--            <!-- End::header-element -->--}}


{{--            <!-- Start::header-element -->--}}
{{--            <div class="header-element header-theme-mode">--}}
{{--                <!-- Start::header-link|layout-setting -->--}}
{{--                <a aria-label="anchor" href="javascript:void(0);" class="header-link layout-setting">--}}
{{--                    <span class="light-layout">--}}
{{--                        <!-- Start::header-link-icon -->--}}
{{--                    <i class="fe fe-moon header-link-icon"></i>--}}
{{--                        <!-- End::header-link-icon -->--}}
{{--                    </span>--}}
{{--                    <span class="dark-layout">--}}
{{--                        <!-- Start::header-link-icon -->--}}
{{--                    <i class="fe fe-sun header-link-icon"></i>--}}
{{--                        <!-- End::header-link-icon -->--}}
{{--                    </span>--}}
{{--                </a>--}}
{{--                <!-- End::header-link|layout-setting -->--}}
{{--            </div>--}}
{{--            <!-- End::header-element -->--}}

{{--            <!-- Start::header-element -->--}}
{{--            <div class="header-element notifications-dropdown">--}}
{{--                <!-- Start::header-link|dropdown-toggle -->--}}
{{--                <!-- End::header-link|dropdown-toggle -->--}}
{{--                <!-- Start::main-header-dropdown -->--}}
{{--                <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">--}}
{{--                    <div class="p-3">--}}
{{--                        <div class="d-flex align-items-center justify-content-between">--}}
{{--                            <p class="mb-0 fs-17 fw-semibold">Notifications</p>--}}
{{--                            <span class="badge bg-secondary-transparent" id="notifiation-data">5 Unread</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <ul class="list-unstyled mb-0" id="header-notification-scroll">--}}
{{--                        <li class="dropdown-item">--}}
{{--                            <div class="d-flex align-items-start">--}}
{{--                                <div class="pe-2">--}}
{{--                                    <span class="avatar avatar-md bg-primary avatar-rounded"><i class="fe fe-mail fs-18"></i></span>--}}
{{--                                </div>--}}
{{--                                <div class="flex-grow-1 d-flex align-items-center my-auto">--}}
{{--                                    <div>--}}
{{--                                        <p class="mb-0 fw-semibold"><a href="notifications.html">New Application received</a></p>--}}
{{--                                        <span class="text-muted fw-normal fs-12 header-notification-text">3 days ago</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="ms-auto my-auto">--}}
{{--                                        <a aria-label="anchor" href="javascript:void(0);" class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i class="ti ti-x fs-16"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="dropdown-item">--}}
{{--                            <div class="d-flex align-items-start">--}}
{{--                                <div class="pe-2">--}}
{{--                                    <span class="avatar avatar-md bg-secondary avatar-rounded"><i class="fe fe-check-circle fs-18"></i></span>--}}
{{--                                </div>--}}
{{--                                <div class="flex-grow-1 d-flex align-items-center my-auto">--}}
{{--                                    <div>--}}
{{--                                        <p class="mb-0 fw-semibold"><a href="notifications.html">Project has been approved</a></p>--}}
{{--                                        <span class="text-muted fw-normal fs-12 header-notification-text">2 hours ago</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="ms-auto my-auto">--}}
{{--                                        <a aria-label="anchor" href="javascript:void(0);" class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i class="ti ti-x fs-16"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="dropdown-item">--}}
{{--                            <div class="d-flex align-items-start">--}}
{{--                                <div class="pe-2">--}}
{{--                                    <span class="avatar avatar-md bg-success avatar-rounded"><i class="fe fe-shopping-cart fs-18"></i></span>--}}
{{--                                </div>--}}
{{--                                <div class="flex-grow-1 d-flex align-items-center my-auto">--}}
{{--                                    <div>--}}
{{--                                        <p class="mb-0 fw-semibold"><a href="notifications.html">Your Product Delivered</a></p>--}}
{{--                                        <span class="text-muted fw-normal fs-12 header-notification-text">30 min ago</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="ms-auto my-auto">--}}
{{--                                        <a aria-label="anchor" href="javascript:void(0);" class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i class="ti ti-x fs-16"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="dropdown-item">--}}
{{--                            <div class="d-flex align-items-start">--}}
{{--                                <div class="pe-2">--}}
{{--                                    <span class="avatar avatar-md bg-pink avatar-rounded"><i class="fe fe-shopping-cart fs-18"></i></span>--}}
{{--                                </div>--}}
{{--                                <div class="flex-grow-1 d-flex align-items-center my-auto">--}}
{{--                                    <div>--}}
{{--                                        <p class="mb-0 fw-semibold"><a href="notifications.html">Friend Requests</a></p>--}}
{{--                                        <span class="text-muted fw-normal fs-12 header-notification-text">10 min ago</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="ms-auto my-auto">--}}
{{--                                        <a aria-label="anchor" href="javascript:void(0);" class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i class="ti ti-x fs-16"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <div class="p-3 empty-header-item1 border-top text-center">--}}
{{--                        <a href="notifications.html" class="">View All Notifications</a>--}}
{{--                    </div>--}}
{{--                    <div class="p-5 empty-item1 d-none">--}}
{{--                        <div class="text-center">--}}
{{--                            <span class="avatar avatar-xl avatar-rounded bg-secondary-transparent">--}}
{{--                                <i class="ri-notification-off-line fs-2"></i>--}}
{{--                            </span>--}}
{{--                            <h6 class="fw-semibold mt-3">No New Notifications</h6>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- End::main-header-dropdown -->--}}
{{--            </div>--}}
{{--            <!-- End::header-element -->--}}

{{--            <!-- Start::header-element -->--}}
{{--            <div class="header-element main-profile-user">--}}
{{--                <!-- Start::header-link|dropdown-toggle -->--}}
{{--                <a href="#" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div class="me-xxl-2 me-0">--}}
{{--                            <img src="{{myAsset('/assets/images/faces/9.jpg')}}" alt="img" width="32" height="32" class="rounded-circle">--}}
{{--                        </div>--}}
{{--                        <div class="d-xxl-block d-none my-auto">--}}
{{--                            <h6 class="fw-semibold mb-0 lh-1 fs-14">{{$user->Phone}}</h6>--}}
{{--                            <span class="op-7 fw-normal d-block fs-11 text-muted">{{$user->Type}}</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <!-- End::header-link|dropdown-toggle -->--}}
{{--                <ul class="main-header-dropdown dropdown-menu pt-0 header-profile-dropdown dropdown-menu-end" aria-labelledby="mainHeaderProfile">--}}
{{--                    <li class="drop-heading d-xxl-none d-block">--}}
{{--                        <div class="text-center">--}}
{{--                            <h5 class="text-dark mb-0 fs-14 fw-semibold">{{$user->Phone}}</h5>--}}
{{--                            <small class="text-muted">{{$user->Type}}</small>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li class="dropdown-item"><a class="d-flex w-100" href="chat.html"><i class="fe fe-headphones fs-18 me-2 text-primary"></i>Support</a></li>--}}
{{--                    <li class="dropdown-item"><a class="d-flex w-100 logout" href=""><i class="fe fe-info fs-18 me-2 text-primary"></i>خروج</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <form action="">--}}
{{--                @csrf--}}
{{--            </form>--}}
{{--            <!-- End::header-element -->--}}

{{--        </div>--}}
{{--        <!-- End::header-content-right -->--}}

{{--    </div>--}}
{{--    <!-- End::main-header-container -->--}}

{{--</header>--}}
<!-- /app-header -->
@push('js')
{{--    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>--}}
{{--    <script src="{{TransferFacade::loadAsset('/root/assets/js/lexontech/functions.js')}}"></script>--}}
{{--    <script src="{{TransferFacade::loadAsset('/root/assets/js/lexontech/auth.js')}}"></script>--}}
@endpush
