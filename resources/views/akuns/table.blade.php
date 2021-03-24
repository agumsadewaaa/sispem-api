<table class="table table-bordered table-striped" id="akuns-table">

    <thead>
        <tr>
        <th>#</th>
        <th>NIP/NIM</th>
        <th>Nama</th>
        <th>Role</th>
        <th>Status</th>
        <th></th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @php
        $no = 1;
        $status = ["Tidak Aktif", "Aktif"];
      @endphp
    @foreach($akuns as $akun)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $akun->nip_nim !!}</td>
            <td>{!! $akun->name !!}</td>
            <td>{!! $akun->role->role !!}</td>
            {!! Form::open(['route' => ['changeStatus', $akun->id], 'method' => 'post']) !!}
            <td>
              {!! Form::select('status', $status, $akun->status, ['class'=>'form-control', 'disabled' => $akun->id == Auth::user()->id ? true : false] ) !!}
            </td>
            <td>{!! $akun->id != Auth::user()->id ? Form::button('Simpan', ['type' => 'submit', 'class' => 'btn btn-warning', 'onclick' => "return confirm('Are you sure?')"]) : ""!!}</td>
            {!! Form::close() !!}
            <td>
                {!! Form::open(['route' => ['akuns.destroy', $akun->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('akuns.edit', [$akun->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    @if (!($akun->id == Auth::user()->id))
                      {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endif

                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
