@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Login</h3>
            </div>
            <div class="panel-body">
                <form action="/login" method="POST">
                    {{csrf_field()}}

                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="text" name="email" class="form-control" placeholder="Your email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Your password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                           <div class="checkbox">
                              <label>
                              <input type="checkbox" name="remember_me"> Remember me
                            </label>
                            </div
                        </div>
                    </div>
                    <a href="/forgot-password">forgot your password ?</a>
                    <div class="form-group">
                        <input type="submit" value="login" class="btn btn-success btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

