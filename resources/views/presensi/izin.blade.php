@extends('layouts.presensi')
@section('header')

<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Data Izin / Sakit</div>
    <div class="right"></div>
</div>

@endsection

@section('content')
<div class="row" style="margin-top:70px">
    <div class="col">
        @php
            $messagesuccess = Session::get('success');
            $messageerror = Session::get('error');
        @endphp
        @if (Session::get('success'))
        <div class="alert alert-success">
            {{ $messagesuccess }}
        </div>
        @endif
        @if (Session::get('error'))
        <div class="alert alert-danger">
            {{ $messageerror }}
        </div>
        @endif
    </div>
</div>
<div class="row">
   <div class="col">
    <ul class="listview image-listview">
        @foreach ($dataizin as $d )
        <li>
            <div class="item">
                <div class="in">
                <div class="">
                    <b>{{ date("d-m-Y", strtotime($d->tgl_izin)) }} ({{ $d->status == "s" ? "Sakit" : "Izin" }})</b><br>
                    <small class="text-muted">{{ $d->keterangan }}</small>
                </div>
                @if ($d->status_approved == 0)
                <span class="badge badge-warning">Waiting</span>
                @elseif ($d->status_approval == 1)
                <span class="badge badge-success">Approved</span>
                @else
                <span class="badge badge-warning">Decline</span>
                @endif
                </div>
            </div>
        </li>
        @endforeach
    </ul>
   </div>
</div>

<div class="fab-button bottom-right" style="margin-bottom: 70px;">
<a href="/presensi/buatizin" class="fab">
    <ion-icon name="add-outline"></ion-icon>
</a>
</div>
@endsection

