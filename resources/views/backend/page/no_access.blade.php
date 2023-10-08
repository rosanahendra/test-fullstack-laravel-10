@extends('backend.index_admin')

@section('header')
    @include('backend.component.header')
@endsection	

@section('menu')
    @include('backend.component.menu')
@endsection	

@section('footer')
    @include('backend.component.footer')
@endsection	

@section('content')
<header class="mb-3" style="position:fixed; z-index:50;">
    <a href="#" class="burger-btn d-block d-xl-none">
        <div style="border:1px solid #cccccc; padding:5px 10px 5px 10px; border-radius:5px; width:115px; background-color:#ffffff;">
            <center>
                <i class="fa-solid fa-bars fs-3" style="font-size:20px;"></i> <font style="font-size:20px; font-weight:bold; margin-left:5px;">Menu</font>
            </center>
        </div>
    </a>
</header>

<div class="page-content">
    <div class="row">
        <div class="col-lg-12 text-center" style="">
            <font class="fas fa-fw fa-close"></font> <font style="font-size:20px; font-weight:bold; margin-left:5px;">Maaf Anda tidak dapat mengakses menu ini</font>
        </div>
    </div>
</div>
@endsection	