@php
use Lexontech\Root\app\Infrastructures\Translations
@endphp
@extends("RootView::layouts.master",["title"=>"لیست تنظیمات", "subtitle" => "لیست تنظیمات","menus" => $menus])

@section("content")
    <div class="row">
        <div class="card custom-card">
            <div class="card-body">
                <div class="table-responsive">
                    @if(count($settingsMain))
                        <table class="table text-nowrap table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">عنوان</th>
                                <th scope="col">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($settingsMain as $setting)
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            {{Translations::translations($setting->Key)}}
                                        </div>
                                    </th>
                                    <td>
                                        <div class="hstack gap-2 flex-wrap">
                                            <a href="{{route('panel.settings.edit',['setting' => $setting->id])}}" class="text-info fs-14 lh-1"><i
                                                    class="ri-edit-line"></i></a>
{{--                                            <a class="text-danger fs-14 lh-1 deleteCategory delete">--}}
{{--                                                <input type="hidden" value="{{$setting->id}}" name="id">--}}
{{--                                                <input type="hidden" value="categories" name="urlDelete">--}}
{{--                                                <input type="hidden" value=" آیا مطمنید میخواهید این تنظیمات را حذف کنید؟" name="textDelete">--}}
{{--                                                <i class="ri-delete-bin-5-line"></i>--}}
{{--                                            </a>--}}
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                هنوز تنظیماتی ثبت نشده است!!
                            @endforelse
                            </tbody>
                        </table>
                    @else
                        هنوز تنظیماتی ثبت نشده است!!
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection
@push("css")
    <link href="{{\TransferFacade::loadAsset('/root/assets/libs/node-waves/dist/waves.min.css')}}" rel="stylesheet" >
    <link href="{{\TransferFacade::loadAsset('/root/assets/libs/simplebar/dist/simplebar.min.css')}}" rel="stylesheet" >
    <link rel="stylesheet" href="{{\TransferFacade::loadAsset('/root/assets/libs/flatpickr/dist/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{\TransferFacade::loadAsset('/root/assets/libs/@simonwep/pickr/dist/themes/nano.min.css')}}">
    <link rel="stylesheet" href="{{\TransferFacade::loadAsset('/root/assets/libs/choices.js/assets/styles/choices.min.css')}}">
@endpush

@push("js")
{{--    <script src="{{\TransferFacade::loadAsset('/root/assets/libs/choices.js/assets/scripts/choices.min.js')}}"></script>--}}
{{--    <script src="{{TransferFacade::loadAsset('/root/assets/libs/@popperjs/core/dist/umd/popper.min.js')}}"></script>--}}
{{--    <script src="{{TransferFacade::loadAsset('/root/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>--}}
{{--    <script src="{{TransferFacade::loadAsset('/root/assets/libs/node-waves/dist/waves.min.js')}}"></script>--}}
{{--    <script src="{{TransferFacade::loadAsset('/root/assets/libs/simplebar/dist/simplebar.min.js')}}"></script>--}}
{{--    <script src="{{TransferFacade::loadAsset('/root/assets/libs/@simonwep/pickr/dist/pickr.es5.min.js')}}"></script>--}}
{{--    <script src="{{TransferFacade::loadAsset('/root/assets/js/custom-switcher.min.js')}}"></script>--}}
{{--    <script src="{{TransferFacade::loadAsset('/root/assets/libs/flatpickr/dist/flatpickr.min.js')}}"></script>--}}
{{--    <script src="{{TransferFacade::loadAsset('/root/assets/js/blog-create.js')}}"></script>--}}
{{--    <script src="{{TransferFacade::loadAsset('/root/assets/js/custom.js')}}"></script>--}}
    <script src="{{TransferFacade::loadAsset('/root/assets/js/lexontech/functions.js')}}"></script>
    <script src="{{TransferFacade::loadAsset('/client/assets/js/lexontech/setting.js')}}"></script>
@endpush



