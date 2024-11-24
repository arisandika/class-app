<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="px-4 modal-header">
                <h6 id="modalTitle-2" class="modal-title">
                    Edit Mahasiswa
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="resetForm"></button>
            </div>
            <div wire:loading>
                <div class="my-5 text-center">
                    <span class="">Loading...</span>
                </div>
            </div>
            <div wire:loading.remove>
                <div class="px-4 modal-body text-start">
                    <form wire:submit.prevent="update">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="mb-3 form-group">
                                    <label for="name-2">Nama Lengkap</label>
                                    <input type="text" id="name-2" class="form-control" wire:model="name"
                                        placeholder="Masukkan nama lengkap" autocomplete="true">
                                    @error('name') <span class="text-sm text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mb-3 form-group">
                                    <label for="nim-2">NIM</label>
                                    <input type="text" id="nim-2" class="form-control" wire:model="nim"
                                        placeholder="Masukkan NIM">
                                    @error('nim') <span class="text-sm text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mb-3 form-group">
                                    <label for="class_id-2">Kelas</label>
                                    <select id="class_id-2" class="form-control" wire:model="class_id">
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
                                    <label for="github-2">GitHub</label>
                                    <input type="url" id="github-2" class="form-control" wire:model="github"
                                        placeholder="Masukkan link GitHub">
                                    @error('github') <span class="text-sm text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3 form-group">
                                    <label for="portfolio-2">Portfolio</label>
                                    <input type="url" id="portfolio-2" class="form-control" wire:model="portfolio"
                                        placeholder="Masukkan link portfolio">
                                    @error('portfolio') <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 form-group">
                            <label for="access_key-2">Access Key</label>
                            <input type="password" id="access_key-2" class="form-control" wire:model="access_key"
                                placeholder="Masukkan access key">
                            @error('access_key') <span class="text-sm text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3 form-group">
                            <label for="description-2">Deskripsi</label>
                            <textarea id="description-2" class="form-control" wire:model="description"
                                placeholder="Masukkan deskripsi atau peran diri: max 100 karakter"></textarea>
                            @error('description') <span class="text-sm text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="gap-2 mt-4 d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                wire:click="resetForm">Tutup</button>
                            <button type="submit" class="btn btn-dark">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>