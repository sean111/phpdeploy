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
            <pre class="{!! ( $history->status == 'fail' ) ? 'danger' : 'success' !!}">
                {{ $history->history }}
            </pre>
        </div>
    </div>
@endsection
