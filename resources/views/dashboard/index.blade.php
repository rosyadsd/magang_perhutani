@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Menu Dashboard</h1>
</div>

<div class="row">
  <div class="col-xl-3 col-md-6">
      <div class="card bg-primary text-white mb-4">
          <div class="card-body">Courses</div>
          <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="/dashboard/courses">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
          </div>
      </div>
  </div>
  <div class="col-xl-3 col-md-6">
      <div class="card bg-info text-white mb-4">
          <div class="card-body">Categories</div>
          <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="/dashboard/categories">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
          </div>
      </div>
  </div>
  <div class="col-xl-3 col-md-6">
      <div class="card bg-success text-white mb-4">
          <div class="card-body">Feedback</div>
          <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="/dashboard/feedbacks">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
          </div>
      </div>
  </div>
  @can('superadmin')
  <div class="col-xl-3 col-md-6">
    <div class="card bg-secondary text-white mb-4">
        <div class="card-body">Administrator</div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="/dashboard/users">View Details</a>
            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
    </div>
  </div>
  @endcan
</div>
@endsection