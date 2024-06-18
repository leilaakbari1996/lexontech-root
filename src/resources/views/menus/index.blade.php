@php
    use Lexontech\Root\app\Models\Setting;
    use Lexontech\Root\app\Infrastructures\Media;
@endphp
@extends("RootView::layouts.master",["title"=>"لیست منو ها", "subtitle" => "لیست منو ها","menus" => $menus])

@section("content")
    <div class="row">
        <div class="card custom-card">
            <div class="card-body">
                <div class="table-responsive">
                    @if(count($menusMain))
                        <table class="table text-nowrap table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">عنوان</th>
                                <th>نوع</th>
                                <th scope="col">وضعیت</th>
{{--                                <th scope="col">ایکون</th>--}}
                                <th scope="col">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($menusMain as $menu)
                                <tr>
                                    <td>{{$menu->Title ?? null}}</td>
                                    <td>{{$menu->Type ?? null}}</td>
                                    <td>

                                        @if($menu->Status)
                                            <span class="badge bg-success-transparent">فعال</span>
                                        @else
                                            <span class="badge bg-danger-transparent">غیر فعال</span>
                                        @endif

                                    </td>

{{--                                    <td>--}}
{{--                                        @php--}}
{{--                                            $img       = Media::CheckImage($menu->IconURL,$settings[Setting::ReplaceProfilePicture]['image']);--}}
{{--                                        @endphp--}}

{{--                                        @if(!is_null($img))--}}
{{--                                            <img src="{{$img}}" alt="{{$menu->Title ?? null}}" class="imgEdit">--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
                                    <td>
                                        <div class="hstack gap-2 flex-wrap">
                                            <a href="{{route('panel.menus.edit',['menu' => $menu->id])}}" class="text-info fs-14 lh-1"><i
                                                    class="ri-edit-line"></i></a>
                                            <a class="btn-delete delete text-danger fs-14 lh-1"><i
                                                    class="ri-delete-bin-5-line"></i>
                                                <input type="hidden" value="{{$menu->id}}" name="id">
                                                <input type="hidden" value="menus" name="urlDelete">
                                                <input type="hidden" value=" آیا مطمنید میخواهید منو را حذف کنید؟" name="textDelete">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                هنوز منویی ثبت نشده است!!
                            @endforelse
                            </tbody>
                        </table>
                    @else
                        هنوز منویی ثبت نشده است!!
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@push("css")

@endpush

@push("js")
{{--    <script src="{{TransferFacade::loadAsset('root/assets/libs/node-waves/waves.min.js')}}"></script>--}}
{{--    <script src="{{TransferFacade::loadAsset('root/assets/libs/@popperjs/core/umd/popper.min.js')}}"></script>--}}
{{--    <script src="{{TransferFacade::loadAsset('root/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>--}}
{{--    <script src="{{TransferFacade::loadAsset('root/assets/js/defaultmenu.min.js')}}"></script>--}}
{{--    <script src="{{TransferFacade::loadAsset('root/assets/js/sticky.js')}}"></script>--}}
{{--    <script src="{{TransferFacade::loadAsset('root/assets/libs/simplebar/simplebar.min.js')}}"></script>--}}
{{--    <script src="{{TransferFacade::loadAsset('root/assets/js/simplebar.js')}}"></script>--}}
{{--    <script src="{{TransferFacade::loadAsset('root/assets/libs/@simonwep/pickr/dist/pickr.es5.min.js')}}"></script>--}}
    <script src="{{TransferFacade::loadAsset('root/assets/js/lexontech/delete.js')}}"></script>

@endpush
