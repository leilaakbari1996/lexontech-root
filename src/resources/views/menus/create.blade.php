@php
    use Lexontech\Root\app\Models\Setting;
    use Lexontech\Root\app\Infrastructures\Media;
@endphp
@extends("RootView::layouts.master",["title"=>"ایجاد منو", "subtitle" => "ایجاد منو جدید",'menus' => $menus])

@section("content")
    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card custom-card">
            <form action="">
                <div class="card-header">
                    <div class="card-title">منو جدید</div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-xl-12 my-input">
                            <label for="Title" class="form-label">عنوان منو</label>
                            <input type="text" name="Title" class="form-control" placeholder="عنوان منو">
                            <div class="form-text form-text-error mt-2">
                                پر کردن این فیلد الزامیست !!
                            </div>
                        </div>

                        <div class="col-xl-12 my-input">
                            <label for="Link" class="form-label">لینک</label>
                            <input type="text" name="Link" class="form-control" placeholder="لینک">
                            <div class="form-text form-text-error mt-2">
                                پر کردن این فیلد الزامیست !!
                            </div>
                        </div>

                        <div class="col-xl-12 my-input">
                            <label for="Order" class="form-label">Order</label>
                            <input type="text" name="Order" class="form-control" placeholder="Order">
                        </div>

                        <div class="col-xl-12 my-input">
                            <label for="Type" class="form-label">مکان قرار گرفتن منو</label>
                            <select class="form-control" data-trigger name="Type">
                                <option value="">انتخاب مکان</option>
                                <option value="{{\Lexontech\Root\app\Models\Menu::Header}}">هدر</option>
                                <option value="{{\Lexontech\Root\app\Models\Menu::Footer}}">فوتر</option>
                            </select>
{{--                            <select class="form-control" name="Type" id="blog-tags">--}}
{{--                                <option value="">انتخاب مکان</option>--}}
{{--                                <option value="{{\Lexontech\Root\app\Models\Menu::Header}}">هدر</option>--}}
{{--                                <option value="{{\Lexontech\Root\app\Models\Menu::Footer}}">فوتر</option>--}}
{{--                            </select>--}}
                            <div class="form-text form-text-error mt-2">
                                پر کردن این فیلد الزامیست !!
                            </div>
                        </div>

                        <div class="col-xl-12 my-input">
                            <label for="Type" class="form-label">والد</label>
                            <select class="form-control" data-trigger name="parent_id">
                                <option value="">انتخاب والد</option>
                                @forelse($parents as $parent)
                                    <option value="{{$parent->id}}">{{$parent->Title ?? null}}</option>
                                @empty
                                    هنوز منویی ثبت نشده است!!
                                @endforelse
                            </select>
{{--                            <select class="form-control" name="parent_id" id="blog-tags">--}}
{{--                                <option value="">انتخاب والد</option>--}}
{{--                                @forelse($parents as $parent)--}}
{{--                                    <option value="{{$parent->id}}">{{$parent->Title ?? null}}</option>--}}
{{--                                @empty--}}
{{--                                    هنوز منویی ثبت نشده است!!--}}
{{--                                @endforelse--}}
{{--                            </select>--}}
                        </div>

{{--                        <div class="col-xl-12 blog-images-container my-input">--}}
{{--                            <label for="blog-author-email" class="form-label">لوگو</label>--}}
{{--                            <input type="file" class="blog-images" name="filepond" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="6">--}}
{{--                        </div>--}}
                    </div>

                    <div class="col-xl-12 mt-3 my-input">
                        <label class="form-label">وضعیت</label>
                        <div class="d-flex align-items-center">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="Status" id="blog-free1" checked>
                                <span class="form-check-label" for="Status">
                                   فعال
                                </span>
                            </div>
                            <div class="form-check me-5">
                                <input class="form-check-input" type="radio" name="Status" id="blog-paid1">
                                <span class="form-check-label" for="blog-paid1">
                                    غیر فعال
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                <div class="btn-list text-end">
                    <button type="button" class="btn btn-primary saveMenu create">
                        <input type="hidden" value="/panel/menus">ذخیره</button>
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
    <script src="{{TransferFacade::loadAsset('/root/assets/js/lexontech/createMenu.js')}}"></script>
    <script src="{{TransferFacade::loadAsset('/root/assets/js/lexontech/create.js')}}"></script>
    @include('RootView::layouts.js.filepondJS')
@endpush


