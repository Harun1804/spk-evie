@yield('kriteria')
<div class="card">
    <div class="card-header">
        <h5>Tabel Kriteria</h5>
        <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><a href="{{route('datadasar.form_kriteria')}}"><i class="icofont icofont-plus"></i></a></li>    </ul></div>
    </div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Kriteria</th>
                        <th>Atribut</th>
                        <th>Bobot</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kriteria as $i => $k)
                    <tr>
                        <th>{{$i + 1}}</th>
                        <td>{{$k->nama_kriteria}}</td>
                        <td>{{$k->atribut}}/td>
                        <td>{{$k->bobot}}</td>
                        <td><a href="{{route('datadasar.form_alternatif')}}">Edit</a>  |  <a href="{{route('datadasar.form_alternatif')}}">Hapus</a></td>
                    </tr>
                    @empty
                    <tr>
                        <td>Data Tidak Ada</td>
                    </tr>
                 @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>