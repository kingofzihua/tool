@extends(config("tool.layouts"))
@section('content')
    <section class="content-header">
        <h1>
            Log
            <small>Log</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Log</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">当前日志</h3>

                        <div class="box-tools">
                            <div class="btn-group pull-right">
                                <a href="{{url(config('tool.prefix').'/log/deleted')}}"
                                   onclick="javascript:return config('确定要删除吗?')" class="btn btn-danger item_delete"
                                   data-id="1">删除</a>
                            </div>

                            <div class="btn-group pull-right" style="margin-right: 10px">
                                <a href="{{url(config('tool.prefix').'/log/reset')}}" class="btn btn-default">重置</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {{$data}}
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
