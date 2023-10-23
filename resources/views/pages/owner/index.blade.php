@extends('../layouts/' . $layout)

@section('subhead')
    <title>Pemilik - Dashboard Agrio</title>
@endsection

@section('subcontent')
<div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">List Pemilik</h2>
    </div>
    <!-- BEGIN: HTML Table Data -->
    <div class="p-5 mt-5 intro-y box">
        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
            <form
                class="sm:mr-auto xl:flex"
                id="tabulator-html-filter-form"
            >
                <div class="items-center mt-2 sm:mr-4 sm:flex xl:mt-0">
                    <x-base.form-input
                        class="mt-2 sm:mt-0 sm:w-40 2xl:w-full"
                        id="tabulator-html-filter-value"
                        type="text"
                        placeholder="Search..."
                    />
                </div>
                <div class="mt-2 xl:mt-0">
                    <x-base.button
                        class="w-full mt-2 sm:mt-0 sm:ml-1 sm:w-16"
                        id="tabulator-html-filter-reset"
                        type="button"
                        variant="secondary"
                    >
                        Reset
                    </x-base.button>
                </div>
            </form>
            <div class="flex mt-5 sm:mt-0">
                <x-base.button
                    class="w-full mr-2 lg:w-auto btn-owner-add"
                    id="tabulator-add"
                    variant="primary"
                    data-form-url="{{ route('owner.add') }}"
                >
                    <x-base.lucide
                            class="w-4 h-4 mr-2"
                            icon="Plus"
                    />
                    Tambah Pemilik Toko
                </x-base.button>
            </div>
        </div>
        <div class="overflow-x-auto scrollbar-hidden">
            <div
                class="mt-5"
                id="owner-tabulator"
                data-url="{{ route('owner.tabulator') }}"
            ></div>
        </div>
    </div>
    <!-- END: HTML Table Data -->
    @include('pages.owner.modals.form-owner')
@endsection

@once
    @push('vendors')
        @vite('resources/js/vendor/tabulator/index.js')
        @vite('resources/js/vendor/lucide/index.js')
        @vite('resources/js/vendor/xlsx/index.js')
    @endpush
@endonce

@once
    @push('scripts')
        @vite('resources/js/pages/owner/index.js')
    @endpush

    @push('validation-script')
        {!! JsValidator::formRequest('App\Http\Requests\OwnerRequest', '#form-owner') !!}
    @endpush
@endonce
