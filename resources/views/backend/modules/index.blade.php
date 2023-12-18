@component('backend.includes.content', ['title' => 'پنل مدیریت'])
@slot('breadcrumb')
  <li class="breadcrumb-item active">پنل مدیریت</li>
@endslot

@section('page_title')
    پنل مدیریت 
@endsection
<div class="row">
  <!-- ./col -->
  <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box" style="background-color: #ff9900;">
          <div class="inner">
              <h3>1</h3>

              <p>تعداد اخبار</p>
          </div>
          <div class="icon">
              <i class="fa fa-users"></i>
          </div>

      </div>
  </div>
  <!-- ./col -->
  <!-- ./col -->
  <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box" style="background-color: #b30086; ">
          <div class="inner">
              <h3>0</h3>

              <p>تعداد محصلین</p>
          </div>
          <div class="icon">
              <i class="fas fa-store"></i>
          </div>

      </div>
  </div>
  <!-- ./col -->

  <!-- ./col -->
  <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box" style="background-color: #E4FF1A;">
          <div class="inner">
              <h3>0</h3>

              <p>تعداد مراکز تخنیکی</p>
          </div>
          <div class="icon">
              <i class="fa fa-sticky-note"></i>
          </div>

      </div>
  </div>
  <!-- ./col -->

  <!-- ./col -->
  <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box" style="background-color: #1BE7FF;">
          <div class="inner">
              <h3>3</h3>

              <p>تعداد ادمین ها</p>
          </div>
          <div class="icon">
              <i class="fa fa-user"></i>
          </div>

      </div>
  </div>
</div>
@endcomponent