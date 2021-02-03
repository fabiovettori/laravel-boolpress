@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile Details</div>

                <div class="card-body">
                    <p> Name: {{ Auth::user()->name }} </p>
                    <p> Email: {{ Auth::user()->email }} </p>

                    @if (Auth::user()->api_token != null)
                        <p> Token: {{ Auth::user()->api_token }} </p>

                    @else
                        <form class="" action=" {{ route('admin.token') }} " method="post">
                            @csrf
                            <button type="submit" name="button" class="btn btn-info text-white px-5 text-uppercase">Token</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
