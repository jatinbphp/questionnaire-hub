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
			        <h6 class="text-bold mb-0">2.1 For each of the following key TTF activities, please</h6>
			    </div>
			    <div class="card-body">  
			    	<div class="form-group">   
			            <ul class="list-unstyled">
		                    <li>2.1.1 Please select in drop down box whether TTA is Undertaken by TTF, Outsourced by TTF, Not done, or Done elsewhere in institution</li>
		                    <li>2.1.2 Whether the TTF has the capability (having required skills and knowledge) to undertake the activity?</li>
		                    <li>2.1.3 Select an option to indicate the extent of the capacity (consider factors such as workload, efficient IT systems, etc., that may impact capacity despite having the capability) within the TTF to undertake the activity.</li>
		                    <li>2.1.4 Rate the importance of the activity in achieving TECHNOLOGY TRANSFER goals at your institution.</li>
		                </ul>
				        <table class="table table-bordered black-border">
				            <thead>
				                <tr>
				                    <th rowspan="2" class="text-center black-bottom black-right">TECHNOLOGY TRANSFER ACTIVITY (TTA)</th>
				                    <th rowspan="2" class="text-center black-bottom black-right">2.1.1 Activity</th>
				                    <th rowspan="2" class="text-center black-bottom black-right">2.1.2 TTF Capability</th>
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
								    $greenTick = '<img src="' . URL::asset('assets/dist/img/check-mark-2-24.png') . '">';
								@endphp

								@foreach($ipManagementTasksList as $category => $tasks)
								    @if(count($tasks) > 0)
								        <tr bgcolor="#f4f6f9">
								            <th colspan="9" class="black-bottom black-top">{{$category}}</th>
								        </tr>
								        @foreach($tasks as $index => $task)
								            <tr>
								                <th class="black-right">{{ $task }}</th>
								                <td class="black-right text-center">
								                	@if(isset($questions[$questionId]['ttf_activity'])) 
							                            {{$ttf_activities[$questions[$questionId]['ttf_activity']]}}
							                        @endif
								                </td>
								                
								                <td class="black-right text-center">
								                	@if(isset($questions[$questionId]['ttf_capability']) && !empty($questions[$questionId]['ttf_capability'])) 
							                            {{$yesNo[$questions[$questionId]['ttf_capability']]}}
							                        @endif
								                </td>

								                @for ($i = 1; $i <= 3; $i++)
								                    <td class="text-center @if($i==3) black-right @endif">
								                    	@if(isset($questions[$questionId]['ttf_capacity'])) 
                                                            @if($questions[$questionId]['ttf_capacity']==$i)
                                                                {!!$greenTick!!}
                                                            @endif 
                                                        @endif
								                    </td>
								                @endfor

								                @for ($i = 4; $i <= 6; $i++)
								                    <td class="text-center">
								                    	@if(isset($questions[$questionId]['ttf_importance'])) 
                                                            @if($questions[$questionId]['ttf_importance']==$i)
                                                                {!!$greenTick!!}
                                                            @endif 
                                                        @endif
								                    </td>
								                @endfor                                     
								            </tr>

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
			        <h6 class="text-bold mb-0">2.2 Staffing of the TTF</h6>
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
						            <th class="black-bottom" colspan="3">PLEASE SEE DEFINITION SECTION FOR TT FTE AND OTHER FTE DEFINITIONS</th>
						        </tr>
						    </thead>
						    <tbody>
						        <tr>
						        	@foreach($staffingTtfList as $key => $value)
									    <th class="black-bottom @if(!in_array($key,[4,6,10,11])) black-right @endif">{{$value}}</th>
									@endforeach
						        </tr>
						        @if(isset($questions[$questionId]) && count($questions[$questionId]))
							        @foreach($questions[$questionId] as $index => $row)
						                <tr>
						                    <td class="black-right text-center">
						                    	{{ $row['number'] }}
						                    </td>
						                    <td class="black-right text-center">
						                    	@if(isset($questions[$questionId][$index]['type'])) 
						                            {{ $staffingOfTheTtf[$questions[$questionId][$index]['type']] ?? '' }}
						                        @endif
								            </td>
								            <td class="black-right text-center">
								            	@if(isset($questions[$questionId][$index]['gender'])) 
						                            {{ $staffingOfTheTtfGender[$questions[$questionId][$index]['gender']] ?? '' }}
						                        @endif
								            </td>
								            <td class="black-right text-center">
								            	@if(isset($questions[$questionId][$index]['level'])) 
						                            {{ $staffingOfTheTtfB[$questions[$questionId][$index]['level']] ?? '' }}
						                        @endif
								            </td>
								            <td>
								            	@if(isset($questions[$questionId][$index]['degree1'])) 
								            		{{ $staffingOfTheTtfC[$questions[$questionId][$index]['degree1']] ?? '' }}
						                        @endif
								            </td>
								            <td class="black-right text-center">
								            	@if(isset($questions[$questionId][$index]['subject1'])) 
								            		{{ $staffingOfTheTtfD[$questions[$questionId][$index]['subject1']] ?? '' }}
						                        @endif
								            </td>
								            <td>
								            	@if(isset($questions[$questionId][$index]['degree2'])) 
								            		{{ $staffingOfTheTtfC[$questions[$questionId][$index]['degree2']] ?? '' }}
						                        @endif
								            </td>
								            <td class="black-right text-center">
								            	@if(isset($questions[$questionId][$index]['subject2'])) 
						                            {{ $staffingOfTheTtfD[$questions[$questionId][$index]['subject2']] ?? '' }}
						                        @endif
								            </td>
								            <td class="black-right text-center">
								            	@if(isset($questions[$questionId][$index]['title'])) 
						                            {{ $staffingOfTheTtfE[$questions[$questionId][$index]['title']] ?? '' }}
						                        @endif
								            </td>
								            <td class="black-right text-center">
								            	@if(isset($questions[$questionId][$index]['years'])) 
						                            {{ $questions[$questionId][$index]['years'] ?? '' }}
						                        @endif
								            </td>
								            <td>
								            	@if(isset($questions[$questionId][$index]['ttfFte'])) 
						                            {{$questions[$questionId][$index]['otherFte']}}
						                        @endif
								            </td>
								            <td>
								            	@if(isset($questions[$questionId][$index]['otherFte'])) 
						                            {{$questions[$questionId][$index]['otherFte']}}
						                        @endif
								            </td>
								            <td>
								            	@if(isset($questions[$questionId][$index]['totalFte'])) 
						                            {{$questions[$questionId][$index]['totalFte']}}
						                        @endif
								            </td>
						                </tr>
						            @endforeach
						        @endif
						    </tbody>
						</table>
					</div>
					@php $extQuestionId = 264; @endphp
					<div class="form-group">
                        <label for="user_type" class="control-label"> Established Posts Vacant at 31 December 2023 :</br><small>(Please list each post title per row)</small></label></br>

                        @if(isset($questions[$extQuestionId]) && count($questions[$extQuestionId]))
						    @foreach($questions[$extQuestionId] as $index => $row)
						        @if(isset($row) && !empty($row)) 
		                            - {{$row}}<hr class="m-1 p-1">
		                        @endif
						    @endforeach
						@else
						    -
						@endif
                    </div>
				</div>
	        </div>
	        @php $questionId = 59; @endphp
	        <div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">2.3 Indicate the total institutional RESEARCH AND DEVELOPMENT EXPENDITURE per annum (*estimate total allowed)</h6>
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
						                    <td class="text-center">
						                    	@if(isset($questions[$questionId][$year]))
                                                    {{$questions[$questionId][$year]}}
                                                @endif 
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
                        <label for="medical_school" class="control-label w-100">2.4.1 : A Medical school?</label>

                        @if(isset($questions[$questionId]['medical_school']) && !empty($questions[$questionId]['medical_school'])) 
                            {{$yesNo[$questions[$questionId]['medical_school']]}}
                        @endif

                        @php 
                            $questionIdMain = $questionId;
                            $questionId++; 
                        @endphp
                    </div>

                    <div class="additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['medical_school']) && $questions[$questionIdMain]['medical_school'] == 'Yes' ? '' : 'display: none;' }}">
	                    <div class="form-group">
	                        <label for="clinical_trials" class="control-label w-100">2.4.2 : Conduct CLINICAL TRIALS?</label>

	                        @if(isset($questions[$questionId]['clinical_trials']) && !empty($questions[$questionId]['clinical_trials'])) 
	                            {{$yesNo[$questions[$questionId]['clinical_trials']]}}
	                        @endif

	                        @php 
	                            $questionIdMain = $questionId;
	                            $questionId++; 
	                        @endphp
	                    </div>

	                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['clinical_trials']) && $questions[$questionIdMain]['clinical_trials'] == 'Yes' ? '' : 'display: none;' }}">
	                    	
	                    	<label class="control-label w-100">2.4.2.1 : If yes, Please indicate institution’s expenditure on CLINICAL TRIALS</label>

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
							                    	@if(isset($questions[$questionId][$year]))
	                                                    {{$questions[$questionId][$year]}}
	                                                @endif
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
			        <h6 class="text-bold mb-0">2.5 Indicate the expenditure on TECHNOLOGY TRANSFER ACTIVITIES</h6>
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
						                    	@if(isset($questions[$questionId][$year]))
                                                    {{$questions[$questionId][$year]}}
                                                @endif
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
			        <h6 class="text-bold mb-0">2.6 Indicate the amount received in any IP TRANSACTION, as an IP EXPENSE REIMBURSEMENT</h6>
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
						                    	@if(isset($questions[$questionId][$year]))
	                                                {{$questions[$questionId][$year]}}
	                                            @endif
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
                    	@if(isset($questions[$questionId]['seed_funding']) && !empty($questions[$questionId]['seed_funding'])) 
                            {{$yesNo[$questions[$questionId]['seed_funding']]}}
                        @endif

                        @php 
	                        $questionIdMain = $questionId;
	                        $questionId++; 
	                    @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['seed_funding']) && $questions[$questionIdMain]['seed_funding'] == 'Yes' ? '' : 'display: none;' }}">

                    	<label for="clinical_trials" class="control-label w-100">2.7.1 If yes, Please complete the table below on the amount and sources of SEED FUNDING awarded.</label>

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
						                    	@if(isset($questions[$questionId][$year]))
	                                                {{$questions[$questionId][$year]}}
	                                            @endif
						                    </td>
						                @endforeach                                    
						            </tr>
						            @php $questionId++; @endphp
								@endforeach

			                    <tr>
			                        <th>2.7.1.4 Please list the source/s of other SEED FUNDING (if applicable):</th>
			                        <td colspan="5">
			                        	@if(isset($questions[$questionId]))
                                            {{$questions[$questionId]}}
                                        @endif
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
					                        <th class="black-right">{{$value}}</th>

					                        @for ($i = 1; $i <= 6; $i++)
				                                <td class="text-center">
				                                	@if(isset($questions[$questionId])) 
                                                        @if($questions[$questionId]==$i)
                                                            {!!$greenTick!!}
                                                        @endif 
                                                    @endif
				                                </td>
				                            @endfor
					                    </tr>
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
	</div>
</form>