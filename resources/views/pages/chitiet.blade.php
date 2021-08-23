@extends('layouts.index')
@section('content')
<div class="col-sm-9">
    <!--title-->
    <h1 style="margin:0">{{ $sanpham->name }}</h1> 
    <!--datetime-->
    <p class="date">{{ $sanpham->updated_at }}</p>
    <!--content-->
    <p class="content">
        {!! $sanpham->tomtat !!}
    </p> 
    <p class="content">
        {!! $sanpham->noidung !!}
    </p>    
    <div class="beta-products-list">
    <h4>SẢN PHẨM KHÁC</h4>
    <div class="row">
        @foreach ($resanpham as $rsp)
        <div class="col-sm-4">
            <div class="single-item">
                <div class="single-item-header">
                    <a href="{{ route('chitiet',$rsp->name) }}"><img src="upload/sp/{{ $rsp->hinh }}" alt="" width="265" height="200"></a>
                </div>
                 <div class="single-item-body">
                    <p class="single-item-tilte">{{ $rsp->name }}</p>
                    <p class="sing-item-content">{!! $rsp->tomtat !!}</p>

                </div>
                <div class="single-item-caption">
                    <a href="{{ route('chitiet',$rsp->name) }}">CHI TIẾT <i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>	
        </div>
        @endforeach
    </div>
</div>  <!--pho bien-->
    <div class="space50">&nbsp;</div>
</div>
@endsection