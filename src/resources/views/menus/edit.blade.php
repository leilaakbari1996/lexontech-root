@php
    use Lexontech\Root\app\Models\Setting;
    use Lexontech\Root\app\Infrastructures\Media;
@endphp
@extends("RootView::layouts.master",["title"=>"ویرایش منو", "subtitle" => "ویرایش منو {$menuMain->Title}",'menus' => $menus])

@section("content")
    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card custom-card">
            <form action="">
                <div class="card-header">
                    <div class="card-title"> ویرایش منو {{$menuMain->Title}}</div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-xl-12 my-input">
                            <label for="Title" class="form-label">عنوان منو</label>
                            <input type="text" name="Title" value="{{$menuMain->Title ?? null}}" class="form-control" placeholder="عنوان منو">
                            <div class="form-text form-text-error mt-2">
                                پر کردن این فیلد الزامیست !!
                            </div>
                        </div>

                        <div class="col-xl-12 my-input">
                            <label for="Link" class="form-label">لینک</label>
                            <input type="text" value="{{$menuMain->Link ?? null}}" name="Link" class="form-control" placeholder="لینک">
                            <div class="form-text form-text-error mt-2">
                                پر کردن این فیلد الزامیست !!
                            </div>
                        </div>

                        <div class="col-xl-12 my-input">
                            <label for="Order" class="form-label">Order</label>
                            <input type="text" name="Order" value="{{$menuMain->Order ?? null}}" class="form-control" placeholder="Order">
                        </div>


                        <div class="col-xl-12 my-input">
                            <label for="Type" class="form-label">مکان قرار گرفتن منو</label>
                            <select class="form-control" data-trigger name="Type">
                                <option value="">انتخاب مکان</option>
                                <option value="{{\Lexontech\Root\app\Models\Menu::Header}}"
                                        @if($menuMain->Type == \Lexontech\Root\app\Models\Menu::Header) selected @endif
                                >هدر</option>
                                <option value="{{\Lexontech\Root\app\Models\Menu::Footer}}"
                                        @if($menuMain->Type == \Lexontech\Root\app\Models\Menu::Footer) selected @endif
                                >فوتر</option>
                            </select>
                            <div class="form-text form-text-error mt-2">
                                پر کردن این فیلد الزامیست !!
                            </div>
                        </div>

                        <div class="col-xl-12 my-input">
                            <label for="parent_id" class="form-label">والد</label>
                            <select class="form-control" data-trigger id="choices-single-groups" name="parent_id">
                                <option value="">انتخاب والد</option>
                                @forelse($parents as $parent)
                                    <option value="{{$parent->id}}"
                                    @if($menuMain->parent_id == $parent->id) selected @endif
                                    >{{$parent->Title ?? null}}</option>
                                @empty
                                    هنوز منویی ثبت نشده است!!
                                @endforelse
                            </select>
                            <input type="hidden" value="{{$menuMain->id}}" name="menu_id">
                        </div>

{{--                        <div class="col-xl-12 blog-images-container my-input">--}}
{{--                            <label for="blog-author-email" class="form-label">لوگو</label>--}}
{{--                            @php--}}
{{--                                $img       = Media::CheckImage($menuMain->IconURL,$settings[Setting::ReplaceProfilePicture]['image']);--}}
{{--                            @endphp--}}

{{--                            @if(!is_null($img))--}}
{{--                                <img src="{{$img}}" alt="{{$menuMain->Title}}" class="imgEdit">--}}
{{--                            @endif--}}
{{--                            <input type="file" class="blog-images" name="filepond" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="6">--}}
{{--                        </div>--}}
                    </div>

                    <div class="col-xl-12 mt-3 my-input">
                        <label class="form-label">وضعیت</label>
                        <div class="d-flex align-items-center">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="Status" id="blog-free1"
                                @if($menuMain->Status) checked @endif>
                                <span class="form-check-label">
                                   فعال
                                </span>
                            </div>
                            <div class="form-check me-5">
                                <input class="form-check-input" type="radio" name="Status" id="blog-paid1"
                                @if(!$menuMain->Status) checked @endif>
                                <span class="form-check-label">
                                    غیر فعال
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="btn-list text-end">
                        <button type="button" class="btn btn-primary saveMenu create">
                            <input type="hidden" value="/panel/menus">ویرایش</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@push("css")
    <link rel="stylesheet" href="{{\TransferFacade::loadAsset('/root/assets/libs/choices.js/assets/styles/choices.min.css')}}">
    @include('RootView::layouts.css.filepondCSS')
@endpush

@push("js")
    <script src="{{TransferFacade::loadAsset('/root/assets/js/blog-create.js')}}"></script>
    <script src="{{TransferFacade::loadAsset('/root/assets/js/lexontech/createMenu.js')}}"></script>
    <script src="{{TransferFacade::loadAsset('/root/assets/js/lexontech/create.js')}}"></script>
    @include('RootView::layouts.js.filepondJS')
@endpush


