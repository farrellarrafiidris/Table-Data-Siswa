@extends('layouts.app')
@section('title',"Beranda")
@section('content')
    <div class="container">
      <a href="{{ url('table/create') }}" class="btn btn-warning">
      ADD
      </a>
      <table class="table table-dark table-striped">
          {{-- Table_Head --}}
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Kelas</th>
            </tr>
          </thead>
          {{-- Table_Body --}}
          @php($number = 1)
          @foreach($data as $content)
          <tbody>
            <tr>
              <th scope="row">{{ $number }}</th>
              <td >{{ $content-> nama }}</td>
              <td >{{ $content-> kelas }}</td>
              <td style="width:5%"><a href="{{ url("table/$content->id/edit") }}" class="btn btn-primary text">Edit</a></td>
              <td style="width:5%">
                <form action="{{ url("$content->id/destroy") }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
            <tr>
            </tr>
          </tbody>
          @php($number++)
          @endforeach
      </table>
    </div>
@endsection

