   <style>
     #search{
       margin-bottom: 200px;
     }
     .carousel.slide{
       margin: 0 auto;
       padding: 0 auto;
       margin-bottom: 30px;
     }
     .input-search{
       height: 50px;
     }
   </style>
  <div class="col-md-12 md-3" >
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://imageeu.melvita.com/on/demandware.static/-/Library-Sites-MEL_SharedLibrary/default/dw7acdfd45/Modules/M02-Slider/M02_HP_Or_Bio_slider1_mobile.jpg" class="d-block w-100" height="560px" alt="...">
          <div class="carousel-caption">
            <form action="{{ route('products.search') }}" class="d-flex mr-3" id="search">
              <input type="text" name="q" class="form-control input-search m-1" value="{{ request()->q ?? '' }}"  placeholder="Search" >
              <button type="submit" class="btn btn-success m-1"><i class="fa fa-search " aria-hidden="true"></i></button>
            </form>
          </div>
        </div>
        <div class="carousel-item">
          <img src="https://imageeu.melvita.com/on/demandware.static/-/Library-Sites-MEL_SharedLibrary/default/dw313ca6dc/Modules/M02-Slider/M02_HP_Or_Bio_Slider2_M.jpg" class="d-block w-100" height="560px" alt="...">
          <div class="carousel-caption">
            <form action="{{ route('products.search') }}" class="d-flex mr-3" id="search">
              <input type="text" name="q" class="form-control input-search m-1" value="{{ request()->q ?? '' }}"  placeholder="Search" >
              <button type="submit" class="btn btn-success m-1"><i class="fa fa-search " aria-hidden="true"></i></button>
            </form>
          </div>
        </div>
        <div class="carousel-item">
          <img src="https://imageeu.melvita.com/on/demandware.static/-/Library-Sites-MEL_SharedLibrary/default/dwa8799b05/Modules/M02-Slider/M02_HP_Or_Bio_slider3_mobile_v2.jpg" class="d-block w-100" height="560px" alt="...">
          <div class="carousel-caption">
            <form action="{{ route('products.search') }}" class="d-flex mr-3" id="search">
              <input type="text" name="q" class="form-control input-search m-1" value="{{ request()->q ?? '' }}"  placeholder="Search" >
              <button type="submit" class="btn btn-success m-1"><i class="fa fa-search " aria-hidden="true"></i></button>
            </form>
          </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
   </div>
