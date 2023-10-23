<x-base.dialog id="form-owner-modal" size="md">
    <x-base.dialog.panel>
        <x-base.dialog.title>
            <h2 id="owner-detail-name" class="mr-auto text-base font-medium">
                Form Pemilik Toko           </h2>
        </x-base.dialog.title>
        <form action="" id="form-owner" method="POST" enctype="multipart/form-data" class="block">
            @csrf
            @method('POST')
            <x-base.dialog.description class="grid grid-cols-12 gap-4 gap-y-3">
                <div class="col-span-12" id="name-column">
                    <x-base.form-label>Nama</x-base.form-label>
                    <code class="ml-1 text-danger">*</code>
                    <div>
                        <x-base.form-input
                            id="owner-name"
                            type="text"
                            placeholder="Nama Pemilik"
                            name="name"
                        />
                    </div>
                </div>
                <div class="col-span-12" id="email-column">
                    <x-base.form-label>Email</x-base.form-label>
                    <code class="ml-1 text-danger">*</code>
                    <div>
                        <x-base.form-input
                            id="owner-email"
                            type="text"
                            placeholder="Email"
                            name="email"
                        />
                    </div>
                </div>
                <div class="col-span-12" id="phone-column">
                    <x-base.form-label>Nomor Telepon</x-base.form-label>
                    <code class="ml-1 text-danger">*</code>
                    <div>
                        <x-base.form-input
                            id="owner-phone"
                            type="text"
                            placeholder="Nomor Telepon"
                            name="phone"
                        />
                    </div>
                </div>
                <div class="col-span-12" id="ktp-column">
                    <x-base.form-label>Nomor Induk Kependudukan</x-base.form-label>
                    <code class="ml-1 text-danger">*</code>
                    <div>
                        <x-base.form-input
                            id="owner-ktp"
                            type="text"
                            placeholder="NIK"
                            name="ktp"
                        />
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
