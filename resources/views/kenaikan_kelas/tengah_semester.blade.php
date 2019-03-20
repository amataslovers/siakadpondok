@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Tengah Semester Kelas</h1>
        
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    <h1 class="pull-left">
                        <a class="btn btn-primary pull-left {{$hasil ? '' : 'disabled'}}" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('post-tengah-semester') !!}"
                                onclick="event.preventDefault(); document.getElementById('naik-uts-form').submit();">Naik Tengah Semester</a>
                            {{-- <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sign out
                            </a> --}}
                            <form id="naik-uts-form" action="{{ route('post-tengah-semester') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                <input type="hidden" name="action" value="1">
                            </form>
                    </h1>
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

