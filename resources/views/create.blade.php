@extends('layouts.app')
@section('title', "Beranda" )
@section('content')
    <div class="container">
        <h1 class="my-4 text-light">Add Data</h1>

        <form method="POST" action="{{ url('table') }}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label text-white">Nama</label>
                <input type="text" class="form-control" id="title" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label text-white">Kelas</label>
                <textarea class="form-control" id="content" rows="3" name="kelas" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>

        </form>


    </div>


    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js')}}" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

@endsection