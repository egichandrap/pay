@extends('header')
@section('title', 'Product - PAYMENT')


<body>

  <!-- ======= Header ======= -->
  @extends('navbar')

<br><br><br>
<!-- ======= Services Section ======= -->
<section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h3>Product Page</h3>
          <p></p>
        </div>
        
        <!-- @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->

        <form action="{{ url('product/order') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
        <input type="hidden" class="form-control" name="value" value="{{$product->value}}">
        <input type="hidden" class="form-control" name="topup_id" value="{{$product->id}}">
        </div> &nbsp;
        <div>
        <textarea class="form-control @error('product') is-invalid @enderror" rows="4" cols="50" name="product" placeholder="product"></textarea>
        @error('product')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div> &nbsp;
        <div>
        <textarea class="form-control @error('shipping') is-invalid @enderror" rows="4" cols="50" name="shipping" placeholder="shipping address"></textarea>
        @error('shipping')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div> <br/>
        <input class="form-control @error('price') is-invalid @enderror" type="number" min="0" name="price" placeholder="price">
        @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div> <br/>
        <button type="submit" class="form-control btn btn-primary">
        SUBMIT
        </button>
        </div>
        </form>
        
      </div>
    </section><!-- End Services Section -->

    @extends('footer')