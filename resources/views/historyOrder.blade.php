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
            <h4>Order History</h4>
            <p></p>
          </div>
            <form action="" method="GET" enctype="multipart/form-data">
                <div class="form-group col-sm-3">
                    @if($errors->has('keyword')) <em class="text-danger form-control-feedback">{{
                        $errors->first('keyword') }}</em> @endif
                    <input type="search" name="keyword" id="keyword" placeholder="No Order" class="form-control" value="{{ app('request')->input('keyword') }}"></input>
                </div>
                <!-- <div class="form-group col-sm-3">
                    <button type="submit" class="form-control form-control-sm btn btn-primary btn-sm">Cari Data</button>
                </div> -->
                <?php
                  @$keyword = $_GET['keyword'];
                  if($keyword == ''){
                      $keyword = 0;
                  }
                  ?>
            </form>

        <table class="table table-bordered" id="myTable">
          <tbody>  
          @foreach($history as $a)
              <tr>
                <td>
                {{$a->orderNo}} &nbsp;&nbsp;
                Rp. {{$a->topupBalance}} <br> 
                @if($a->status==1)
                {{$a->product}} that cost {{$a->price}}
                @elseif($a->status==2)
                {{$a->value}} for {{$a->mobileNumber}}
                @elseif($a->status==0)
                {{$a->value}} for {{$a->mobileNumber}}
                @elseif($a->status==3)
                {{$a->product}} that cost {{$a->price}}
                @elseif($a->status==4)
                {{$a->value}} for {{$a->mobileNumber}}
                @endif
                </td>
                @if($a->status==1)
                <td><strong>{{$a->keterangan}}</strong></td>
                @elseif($a->status==2)
                <td><span class="label label-danger">Failed</span></td>
                @elseif($a->status==3)
                <td><span class="label label-danger">Cancel</span></td>
                @elseif($a->status==0)
                <form action="{{ url('/paymentOrder') }}">
                  <input type="hidden" class="form-control" name="orderNo" value="{{$a->orderNo}}">
                    <td><button class="btn btn-primary" type="submit">Pay Now</button></td>
                </form>
                @elseif($a->status==4)
                <td><span class="label label-success"><strong>{{$a->keterangan}}</strong></span></td>
                @endif
              </tr> 
          @endforeach
          </tbody>
        </table>
        {{ $history->links() }}
      </div>
    </section><!-- End Services Section -->
    @extends('footer')