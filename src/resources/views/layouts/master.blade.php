
<!DOCTYPE html>
<html lang="en" dir="rtl" data-nav-layout="vertical" data-theme-mode="dark" data-header-styles="dark" data-menu-styles="dark" data-toggled="close">
@include("RootView::layouts.head",["title"=>"$title"])

<body>

    @csrf
    @include("RootView::layouts.switcher")
    @include("RootView::layouts.loader")

    <div class="page">
        @include("RootView::layouts.header")
        @include("RootView::layouts.side",['menus' => $menus])

        <!-- Start::app-content -->
            <div class="main-content app-content">
                <div class="container-fluid mt-4 mt-responsive">
                    <x-RootView::layouts.page-header :title="$title" :subtitle="$subtitle" />

                <!--  -->
                    <div class="row">
                        @yield("content")
                    </div>
                    <!--End::row-1 -->

                </div>
            </div>
            <!-- End::app-content -->

            @include("RootView::layouts.headersearch")
            @include("RootView::layouts.right-side")
            @include("RootView::layouts.footer")
    </div>

    <script src="{{TransferFacade::loadAsset('/root/assets/js/jquery-3.6.1.min.js')}}" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="{{TransferFacade::loadAsset('/root/assets/js/lexontech/functions.js')}}"></script>
    @include("RootView::layouts.js")
    <script src="{{TransferFacade::loadAsset('/root/assets/js/sweetalert2.js')}}"></script>
    <script src="{{TransferFacade::loadAsset('/root/assets/js/lexontech/auth.js')}}"></script>
    <script src="{{\TransferFacade::loadAsset('/root/assets/js/custom-switcher.min.js')}}"></script>
    <!-- Internal Select-2.js -->
    <script src="{{\TransferFacade::loadAsset('/root/assets/js/select2.js')}}"></script>
</body>
</html>

