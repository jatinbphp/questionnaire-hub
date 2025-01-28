<form wire:submit.prevent="store">
	<input type="hidden" wire:model="submit_type">
	<div class="card card-info">
	    <div class="card-header">
	        <h6 class="text-bold mb-0">
	        	SECTION 2: TECHNOLOGY TRANSFER FUNCTION
	        	@include('common.questionnaires_status', ['completedStatus' => $completedStatus])
	        </h6>
	    </div>
	    <div class="card-body"> 
	    	<div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">2.1 For each of the following key <span data-toggle="tooltip" data-placement="top" title="The function (be it an individual(s), a dedicated office, a regional office etc.) that manages and performs the TECHNOLOGY TRANSFER ACTIVITIES at the institution.">TTF</span> activities, please</h6>
			    </div>
			    <div class="card-body">  
			    	<div class="form-group">   
			            <ul class="list-unstyled">
		                    <li>2.1.1 Please select in drop down box whether <span data-toggle="tooltip" data-placement="top" title="An activity associated with the identification, documentation, evaluation, protection, marketing and commercialisation of technology, as well as IP management, in general.">TTA</span> is Undertaken by <span data-toggle="tooltip" data-placement="top" title="The function (be it an individual(s), a dedicated office, a regional office etc.) that manages and performs the TECHNOLOGY TRANSFER ACTIVITIES at the institution.">TTF</span>, Outsourced by <span data-toggle="tooltip" data-placement="top" title="The function (be it an individual(s), a dedicated office, a regional office etc.) that manages and performs the TECHNOLOGY TRANSFER ACTIVITIES at the institution.">TTF</span>, Not done or Done elsewhere in institution</li>
		                    <li>2.1.2 Whether the <span data-toggle="tooltip" data-placement="top" title="The function (be it an individual(s), a dedicated office, a regional office etc.) that manages and performs the TECHNOLOGY TRANSFER ACTIVITIES at the institution.">TTF</span> has the capability (having required skills and knowledge) to undertake the activity?</li>
		                    <li>2.1.3 Select an option to indicate the extent of the capacity (consider factors such as workload, efficient IT systems, etc., that may impact capacity despite having the capability) within the <span data-toggle="tooltip" data-placement="top" title="The function (be it an individual(s), a dedicated office, a regional office etc.) that manages and performs the TECHNOLOGY TRANSFER ACTIVITIES at the institution.">TTF</span> to undertake the activity.</li>
		                    <li>2.1.4 Rate the importance of the activity in achieving TECHNOLOGY TRANSFER goals at your institution.</li>
		                </ul>
				        <table class="table table-bordered black-border">
				            <thead>
				                <tr>
				                    <th rowspan="2" class="text-center black-bottom black-right"><span data-toggle="tooltip" data-placement="top" title="An activity associated with the identification, documentation, evaluation, protection, marketing and commercialisation of technology, as well as IP management, in general.">TECHNOLOGY TRANSFER ACTIVITY (TTA)</span></th>
				                    <th rowspan="2" class="text-center black-bottom black-right">2.1.1 Activity</th>
				                    <th rowspan="2" class="text-center black-bottom black-right">2.1.2 <span data-toggle="tooltip" data-placement="top" title="The function (be it an individual(s), a dedicated office, a regional office etc.) that manages and performs the TECHNOLOGY TRANSFER ACTIVITIES at the institution.">TTF</span> Capability</th>
				                    <th colspan="3" class="text-center black-bottom black-right black-left">2.1.3 Capacity</th>
				                    <th colspan="3" class="text-center black-bottom black-right black-left">2.1.4 Importance</th>
				                </tr>
				                <tr>
				                    <th class="text-center black-bottom black-left">None</th>
				                    <th class="text-center black-bottom">Inadequate</th>
				                    <th class="text-center black-bottom">Adequate</th>
				                    <th class="text-center black-bottom black-left">Not Important</th>
				                    <th class="text-center black-bottom">Moderately Important</th>
				                    <th class="text-center black-bottom">Very Important</th>
				                </tr>
				            </thead>
				            <tbody>
				               	@php
								    $rowId = 1;
								    $questionId = 35;
								@endphp

								@foreach($ipManagementTasksList as $category => $tasks)
								    @if(count($tasks) > 0)
								        <tr bgcolor="#f4f6f9">
								            <th colspan="9" class="black-bottom black-top">{{$category}}</th>
								        </tr>
								        @foreach($tasks as $index => $task)
								            <tr>
								                <th class="black-right" @if ($errors->has("questions.{$questionId}.ttf_capacity") || $errors->has("questions.{$questionId}.ttf_importance") || $errors->has("questions.{$questionId}.ttf_activity") || $errors->has("questions.{$questionId}.ttf_capability")) rowspan="2" @endif>
								                    {!! $task !!}
								                </th>
								                <td class="black-right" @if (!$errors->has("questions.{$questionId}.ttf_activity") && ($errors->has("questions.{$questionId}.ttf_importance") || $errors->has("questions.{$questionId}.ttf_capacity") || $errors->has("questions.{$questionId}.ttf_capability"))) rowspan="2" @endif>
								                    {!! Form::select(
								                        "questions[{$questionId}][ttf_activity]", 
								                        ['' => 'Please Select'] + $ttf_activities, 
								                        null, 
								                        [
								                            'class' => 'form-control', 
								                            'data-question-id' => $questionId,
								                            'wire:model' => 'questions.' . $questionId . '.ttf_activity'
								                        ]
								                    ) !!}
								                </td>
								                
								                <td class="black-right" @if (!$errors->has("questions.{$questionId}.ttf_capability") && ($errors->has("questions.{$questionId}.ttf_capacity") || $errors->has("questions.{$questionId}.ttf_activity") || $errors->has("questions.{$questionId}.ttf_importance"))) rowspan="2" @endif>
								                    {!! Form::select(
								                        "questions[{$questionId}][ttf_capability]", 
								                        ['' => 'Please Select'] + $yesNo, 
								                        null, 
								                        [
								                            'class' => 'form-control', 
								                            'wire:model' => "questions.{$questionId}.ttf_capability"
								                        ]
								                    ) !!}
								                </td>

								                @for ($i = 1; $i <= 3; $i++)
								                    <td class="text-center @if($i==3) black-right @endif" @if (!$errors->has("questions.{$questionId}.ttf_capacity") && ($errors->has("questions.{$questionId}.ttf_activity") || $errors->has("questions.{$questionId}.ttf_importance") || $errors->has("questions.{$questionId}.ttf_capability"))) rowspan="2" @endif>
								                        <div class="radio-wrapper">
								                            <label for="example-{{ $rowId }}-{{ $i }}">
								                                <input id="example-{{ $rowId }}-{{ $i }}" type="radio" value="{{ $i }}" wire:model="questions.{{ $questionId }}.ttf_capacity">
								                            </label>
								                        </div>
								                    </td>
								                @endfor

								                @for ($i = 4; $i <= 6; $i++)
								                    <td class="text-center" @if (!$errors->has("questions.{$questionId}.ttf_importance") && ($errors->has("questions.{$questionId}.ttf_capacity") || $errors->has("questions.{$questionId}.ttf_capability") || $errors->has("questions.{$questionId}.ttf_activity"))) rowspan="2" @endif>
								                        <div class="radio-wrapper">
								                            <label for="example-{{ $rowId }}-{{ $i }}">
								                                <input id="example-{{ $rowId }}-{{ $i }}" type="radio" value="{{ $i }}" wire:model="questions.{{ $questionId }}.ttf_importance">
								                            </label>
								                        </div>
								                    </td>
								                @endfor                                     
								            </tr>
								            @if ($errors->has("questions.{$questionId}.ttf_capacity") || $errors->has("questions.{$questionId}.ttf_importance") || $errors->has("questions.{$questionId}.ttf_activity") || $errors->has("questions.{$questionId}.ttf_capability"))
	                                            <tr>
									                @error("questions.{$questionId}.ttf_activity")
									                	<td class="black-right">
									                        <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
									                	</td>
									                @enderror
									                @error("questions.{$questionId}.ttf_capability")
									                	<td class="black-right">
									                        <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
									                	</td>
									                @enderror
									            
	                                                @error("questions.{$questionId}.ttf_capacity")
	                                                    <td class="text-center black-right" colspan="3"><small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small></td>
	                                                @enderror

	                                                @error("questions.{$questionId}.ttf_importance")
	                                                    <td class="text-center" colspan="3"><small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small></td>
	                                                @enderror
	                                            </tr>
	                                        @endif
								            @php
								                $rowId++;
								                $questionId++;
								            @endphp
								        @endforeach
								    @endif
								@endforeach
				            </tbody>
				        </table>
			        </div>
		        </div>
	        </div>

	        <div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">2.2 Staffing of the <span data-toggle="tooltip" data-placement="top" title="The function (be it an individual(s), a dedicated office, a regional office etc.) that manages and performs the TECHNOLOGY TRANSFER ACTIVITIES at the institution.">TTF</span></h6>
			    </div>
			    <div class="card-body">

			    	@include('livewire.questionnaires.sections.section-2.staffing_ttf')

					<div class="form-group table-responsive">
						<table class="table table-bordered text-center section-2 black-border">
						    <thead>
						        <tr>
						            <th class="black-right black-bottom"></th>
						            <th class="black-right black-bottom"></th>
						            <th class="black-right black-bottom"></th>
						            <th class="black-right black-bottom"></th>
						            <th class="black-right black-bottom" colspan="2">Degree 1</th>
						            <th class="black-right black-bottom" colspan="2">Degree 2</th>
						            <th class="black-right black-bottom"></th>
						            <th class="black-right black-bottom"></th>
						            <th class="black-bottom" colspan="3">PLEASE SEE DEFINITION SECTION FOR <span data-toggle="tooltip" data-placement="top" title="An activity associated with the identification, documentation, evaluation, protection, marketing and commercialisation of technology, as well as IP management, in general.">TT</span>, <span data-toggle="tooltip" data-placement="top" title="A person or number of persons who collectively, fulfil a job function on a full-time basis for the period of a year.  ">FTE</span> AND OTHER FTE DEFINITIONS</th>
						        </tr>
						    </thead>
						    <tbody>
						        <tr>
						        	@foreach($staffingTtfList as $key => $value)
									    <th class="black-bottom @if(!in_array($key,[4,6,10,11])) black-right @endif">{!! $value !!}</th>
									@endforeach
						        </tr>
						        @if(isset($questions[$questionId]) && count($questions[$questionId]))
							        @foreach($questions[$questionId] as $index => $row)
						                <tr>
						                    <td class="black-right">
						                    	{{ $row['number'] }}
						                    </td>
						                    <td class="black-right">
						                    	{!! Form::select(
						                            'questions['.$questionId.']['.$index.'][type]', 
						                            ['' => 'Please Select'] + $staffingOfTheTtf, 
						                            null, 
						                            [
						                                'class' => 'form-control', 
						                                'data-question-id' => $questionId,
						                                'wire:model' => 'questions.'.$questionId.'.'.$index.'.type'
						                            ]
						                        ) !!}
								                @error("questions.$questionId.$index.type") <span class="text-danger">{{ $message }}</span> @enderror
								            </td>
								            <td class="black-right">
								            	{!! Form::select(
						                            'questions['.$questionId.']['.$index.'][gender]', 
						                            ['' => 'Please Select'] + $staffingOfTheTtfGender, 
						                            null, 
						                            [
						                                'class' => 'form-control', 
						                                'data-question-id' => $questionId,
						                                'wire:model' => 'questions.'.$questionId.'.'.$index.'.gender'
						                            ]
						                        ) !!}
								                @error("questions.$questionId.$index.gender") <span class="text-danger">{{ $message }}</span> @enderror
								            </td>
								            <td class="black-right">
								            	{!! Form::select(
						                            'questions['.$questionId.']['.$index.'][level]', 
						                            ['' => 'Please Select'] + $staffingOfTheTtfB, 
						                            null, 
						                            [
						                                'class' => 'form-control', 
						                                'data-question-id' => $questionId,
						                                'wire:model' => 'questions.'.$questionId.'.'.$index.'.level'
						                            ]
						                        ) !!}
								                @error("questions.$questionId.$index.level") <span class="text-danger">{{ $message }}</span> @enderror
								            </td>
								            <td>
								            	{!! Form::select(
						                            'questions['.$questionId.']['.$index.'][degree1]', 
						                            ['' => 'Please Select'] + $staffingOfTheTtfC, 
						                            null, 
						                            [
						                                'class' => 'form-control', 
						                                'data-question-id' => $questionId,
						                                'wire:model' => 'questions.'.$questionId.'.'.$index.'.degree1'
						                            ]
						                        ) !!}
								                @error("questions.$questionId.$index.degree1") <span class="text-danger">{{ $message }}</span> @enderror
								            </td>
								            <td class="black-right">
								            	{!! Form::select(
						                            'questions['.$questionId.']['.$index.'][subject1]', 
						                            ['' => 'Please Select'] + $staffingOfTheTtfD, 
						                            null, 
						                            [
						                                'class' => 'form-control', 
						                                'data-question-id' => $questionId,
						                                'wire:model' => 'questions.'.$questionId.'.'.$index.'.subject1'
						                            ]
						                        ) !!}
								                @error("questions.$questionId.$index.subject1") <span class="text-danger">{{ $message }}</span> @enderror
								            </td>
								            <td>
								            	{!! Form::select(
						                            'questions['.$questionId.']['.$index.'][degree2]', 
						                            ['' => 'Please Select'] + $staffingOfTheTtfC, 
						                            null, 
						                            [
						                                'class' => 'form-control', 
						                                'data-question-id' => $questionId,
						                                'wire:model' => 'questions.'.$questionId.'.'.$index.'.degree2'
						                            ]
						                        ) !!}
								                @error("questions.$questionId.$index.degree2") <span class="text-danger">{{ $message }}</span> @enderror
								            </td>
								            <td class="black-right">
								            	{!! Form::select(
						                            'questions['.$questionId.']['.$index.'][subject2]', 
						                            ['' => 'Please Select'] + $staffingOfTheTtfD, 
						                            null, 
						                            [
						                                'class' => 'form-control', 
						                                'data-question-id' => $questionId,
						                                'wire:model' => 'questions.'.$questionId.'.'.$index.'.subject2'
						                            ]
						                        ) !!}
								                @error("questions.$questionId.$index.subject2") <span class="text-danger">{{ $message }}</span> @enderror
								            </td>
								            <td class="black-right">
								            	{!! Form::select(
						                            'questions['.$questionId.']['.$index.'][title]', 
						                            ['' => 'Please Select'] + $staffingOfTheTtfE, 
						                            null, 
						                            [
						                                'class' => 'form-control', 
						                                'data-question-id' => $questionId,
						                                'wire:model' => 'questions.'.$questionId.'.'.$index.'.title'
						                            ]
						                        ) !!}
								                @error("questions.$questionId.$index.title") <span class="text-danger">{{ $message }}</span> @enderror
								            </td>
								            <td class="black-right">
								                <input type="text" oninput="formatNumber(this, 0)" wire:model="questions.{{$questionId}}.{{ $index }}.years" class="form-control number">
								                @error("questions.$questionId.$index.years") <span class="text-danger">{{ $message }}</span> @enderror
								            </td>
								            <td>
								                <input type="number" min="0" max="1" step="0.01" oninput="formatNumber(this, 1)" wire:model.defer="questions.{{$questionId}}.{{ $index }}.ttfFte" class="form-control number" wire:blur="updateFte({{$questionId}}, {{$index}})">
								                @error("questions.$questionId.$index.ttfFte") <span class="text-danger">{{ $message }}</span> @enderror
								            </td>
								            <td>
								                <input  type="number" min="0" max="1" step="0.01" oninput="formatNumber(this, 1)" wire:model.defer="questions.{{$questionId}}.{{ $index }}.otherFte" class="form-control number" wire:blur="updateFte({{$questionId}}, {{$index}})">
								                @error("questions.$questionId.$index.otherFte") <span class="text-danger">{{ $message }}</span> @enderror
								            </td>
								            <td>
								                <input  type="text" oninput="formatNumber(this, 1)" wire:model="questions.{{$questionId}}.{{ $index }}.totalFte" class="form-control number" readonly>
								            </td>
						                </tr>
						            @endforeach
						        @endif
						    </tbody>
						</table>
						<div class="text-right">
						    <button type="button" wire:click="addNewRow({{$questionId}})" class="btn btn-primary">Add Row</button>
						</div>
					</div>

					@php
					$extQuestionId = 264;
					@endphp
					<div class="form-group">
			            <label for="user_type" class="control-label"> Established Posts Vacant at 31 December 2023 :</br><small>(Please list each post title per row)</small></label>
			         
			            @if(isset($questions[$extQuestionId]) && count($questions[$extQuestionId]))
						    @foreach($questions[$extQuestionId] as $index => $row)
						        <input type="text" id="{{$extQuestionId}}" class="form-control mb-2" wire:model="questions.{{$extQuestionId}}.{{$index}}" placeholder="Please Enter">
						    @endforeach
						@else
						    <input type="text" id="fullname-0" class="form-control mb-2" wire:model="questions.{{$extQuestionId}}.0" placeholder="Please Enter">
						@endif
						<button type="button" wire:click="addEstablishedRow({{$extQuestionId}})" class="btn btn-primary">Add Row</button>

            			@error("questions.{$extQuestionId}")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror
			        </div>
				</div>
	        </div>
	        @php $questionId = 59; @endphp 
	        <div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">2.3 Indicate the total institutional <span data-toggle=tooltip data-placement=top title='The expenditure incurred in performing research and development (R&D) activities, whether funded by the institution that conducts the R&D, external funders, customers, public funding agencies or any other source. '>RESEARCH AND DEVELOPMENT EXPENDITURE</span> per annum (*estimate total allowed)</h6>
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
			        <h6 class="text-bold mb-0">2.4 Does your institution include:</h6>
			    </div>
			    <div class="card-body"> 
                    <div class="form-group">
                        <label for="medical_school" class="control-label">2.4.1 : A Medical school?</label>

                        {!! Form::select(
                            'questions['.$questionId.'][medical_school]', 
                            ['' => 'Please Select'] + $yesNo, 
                            null, 
                            [
                                'class' => 'form-control policy-select', 
                                'data-question-id' => $questionId,
                                'wire:model' => 'questions.'.$questionId.'.medical_school'
                            ]
                        ) !!}

                        @error("questions.{$questionId}.medical_school")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

                        @php 
	                        $questionIdMain = $questionId;
	                        $questionId++; 
	                    @endphp
                    </div>

                    <div class="additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['medical_school']) && $questions[$questionIdMain]['medical_school'] == 'Yes' ? '' : 'display: none;' }}">
	                	<div class="form-group">
	                        <label for="clinical_trials" class="control-label">2.4.2 : Conduct <span data-toggle=tooltip data-placement=top title='A systematic test conducted on human volunteers before a new drug, vaccine, device or treatment can be introduced into the market to ensure that it is both safe and effective and which test is approved by the South African Health Products Regulatory Authority (SAHPRA), including four standard phases, three of which take place before permission to manufacture is granted.'>CLINICAL TRIALS</span>?</label>

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
	                    	
	                    	<label class="control-label">2.4.2.1 : If yes, Please indicate institution’s expenditure on <span data-toggle=tooltip data-placement=top title='A systematic test conducted on human volunteers before a new drug, vaccine, device or treatment can be introduced into the market to ensure that it is both safe and effective and which test is approved by the South African Health Products Regulatory Authority (SAHPRA), including four standard phases, three of which take place before permission to manufacture is granted.'>CLINICAL TRIALS</span></label>

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
            </div>

            <div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">2.5 Indicate the expenditure on <span data-toggle="tooltip" data-placement="top" title="An activity associated with the identification, documentation, evaluation, protection, marketing and commercialisation of technology, as well as IP management, in general.">TECHNOLOGY TRANSFER ACTIVITIES</span></h6>
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
			        <h6 class="text-bold mb-0">2.6 Indicate the amount received in any <span data-toggle=tooltip data-placement=top title='A LICENCE, OPTION or ASSIGNMENT or combination of these as applicable that is executed with the purpose of commercialising IP. '>IP TRANSACTION</span>, as an <span data-toggle=tooltip data-placement=top title='An amount recouped by or paid to an institution, from another party to an IP TRANSACTION, which amount is used or earmarked for use as IP EXPENDITURE'>IP EXPENSE REIMBURSEMENT</span></h6>
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
			        <h6 class="text-bold mb-0">2.7 Does your institution have access to SEED FUNDING?</h6>
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

                    	<label for="clinical_trials" class="control-label">2.7.1 If yes, Please complete the table below on the amount and sources of <span data-toggle=tooltip data-placement=top title='Funding provided to support early-stage development of IP in the early-stages or post proof of concept (Technology Readiness Level (TRL) 3 to 5), to assist the recipient of the funds to achieve critical development milestones, to attract further funding.'>SEED FUNDING</span> awarded. </br><small class="text-danger">Note : Please confirm the amount once you have typed it.</small></label>

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
						                    	<input class="form-control" oninput="formatNumber(this)" type="text" wire:model="questions.{{ $questionId }}.{{$year}}" @if($loop->parent->last) readonly @else wire:blur="updateSeedFundingList({{$year}})" @endif>

						                    	@error("questions.{$questionId}.{$year}")
						                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
						                        @enderror
						                    </td>
						                @endforeach                                    
						            </tr>
						            @php $questionId++; @endphp
								@endforeach

			                    <tr>
			                        <th>2.7.1.4 Please list the source/s of other SEED FUNDING (if applicable):</th>
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
			        <h6 class="text-bold mb-0">2.8 Indicate in the table below whether your institution requires additional funding beyond the funds expected (i.e. from either anticipated internal budget allocation or external funder commitment) for the next two financial years (2025 and 2026 calendar years for HEIs and 2025/2026 and 2026/2027 for Schedule 1 institutions) for the listed funding types or categories.</h6>
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
				                                        <label for="funding-{{ $rowId }}-{{ $i }}">
				                                            <input id="funding-{{ $rowId }}-{{ $i }}" type="radio" value="{{ $i }}" wire:model="questions.{{ $questionId }}">
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