<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="px-4 modal-header">
                <h6 id="modalTitle" class="modal-title">Tambah Mahasiswa</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <div class="px-4 modal-body text-start">
                <form wire:submit.prevent="store">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="mb-3 form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" id="name" class="form-control" wire:model="name"
                                    placeholder="Masukkan nama lengkap" autocomplete="true">
                                @error('name') <span class="text-sm text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-3 form-group">
                                <label for="nim">NIM</label>
                                <input type="text" id="nim" class="form-control" wire:model="nim"
                                    placeholder="Masukkan nim">
                                @error('nim') <span class="text-sm text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-3 form-group">
                                <label for="class_id">Kelas</label>
                                <select id="class_id" class="form-control" wire:model="class_id">
                                    <option value="">Pilih Kelas</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                                @error('class_id') <span class="text-sm text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3 form-group">
                                <label for="github">GitHub</label>
                                <input type="url" id="github" class="form-control" wire:model="github"
                                    placeholder="Masukkan link GitHub">
                                @error('github') <span class="text-sm text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3 form-group">
                                <label for="portfolio">Portfolio</label>
                                <input type="url" id="portfolio" class="form-control" wire:model="portfolio"
                                    placeholder="Masukkan link portfolio">
                                @error('portfolio') <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="access_key">Access Key</label>
                        <input type="password" id="access_key" class="form-control" wire:model="access_key"
                            placeholder="Masukkan access key">
                        @error('access_key') <span class="text-sm text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3 form-group">
                        <label for="description">Description</label>
                        <textarea id="description" class="form-control" wire:model="description"
                            placeholder="Masukkan deskripsi/peran diri secara singkat: max 100 karakter"></textarea>
                        @error('description')
                            <span class="text-sm text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="gap-2 mt-4 d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            wire:click="closeModal">Tutup</button>
                        <button type="submit" class="btn btn-dark">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>