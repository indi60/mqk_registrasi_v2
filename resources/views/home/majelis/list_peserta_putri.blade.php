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

            <th>Nilai Hakim I</th>
            <th>Nilai Hakim II</th>
            <th>Nilai Hakim III</th>
            <th>Nilai Total</th>

            @if($list_peserta[0]->majelis->bidang_lomba_id == 13 || $list_peserta[0]->majelis->bidang_lomba_id == 12)
            <th>Jumlah Menang</th>
            @endif

            
            @if($list_peserta[0]->majelis->babak->nama_babak == 'Penyisihan')
            <th style="min-width:100px">Aksi</th>
            @endif

            @if($list_peserta[0]->majelis->babak->nama_babak == 'Final')
            <th style="min-width:100px">Juara</th>
            @endif
        </tr>
        </thead>
        <tbody>

          <?php
          $no=1;
          foreach ($list_peserta as $row): ?>
            @if($row->peserta->jenis_kelamin == 'wanita')
            <tr>
              <td>{{$no++}}</td>
              <td>{{$row->no_peserta}}</td>
              <td style="text-align: center;">

                <a href="#" class="testEdit" data-type="text" data-column="no_urut"  data-url="{{url('operator_registrasi/no_urut_update/'.$row->id_majelis_peserta)}}" data-pk="{{$row->id_majelis_peserta}}" data-title="Ubah No Urut" data-name="no_urut">{{$row->no_urut}}</a>

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
               {{$row->nilai[0]}}
             </td>
             <td style="text-align: center;">
               {{$row->nilai[1]}}
             </td>
             <td style="text-align: center;">
               {{$row->nilai[2]}}
             </td>
             <td style="text-align: center;">
               {{ $row->nilai_total }}
             </td>
             @if($list_peserta[0]->majelis->bidang_lomba_id == 13 || $list_peserta[0]->majelis->bidang_lomba_id == 12)
             <td style="text-align: center;">
               {{$row->jumlah_menang}}
             </td>
             @endif

              @if($list_peserta[0]->majelis->babak->nama_babak == 'Penyisihan')
              <td> 
              @if(!$row->masuk_final)  
              <a class="btn btn-xs btn-info" href="{{ URL::to('operator_registrasi/masuk_final/'.$row->no_peserta.'/'.$row->majelis_id) }}"><i class="fa fa-plus fa-fw"></i> Masuk Babak Final</a> 
              @else
              <span class="btn btn-xs btn-success" href="{{ URL::to('operator_registrasi/masuk_final/'.$row->no_peserta.'/'.$row->majelis_id) }}"><i class="fa fa-check fa-fw"></i> Sudah Masuk Final</span> 
              @endif
              </td>
              @endif

              @if($list_peserta[0]->majelis->babak->nama_babak == 'Final')
              <td style="text-align: center;">

                <a href="#" class="testEdit" data-type="text" data-column="juara"  data-url="{{url('operator_registrasi/no_urut_update/'.$row->id_majelis_peserta)}}" data-pk="{{$row->id_majelis_peserta}}" data-title="Ubah Juara" data-name="juara">{{$row->juara}}</a>

              </td>
              @endif
            </tr>
            @endif
          <?php endforeach; ?>

        </tbody>

        </table>