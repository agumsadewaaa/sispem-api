<table class="table table-responsive" id="peminjams-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Nama Organisasi</th>
        <th>Jabatan</th>
        <th>Kontak</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($peminjams as $peminjam)
        <tr>
            <td>{!! $peminjam->user_id !!}</td>
            <td>{!! $peminjam->nama_organisasi !!}</td>
            <td>{!! $peminjam->jabatan !!}</td>
            <td>{!! $peminjam->kontak !!}</td>
            <td>
                {!! Form::open(['route' => ['peminjams.destroy', $peminjam->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('peminjams.show', [$peminjam->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('peminjams.edit', [$peminjam->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>