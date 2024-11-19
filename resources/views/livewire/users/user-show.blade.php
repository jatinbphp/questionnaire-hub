<div class="content-wrapper">
    @include('common.header', [
        'menu' => $menu,
        'breadcrumb' => [
            ['route' => getRoleWiseHomeUrl(), 'title' => getRoleWiseHomeLabel()],
            ['route' => route('user.list'), 'title' => 'Users']
        ],
        'active' => 'View'
    ])

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        @include('common.card-header', ['title' => 'View User Details'])
                    </div>
                    <div class="card-body">
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card card-primary card-outline">
                                            <div class="card-body box-profile">
                                                <div class="text-center mb-3">
                                                    <img class="profile-user-img img-fluid img-circle"
                                                    src="{{ $user->image && file_exists(public_path($user->image)) ? url($user->image) : asset('assets/dist/img/no-image.png') }}"
                                                    >
                                                </div>
                                                <h3 class="text-bold text-center">{{ $user->fullname }}</h3> 
                                                @if(!empty($user->designation))
                                                    <p class="text-center text-bold">{{ $user->designation }}</p>
                                                @endif
                                                <hr>
                                                <p class="text-center"><b><i class="fa fa-calendar"></i> Date Created</b></br>{{ $user->created_at->format('Y-m-d') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="tab-content">
                                                    <div class="active tab-pane" id="activity">
                                                        <strong><i class="fas fa-envelope mr-1"></i> User Type</strong>
                                                        <p class="text-muted">
                                                            @if ($user->role === 'user')
                                                                <span class="badge bg-success">User</span>
                                                            @elseif ($user->role === 'submitter')
                                                                <span class="badge bg-danger">Submitter</span>
                                                            @endif
                                                        </p>
                                                        <hr>
                                                        <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                                                        <p class="text-muted">{{ $user->email }}</p>
                                                        <hr>
                                                        <strong><i class="fas fa-user mr-1"></i> Username</strong>
                                                        <p class="text-muted">{{ $user->username }}</p>
                                                        <hr>
                                                        <strong><i class="fas fa-phone mr-1"></i> Phone Number</strong>
                                                        <p class="text-muted">{{ $user->mobile_number ?? 'Not Available' }}</p>
                                                        <hr>
                                                        <strong><i class="fas fa-briefcase mr-1"></i> Work Phone Number</strong>
                                                        <p class="text-muted">{{ $user->work_phone_number ?? 'Not Available' }}</p>
                                                        <hr>
                                                        <strong><i class="fas fa-hourglass mr-1"></i> Status</strong>
                                                        <p class="text-muted">
                                                            @if ($user->status == "active")
                                                                <span class="badge bg-success">Active</span>
                                                            @else
                                                                <span class="badge bg-danger">Inactive</span>
                                                            @endif
                                                        </p>
                                                        <hr>
                                                        <strong><i class="fa fa-university mr-1"></i> Institution</strong>
                                                        <p class="text-muted">{{ $user->institution->institutionName }}</p>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
