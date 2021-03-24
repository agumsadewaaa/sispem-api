<table class="table table-responsive" id="ruangans-table">
    <thead>
        <tr>
          <th>#</th>
            <th>Nama Ruangan</th>
        <th>Kapasitas</th>
        <th>Penjaga</th>
        <th>Kontak Penjaga</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @php
        $no = 1
      @endphp
    @foreach($ruangans as $ruangan)
        <tr>
            <td>{{$no++}}</td>
            <td>{!! $ruangan->nama_ruangan !!}</td>
            <td>{!! $ruangan->kapasitas !!}</td>
            <td>{!! $ruangan->penjaga->nama_penjaga !!}</td>
            <td>{!! $ruangan->penjaga->nomor_handphone !!}</td>
            <td>
                {!! Form::open(['route' => ['ruangans.destroy', $ruangan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('ruangans.show', [$ruangan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('ruangans.edit', [$ruangan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
