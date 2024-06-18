@php
    use \Lexontech\Root\app\Models\Setting;
    use Lexontech\Root\app\Infrastructures\Media;
@endphp
@extends("RootView::layouts.master",["title"=>"لیست کاربران", "subtitle" => "کاربران",'menus' => $menus])

@section("content")
    @forelse($users as $user)
        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12 users">
        <div class="card custom-card ">
            <div class="card-body">
                <div class="text-center">
                      <span class="avatar avatar-xxl rounded">
                          @php
                              $img       = Media::CheckImage($user->ProfileURL,$settings[Setting::ReplaceProfilePicture]['image']);
                          @endphp

                          @if(!is_null($img))
                              <img src="{{$img}}" alt="{{$user->FullName ?? null}}" class="rounded-circle">
                          @endif
                      </span>
                </div>
                <div class="d-flex  text-center justify-content-between mt-1 mb-3">
                    <div class="flex-fill">
                        <p class="mb-0 fw-semibold fs-16 text-truncate max-w-150 mx-auto">
                            <a href="javascript:void(0);">{{$user->FullName ?? null}}</a>
                        </p>
                        <p class="mb-0 fs-12 text-muted text-truncate max-w-150 mx-auto">{{$user->lex_PhoneNumber ?? null}}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer border-block-start-dashed text-center p-0">
                <div class="d-flex align-items-center justify-content-center">
                        <div class="d-flex p-3 w-100 justify-content-center border-end btn-delete delete">
                            <input type="hidden" value="{{$user->id}}" name="id">
                            <input type="hidden" value="users" name="urlDelete">
                            <input type="hidden" value=" آیا مطمنید میخواهید کاربر را حذف کنید؟" name="textDelete">
                            <div class="text-center">
                                حذف
                            </div>
                        </div>
                    <a href="{{route('panel.users.edit',['user' => $user->id])}}"
                       class="d-flex p-3 w-100 justify-content-center btn-edit">
                        <div class="text-center ">
                            ویرایش
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @empty
        هنوز کاربری ثبت نشده است!!
    @endforelse
    @php($users = $users->toArray())
    @if($users['total'])
        <ul class="pagination justify-content-end mt-3">
        <li class="page-item page-prev disabled">
            <a class="page-link" href="javascript:void(0)" tabindex="-1">Prev</a>
        </li>
        @for($i=1 ; $i<=$users['last_page'];$i++)
            <li class="page-item @if($page == $i) active @endif">
                <a class="page-link" href="{{route('panel.users.index',['page' => $i])}}">{{$i}}</a>
            </li>
        @endfor
        <li class="page-item page-next">
            <a class="page-link" href="javascript:void(0)">Next</a>
        </li>
    </ul>
    @endif
@endsection
@push("css")
    <link rel="stylesheet" href="{{\TransferFacade::loadAsset('/authenticationSystem/assets/css/index.css')}}">
@endpush

@push('js')
    <script src="{{\TransferFacade::loadAsset('/root/assets/libs/@simonwep/pickr/dist/pickr.es5.min.js')}}"></script>
    <script src="{{\TransferFacade::loadAsset('/root/assets/js/lexontech/delete.js')}}"></script>
@endpush
