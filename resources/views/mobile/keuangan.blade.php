@extends('layouts.main')

@section('title')
  ASET | DASHBAORAD
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1 class="m-0 text-center">KEUANGAN</h1>
  </div>
  <!-- /.content-header -->
  <div class="container"><br>
    <div class="row">
            
    <div class="col">
     <a href="#" id="roe">
          <div class="info-box  bg-success">
            <span class="info-box-icon"><i class="fas fa-chart-bar"></i></span>

            <div class="info-box-content">
              <span class=""><h5>Return Of Equity</h5></span>
              <span class="info-box-number">
                    12,8
                    <small>%</small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center"> 5 / 5</h3></div>
          </div>
      </a>
      </div>

      <div class="col">
        <a href="#" id="rop">
        <div class="info-box  bg-danger">
            <span class="info-box-icon"><i class="fas fa-balance-scale"></i></span>

            <div class="info-box-content">
              <span class=""><h5>Ratio Operasional</h5></span>
              <span class="info-box-number">
                    0,76
                    <small>%</small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center"> 3 / 5</h3></div>
          </div>
        </a>

      </div>
      <div class="col">
        <a href="#" id="rok">
          <div class="info-box  bg-success">
              <span class="info-box-icon"><i class="fas fa-chart-pie"></i></span>

              <div class="info-box-content">
                <span class=""><h5>Ratio Kas</h5></span>
                <span class="info-box-number">
                      328,39
                      <small>%</small>
                </span>
              </div>
              <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center"> 5 / 5</h3></div>
            </div>
          </a>
        </div>
      <div class="col">
        <a href="#" id="ep">
        <div class="info-box  bg-warning">
              <span class="info-box-icon"><i class="fas fa-hand-holding-usd"></i></span>

              <div class="info-box-content">
                <span class=""><h5>Efektifitas Penagihan</h5></span>
                <span class="info-box-number">
                      86,74
                      <small>%</small>
                </span>
              </div>
              <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center"> 4 / 5</h3></div>
          </div>
      </a>
    </div>
      <div class="col">
        <a href="#" id="solv">
        <div class="info-box  bg-success">
              <span class="info-box-icon"><i class="fas fa-handshake"></i></span>
            

              <div class="info-box-content">
                <span class=""><h5>Solvabilitas</h5></span>
                <span class="info-box-number">
                      86,74
                      <small>%</small>
                </span>
              </div>
              <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center"> 5 / 5</h3></div>
          </div>

          
        </a>
      </div>
      
    </div>
  </div>
</div>
@endsection
