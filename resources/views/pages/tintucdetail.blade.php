@extends('layouts.index')
@section('content')
<div class="col-sm-9">
    <!--title-->
    <h1 style="margin:0">{{ $tt->tieude }}</h1> 
    <!--datetime-->
    <p class="date">{{ $tt->updated_at }}</p>
    <!--content-->
    <!--image-->
    <p style="text-align: center;"><img src="upload/tintuc/{{ $tt->hinh }}" alt="" width="400" height="300" srcset=""></p>
    <div class="content">{!! $tt->noidung !!}
    </div>
    <div class="beta-products-list">
    <h4>TIN KHÁC</h4>
    <div class="row">
        @foreach($tinkhac as $tk)
        <div class="col-sm-4">
            <div class="single-item">
                <div class="single-item-header">
                    <a href="tintuc/{{ $tk->tieude }}"><img src="upload/tintuc/{{ $tk->hinh }}" alt="" width="265" height="200"></a>
                </div>
                 <div class="single-item-body">
                    <p class="single-item-tilte">{{ $tk->tieude }}</p>
                    <div class="sing-item-content">{!! $tk->tomtat !!}</div>

                </div>
                <div class="single-item-caption">
                    <a href="tintuc/{{ $tk->tieude }}">CHI TIẾT <i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>	
        </div>
        @endforeach
    </div>
</div>  <!--pho bien-->
    <div class="space50">&nbsp;</div>
</div>
@endsection