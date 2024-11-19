<form wire:submit.prevent="store">
	<input type="hidden" wire:model="submit_type">
	<div class="card card-info">
	    <div class="card-header">
	        <h6 class="text-bold mb-0">
	        	SECTION 5: IP IMPACT
	        	@include('common.questionnaires_status', ['completedStatus' => $completedStatus])
	        </h6>
	    </div>
	    <div class="card-body"> 
	    	@php $questionId = 221; @endphp

			<p>This section deals with your full IP portfolio – i.e. both within and outside of the IPR Act.</p>

			<div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">5.1 Have any <span data-toggle="tooltip" data-placement="top" title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span> been formed to commercialise an <span data-toggle="tooltip" data-placement="top" title="A disclosure of IP which is reportable to NIPMO on an IP7 Form as described by NIPMO in Practice Note 5. ">ACTIONABLE DISCLOSURES</span> and <span data-toggle="tooltip" data-placement="top" title="Falling outside the scope of the IPR ACT.">NON-IPR ACT</span> disclosures during the reporting period 2019 to 2023?</h6>
			    </div>
			    <div class="card-body"> 
			    	<div class="form-group">
                        {!! Form::select(
                            'questions['.$questionId.'][actionable_disclosure_5_1]', 
                            ['' => 'Please Select'] + $yes_no, 
                            null, 
                            [
                                'class' => 'form-control policy-select', 
                                'data-question-id' => $questionId,
                                'wire:model' => 'questions.'.$questionId.'.actionable_disclosure_5_1'
                            ]
                        ) !!}

                        @error("questions.{$questionId}.actionable_disclosure_5_1")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

                        @php 
	                        $questionIdMain = $questionId;
	                        $questionId++; 
	                    @endphp
                    </div>

			    	<div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['actionable_disclosure_5_1']) && $questions[$questionIdMain]['actionable_disclosure_5_1'] == 'Yes' ? '' : 'display: none;' }}">
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
			                    @foreach ($nonActionableDisclosureList as $key => $value)
			                    	<tr bgcolor="{{($key == 1) ? '#f4f6f9' : ''}}">
								        <th>{!! $value !!}</th>
								        @foreach (getYears() as $year)
								            <td>
								            	@if ($key != 1)
									                <input class="form-control" oninput="formatNumber(this)" type="text" wire:model="questions.{{ $questionId }}.{{ $year }}">
									                @error("questions.{$questionId}.{$year}")
							                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
							                        @enderror
									            @endif
									        </td>
								        @endforeach
								    </tr>

								    @if($key!=1)
								    	@php $questionId++; @endphp
								    @endif
			                    @endforeach
			                </tbody>
			            </table>
		            </div>

		            <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['actionable_disclosure_5_1']) && $questions[$questionIdMain]['actionable_disclosure_5_1'] == 'Yes' ? '' : 'display: none;' }}">
		            	<table class="table table-bordered full-borader">
			                <thead>
			                    <tr>
			                        <th></th>
			                        <th>Type</th>
			                        @foreach (getYears() as $year)
					                    <th>{{ $year }} (R)</th>
					                @endforeach
			                    </tr>
			                </thead>
			                <tbody>
			                    @foreach ($revenueList as $key => $value)
			                        <tr>
			                            <th>{!! $value !!}</th>
			                            <th>
			                            	{!! Form::select(
                                                "questions[{$questionId}][type]", 
                                                ['' => 'Please Select'] + $totalAnnualRevenueType, 
                                                null, 
                                                [
                                                    'class' => 'form-control', 
                                                    'data-question-id' => $questionId,
                                                    'wire:model' => 'questions.'.$questionId.'.type'
                                                ]
                                            ) !!}

                                            @error("questions.232.type")
					                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
					                        @enderror
			                            </th>
			                            @foreach (getYears() as $year)
			                                <td>
			                                    <input class="form-control" oninput="formatNumber(this)" type="text" wire:model="questions.{{ $questionId }}.{{ $year }}">
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

		            <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['actionable_disclosure_5_1']) && $questions[$questionIdMain]['actionable_disclosure_5_1'] == 'Yes' ? '' : 'display: none;' }}">
		            	<label class="control-label">5.8. Please provide the total revenue received by your institution from <span data-toggle="tooltip" data-placement="top" title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span>:</label>

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
			                    @foreach ($revenueReceivedList as $key => $value)
			                        <tr>
			                            <th>{!! $value !!}</th>
			                            @foreach (getYears() as $year)
			                                <td>
			                                    <input class="form-control" oninput="formatNumber(this)" type="text" wire:model="questions.{{ $questionId }}.{{ $year }}">
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
                    
                    <div class="form-group">
		            	<label class="control-label">5.9. Have any <span data-toggle="tooltip" data-placement="top" title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span> been formed to commercialise an <span data-toggle="tooltip" data-placement="top" title="A disclosure of IP which is reportable to NIPMO on an IP7 Form as described by NIPMO in Practice Note 5. ">ACTIONABLE DISCLOSURES</span> and <span data-toggle="tooltip" data-placement="top" title="A DISCLOSURE of NON-IPR ACT IP, which does not need to be reported to NIPMO by the institution.">NON-IPR ACT DISCLOSURES</span> since 2008?</label>

                        {!! Form::select(
                            'questions['.$questionId.'][actionable_disclosure_5_9]', 
                            ['' => 'Please Select'] + $yes_no, 
                            null, 
                            [
                                'class' => 'form-control policy-select', 
                                'data-question-id' => $questionId,
                                'wire:model' => 'questions.'.$questionId.'.actionable_disclosure_5_9'
                            ]
                        ) !!}

                        @error("questions.{$questionId}.actionable_disclosure_5_9")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

                        @php 
	                        $questionIdMain = $questionId;
	                        $questionId++; 
	                    @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['actionable_disclosure_5_9']) && $questions[$questionIdMain]['actionable_disclosure_5_9'] == 'Yes' ? '' : 'display: none;' }}">
		            	<table class="table table-bordered full-borader">
			                <thead>
			                    <tr>
			                        <th></th>
			                        <th colspan="5">2008 to 2023</th>
			                    </tr>
			                </thead>
			                <tbody>
					           	@foreach ($nonIprActActionableDisclosuresList as $key => $value)
					           		<tr bgcolor="{{($key == 1) ? '#f4f6f9' : ''}}">
								        <th>{!! $value !!}</th>
							            <td colspan="5">
							            	@if ($key != 1)
								                <input class="form-control" oninput="formatNumber(this)" type="text" wire:model="questions.{{ $questionId }}">
								                @error("questions.{$questionId}")
						                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
						                        @enderror
								            @endif
								        </td>
								    </tr>

								    @if($key!=1)
								    	@php $questionId++; @endphp
								    @endif
			                    @endforeach

			                    <tr>
			                        <td></td>
			                        @foreach (getYears() as $year)
					                    <th>{{ $year }}</th>
					                @endforeach
			                    </tr>

			                    @foreach ($nonIprActActionableDisclosuresSecondList as $key => $value)
			                    	<tr>
			                            <th>{!! $value !!}</th>
			                            @foreach (getYears() as $year)
			                                <td>
			                                    <input class="form-control" oninput="formatNumber(this)" type="text" wire:model="questions.{{ $questionId }}.{{ $year }}">
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
                   

                    <div class="form-group">
		            	<label class="control-label">5.14. Did any product or service based on a <span data-toggle="tooltip" data-placement="top" title="A written disclosure of potential IP that is reported to the TTF  for evaluation by the TTF and for which, if warranted IP protection will be sought.  If governed by the IPR Act these are referred to as ACTIONABLE DISCLOSURES.">DISCLOSURE</span> (or that used a process in a <span data-toggle="tooltip" data-placement="top" title="A written disclosure of potential IP that is reported to the TTF  for evaluation by the TTF and for which, if warranted IP protection will be sought.  If governed by the IPR Act these are referred to as ACTIONABLE DISCLOSURES.">DISCLOSURE</span>) enter commercial use (i.e. product or service sold) during the period 2019 to 2023?</label>

                        {!! Form::select(
                            'questions['.$questionId.'][actionable_disclosure_5_14]', 
                            ['' => 'Please Select'] + $yes_no, 
                            null, 
                            [
                                'class' => 'form-control policy-select', 
                                'data-question-id' => $questionId,
                                'wire:model' => 'questions.'.$questionId.'.actionable_disclosure_5_14'
                            ]
                        ) !!}

                        @error("questions.{$questionId}.actionable_disclosure_5_14")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

                        @php 
	                        $questionIdMain = $questionId;
	                        $questionId++; 
	                    @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['actionable_disclosure_5_14']) && $questions[$questionIdMain]['actionable_disclosure_5_14'] == 'Yes' ? '' : 'display: none;' }}">
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
					           	@foreach ($runnningRoyaltiesList as $key => $value)
					           		<tr bgcolor="{{($key == 1) ? '#f4f6f9' : ''}}">
								        <th>{!! $value !!}</th>
								        @foreach (getYears() as $year)
								            <td>
								            	@if ($key != 1)
									                <input class="form-control" oninput="formatNumber(this)" type="text" wire:model="questions.{{ $questionId }}.{{ $year }}">
									                @error("questions.{$questionId}.{$year}")
							                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
							                        @enderror
									            @endif
									        </td>
								        @endforeach
								    </tr>

								    @if($key!=1)
								    	@php $questionId++; @endphp
								    @endif
			                    @endforeach
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