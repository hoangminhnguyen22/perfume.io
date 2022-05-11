@extends('layouts.admin')

@section('main')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
            <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                    <h3>{{ $new_order }}</h3>
                    <p>New Orders</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('order.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                    <h3>{{ $total_product }}</h3>
                    <p>Products</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('product.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $total_account }}</h3>
                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('account.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $total_blog }}</h3>
                        <p>Blogs</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('blog.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">            
            <div class="col-lg-6">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                      <h3 class="card-title">Online Store Customer</h3>
                      <a href="javascript:void(0);">View Report</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex">
                      <p class="d-flex flex-column">
                        <span class="text-bold text-lg" id="total_accounts">{{ $total_account_this_year }}</span>
                        <span>Customer Over Time</span>
                      </p>
                      <p class="ml-auto d-flex flex-column text-right">
                        <select name="time" id="time" class="form-control">
                          @foreach ($years as $year)
                            @if ($year == $current_year) <option value="{{ $year }}" selected>{{ $year }}</option>
                            @else <option value="{{ $year }}">{{ $year }}</option>                   
                            @endif                            
                          @endforeach
                        </select>
                      </p>
                    </div>
                    <div class="position-relative mb-4">
                      <canvas id="customer-chart" height="200"></canvas>
                    </div>
                  </div>
                </div>
                <!-- /.card -->
    
                <div class="card">
                  <div class="card-header border-0">
                    <h3 class="card-title">Current products</h3>
                    <div class="card-tools">
                      <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-download"></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                      <thead>
                      <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>More</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($current_product_data as $product)
                      <tr>                        
                        <td>
                          <img src="{{URL::asset('uploads')}}/{{ $product->images }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                          {{ $product->name }}
                        </td>
                        <td>{{ number_format($product->price, 2, ',', ' ') }} VND</td>
                        <td>
                          {{ $product->quantity }}
                        </td>
                        <td>
                          <a href="#" class="text-muted">
                            <i class="fas fa-search"></i>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.card -->
            </div>
            <div class="col-lg-6">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                      <h3 class="card-title">Sales</h3>
                      <a href="javascript:void(0);">View Report</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex">
                      <p class="d-flex flex-column">
                        <span id="total_sale" class="text-bold text-lg"></span>
                        <span>Sales Over Time</span>
                      </p>
                      <p class="ml-auto d-flex flex-row text-right">
                        <input type="month" id="from" name="from" class="form-control" value="{{ $from }}">
                        <span style="
                                    display: block;
                                    width: 100%;
                                    height: calc(2.25rem + 2px);
                                    padding: 0.375rem 0.75rem;
                                    font-size: 1rem;
                                    font-weight: 400;
                                    line-height: 1.5;
                                    color: #495057;
                                    background-color: #fff;
                                    background-clip: padding-box;
                                "> To </span>
                        <input type="month" id="to" name="to" class="form-control" value="{{ $to }}">
                      </p>
                    </div>
                    <!-- /.d-flex -->
    
                    <div class="position-relative mb-4">
                      <canvas id="sales-chart" height="200"></canvas>
                    </div>
                  </div>
                </div>
                <!-- /.card -->
    
                <div class="card">
                  <div class="card-header border-0">
                    <h3 class="card-title">Online Store Overview</h3>
                    <div class="card-tools">
                      <a href="#" class="btn btn-sm btn-tool">
                        <i class="fas fa-download"></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <!-- /.d-flex -->
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                        <span class="d-flex">SALES RATE</span>
                        <p class="d-flex text-right" style="margin-bottom:0%">
                            <span class="font-weight-bold">{{ number_format($sale_rate, 2) }}%</span>                        
                        </p>
                    </div>
                    <!-- /.d-flex -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="d-flex">REGISTERTION RATE</span>
                        <p class="d-flex text-right" style="margin-bottom:0%">
                            <span class="font-weight-bold">{{ number_format($register_rate, 2) }}%</span>                        
                        </p>
                    </div>
                    <!-- /.d-flex -->
                  </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
  </section>

 
@stop

@section('js')
    <script src="{{URL::asset('ad123')}}/plugins/chart.js/Chart.min.js"></script>
    <script src="{{URL::asset('ad123')}}/dist/js/pages/dashboard3.js"></script>
@stop