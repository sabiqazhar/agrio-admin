<x-base.dialog id="form-store-modal" size="md">
    <x-base.dialog.panel>
        <x-base.dialog.title>
            <h2 id="category-detail-name" class="mr-auto text-base font-medium">
                Form Toko            </h2>
        </x-base.dialog.title>
        <form action="" id="form-store" method="POST" enctype="multipart/form-data" class="block">
            @csrf
            @method('POST')
            <x-base.dialog.description class="grid grid-cols-12 gap-4 gap-y-3">
                <div class="col-span-12" id="name-column">
                    <x-base.form-label>Nama Toko</x-base.form-label>
                    <code class="ml-1 text-danger">*</code>
                    <div>
                        <x-base.form-input
                            id="store-name"
                            type="text"
                            placeholder="Nama Toko"
                            name="name"
                        />
                    </div>
                </div>
                <div class="col-span-12" id="name-column">
                    <x-base.form-label>Nomor Telepon Toko</x-base.form-label>
                    <code class="ml-1 text-danger">*</code>
                    <div>
                        <x-base.form-input
                            id="store-phone"
                            type="text"
                            placeholder="Nomor Telepon"
                            name="phone"
                        />
                    </div>
                </div>
                <div class="col-span-12 md:col-span-6" id="name-column">
                    <x-base.form-label>Pemilik Toko</x-base.form-label>
                    <code class="ml-1 text-danger">*</code>
                    <div>
                        <x-base.tom-select
                            id="owner_id"
                            name="owner_id"
                            class="w-full"
                            data-placeholder="Pemilik"
                        >
                            <option value=""></option>
                            @foreach ($owner as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach

                        </x-base.tom-select>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-6" id="status-column">
                    <x-base.form-label>Status Toko</x-base.form-label>
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
                <div class="col-span-12 md:col-span-6" id="longtitude-column">
                    <x-base.form-label>Latitude</x-base.form-label>
                    <code class="ml-1 text-danger">*</code>
                    <div>
                    <x-base.form-input
                        id="store-latitude"
                        type="text"
                        placeholder="Latitude"
                        name="lat"
                    />
                    </div>
                </div>

                <div class="col-span-12 md:col-span-6" id="longtitude-column">
                    <x-base.form-label>Longitude</x-base.form-label>
                    <code class="ml-1 text-danger">*</code>
                    <div>
                    <x-base.form-input
                        id="store-longitude"
                        type="text"
                        placeholder="Longitude"
                        name="lon"
                    />
                    </div>
                </div>
                <div class="col-span-12" id="address-column">
                    <x-base.form-label>Alamat Toko</x-base.form-label>
                    <code class="ml-1 text-danger">*</code>
                    <div>
                        <x-base.form-textarea
                            id="store-address"
                            type="text"
                            placeholder="Alamat Toko"
                            name="address"
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
