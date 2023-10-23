@extends('../layouts/' . $layout)

@section('head')
    <title>Login - Dashboard Agrio</title>
@endsection

@section('content')
    <div @class([
        'sm:-mx-8 p-3 sm:px-8 relative h-screen lg:overflow-hidden bg-primary xl:bg-white dark:bg-darkmode-800 xl:dark:bg-darkmode-600',
        'before:hidden before:xl:block before:content-[\'\'] before:w-[57%] before:-mt-[28%] before:-mb-[16%] before:-ml-[13%] before:absolute before:inset-y-0 before:left-0 before:transform before:rotate-[-4.5deg] before:bg-primary/20 before:rounded-[100%] before:dark:bg-darkmode-400',
        'after:hidden after:xl:block after:content-[\'\'] after:w-[57%] after:-mt-[20%] after:-mb-[13%] after:-ml-[13%] after:absolute after:inset-y-0 after:left-0 after:transform after:rotate-[-4.5deg] after:bg-primary after:rounded-[100%] after:dark:bg-darkmode-700',
    ])>
        <div class="container relative z-10 sm:px-10">
            <div class="block grid-cols-2 gap-4 xl:grid">
                <!-- BEGIN: Login Info -->
                <div class="flex-col hidden min-h-screen xl:flex">
                    <div class="my-auto">
                        <img
                            class="w-1/2 -mt-16 -intro-x"
                            src="{{ asset('assets/logo.png') }}"
                            alt="Agrio.id"
                        />
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="flex h-screen py-5 my-10 xl:my-0 xl:h-auto xl:py-0">
                    <div
                        class="w-full px-5 py-8 mx-auto my-auto bg-white rounded-md shadow-md dark:bg-darkmode-600 sm:w-3/4 sm:px-8 lg:w-2/4 xl:ml-20 xl:w-auto xl:bg-transparent xl:p-0 xl:shadow-none">
                        <h2 class="text-2xl font-bold text-center intro-x xl:text-left xl:text-3xl">
                            Sign In
                        </h2>
                        <form id="login-form">
                            @csrf
                            <div class="mt-8 intro-x">
                                <x-base.form-input
                                    name="email"
                                    class="intro-x login__input block min-w-full px-4 py-3 xl:min-w-[350px]"
                                    id="email"
                                    type="text"
                                    value="{{ old('email') }}"
                                    placeholder="Email"
                                />
                                <x-base.form-input
                                    name="password"
                                    class="login__input mt-4 block min-w-full px-4 py-3 xl:min-w-[350px]"
                                    id="password"
                                    type="password"
                                    value=""
                                    placeholder="Kata sandi"
                                />
                                <div
                                    class="mt-2 login__input-error text-danger"
                                    id="error-password"
                                ></div>
                            </form>
                            </div>
                            <div class="flex mt-4 text-xs intro-x text-slate-600 dark:text-slate-500 sm:text-sm">
                                <a href="" class="ml-auto">Lupa Kata Sandi?</a>
                            </div>
                            <div class="mt-5 text-center intro-x xl:mt-8 xl:text-right">
                                <x-base.button
                                    class="w-full px-4 py-3 align-top xl:mr-3 xl:w-32"
                                    id="btn-login"
                                    variant="primary"
                                    type="submit"
                                >
                                    Masuk
                                </x-base.button>
                            </div>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
    </div>
@endsection

@once
    @push('scripts')
        @vite('resources/js/pages/login/index.js')
    @endpush
@endonce

