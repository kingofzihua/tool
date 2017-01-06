@extends(config("tool.layouts"))
@section('content')
    <section class="content-header">
        <h1>
            ENV设置
            <small>Set ENV</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Set ENV</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">ENV Form</h3>
            </div>
            <form class="form-horizontal" method="post">
                {{csrf_field()}}
                <div class="box-body" id="container">
                    @foreach($data as $key =>$value)
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">{{$key}}</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control"  name="{{$key}}" value="{{$value}}"
                                    @if(in_array($key,$disabled)) disabled @endif
                                >
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">保存</button>
                </div>
            </form>
        </div>
    </section>
@endsection
