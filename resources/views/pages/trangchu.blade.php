@extends('layouts.index')
@section('slide')
<div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php $i = 0; ?>
            @foreach($slide as $sl) 
                <li data-target="#myCarousel" data-slide-to="{{ $i }}" @if($i == 0)class="active"@endif></li>
                <?php $i++; ?>
             @endforeach
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <?php $i = 0; ?>  
          @foreach($slide as $sl) 
          <div class="item @if($i == 0)active @endif">
            <img src="upload/slide/{{ $sl->hinh }}" alt="Los Angeles" style="width:100%;">
          </div>
          <?php $i++; ?>
          @endforeach
        </div>
    
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
</div> <!--slide-->
@endsection
@section('content')
<div class="col-sm-9">
    <div class="beta-products-list">
    <h4>PHỔ BIẾN</h4>
    <div class="row">
        @foreach ($popsanpham as $psp)
            <div class="col-sm-4">
                <div class="single-item">
                    <div class="single-item-header">
                        <a href="{{ route('chitiet',$psp->name) }}"><img src="upload/sp/{{ $psp->hinh }}" alt="" width="265" height="200"></a>
                    </div>
                    <div class="single-item-body">
                        <p class="single-item-tilte">{{ $psp->name }}</p>
                        <div class="sing-item-content">{!! $psp->tomtat !!}</div>

                    </div>
                    <div class="single-item-caption">
                        <a href="{{ route('chitiet',$psp->name) }}">CHI TIẾT <i class="glyphicon glyphicon-chevron-right"></i></a>
                    </div>
                </div>	
            </div>
        @endforeach
    </div>
    </div>  <!--pho bien-->
    <div class="space50">&nbsp;</div>
    <div class="beta-products-list">
    <h4>MẪU MỚI</h4>
    <div class="row">
        @foreach ($newsanpham as $nsp)
        <div class="col-sm-4">
            <div class="single-item">
                <div class="single-item-header">
                    <a href="{{ route('chitiet',$nsp->name) }}"><img src="upload/sp/{{ $nsp->hinh }}" alt="" width="265" height="200"></a>
                </div>
                <div class="single-item-body">
                    <p class="single-item-tilte">{{ $nsp->name }}</p>
                    <div class="sing-item-content">{!! $nsp->tomtat !!}</div>

                </div>
                <div class="single-item-caption">
                    <a href="{{ route('chitiet',$nsp->name) }}">CHI TIẾT <i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>	
        </div>
        @endforeach
    </div>
    <div style="text-align: center">{{ $newsanpham->links('pagination::bootstrap-4') }}</div>
    </div>
</div>
@endsection