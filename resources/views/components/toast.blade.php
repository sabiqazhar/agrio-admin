@if(session('success-message'))
    <!-- BEGIN: Notification Content -->
    <div id="success-notification-content" class="flex hidden py-5 pl-5 bg-white border rounded-lg shadow-xl pr-14 border-slate-200/60 dark:bg-darkmode-600 dark:text-slate-300 dark:border-darkmode-600">
        <i data-lucide="check-circle" width="24" height="24" class="stroke-1.5 text-success text-success"></i>


        <div class="ml-4 mr-4">
            <div class="font-medium">Yeay!</div>
            <div class="mt-1 text-slate-500">
                {!! session('success-message') !!}
            </div>
        </div>
    </div>
    <!-- END: Notification Content -->
@elseif(session('error-message'))
    <!-- BEGIN: Notification Content -->
    <div id="failed-notification-content" class="flex hidden py-5 pl-5 bg-white border rounded-lg shadow-xl pr-14 border-slate-200/60 dark:bg-darkmode-600 dark:text-slate-300 dark:border-darkmode-600">
        <i data-lucide="x-circle" width="24" height="24" class="stroke-1.5 text-danger"></i>
        <div class="ml-4 mr-4">
            <div class="font-medium">Oops!</div>
            <div class="mt-1 text-slate-500">
                {!! session('error-message') !!}
            </div>
        </div>
    </div>
    <!-- END: Notification Content -->
@endif
