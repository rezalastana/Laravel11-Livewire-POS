<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <!-- wire:submit mengarah ke simpan yang ada di Action livewire -->
        <form class="modal-box" wire:submit="simpan">
            <h3 class="text-lg font-bold">Form input menu!</h3>
            <div class="space-y-2 py-4">
                <div class="flex flex-col items-center justify-center">
                    {{-- photo --}}
                    <label for="pickPhoto" class="avatar">
                        <div class="w-32 rounded-xl border-2">
                            <img class="cursor-pointer"
                                src="{{ $photo ? $photo->temporaryUrl() : url('no-image.png') }}">
                        </div>
                    </label>
                    <span class="text-xs font-light">*click photo to upload</span>
                    {{-- jika menggunakan wire:model maka harus ada attribute di Actions livewire / Livewire yang bersangkutan --}}
                </div>

                <input type="file" class="hidden" id="pickPhoto" wire:model='photo'>

                {{-- nama --}}
                <label class="form-control" for="">
                    <div class="label">
                        <span class="label-text">Nama menu</span>
                    </div>
                    {{-- wire model form.name diambil dari Actions livewire --}}
                    <input type="text" placeholder="Nama..." @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.name'),
                    ]) wire:model='form.name' />
                </label>
                {{-- harga --}}
                <label class="form-control" for="">
                    <div class="label">
                        <span class="label-text">Harga menu</span>
                    </div>
                    <input type="number" placeholder="Harga..." @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.price'),
                    ]) wire:model='form.price' />
                </label>
                {{-- tipe --}}
                <label class="form-control" for="">
                    <div class="label">
                        <span class="label-text">Tipe menu</span>
                    </div>
                    <select @class([
                        'select select-bordered',
                        'select-error' => $errors->first('form.type'),
                    ]) wire:model='form.type'>
                        <option value=""></option>
                        {{-- ambil data dari model menu dengan static $types, dipanggil dari livewire Actions --}}
                        @foreach ($types as $tipe)
                            <option value="{{ $tipe }}">{{ $tipe }}</option>
                        @endforeach
                    </select>
                </label>
                {{-- keterangan --}}
                <label class="form-control" for="">
                    <div class="label">
                        <span class="label-text">Keterangan menu</span>
                    </div>
                    <textarea placeholder="Keterangan..." @class([
                        'textarea textarea-bordered',
                        'textarea-error' => $errors->first('form.desc'),
                    ]) wire:model='form.desc'>
                    </textarea>
                </label>
            </div>
            <div class="modal-action justify-between">
                <button type="button" class="btn btn-ghost" wire:click="closeModal">Close!</button>
                <button class="btn btn-primary">
                    <x-tabler-check class="size-5" />
                    <span>Save!</span>
                </button>
            </div>
        </form>
    </div>
</div>
