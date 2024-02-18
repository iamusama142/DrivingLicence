@extends('UserSide.layouts.app')

@section('title', 'Notifications')
@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Notification</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Notifications</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <form class="" id="sort_customers" action="" method="GET">

                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                @foreach ($notification as $notification_details)
                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                <p class="mb-1 text-truncate-2">
                                                    {{ $notification_details->title }}
                                                    <small class="text-muted">
                                                        {{ formatDate($notification_details->created_at) }}
                                                    </small>

                                                </p>
                                                {!! $notification_details->description !!}
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div>
                                <ul class="pagination mb-4">

                                    {{ $notification->links() }}

                                </ul>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
