<div id="header">
	<div class="header-top">
		<div class="container">
			<div class="pull-left auto-width-left">
				<ul class="top-menu menu-beta l-inline">
					<li><a href=""><i class="fa fa-home"></i>{{ $config->address }}</a></li>
					<li><a href=""><i class="fa fa-phone"></i>{{ $config->phone }}</a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .header-top -->
	<div id="logo">
		<div class="margin">
		<a href="#">
			<img src="{{ $config->logo }}" >
		</a>
		</div>
	</div>
	<div class="header-bottom" style="background-color: #A9D795; width: 100%; height: fit-content;border-radius: 10px;">
		<div class="container">
			<div class="visible-xs clearfix"></div>
			<nav class="main-menu" id="main-menu">
				<ul class="l-inline ov">
					<li><a href="">TRANG CHỦ</a></li>
					<li><a href="sanpham">DỊCH VỤ</a>
						<ul class="sub-menu">
							@foreach ($danhmuc as $dm)
							<li><a href="sanpham/{{ $dm->TenKhongDau }}">{{ $dm->name }}</a></li>
							@endforeach
						</ul>
					</li>
					<li><a href="gioithieu">GIỚI THIỆU</a></li>
					<li><a href="lienhe">LIÊN HỆ</a></li>
					<li><a href="chinhsach">CHÍNH SÁCH</a></li>
					<li><a href="tintuc">TIN TỨC</a></li>
					<li>
						<form role="search" method="post" id="searchform" action="search">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="text" value="" name="s" id="s" class="form-input" placeholder="Tìm sản phẩm" style="font-size: 14px"/>
							<button class="fa fa-search" type="submit" id="searchsubmit"></button>
					</form>
					</li>
					<li class="icon"><a href="javascript:void(0);" class="icon" onclick="myFunction()"> 
						<i class="fa fa-bars"></i>Menu
					  </a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</nav>
		</div> <!-- .container -->
	</div> <!-- .header-bottom -->
<div>


