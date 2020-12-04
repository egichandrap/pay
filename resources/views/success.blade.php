@extends('header')
@section('title', 'Success - PAYMENT')

<body>

  <!-- ======= Header ======= -->
  @extends('navbar')

<br><br><br>
<!-- ======= Services Section ======= -->
<section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h3>Success</h3>
          <p></p>
        </div>

        <form action="{{ url('/paymentOrder') }}" method="get" enctype="multipart/form-data">
          <table class="table table-bordered" style="border-color=#0000;">
          <input type="hidden" class="form-control" name="orderNo" value="{{$sr->orderNo}}">
            <tr>
                <th>Order no</th>
                <td>{{$sr->orderNo}}</td>
            </tr>
            <tr>
                <th>Total</th>
                <td>Rp {{$sr->topupBalance}}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>{{$sr->date}}</td>
            </tr>
          </table>

          <p>{{$pr->product}} that costs {{$pr->price}} will be shipped to:</p>
          <p>{{$pr->shipping}}</p>
          <p>Only after you pay.</p>
          <button class="form-control btn btn-primary" type="submit">Pay Now</button>
        </form>
    </section><!-- End Services Section -->

    @extends('footer')