<x-base.dialog id="form-password-modal" size="md">
    <x-base.dialog.panel>
        <x-base.dialog.title>
            <h2 id="admin-detail-name" class="mr-auto text-base font-medium">
                Form Admin            </h2>
        </x-base.dialog.title>
        <form action="" id="" method="POST" enctype="multipart/form-data" class="block">
            @csrf
            @method('POST')
            <x-base.dialog.description class="grid grid-cols-12 gap-4 gap-y-3">
                <div class="col-span-12" id="name-column">
                    <x-base.form-label>Password Baru</x-base.form-label>
                    <code class="ml-1 text-danger">*</code>
                    <x-base.form-input
                        id="admin-password"
                        type="text"
                        placeholder="Password Baru"
                        name="password"
                    required/>
                </div>
            </x-base.dialog.description>
            <x-base.dialog.footer>
                <x-base.button
                    class="mr-2"
                    data-tw-dismiss="modal"
                    variant="outline-secondary"
                    type="button"
                >
                    <x-base.lucide
                        class="w-4 h-4 mr-2"
                        icon="X"
                    />
                    Tutup
                </x-base.button>
                <x-base.button
                    class="mr-2"
                    variant="primary"
                    type="submit"
                >
                    <x-base.lucide
                        class="w-4 h-4 mr-2"
                        icon="Save"
                    />
                    Simpan
                </x-base.button>
            </x-base.dialog.footer>
        </form>
    </x-base.dialog.panel>
</x-base.dialog>
