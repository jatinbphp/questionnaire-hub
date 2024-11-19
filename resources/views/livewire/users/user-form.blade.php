<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="institution_id" class="control-label"> Select Institution :<span class="text-red">*</span></label>
            {!! Form::select('institution_id', $institutions, null, ['class' => 'form-control', 'wire:model' => 'institution_id']) !!}
            @error('institution_id') <span class="text-danger w-100">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="user_type" class="control-label"> User Type :<span class="text-red">*</span> <i class="fas fa-exclamation-circle" data-bs-toggle="tooltip" title="If you designate this user as a submitter, the existing submitter will automatically be changed to a regular user."></i></label>
            {!! Form::select('user_type', ['' => 'Please Select'] + $userTypes, null, ['class' => 'form-control', 'wire:model' => 'user_type']) !!}
            @error('user_type') <span class="text-danger w-100">{{ $message }}</span> @enderror
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
    
    <div class="col-md-3">
        <div class="form-group">
            <label for="status" class="control-label"> Status :<span class="text-red">*</span></label>
            {!! Form::select('status', ['' => 'Please Select'] + $statusList, null, ['class' => 'form-control', 'wire:model' => 'status']) !!}
            @error('status') <span class="text-danger w-100">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="username" class="control-label"> User Name :<span class="text-red">*</span></label>
            <input type="text" class="form-control" placeholder="User Name" wire:model="username">
            @error('username') <span class="text-danger w-100">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="password" class="control-label"> Password :<span class="text-red">*</span></label>
            <input type="password" class="form-control" placeholder="Password" id="password" wire:model="password">
            @error('password') <span class="text-danger w-100">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="password_confirmation" class="control-label"> Confirm Password :<span class="text-red">*</span></label>
            <input type="password" class="form-control" placeholder="Confirm Password" id="password_confirmation" wire:model="password_confirmation">
            @error('confirm_password') <span class="text-danger w-100">{{ $message }}</span> @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3"  wire:ignore>
        <div class="form-group">
            <label for="image" class="control-label"> Image:</span></label>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
    $(document).ready(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>