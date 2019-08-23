@extends('frontend.frmapp')
@section('main-content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <p>BUSCAR CORRESPONDENCIA</p>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 separator social-login-box"> <br />
                            <a href="http://www.jquery2dotnet.com" class="btn facebook btn-block" role="button">Log in using Facebook</a>
                            <br />
                            <a href="http://www.jquery2dotnet.com" class="btn twitter btn-block" role="button">Log in using Twitter</a>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 login-box">
                            <form role="form">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" class="form-control" placeholder="Username" required autofocus />
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                <input type="password" class="form-control" placeholder="Password" required />
                            </div>
                            <p>
                                <a href="http://www.jquery2dotnet.com">Lost your password?</a></p>
                            Don't have an account? <a href="http://www.jquery2dotnet.com">Sign up here</a>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="Remember">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <button type="button" class="btn btn-labeled btn-success">
                                <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>Success</button>
                            <button type="button" class="btn btn-labeled btn-danger">
                                <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
@endsection