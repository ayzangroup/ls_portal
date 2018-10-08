@extends('layouts.app')

@section('content')

<div class="common-inner-head">

        <div class="container">

            <h3>Terms & Conditions</h3>

        </div>

    </div>





<div class="common-padding-laundary terms-conditions-wrapper">

    <div class="container">

        <div class="terms-conditions">

            {!! $data->description !!}

        </div>

    </div>

</div>

@endsection