<!-- Start::app-sidebar -->
@php
    use Lexontech\Root\app\Models\AuthenticationSystem\User;
    use Lexontech\Root\app\Models\Setting;
    use Lexontech\Root\app\Infrastructures\Media;
@endphp
<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="/panel" class="header-logo">
            @php
                $img       = Media::CheckImage($settings[Setting::Logo]['image'],$settings[Setting::ReplaceProfilePicture]['image']);
            @endphp

            @if(!is_null($img))
                <img src="{{$img}}" alt="logo" class="panel-logo">
            @endif
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
            </div>
            <ul class="main-menu">
                <!-- Start::slide -->
                @forelse($menus as $menu)
                    @if(auth()->user()->Type == User::Admin || (auth()->user()->Type == User::Author and $menu->PermissionToSeeAuthor))
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="fe fe-globe side-menu__icon"></i>
                                <span class="side-menu__label">{{$menu->Name}}</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">{{$menu->Name}}</a>
                                </li>
                                @forelse($menu->Children as $child)
                                    <li class="slide">
                                        <a href="{{$child->Url}}" class="side-menu__item">{{$child->Name}}</a>
                                    </li>
                                @empty
                                @endforelse
                           </ul>
                    @endif
                </li>
                @empty
                @endforelse
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>
<!-- End::app-sidebar -->
