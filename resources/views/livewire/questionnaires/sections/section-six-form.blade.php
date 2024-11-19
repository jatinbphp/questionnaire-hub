<form wire:submit.prevent="store" enctype="multipart/form-data">
    <input type="hidden" wire:model="submit_type">
	<div class="card card-info">
	    <div class="card-header">
	        <h6 class="text-bold mb-0">
                SECTION 6: QUALITATIVE INPUT
                @include('common.questionnaires_status', ['completedStatus' => $completedStatus])
            </h6>
	    </div>
	    <div class="card-body"> 
	    	@php $questionId = 249; @endphp

	    	<div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">Impact Case Study</h6>
			    </div>
			    <div class="card-body"> 

			    	<p>Technology Transfer makes significant contributions to global health, humanity, society, and the environment. Please share an impactful Technology Transfer story from your office - a story that had a significant event or activity during any reporting year between 2019 and 2023.  Examples can be found in previous survey reports1, or at the AUTM Better World Project <a class="text-bold" target="_blank" href="https://autm.net/about-tech-transfer/better-world-project/bwp-stories/newgenerator">(The Importance of Technology Transfer | Better World (autm.net))</a></p>

			    	<div class="form-group">
                        <label class="control-label">Title</label>

                        <input class="form-control" type="text" wire:model="questions.{{ $questionId }}">

                        @error("questions.{$questionId}")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror
                        @php $questionId++; @endphp
                    </div>	

                    <div class="form-group">
                        <label class="control-label">Problem Statement : </br><small>Describe the problem that was addressed.</small></label>

                        <textarea rows="5"class="form-control" wire:model="questions.{{ $questionId }}"></textarea>

                        @error("questions.{$questionId}")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror
                        @php $questionId++; @endphp
                    </div>

                    <div class="form-group">
                        <label class="control-label">Solution and Benefits : </br><small>Explain the solution developed and its benefits (e.g. a product, process or service)</small></label>

                        <textarea rows="5"class="form-control" wire:model="questions.{{ $questionId }}"></textarea>

                        @error("questions.{$questionId}")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror
                        @php $questionId++; @endphp
                    </div>

                	<div class="form-group">
                        <label class="control-label">Researchers Involved : </br><small>Include the names of the researchers / IP creators involved in solving the problem.</small></label>

                        <textarea rows="5"class="form-control" wire:model="questions.{{ $questionId }}"></textarea>

                        @error("questions.{$questionId}")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror
                        @php $questionId++; @endphp
                    </div>

                    <div class="form-group">
                        <label class="control-label">Challenges Encountered : </br><small>What were the key challenges encountered during the technology transfer process, and how were they addressed?</small></label>

                        <textarea rows="5"class="form-control" wire:model="questions.{{ $questionId }}"></textarea>

                        @error("questions.{$questionId}")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror
                        @php $questionId++; @endphp
                    </div>

                    <div class="form-group">
                        <label class="control-label">Impact : </br><small>Describe the impact of the technology transfer to date and if possible, quantify the impact (e.g. 5000 people provided with potable water).</small></label>

                        <textarea rows="5"class="form-control" wire:model="questions.{{ $questionId }}"></textarea>

                        @error("questions.{$questionId}")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror
                        @php $questionId++; @endphp
                    </div>

                    <div class="form-group">
                        <label class="control-label">Future Plans : </br><small>What are the future plans or next steps for the technology or company described in the story?</small></label>

                        <textarea rows="5"class="form-control" wire:model="questions.{{ $questionId }}"></textarea>

                        @error("questions.{$questionId}")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror
                        @php $questionId++; @endphp
                    </div>
                    	
                	<div class="form-group">
                        <label class="control-label">IP Type : </br><small>Specify the type(s) of IP involved.</small></label>

                        <textarea rows="5"class="form-control" wire:model="questions.{{ $questionId }}"></textarea>

                        @error("questions.{$questionId}")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror
                        @php $questionId++; @endphp
                    </div>

                    <div class="form-group">
                        <label class="control-label">TTO involvement : </br><small>Describe how the Technology Transfer Office team assisting the innovation.</small></label>

                        <textarea rows="5"class="form-control" wire:model="questions.{{ $questionId }}"></textarea>

                        @error("questions.{$questionId}")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror
                        @php $questionId++; @endphp
                    </div>
                	
                	<div class="form-group">
                        <label class="control-label">Funding Information : </br><small>Detail the funding received, including sources and if possible, the amounts (both research and technology development funding)</small></label>

                        <textarea rows="5"class="form-control" wire:model="questions.{{ $questionId }}"></textarea>

                        @error("questions.{$questionId}")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror
                        @php $questionId++; @endphp
                    </div>
                	
                	<div class="form-group">
						<h6 class="text-bold mb-0">Agree : </br><small>Detail the funding received, including sources and if possible, the amounts (both research and technology development funding)</small></h6>

						<input type="checkbox" wire:model="questions.{{ $questionId }}">

						@error("questions.{$questionId}")
                          <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

            	       @php $questionId++; @endphp
                	</div>

        			<div class="form-group">
        				<h6 class="text-bold mb-0">Images : </br><small>Please upload suitable high-resolution images associated with your success story, captured during or after the story. The image can be that of a product, team, team member or anyone or anything positively associated with the story. Please provide a caption for the image(s) and <u>ensure that subjects and copyright holder have provided their permission for the photograph to be published.</u></small></h6>
                    
                        <div wire:ignore>
                            <input type="file" class="form-control" id="image" wire:model="questions.{{ $questionId }}" onChange="AjaxMultiUploadImage(this)" multiple>

                            <input type="hidden" value="{{ !empty($questions[$questionId]) ? json_encode($questions[$questionId]) : '' }}">

                            <div id="imagePreviewContainer" class="image-preview-grid">
                                @if (isset($questions[$questionId]))
                                    @foreach($questions[$questionId] as $iKey=> $img)
                                        @if (file_exists(public_path($img)))                            
                                            <div class="image-preview-item" id="{{$iKey}}">
                                                <img src="{{ url($img) }}" alt="Image Preview" width="100">
                                                <button type="button" class="remove-btn removeQueImg" data-ikey="{{$iKey}}" data-url="{{route('queAnsImg.destroy',['id' => $questionId, 'src'=>basename($img)])}}">
                                                    <i class="fa fa-times-circle"></i>
                                                </button>
                                            </div>
                                        @endif    
                                    @endforeach
                                @elseif($currentImage)
                                    <img src="{{ asset($currentImage) }}" alt="Current Image" class="img-thumbnail" id="currentNoImage" width="150">
                                @endif
                            </div>              
                        </div>

        				@error("questions.{$questionId}")
                          <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

        				@php $questionId++; @endphp
                	</div>

                	<div class="form-group">
                        <label class="control-label">Contact Information : </br><small>Provide contact information for an individual who can assist with more details if needed.  These details will not be published and will only be used for preparing final publications.</small></label>

                        <textarea rows="5"class="form-control" wire:model="questions.{{ $questionId }}"></textarea>

                        @error("questions.{$questionId}")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror
                        @php $questionId++; @endphp
                    </div>
               </div>
         	</div>
	    </div>
	    <div class="card-footer">
            @include('common.footer-buttons', ['route' => route('user.list'), 'type' => 'create', 'is_hide_back' => 1])
	    </div>
	</div>
</form>