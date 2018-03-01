@extends('layouts.app')

@section('title')
    我的通知
@stop

@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">

                    <h3 class="text-center">
                        <span class="glyphicon glyphicon-bell" aria-hidden="true"></span> 我的通知
                    </h3>
                    <hr>

                    @if ($notifications->count())

                        <div class="notification-list">
                            @foreach ($notifications as $notification)
                                {{--snake_case 方法是将驼峰字符串转化为下划线--}}
                                {{--class_basename 方法会将 返回路径中的文件名部分--}}
                                @include('notifications.types._' . snake_case(class_basename($notification->type)))
                            @endforeach

                            {!! $notifications->render() !!}
                        </div>

                    @else
                        <div class="empty-block">没有消息通知！</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@stop