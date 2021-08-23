<div class="col-sm-3">
    <div class="widget">
        <div class="menu">
            <h4 class="head">DANH MỤC</h4>
            <ul class="ser-menu">
                @foreach($danhmuc as $dm)
                <li><span class="glyphicon glyphicon-chevron-right"></span> <a href="sanpham/{{ $dm->TenKhongDau }}">{{ $dm->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <h4 class="head">TIN TỨC</h4>
        <div class="widget-body">
            <div class="beta-sale beta-list">
                @foreach ($tintuc as $tt)
                <div class="media beta-sale-item">
                    <a class="pull-left" href="tintuc/{{ $tt->tieude }}"><img src="upload/tintuc/{{ $tt->hinh }}" alt="" style="width:112px; height:76px"></a>
                    <div class="media-body">
                        <a href="tintuc/{{ $tt->tieude }}">{{ $tt->tieude }}</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div id="more">
                <a href="tintuc">Xem thêm</a>
            </div>
        </div>
        <h4 class="head">FANPAGE</h4>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0" nonce="G1oVLto3"></script>
        <div class="fb-page" data-href="https://www.facebook.com/phukiensinhnhatvps" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/phukiensinhnhatvps" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/phukiensinhnhatvps">Phụ Kiện Sinh Nhật Valley Party Store</a></blockquote></div>
    </div>
</div>