<div class="content-wrapper">
    
    @include('common.header', [
        'menu' => $menu,
        'breadcrumb' => [
            ['route' => getRoleWiseHomeUrl(), 'title' => getRoleWiseHomeLabel()],
            ['route' => route('institution.list'), 'title' => 'Institutions']
        ],
        'active' => 'View'
    ])

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        @include('common.card-header', ['title' => 'View Institution Details'])
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
                                                    src="{{ $institution->logo_image && file_exists(public_path($institution->logo_image)) ? url($institution->logo_image) : asset('assets/dist/img/no-image.png') }}"
                                                    >
                                                </div>
                                                <p class="text-center">
                                                    @if ($institution->status == "active")
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactive</span>
                                                    @endif
                                                </p>
                                                <h3 class="text-bold text-center">{{$institution->institutionName}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card">
                                            <div class="card-body table-responsive">
                                                <div class="tab-content">
                                                <input type="hidden" id="route_name" value="{{ route('institution.user.data', ['id' => $institutionId]) }}">
                                                <input type="hidden" id="institution_id" value="{{$institutionId }}">
                                                    <table id="institutionsUserTable" class="table table-bordered table-striped datatable-dynamic">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Designation</th>
                                                                <th>Status</th>
                                                                <th>Date Created</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
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