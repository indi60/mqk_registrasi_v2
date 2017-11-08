<table class="table table-striped table-bordered table-hover dataTables-peserta" >
        <thead>
        <tr>
            <th>No</th>
            <th>No Peserta</th>
            <th>No Urut</th>
            <th>Kafilah</th>
            <th>Jenis Kelamin</th>
            @if($list_peserta[0]->jenis_lomba=='individu')
            <th>Nama Lengkap</th>
            <th>Asal Pesantren</th>
            
            @endif

            
            <th>Nilai Total</th>

            @if($list_peserta[0]->majelis->bidang_lomba_id == 13 || $list_peserta[0]->majelis->bidang_lomba_id == 12)
            <th>Jumlah Menang</th>
            @endif
        </tr>
        </thead>
        <tbody>

          <?php
          $no=1;
          foreach ($list_peserta as $row): ?>
            @if($row->peserta->jenis_kelamin == 'pria')
            <tr>
              <td>{{$no++}}</td>
              <td>{{$row->no_peserta}}</td>
              <td style="text-align: center;">

                {{$row->no_urut}}

              </td>
              <td>{{$row->peserta->kafilah->nama_kafilah}}</td>
              <td>

              @if($row->peserta->jenis_kelamin == 'pria')
              Putra
              @else
              Putri
              @endif
              </td>
              @if($row->jenis_lomba=='individu')
              <td>
                {{$row->peserta->nama_lengkap}}
              </td>
              <td>
                {{$row->peserta->nama_pesantren}}
              </td>
             @endif
             
             <td style="text-align: center;">
               {{ $row->nilai_total }}
             </td>
             @if($list_peserta[0]->majelis->bidang_lomba_id == 13 || $list_peserta[0]->majelis->bidang_lomba_id == 12)
             <td style="text-align: center;">
               {{$row->jumlah_menang}}
             </td>
             @endif
            </tr>
            @endif
          <?php endforeach; ?>

        </tbody>

        </table>