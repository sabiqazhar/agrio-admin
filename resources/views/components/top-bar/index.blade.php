<!-- BEGIN: Top Bar -->
<div class="relative z-[51] flex h-[67px] items-center border-b border-slate-200">
    <!-- BEGIN: Breadcrumb -->
    <x-base.breadcrumb class="hidden mr-auto -intro-x sm:flex">
        <x-base.breadcrumb.link :index="0">Application</x-base.breadcrumb.link>
        <x-base.breadcrumb.link
            :index="1"
            :active="true"
        >
            Dashboard
        </x-base.breadcrumb.link>
    </x-base.breadcrumb>
    <!-- END: Breadcrumb -->
    <!-- BEGIN: Account Menu -->
    <x-base.menu>
        <x-base.menu.button class="block w-8 h-8 overflow-hidden rounded-full shadow-lg image-fit zoom-in intro-x">
            <img
                src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                alt="{{ auth()->user()->name }}"
            />
        </x-base.menu.button>
        <x-base.menu.items class="w-56 mt-px text-white bg-primary">
            <x-base.menu.header class="font-normal">
                <div class="font-medium">{{ auth()->user()->name }}</div>
                <div class="mt-0.5 text-xs text-white/70 dark:text-slate-500">
                    {{ auth()->user()->roles == '99' ? 'Super Admin' : 'Admin'  }}
                </div>
            </x-base.menu.header>
            <x-base.menu.divider class="bg-white/[0.08]" />
            <x-base.menu.item class="hover:bg-white/5" href="{{ route('logout') }}">
                <x-base.lucide
                    class="w-4 h-4 mr-2"
                    icon="ToggleRight"
                /> Logout
            </x-base.menu.item>
        </x-base.menu.items>
    </x-base.menu>
    <!-- END: Account Menu -->
</div>
<!-- END: Top Bar -->

@once
    @push('scripts')
        @vite('resources/js/components/top-bar/index.js')
    @endpush
@endonce
