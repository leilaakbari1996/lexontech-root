@php
    use Lexontech\Root\app\Models\Setting;
    use Lexontech\Root\app\Infrastructures\Media;
    use Lexontech\Root\app\Infrastructures\Translations;
@endphp
@extends("RootView::layouts.master",["title"=>"لیست سرویس ها", "subtitle" => "لیست سرویس ها","menus" => $menus])

@section("content")
    <div class="row">
        <div class="card custom-card">
            <div class="card-body">
                <div class="table-responsive">
                    @if(count($services))
                        <table class="table text-nowrap table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">عنوان</th>
                                <th scope="col">وضعیت</th>
                                <th scope="col">ایکون</th>
                                <th scope="col">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($services as $service)
                                <tr>
                                    <td>{{$service->Title ?? null}}</td>
                                    <td>
                                        @if($service->Status)
                                            <span class="badge bg-success-transparent">فعال</span>
                                        @else
                                            <span class="badge bg-danger-transparent">غیر فعال</span>
                                        @endif

                                    </td>

                                    <td>
                                        @php
                                            $img       = Media::CheckImage($service->LogoURL,$settings[Setting::ReplaceProfilePicture]['image']);
                                        @endphp

                                        @if(!is_null($img))
                                            <img src="{{$img}}" alt="{{$service->Title}}" class="imgEdit">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="hstack gap-2 flex-wrap">
                                            <a href="{{route('panel.services.edit',['service' => $service->id])}}" class="text-info fs-14 lh-1"><i
                                                    class="ri-edit-line"></i></a>
                                            <a class="btn-delete delete text-danger fs-14 lh-1"><i
                                                    class="ri-delete-bin-5-line"></i>
                                                <input type="hidden" value="{{$service->id}}" name="id">
                                                <input type="hidden" value="services" name="urlDelete">
                                                <input type="hidden" value=" آیا مطمنید میخواهید سرویس را حذف کنید؟" name="textDelete">
                                            </a>
                                        </div>



                                    </td>
                                </tr>
                            @empty
                                <p>هنوز سرویسی ثبت نشده است!!</p>
                            @endforelse
                            </tbody>
                        </table>
                    @else
                        هنوز سرویسی ثبت نشده است!!
                    @endif
                </div>
            </div>
        </div>
        @if(count($services))
            @php($services = $services->toArray())
            <ul class="pagination justify-content-end mt-3">
                <li class="page-item page-prev disabled">
                    <a class="page-link" href="javascript:void(0)" tabindex="-1">Prev</a>
                </li>
                @for($i=1 ; $i<=$services['last_page'];$i++)
                    <li class="page-item @if($page == $i) active @endif">
                        <a class="page-link" href="{{route('panel.services.index',['page' => $i])}}">{{$i}}</a>
                    </li>
                @endfor
                <li class="page-item page-next">
                    <a class="page-link" href="javascript:void(0)">Next</a>
                </li>
            </ul>
        @endif
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
