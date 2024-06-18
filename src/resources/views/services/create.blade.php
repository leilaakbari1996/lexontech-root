@php
    use Lexontech\Root\app\Models\Setting;
@endphp
@extends("RootView::layouts.master",["title"=>"ایجاد سرویس", "subtitle" => "ایجاد سرویس جدید",'menus' => $menus])

@section("content")
    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <form>
            <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">سرویس جدید</div>
            </div>
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-xl-12 my-input">
                        <label for="Title" class="form-label">عنوان سرویس</label>
                        <input type="text" name="Title" class="form-control" id="blog-title" placeholder="عنوان سرویس">
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
                        <label class="form-label">توضیحات</label>
                        <div id="blog-content"></div>
                    </div>
                    <div class="col-xl-12 blog-images-container my-input">
                        <label for="blog-author-email" class="form-label">لوگو</label>
                        <x-RootView::layouts.notification-image :text=" $settings[Setting::DimensionsOfServicePhotos]['link'] ?? null" />
                        <input type="file" class="blog-images" name="filepond" data-allow-reorder="true"
                               data-max-file-size="3MB" data-max-files="6">
                    </div>
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
                    <button type="button" class="btn btn-primary saveService create">
                        <input type="hidden" value="/panel/services">ذخیره
                    </button>
                </div>
            </div>
        </div>
        </form>
    </div>

@endsection
@push("css")
    <link href="{{\TransferFacade::loadAsset('/root/assets/libs/node-waves/dist/waves.min.css')}}" rel="stylesheet">
    <link href="{{\TransferFacade::loadAsset('/root/assets/libs/simplebar/dist/simplebar.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{\TransferFacade::loadAsset('/root/assets/libs/flatpickr/dist/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{\TransferFacade::loadAsset('/root/assets/libs/@simonwep/pickr/dist/themes/nano.min.css')}}">
    <link rel="stylesheet" href="{{\TransferFacade::loadAsset('/root/assets/libs/choices.js/assets/styles/choices.min.css')}}">
    @include('RootView::layouts.css.quillCSS')
    @include('RootView::layouts.css.filepondCSS')
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
    <script src="{{TransferFacade::loadAsset('/root/assets/libs/quill/dist/quill.min.js')}}"></script>
    <script src="{{TransferFacade::loadAsset('/root/assets/js/blog-create.js')}}"></script>
{{--    <script src="{{TransferFacade::loadAsset('/root/assets/js/custom.js')}}"></script>--}}
    <script src="{{TransferFacade::loadAsset('/root/assets/js/lexontech/createService.js')}}"></script>
    <script src="{{TransferFacade::loadAsset('/root/assets/js/lexontech/functions.js')}}"></script>
    <script src="{{TransferFacade::loadAsset('/root/assets/js/lexontech/create.js')}}"></script>
    @include('RootView::layouts.js.filepondJS')
@endpush


