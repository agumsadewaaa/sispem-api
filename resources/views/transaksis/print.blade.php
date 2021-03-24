<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    @php
      $wr = $transaksi->wr ?: null;
      $kbsd = $transaksi->kbsd ?: null;
      $kbu = $transaksi->kbu ?: null;
      $ksbrt = $transaksi->ksbrt ?: null;
    @endphp
    <table width="100%">
    <tr>
    <td width="25" align="center"><img src="{{asset('images/unand.png')}}" width="60%"></td>
    <td width="50" align="center"><h1>LEMBARAN DISPOSISI</h1></td>
    </tr>
    </table>
    <hr>
    <br>
    <br>

    <table width="100%" style="border-collapse: collapse; border: 1px solid black">
    <tbody>
    <tr >
    <td width="308" style="border: 1px solid black">

        <p><strong>&nbsp;&nbsp;AGENDA TGL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </strong></p>

    </td>
    <td colspan="3" width="292" style="border: 1px solid black">
    <p><strong>&nbsp;&nbsp;No.</strong></p>
    </td>
    </tr>
    <tr>
    <td width="308" style="border: 1px solid black">
    <p><strong>&nbsp;&nbsp;SURAT TGL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{date("d-m-Y")}}</strong></p>
    </td>
    <td colspan="3" width="292" style="border: 1px solid black">
    <p><strong>&nbsp;&nbsp;No. </strong></p>
    </td>
    </tr>
    <tr>
    <td width="308" style="border: 1px solid black">
    <strong><center>
      DISPOSISI
    </center></strong>
    </td>
    <td width="122" style="border: 1px solid black">
    <p><center>
      <strong>DARI</strong>
    </center></p>
    </td>
    <td width="112" style="border: 1px solid black">
    <p><center>
      <strong>UNTUK</strong>
    </center></p>
    </td>
    <td width="58" style="border: 1px solid black">
    <p><center>
      <strong>PRF</strong>
    </center></p>
    </td>
    </tr>
    <tr>
    <td width="308" style="border: 1px solid black">
    <p>&nbsp;&nbsp;{{$wr ? $wr->pesan : null}}{{$kbsd ? $kbsd->pesan : null}}</p>
    </td>
    <td width="122" style="border: 1px solid black">
    <center>
      <p>{{$wr ? 'WR II' : 'KBUSD'}}</p>
    </center>

    </td>
    <td width="112" style="border: 1px solid black">
      <center>
        <p>KBUSD</p>
      </center>
    </td>
    <td width="58" style="border: 1px solid black">
    <center>
      <p><strong>
        @if ($wr)
          {{$wr->status == 1 ?'✔':'✘'}}
        @else
          {{$kbsd->status == 1 ?'✔':'✘'}}
        @endif
      </strong></p>
    </center>
    </td>
    </tr>
    <tr>
    <td width="308" style="border: 1px solid black">
    <p>&nbsp;&nbsp;{{$kbu ? $kbu->pesan : null}}</p>
    </td>
    <td width="122" style="border: 1px solid black">
      <center>
        <p>KBU</p>
      </center>
    </td>
    <td width="112" style="border: 1px solid black">
      <center>
        <p>KSB-RT</p>
      </center>

    </td>
    <td width="58" style="border: 1px solid black">
      <center>
        <p><strong>{{$kbu->status == 1 ?'✔':'✘'}}</strong></p>
      </center>
    </td>
    </tr>
    <tr>
    <td width="308" style="border: 1px solid black">
    <p>&nbsp;&nbsp;{{$ksbrt ? $ksbrt->pesan : null}}</p>
    </td>
    <td width="122" style="border: 1px solid black">
      <center>
        <p>KSB-RT</p>
      </center>

    </td>
    <td width="112" style="border: 1px solid black">
      <center>
        <p>Penjaga</p>
      </center>

    </td>
    <td width="58" style="border: 1px solid black">
    <center>
      <p><strong>{{$ksbrt->status == 1 ?'✔':'✘'}}</strong></p>
    </center>
    </td>
    </tr>
    <tr>
    <td width="308" style="border: 1px solid black">
    <p>&nbsp;</p>
    </td>
    <td width="122" style="border: 1px solid black">
    <p><strong>&nbsp;</strong></p>
    </td>
    <td width="112" style="border: 1px solid black">
    <p><strong>&nbsp;</strong></p>
    </td>
    <td width="58" style="border: 1px solid black">
    <p><strong>&nbsp;</strong></p>
    </td>
    </tr>
    </tbody>
    </table>
    <script type="text/javascript">

      setTimeout(()=>{
        window.print()
        close();
      }, 1000);
    </script>
  </body>
</html>
