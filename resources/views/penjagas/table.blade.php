<table class="table table-bordered table-striped" id="penjagas-table">
    <thead>
        <tr>
          <th>#</th>
            <th>Nama Penjaga</th>
        <th>Nomor Handphone</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @php
        $no = 1
      @endphp
    @foreach($penjagas as $penjaga)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{!! $penjaga->nama_penjaga !!}</td>
            <td>{!! $penjaga->nomor_handphone !!}</td>
            <td>
                {!! Form::open(['route' => ['penjagas.destroy', $penjaga->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('penjagas.show', [$penjaga->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('penjagas.edit', [$penjaga->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
