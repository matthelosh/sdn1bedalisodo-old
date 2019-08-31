
<main role="main">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($datas as $item)
            @if($loop->index == "0")
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            @else
                <li data-target="#myCarousel" data-slide-to="{{$loop->index}}"></li>
      {{-- <li data-target="#myCarousel" data-slide-to="2"></li> --}}
            @endif
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach ($datas as $guru)
        @if ( $guru->id === 1)
            <div class="carousel-item active ">
        @else
            <div class="carousel-item">
        @endif

                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/>
                @if($guru->foto == "ada")
                    <image xlink:href="{{asset('img/guru/'.$guru->id.'b.jpg')}}" width="100%" y="-30%"/>
                @else
                    <image xlink:href="{{asset('img/guru/default-'.$loop->index++.'.jpg')}}" width="100%" y="-30%" />
                @endif
                </svg>
                <div class="container">
                    <div class="carousel-caption text-left">
                    <h1>{{$guru->nama_guru}}</h1>
                    <p>{{$guru->tempat_lahir}}, {{$guru->tanggal_lahir}}</p>
                    </div>
                </div>
            </div>

        @endforeach

    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
        @foreach ($datas as $guru)
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>{{$guru->nama_guru}}</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                @if($guru->foto == "ada")
                    <image xlink:href="{{asset('img/guru/'.$guru->nip.'.jpg')}}" width="100%" y="-50%"/>
                @else
                    @if($guru->jk == "l")
                        <image xlink:href="{{asset('img/guru/default-l.jpg')}}" width="100%" y="0"/>
                    @else
                        <image xlink:href="{{asset('img/guru/default-p.jpg')}}" width="100%" y="0"/>
                    @endif
                @endif
                </svg>
                <h2>{{$guru->nama_guru}}</h2>
                <p>NIP / ID: {{$guru->nip}}.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div>
        @endforeach

    </div><!-- /.row -->


  </div><!-- /.container -->
