<div class="content-wrapper">

    @include('common.header', [
        'menu' => $menu,
        'breadcrumb' => [
            ['route' => getRoleWiseHomeUrl(), 'title' => getRoleWiseHomeLabel()]
        ],
        'active' => 'Edit Profile'
    ])

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        @include('common.card-header', ['title' => 'Edit Profile'])
                    </div>

                    <form wire:submit.prevent="updateProfile">
                        <div class="card-body">
                            @include('common.password-alert')
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="user_type" class="control-label"> User Type :<span class="text-red">*</span></label>
                                        <input type="text" id="user_type" class="form-control" readonly value="{{ ucwords(str_replace('_', ' ', Auth::user()->role)) }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="title" class="control-label"> Title :</label>
                                        {!! Form::select('title', ['' => 'Please Select'] + $titles, null, ['class' => 'form-control', 'wire:model' => 'title']) !!}
                                        @error('title') <span class="text-danger w-100">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="fullname" class="control-label"> Full Name :<span class="text-red">*</span></label>
                                        <input type="text" id="fullname" class="form-control" wire:model="fullname" placeholder="Full Name">
                                        @error('fullname') <span class="text-danger w-100">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email" class="control-label"> Email Address :<span class="text-red">*</span></label>
                                        <input type="text" class="form-control" placeholder="Email Address" wire:model="email">
                                        @error('email') <span class="text-danger w-100">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                @if(Auth::user() && in_array(Auth::user()->role, ['user', 'submitter']))
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="designation" class="control-label"> Designation :</label>
                                            <input type="text" id="designation" class="form-control" wire:model="designation" placeholder="Designation">
                                            @error('designation') <span class="text-danger w-100">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="work_phone_number" class="control-label"> Work Phone Number :</label>
                                            <input type="text" id="work_phone_number" class="form-control" wire:model="work_phone_number" placeholder="Work Phone Number">
                                            @error('work_phone_number') <span class="text-danger w-100">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="mobile_number" class="control-label"> Mobile/Cell Number :</label>
                                            <input type="text" id="mobile_number" class="form-control" wire:model="mobile_number" placeholder="Mobile/Cell Number">
                                            @error('mobile_number') <span class="text-danger w-100">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="username" class="control-label"> User Name :<span class="text-red">*</span></label>
                                        <input type="text" id="username" class="form-control" wire:model="username" placeholder="Full Name">
                                        @error('username') <span class="text-danger w-100">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="password" class="control-label"> Password :</label>
                                        <input type="password" class="form-control" placeholder="Password" id="password" wire:model="password">
                                        @error('password') <span class="text-danger w-100">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="password_confirmation" class="control-label"> Confirm Password :</label>
                                        <input type="password" class="form-control" placeholder="Confirm password" id="password_confirmation" wire:model="password_confirmation">
                                        @error('password_confirmation') <span class="text-danger w-100">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"  wire:ignore>
                                    <div class="form-group">
                                        <label for="image" class="control-label"> Image: </label>
                                        <input type="file" class="form-control" id="image" wire:model="image" onChange="AjaxUploadImage(this)">
                                        @error('image') <span class="text-danger w-100">{{ $message }}</span> @enderror

                                        @if ($currentImage && file_exists(public_path($currentImage)))
                                                <img src="{{ asset($currentImage) }}" style="border: 1px solid #ccc; margin-top: 5px;" width="150" id="DisplayImage">
                                        @else
                                            <img src="{{ url('assets/dist/img/no-image.png') }}" alt="Placeholder Image" style="border: 1px solid #ccc; margin-top: 5px; padding: 20px;" width="150" id="DisplayImage">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            @include('common.footer-buttons', ['route' => getRoleWiseHomeUrl(), 'type' => 'update'])
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>