<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <p class="tle">Valley Party Store - YOUR PARTY YOUR WAY</p>
                <span class="ctent">Là đơn vị sản xuất và kinh doanh các mặt hàng phụ kiện sinh nhật, phụ kiện trang trí thôi nôi, tiệc wedding. Các sản phẩm luôn bắt kịp xu hướng hiện đại, thân thiện và giá thành cạnh tranh nhất. Luôn tự hào là đơn vị trang trí sinh nhật uy tín tại các tỉnh thành Bình Dương, Hồ Chí Minh, Đồng Nai, Vũng Tàu... Với các mẫu trang trí bàn Gallery, Background, Chalkboard, cây Welcome...</span>
                <p style="font-weight: bold; margin-top: 10px;">Email:<span>{{ $config->email  }}</span></p>
            </div>
            <div class="col-sm-4">
                <div class="col-sm-10">
                    <p class="tle"> HỆ THỐNG CỦA HÀNG</p>
                    <?php $i = 1; ?>
                    @foreach($store as $str)
                    <div class="contact-infor">
                        <p class="ctent"><i class="fa fa-map-marker"></i><span style="font-weight: bold;">CỬA HÀNG {{ $i }}:</span><a href="{{ $str->ggmap }}" class="add">{{ $str->address }}</a></p>
                        <p><span style="font-weight: bold;">Hotline:</span
                            > {{ $str->phone }}</p>
                    </div>
                    <?php $i ++; ?>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-4">
                <div class="widget">
                    <p class="tle"> FEEDBACK</p>
                    <form id="feedback">
                        <i class="glyphicon glyphicon-user"><span style="font-family: sans-serif;"> Họ và tên</span></i>
                        <input type="name" name="name" id="name" class="input" required>
                        <i class="glyphicon glyphicon-earphone"><span style="font-family: sans-serif;"> Số điện thoại</span></i>
                        <input type="phone" id="phone" name="phone" class="input" required pattern="([0])([3,5,7,8,9])([0-9]{8})\b" title="Số điện thoại không hợp lệ.">
                        <i class="glyphicon glyphicon-comment"><span style="font-family: sans-serif;"> Nội Dung</span></i>
                        <textarea type="text" name="content" id="content" class="input" style="height: 100px;" required></textarea>
                        <button class="pull-right" type="submit" id="send" style=" background: black;border-radius: 5px;border: 2px solid black;color: #a9d795; font-weight: bold;"> Gửi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>