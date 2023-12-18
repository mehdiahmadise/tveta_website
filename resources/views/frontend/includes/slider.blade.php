<!-- Heroslider Area -->
<div class="tm-heroslider-area">
  <div class="tm-heroslider-slider" style="background-image: url('{{ asset('image/images/wave.svg') }}'); background-repeat: no-repeat; background-size:cover">
      <!-- Heroslider Item -->
      @foreach ($sliders as $slider)      
      <div class="tm-heroslider mt-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-8 order-2 order-md-1">
                    <div class="tm-heroslider-contentwrapper">
                        <div class="tm-heroslider-content">
                            <h1>{{ $slider->sub_heading }}</h1>
                            <p>{{ $slider->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-4 order-1 order-md-2">
                    <div class="tm-heroslider-image">
                        <img src="{{ URL::asset($slider->image) }}" style="object-fit: cover" alt="heroslider image">
                    </div>
                </div>
            </div>
        </div>
    </div>
      @endforeach
      <!--// Heroslider Item -->
  </div>

  <div class="tm-heroslider-pagination">
      <svg viewBox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg">
          <circle class="radialbg" cx="16.9" cy="16.9" r="15.9"></circle>
          <circle class="radialactive" cx="16.9" cy="16.9" r="15.9" stroke-dasharray="33.333333333333336 100">
          </circle>
      </svg>
      <div class="slides-numbers">
          <span class="active">1</span>/<span class="total"></span>
      </div>
  </div>
</div>
<!--// Heroslider Area -->