@extends('themes.ehenho.layouts.app')

@section('content')
<div class="container account-dashboard-container" style="margin-top: 60px; margin-bottom: 50px;">
  <div class="row">
    <!-- Left Navigation Sidebar -->
    <aside class="col-md-3 col-sm-4">
      @include('themes.ehenho.components.account-sidebar')
    </aside>

    <!-- Main Content Panel -->
    <main class="col-md-9 col-sm-8">
      @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          {{ session('success') }}
        </div>
      @endif

      @if(session('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          {{ session('error') }}
        </div>
      @endif

      @yield('account_content')
    </main>
  </div>
</div>
@endsection
