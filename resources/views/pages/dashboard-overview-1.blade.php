@extends('../layouts/' . $layout)

@section('subhead')
    <title>Dashboard - Agrio</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="flex items-center h-10 intro-y">
                        <h2 class="mr-5 text-lg font-medium truncate">Statistik</h2>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 intro-y sm:col-span-6 xl:col-span-3">
                            <div @class([
                                'relative zoom-in',
                                'before:content-[\'\'] before:w-[90%] before:shadow-[0px_3px_20px_#0000000b] before:bg-slate-50 before:h-full before:mt-3 before:absolute before:rounded-md before:mx-auto before:inset-x-0 before:dark:bg-darkmode-400/70',
                            ])>
                                <div class="p-5 box">
                                    <div class="flex">
                                        <x-base.lucide
                                            class="h-[28px] w-[28px] text-primary"
                                            icon="ShoppingCart"
                                        />
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">{{$stores}}</div>
                                    <div class="mt-1 text-base text-slate-500">Toko</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 intro-y sm:col-span-6 xl:col-span-3">
                            <div @class([
                                'relative zoom-in',
                                'before:content-[\'\'] before:w-[90%] before:shadow-[0px_3px_20px_#0000000b] before:bg-slate-50 before:h-full before:mt-3 before:absolute before:rounded-md before:mx-auto before:inset-x-0 before:dark:bg-darkmode-400/70',
                            ])>
                                <div class="p-5 box">
                                    <div class="flex">
                                        <x-base.lucide
                                            class="h-[28px] w-[28px] text-pending"
                                            icon="User"
                                        />
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">{{$owners}}</div>
                                    <div class="mt-1 text-base text-slate-500">Pemilik</div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-span-12 intro-y sm:col-span-6 xl:col-span-3">
                            <div @class([
                                'relative zoom-in',
                                'before:content-[\'\'] before:w-[90%] before:shadow-[0px_3px_20px_#0000000b] before:bg-slate-50 before:h-full before:mt-3 before:absolute before:rounded-md before:mx-auto before:inset-x-0 before:dark:bg-darkmode-400/70',
                            ])>
                                <div class="p-5 box">
                                    <div class="flex">
                                        <x-base.lucide
                                            class="h-[28px] w-[28px] text-warning"
                                            icon="Monitor"
                                        />
                                        <div class="ml-auto">
                                            <x-base.tippy
                                                class="flex cursor-pointer items-center rounded-full bg-success py-[3px] pl-2 pr-1 text-xs font-medium text-white"
                                                as="div"
                                                content="12% Higher than last month"
                                            >
                                                12%
                                                <x-base.lucide
                                                    class="ml-0.5 h-4 w-4"
                                                    icon="ChevronUp"
                                                />
                                            </x-base.tippy>
                                        </div>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">2.149</div>
                                    <div class="mt-1 text-base text-slate-500">
                                        Total Products
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 intro-y sm:col-span-6 xl:col-span-3">
                            <div @class([
                                'relative zoom-in',
                                'before:content-[\'\'] before:w-[90%] before:shadow-[0px_3px_20px_#0000000b] before:bg-slate-50 before:h-full before:mt-3 before:absolute before:rounded-md before:mx-auto before:inset-x-0 before:dark:bg-darkmode-400/70',
                            ])>
                                <div class="p-5 box">
                                    <div class="flex">
                                        <x-base.lucide
                                            class="h-[28px] w-[28px] text-success"
                                            icon="User"
                                        />
                                        <div class="ml-auto">
                                            <x-base.tippy
                                                class="flex cursor-pointer items-center rounded-full bg-success py-[3px] pl-2 pr-1 text-xs font-medium text-white"
                                                as="div"
                                                content="22% Higher than last month"
                                            >
                                                22%
                                                <x-base.lucide
                                                    class="ml-0.5 h-4 w-4"
                                                    icon="ChevronUp"
                                                />
                                            </x-base.tippy>
                                        </div>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">152.040</div>
                                    <div class="mt-1 text-base text-slate-500">
                                        Unique Visitor
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!-- END: General Report -->
            </div>
        </div>
    </div>
@endsection
