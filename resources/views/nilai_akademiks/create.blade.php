@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nilai Akademik
        </h1>
        <p>Kelas : {{ $detail->kelas->NAMA }}</p>
        <p>Mata Pelajaran : {{ $detail->mataPelajaran->NAMA }}</p>
        <p>KKM : {{ $detail->KKM }}</p>
        <p>Semester : {{ $semester->SEMESTER }}</p>
        <p>Tahun Ajaran : {{ $detail->tahunAjaran->NAMA }}</p>
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
