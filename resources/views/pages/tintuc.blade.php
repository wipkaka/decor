@extends('layouts.index')
@section('content')
<div class="col-sm-9">
    <div class="list-news">
        @foreach($tintuc as $tt)
            <div class="col-sm-12">
                <div class="panel">
                    <a href="tintuc/{{ $tt->tieude }}"> <img src="upload/tintuc/{{ $tt->hinh }}" alt="" width="400" height="300" srcset=""></a>
                    <div class="panel-body">
                        <a href="tintuc/{{ $tt->tieude }}">{{ $tt->tieude }}</a>
                        <p class="date">{{ $tt->updated_at }}</p>
                        <div class="sumary">{!! $tt->tomtat !!}</div>
                    </div>
                </div>
            </div>
        @endforeach    
    </div>
</div>
@endsection