<form wire:submit.prevent="store">
	<input type="hidden" wire:model="submit_type">
	<div class="card card-info">
	    <div class="card-header">
	        <h6 class="text-bold mb-0">
	        	SECTION 3: EXPENDITURE AND FUNDING ASSOCIATED WITH THE TECHNOLOGY TRANSFER
	        	@include('common.questionnaires_status', ['completedStatus' => $completedStatus])
	        </h6>
	    </div>
	    <div class="card-body"> 
	    	@php $questionId = 59; @endphp
			<div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">3.1 Indicate the total institutional RESEARCH AND DEVELOPMENT EXPENDITURE per annum (*estimate total allowed)</h6>
			    </div>
			    <div class="card-body"> 
			    	<div class="form-group">
			            <table class="table table-bordered full-borader">
			                <thead>
			                    <tr>
			                        <th></th>
			                        @foreach (getYears() as $year)
					                    <th>{{ $year }} (R)</th>
					                @endforeach
			                    </tr>
			                </thead>
			                <tbody>
								@foreach($researchDevelopmentList as $key => $value)
						            <tr>
						                <th>{!! $value !!}</th>
						                @foreach (getYears() as $year)
						                    <td>
						                    	<input class="form-control" oninput="formatNumber(this)" type="text" wire:model="questions.{{ $questionId }}.{{$year}}">
						                    	@error("questions.{$questionId}.{$year}")
						                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
						                        @enderror
						                    </td>
						                @endforeach                                    
						            </tr>
						            @php $questionId++; @endphp
								@endforeach
			                </tbody>
			            </table>
		            </div>
	            </div>
           	</div>

           	<div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">3.2 Does your institution include:</h6>
			    </div>
			    <div class="card-body"> 
                    <div class="form-group">
                        <label for="medical_school" class="control-label">3.2.1 : A Medical school?</label>

                        {!! Form::select(
                            'questions['.$questionId.'][medical_school]', 
                            ['' => 'Please Select'] + $yesNo, 
                            null, 
                            [
                                'class' => 'form-control', 
                                'data-question-id' => $questionId,
                                'wire:model' => 'questions.'.$questionId.'.medical_school'
                            ]
                        ) !!}

                        @error("questions.{$questionId}.medical_school")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

                        @php $questionId++; @endphp
                    </div>

                    <div class="form-group">
                        <label for="clinical_trials" class="control-label">3.2.2 : Conduct CLINICAL TRIALS?</label>

                        {!! Form::select(
                            'questions['.$questionId.'][clinical_trials]', 
                            ['' => 'Please Select'] + $yesNo, 
                            null, 
                            [
                                'class' => 'form-control policy-select', 
                                'data-question-id' => $questionId,
                                'wire:model' => 'questions.'.$questionId.'.clinical_trials'
                            ]
                        ) !!}

                        @error("questions.{$questionId}.clinical_trials")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

                        @php 
                            $questionIdMain = $questionId;
                            $questionId++; 
                        @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['clinical_trials']) && $questions[$questionIdMain]['clinical_trials'] == 'Yes' ? '' : 'display: none;' }}">
                    	
                    	<label class="control-label">3.2.2.1 : If yes, Please indicate institution’s expenditure on CLINICAL TRIALS</label>

			            <table class="table table-bordered full-borader">
			                <thead>
			                    <tr>
			                        <th></th>
			                        @foreach (getYears() as $year)
					                    <th>{{ $year }} (R)</th>
					                @endforeach
			                    </tr>
			                </thead>
			                <tbody>
								@foreach($clinicalTrialsList as $key => $value)
						            <tr>
						                <th>{!! $value !!}</th>
						                @foreach (getYears() as $year)
						                    <td>
						                    	<input class="form-control" oninput="formatNumber(this)" type="text" wire:model="questions.{{ $questionId }}.{{$year}}">

						                    	@error("questions.{$questionId}.{$year}")
						                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
						                        @enderror
						                    </td>
						                @endforeach                                    
						            </tr>
						            @php $questionId++; @endphp
								@endforeach
			                </tbody>
			            </table>
                    </div>
                </div>
            </div>

            <div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">3.3 Indicate the expenditure on TECHNOLOGY TRANSFER ACTIVITIES</h6>
			    </div>
			    <div class="card-body"> 
			    	<div class="form-group">
			            <table class="table table-bordered full-borader">
			                <thead>
			                    <tr>
			                        <th></th>
			                        @foreach (getYears() as $year)
					                    <th>{{ $year }} (R)</th>
					                @endforeach
			                    </tr>
			                </thead>
			                <tbody>
								@foreach($technologyTransferActivitiesList as $key => $value)
						            <tr>
						                <th>{!! $value !!}</th>
						                @foreach (getYears() as $year)
						                    <td>
						                    	<input class="form-control" ninput="formatNumber(this)" type="text" wire:model="questions.{{ $questionId }}.{{$year}}">
						                    	@error("questions.{$questionId}.{$year}")
						                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
						                        @enderror
						                    </td>
						                @endforeach                                    
						            </tr>
						            @php $questionId++; @endphp
								@endforeach
			                </tbody>
			            </table>
		            </div>
	           	</div>
          	</div>

          	<div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">3.4 Indicate the amount received in any IP TRANSACTION, as an IP EXPENSE REIMBURSEMENT</h6>
			    </div>
			    <div class="card-body"> 
			    	<div class="form-group">
			            <table class="table table-bordered full-borader">
			                <thead>
			                    <tr>
			                        <th></th>
			                        @foreach (getYears() as $year)
					                    <th>{{ $year }} (R)</th>
					                @endforeach
			                    </tr>
			                </thead>
			                <tbody>
								@foreach($ipTransactionsList as $key => $value)
						            <tr>
						                <th>{!! $value !!}</th>
						                @foreach (getYears() as $year)
						                    <td>
						                    	<input class="form-control" oninput="formatNumber(this)" type="text" wire:model="questions.{{ $questionId }}.{{$year}}">
						                    	@error("questions.{$questionId}.{$year}")
						                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
						                        @enderror
						                    </td>
						                @endforeach                                    
						            </tr>
						            @php $questionId++; @endphp
								@endforeach
			                </tbody>
			            </table>
		            </div>
	           	</div>
          	</div>

          	<div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">3.5 Does your institution have access to SEED FUNDING?</h6>
			    </div>
			    <div class="card-body">
                    <div class="form-group">
                        {!! Form::select(
                            'questions['.$questionId.'][seed_funding]', 
                            ['' => 'Please Select'] + $yesNo, 
                            null, 
                            [
                                'class' => 'form-control policy-select', 
                                'data-question-id' => $questionId,
                                'wire:model' => 'questions.'.$questionId.'.seed_funding'
                            ]
                        ) !!}

                        @error("questions.{$questionId}.seed_funding")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

                        @php 
	                        $questionIdMain = $questionId;
	                        $questionId++; 
	                    @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['seed_funding']) && $questions[$questionIdMain]['seed_funding'] == 'Yes' ? '' : 'display: none;' }}">

                    	<label for="clinical_trials" class="control-label">3.5.1 If yes, Please complete the table below on the amount and sources of SEED FUNDING awarded.</label>

			            <table class="table table-bordered full-borader">
			                <thead>
			                    <tr>
			                        <th></th>
			                        @foreach (getYears() as $year)
					                    <th>{{ $year }}</th>
					                @endforeach
			                    </tr>
			                </thead>
			                <tbody>
								@foreach($seedFundingList as $key => $value)
						            <tr>
						                <th>{!! $value !!}</th>
						                @foreach (getYears() as $year)
						                    <td>
						                    	<input class="form-control" oninput="formatNumber(this)" type="text" wire:model="questions.{{ $questionId }}.{{$year}}" @if($loop->parent->last) readonly @else wire:blur="updateFte({{$year}})" @endif>

						                    	@error("questions.{$questionId}.{$year}")
						                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
						                        @enderror
						                    </td>
						                @endforeach                                    
						            </tr>
						            @php $questionId++; @endphp
								@endforeach

			                    <tr>
			                        <th>3.5.1.4 Please list the source/s of other SEED FUNDING:</th>
			                        <td colspan="5">
			                            <textarea class="form-control" wire:model="questions.{{ $questionId }}"></textarea>

			                            @error("questions.{$questionId}")
				                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
				                        @enderror
			                        </td>
			                        @php $questionId++; @endphp
			                    </tr>
			                </tbody>
			            </table>
                    </div>
                </div>
          	</div>

          	<div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">3.6 Indicate in the table below whether your institution requires additional funding beyond the funds expected (i.e. from either anticipated internal budget allocation or external funder commitment) for the next two financial years (2025 and 2026 calendar years for HEIs and 2025/2026 and 2026/2027 for Schedule 1 institutions) for the listed funding types or categories.</h6>
			    </div>
			    <div class="card-body">
			    	<div class="form-group">
		                <ul style="padding-left:20px;">
		                    <li>Select "Not Applicable" if this type of funding is not relevant to your institution`s current stage of technology transfer development or portfolio.</li>
		                    <li>Select "No Gap" if no additional funding is required for this type of funding.</li>
		                    <li>Select one of the four funding ranges in the table below to indicate the extent of the funding requirement if additional funding is needed</li>
		                </ul>
			            <table class="table table-bordered black-border">
			                <thead>
			                    <tr>
			                        <th rowspan="2" class="text-center black-bottom black-right">Funding types or categories</th>
			                        <th rowspan="2" class="text-center black-bottom">Not applicable</th>
			                        <th rowspan="2" class="text-center black-bottom">No gap</th>
			                        <th colspan="4" class="text-center">Extent of additional funding required for 2025 and 2026</th>
			                    </tr>
			                    <tr>
			                        <th class="text-center black-bottom">R1 to R1 mil</th>
			                        <th class="text-center black-bottom">R1 mil to R5 mil</th>
			                        <th class="text-center black-bottom">R5 mil to R10 mil</th>
			                        <th class="text-center black-bottom">More than R10 mil</th>
			                    </tr>
			                </thead>
			                <tbody>
			                    @php $rowId = 1; @endphp
				                @if(count($additionalFundingList) > 0)
				                    @foreach($additionalFundingList as $index => $value)
				                        <tr>
					                        <th class="black-right" @if ($errors->has("questions.{$questionId}")) rowspan="2" @endif>{!! $value !!}</th>

					                        @for ($i = 1; $i <= 6; $i++)
				                                <td class="text-center">
				                                    <div class="radio-wrapper">
				                                        <label for="example-{{ $rowId }}-{{ $i }}">
				                                            <input id="example-{{ $rowId }}-{{ $i }}" type="radio" value="{{ $i }}" wire:model="questions.{{ $questionId }}">
				                                        </label>
				                                    </div>
				                                </td>
				                            @endfor
					                    </tr>

					                    @if ($errors->has("questions.{$questionId}"))
                                            <tr>
                                                @error("questions.{$questionId}")
                                                    <td colspan="6"><small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small></td>
                                                @else
                                                    <td colspan="6"></td>
                                                @enderror
                                            </tr>
                                        @endif
				                        @php
				                            $rowId++;
				                            $questionId++;
				                        @endphp
				                    @endforeach
				                @endif
			                </tbody>
			            </table>
		            </div>
	           	</div>
	        </div>
	    </div>
	    <div class="card-footer">
	    	@include('common.footer-buttons', ['route' => route('user.list'), 'type' => 'create', 'is_hide_back' => 1])
	    </div>
	</div>
</form>