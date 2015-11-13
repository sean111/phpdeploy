@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            Date: {{ $history->created_at }}
        </div>
        <div class="col-lg-6">
            Status: <span class="history_status {!! ( $history->status == 'fail' ) ? 'danger' : 'success' !!}">{{ $history->status }}</span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!--<pre class="{!! ( $history->status == 'fail' ) ? 'danger' : 'success' !!}"> -->
            <pre class="ansi_color_bg_black ansi_color_fg_white ansi_box">
                {!! $output !!}
            </pre>
        </div>
    </div>
@endsection

@section( 'stylesheets' )
    <style media="screen">
        {{ $css }}
    </style>
@endsection
