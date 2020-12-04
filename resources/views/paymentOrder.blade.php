@extends('header')
@section('title', 'PAYMENT')


<body>

  <!-- ======= Header ======= -->
  @extends('navbar')

<br><br><br>
<!-- ======= Services Section ======= -->
<section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h4>Pay Your Order</h4>
          <p></p>
        </div>
        
        <form action="{{ url('paymentOrder/update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
        <input type="text" class="form-control"  name="orderNo" value="{{$prd->orderNo}}" readonly>
        </div> <br/>
        <button type="submit" class="form-control btn btn-primary">
        PAY NOW
        </button>
        </form>

      </div>
    </section><!-- End Services Section -->

    @extends('footer')