@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Playlists</div>
                    <div class="card-body">
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($playlists as $playlist)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $playlist->name }}</td>

                                        <td>
                                            <form action="{{ url('playlists/' . $playlist->id . "/" . $song_id) }}" method="get">
                                                @csrf
                                            <input type="submit" value="add to playlist" class="btn btn-success btn-sm"></br>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection