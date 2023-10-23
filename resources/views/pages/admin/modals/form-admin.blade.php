<x-base.dialog id="form-admin-modal" size="md">
    <x-base.dialog.panel>
        <x-base.dialog.title>
            <h2 id="admin-detail-name" class="mr-auto text-base font-medium">
                Form Admin            </h2>
        </x-base.dialog.title>
        <form action="" id="form-admin" method="POST" enctype="multipart/form-data" class="block">
            @csrf
            @method('POST')
            <x-base.dialog.description class="grid grid-cols-12 gap-4 gap-y-3">
                <div class="col-span-12" id="name-column">
                    <x-base.form-label>Nama</x-base.form-label>
                    <code class="ml-1 text-danger">*</code>
                    <div>
                        <x-base.form-input
                            id="admin-name"
                            type="text"
                            placeholder="Nama Admin"
                            name="name"
                        />
                    </div>
                </div>
                <div class="col-span-12" id="name-column">
                    <x-base.form-label>Email</x-base.form-label>
                    <code class="ml-1 text-danger">*</code>
                    <div>
                        <x-base.form-input
                            id="admin-email"
                            type="text"
                            placeholder="Email"
                            name="email"
                        />
                    </div>
                </div>
                <div class="col-span-12" id="name-column">
                    <x-base.form-label>Password</x-base.form-label>
                    <code class="ml-1 text-danger">*</code>
                    <div>
                        <x-base.form-input
                            id="admin-password"
                            type="password"
                            placeholder="Password"
                            name="password"
                        />
                    </div>
                </div>
                <div class="col-span-12 md:col-span-6" id="name-column">
                    <x-base.form-label>Role Admin</x-base.form-label>
                    <code class="ml-1 text-danger">*</code>
                    <div>
                        <x-base.tom-select
                            id="roles"
                            name="roles"
                            class="w-full"
                            data-placeholder="Role"
                        >
                            <option value=""></option>
                            <option value="99">Super Admin</option>
                            <option value="98">Admin</option>

                        </x-base.tom-select>
                    </div>
                </div>

                <div class="col-span-12 md:col-span-6" id="name-column">
                    <x-base.form-label>Status</x-base.form-label>
                    <code class="ml-1 text-danger">*</code>
                    <div>
                        <x-base.tom-select
                            id="active"
                            name="active"
                            class="w-full"
                            data-placeholder="Status"
                        >
                            <option value=""></option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>

                        </x-base.tom-select>
                    </div>
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
