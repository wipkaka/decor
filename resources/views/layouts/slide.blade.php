<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <?php $i = 0; ?>
    <ol class="carousel-indicators">
    @foreach ($slide as $sl)
      <li data-target="#myCarousel" data-slide-to="{{ $i }}" @if($i == 0)class='active'@endif></li>
      <?php $i++; ?>
    @endforeach  
    </ol>
 
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php $i = 0; ?>
        @foreach ($slide as $sl)
            <div class="item @if($i == 0) active @endif ">
                <img src="/upload/slide/{{ $sl->hinh }}"  style="width:100%;">
            </div>
            <?php $i ++; ?>
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