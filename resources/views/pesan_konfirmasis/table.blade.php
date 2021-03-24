<table class="table table-responsive" id="pesanKonfirmasis-table">
    <thead>
        <tr>
            <th>Status</th>
        <th>Pesan</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pesanKonfirmasis as $pesanKonfirmasi)
        <tr>
            <td>{!! $pesanKonfirmasi->status !!}</td>
            <td>{!! $pesanKonfirmasi->pesan !!}</td>
            <td>
                {!! Form::open(['route' => ['pesanKonfirmasis.destroy', $pesanKonfirmasi->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pesanKonfirmasis.show', [$pesanKonfirmasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pesanKonfirmasis.edit', [$pesanKonfirmasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>