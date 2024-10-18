@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">{{ __('Data User') }}</h5>
                <div class="card-body">
                    <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No.HP</th>
                                    <th>Email</th>
                                    <th>Akses</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->nohp }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->akses }}</td>
                                        <td>
                                            <a href="{{ route('user.edit', $item->id) }}">
                                                Edit
                                            </a>
                                            |
                                            <a href="{{ route('user.destroy', $item->id) }}" href="#" onclick="event.preventDefault(); document.getElementById('user-{{ $item->id }}').submit();">
                                                <form id="user-{{ $item->id }}" action="{{ route('user.destroy', $item->id) }}" style="hidden" method="POST" class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Data Tidak Ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
