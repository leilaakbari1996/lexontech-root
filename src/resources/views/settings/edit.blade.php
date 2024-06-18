@php
    use \Lexontech\Root\app\Infrastructures\Translations;
    use Lexontech\Root\app\Infrastructures\Media;
    use Lexontech\Root\app\Models\Setting;
    $title = Translations::translations($setting->Key);
@endphp
@extends("RootView::layouts.master",["subtitle"=>"ویرایش تنظیمات", "title" => "{$title}",'menus' => $menus])

@section("content")
    <div class="alert alert-danger" role="alert">
        لطفا تمامی فیلد ها رو پر کنید!!
    </div>
    <form action="">
     @csrf
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card custom-card p-4">
                <div class="card-header">
                    <div class="card-title">{{Translations::translations($setting->Key)}}</div>
                </div>
                @php($value  = $setting->Value)
                @php($fields = $setting->Field)
                @if($fields['title'])
                    <div class="">
                    <div class="input-group mb-3">
                        <span class="input-group-text">عنوان</span>
                        <input type="text" class="form-control"
                               aria-describedby="basic-addon3" value="@if(array_key_exists('title',$value)){{$value['title']}}@endif" name="title">
                    </div>
                </div>
                @endif

                @if($fields['link'])
                     <div class="">
                        <div class="input-group mb-3">
                            <span class="input-group-text">مقدار</span>
                            <input type="text" class="form-control"
                                   aria-describedby="basic-addon3" value="@if(array_key_exists('link',$value)){{$value['link']}}@endif"
                                   name="link">
                        </div>
                     </div>
                @endif

                @if($fields['video'])
                    <div class="">
                        <div class="input-group mb-3">
                            <span class="input-group-text">ویدیو</span>
                            <textarea  class="form-control" aria-describedby="basic-addon3" name="video" cols="30" rows="10">@if(array_key_exists('video',$value)){{$value['video']}}@endif</textarea>
                        </div>
                    </div>
                @endif

                @if($fields['text'])
                     <div class="">
                        <div class="col-xl-12 my-input mb-3">
                             <label class="form-label">توضیحات</label>
                             <div id="blog-content">@if(array_key_exists('text',$value)){!! $value['text'] !!}@endif</div>
                        </div>
                    </div>
                @endif

                @if(isset($value['imageSize']) and !is_null($value['imageSize']))
                    <x-RootView::layouts.notification-image :text=" $value['imageSize'] " />
                @endif

                @if($fields['image'])
                    <div class="">
                    <div class="input-group mb-3">
                        <span class="input-group-text">تصویر</span>
                        <input type="file" class="blog-images form-control" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="6" name="image">
                        <label for="product-description-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0 me-4 imgSetting">
                            @if(array_key_exists('image',$value))
                                @php($img       = Media::CheckImage($value['image'],$settings[Setting::ReplaceProfilePicture]['image']))
                                @if(!is_null($img))
                                   <img src="{{$img}}" alt="{{Translations::translations($setting->Key)}}" class="imgEdit">
                                @endif
                            @endif
                        </label>
                    </div>
                </div>
                @endif

                @if(isset($value['imageBackgroundSize']) and !is_null($value['imageBackgroundSize']))
                    <x-RootView::layouts.notification-image :text=" $value['imageBackgroundSize'] " />
                @endif

                @if($fields['imageBackground'])
                    <div class="">
                        <div class="input-group mb-3">
                            <span class="input-group-text"> تصویر بک گراند</span>
                            <input type="file" class="blog-images form-control" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="6" name="imageBackground">
                            <label for="product-description-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0 me-4 imgSetting">
                                @if(array_key_exists('imageBackground',$value))
                                    @php($img       = Media::CheckImage($value['imageBackground'],$settings[Setting::ReplaceProfilePicture]['image']))
                                    @if(!is_null($img))
                                        <img src="{{$img}}" alt="{{Translations::translations($setting->Key)}}" class="imgEdit">
                                    @endif
                                @endif
                            </label>
                    </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="card-footer">
            <div class="btn-list text-end">
                <input type="hidden" name="setting_id" value="{{$setting->id}}">
                <button type="button" class="btn btn-primary saveSetting create">
                    <input type="hidden" value="/panel/settings">ویرایش</button>
            </div>
        </div>
    </form>

@endsection
@push("css")
    @include('RootView::layouts.css.quillCSS')
    @include('RootView::layouts.css.filepondCSS')
@endpush

@push("js")
    <script src="{{TransferFacade::loadAsset('/root/assets/libs/quill/dist/quill.min.js')}}"></script>
    <script src="{{TransferFacade::loadAsset('/root/assets/js/blog-create.js')}}"></script>
    <script src="{{TransferFacade::loadAsset('/root/assets/libs/flatpickr/dist/flatpickr.min.js')}}"></script>
    <script src="{{TransferFacade::loadAsset('/root/assets/js/lexontech/setting.js')}}"></script>
    @include('RootView::layouts.js.filepondJS')
@endpush
