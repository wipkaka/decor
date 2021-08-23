@extends('layouts.index')
@section('content')
<div class="col-sm-9">
    <div class="beta-products-list">
    <h4>{{ $name }}</h4>
    <div class="row">
        @foreach($sanpham as $sp)
        <div class="col-sm-4">
            <div class="single-item">
                <div class="single-item-header">
                    <a href="{{ route('chitiet',$sp->name) }}"><img src="upload/sp/{{ $sp->hinh }}" alt="" width="265" height="200"></a>
                </div>
                 <div class="single-item-body">
                    <p class="single-item-tilte">{{ $sp->name }}</p>
                    <div class="sing-item-content">{!! $sp->tomtat !!}</div>

                </div>
                <div class="single-item-caption">
                    <a href="{{ route('chitiet',$sp->name) }}">CHI TIẾT <i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>	
        </div>
        @endforeach
    </div>
    </div>  <!--pho bien-->
    <div class="space50">&nbsp;</div>
</div>
@endsection