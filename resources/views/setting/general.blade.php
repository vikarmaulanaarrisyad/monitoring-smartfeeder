<form action="{{ route('setting.update', $setting->id) }}" method="post">
    @csrf
    @method('put')

    <x-card>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        id="email" value="{{ old('email') ?? $setting->email }}">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="phone">No. Telp</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                        id="phone" value="{{ old('phone') ?? $setting->phone }}">
                    @error('phone')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="owner_name">Nama Pemilik</label>
                    <input type="text" class="form-control @error('owner_name') is-invalid @enderror"
                        name="owner_name" id="owner_name" value="{{ old('owner_name') ?? $setting->owner_name }}">
                    @error('owner_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="company_name">Nama Aplikasi</label>
                    <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                        name="company_name" id="company_name"
                        value="{{ old('company_name') ?? $setting->company_name }}">
                    @error('company_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="short_description">Desripsi Singkat</label>
                    <input type="text" class="form-control @error('short_description') is-invalid @enderror"
                        name="short_description" id="short_description"
                        value="{{ old('short_description') ?? $setting->short_description }}">
                    @error('short_description')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="keyword">Keyword</label>
                    <input type="text" class="form-control @error('keyword') is-invalid @enderror" name="keyword"
                        id="keyword" value="{{ old('keyword') ?? $setting->keyword }}">
                    @error('keyword')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="about">Tentang Aplikasi</label>
            <textarea class="form-control summernote @error('about') is-invalid @enderror" name="about" id="about">{{ old('about') ?? $setting->about }}</textarea>
            @error('about')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>


        <x-slot name="footer">
            <button type="reset" class="btn btn-dark">Reset</button>
            <button class="btn btn-primary">Simpan</button>
        </x-slot>
    </x-card>
</form>
