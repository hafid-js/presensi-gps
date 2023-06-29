
@if ($histori->isEmpty())
<div class="alert alert-outline-warning">
    <p>Data Belum Ada</p>
</div>

@endif
<ul class="listview image-listview">
    @foreach ($histori as $d )
    <li>
        <div class="item">
            @php
                $path = Storage::url('uploads/absensi/'.$d->foto_in);
            @endphp
            <img src="{{ url($path) }}" alt="image" class="image">
            <div class="in">
            <div class="">
                <b>{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</b><br>
            </div>
                <span class="badge {{ $d->jam_in < "07:00" ? "bg-success" : "bg-danger" }}">{{ $d->jam_in }}</span>
                @if (empty($d->jam_out))
                <span class="badge bg-warning">Belum Absen</span>
                @else
                <span class="badge bg-primary">{{ $d->jam_out }}</span>
                @endif
            </div>
        </div>
    </li>
    @endforeach
</ul>

