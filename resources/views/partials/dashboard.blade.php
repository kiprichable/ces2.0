<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@if(Auth::guest())
    @include('partials.user-dashboard')
@endif
@if(Auth::user())
    @include('partials.admin-dashboard')
@endif