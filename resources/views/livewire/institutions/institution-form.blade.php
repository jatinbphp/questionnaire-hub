<div class="row">
    <div class="col-md-9">
        <div class="form-group">
            <label for="institutionName" class="control-label"> Institution Name :<span class="text-red">*</span></label>
            <input type="text" id="institutionName" class="form-control" wire:model="institutionName" placeholder="Institution Name">
            @error('institutionName') <span class="text-danger w-100">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="status" class="control-label"> Status :<span class="text-red">*</span></label>
            {!! Form::select('status', ['' => 'Please Select'] + $statusList, null, ['class' => 'form-control', 'wire:model' => 'status']) !!}
            @error('status') <span class="text-danger w-100">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-md-3"  wire:ignore>
        <div class="form-group">
            <label for="logo_image" class="control-label"> Image:</span></label>
            <input type="file" class="form-control" id="logo_image" wire:model="logo_image" onChange="AjaxUploadImage(this)">
            @error('logo_image') <span class="text-danger w-100">{{ $message }}</span> @enderror

            @if ($currentImage && file_exists(public_path($currentImage)))
                <img src="{{ asset($currentImage) }}" style="border: 1px solid #ccc; margin-top: 5px;" width="150" id="DisplayImage">
            @else
                <img src="{{ url('assets/dist/img/no-image.png') }}" alt="Placeholder Image" style="border: 1px solid #ccc; margin-top: 5px; padding: 20px;" width="150" id="DisplayImage">
            @endif
        </div>
    </div>
</div>