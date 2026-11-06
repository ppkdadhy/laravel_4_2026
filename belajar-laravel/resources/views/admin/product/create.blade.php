@extends('admin.layouts.app')
@section('title', 'Tambah Produk');
@section('subtitle', 'Tambahkan produk baru untuk ditampilka di PPKD Sticker')

@section('content')
    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="">Nama Produk *</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="" class="form-label">Slug (optional)</label>
                    <input type="text" name="slug" class="form-control">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="" class="form-label">Kategori</label>
                    <select name="category_id" class="form-select">
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="">Deskripsi Singkat</label>
            <input type="text" name="brief_description" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Deskripsi</label>
            <textarea name="description" cols="30" rows="10" class="d-none"></textarea>
            <div id="editor">{!! old('description') !!}</div>
            {{-- ESCAPED --}}
            {{-- {{}}: ESCAPED --}}
            {{-- !! !! --}}
            {{-- Ini Budi
                 INi laras
            --}}
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="">Harga</label>
                    <input type="number" name="price" class="form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="">Harga Art Cartoon</label>
                    <input type="number" name="price_art_cartoon" class="form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="">Harga Art Paper</label>
                    <input type="number" name="price_art_paper" class="form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="">Harga Hvs</label>
                    <input type="number" name="price_hvs" class="form-control">
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="" class="form-label">Harga Laminating Doft</label>
                    <input type="number" name="price_doft" class="form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="" class="form-label">Harga Laminating Glossy</label>
                    <input type="number" name="price_glossy" class="form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="" class="form-label">Harga Potong (Min 5x5 cm)</label>
                    <input type="number" name="cutting_price" class="form-control">
                </div>
            </div>

        </div>
        <div class="mb-3">
            <label for="">Gambar</label>
            <input type="file" name="images[]" class="form-control">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn-custom btn-custom-primary">
                Simpan
            </button>
            <a href="{{ url()->previous() }}" class="btn-custom btn-custom-warning">Kembali</a>
        </div>
    </form>
@endsection
