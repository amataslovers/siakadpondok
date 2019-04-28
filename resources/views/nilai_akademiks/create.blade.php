@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nilai Akademik
        </h1>
        <div class="row">
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">
                        <p><strong>Kelas : </strong> {{ $detail->kelas->tingkat->TINGKAT . ' ' . $detail->kelas->NAMA }}</p>
                        <p><strong>Mata Pelajaran : </strong> {{ $detail->mataPelajaran->NAMA }}</p>
                        <p><strong>KKM : </strong> {{ $detail->KKM }}</p>
                        <p><strong>Semester : </strong> {{ $semester->SEMESTER }}</p>
                        <p><strong>Tahun Ajaran : </strong> {{ $detail->tahunAjaran->NAMA }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'nilaiAkademiks.store']) !!}

                        @include('nilai_akademiks.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
