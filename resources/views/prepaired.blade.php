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
          <h4>Prepaired Balance</h4>
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
        
        <form action="{{ url('prepaired/topup') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
        <input type="text" class="form-control @error('mobileNumber') is-invalid @enderror" placeholder="Mobile Number" name="mobileNumber">
        @error('mobileNumber')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div> &nbsp;
        <div>
        <select type="text" class="form-control @error('value') is-invalid @enderror" placeholder="Value" name="value">
        <option value=""></option>
        <option value="10000">10000</option>
        <option value="50000">50000</option>
        <option value="100000">100000</option>
        </select>
        @error('value')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
       <br>
        <button class="form-control btn btn-primary" type="submit">
        SUBMIT
        </button>
        </form>
        
      </div>
    </section><!-- End Services Section -->

    @extends('footer')