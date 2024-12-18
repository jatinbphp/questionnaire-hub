<form wire:submit.prevent="store">
	<input type="hidden" wire:model="submit_type">
	<div class="card card-info">
	    <div class="card-header">
	        <h6 class="text-bold mb-0">
	        	SECTION 3A: IP PORTFOLIO (ONLY IPR ACT RELATED IP)
	        	@include('common.questionnaires_status', ['completedStatus' => $completedStatus])
	        </h6>
	    </div>
	    <div class="card-body"> 
	    	@php $questionId = 86; @endphp

           	<div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">3.1 ACTIONABLE DISCLOSURES</h6>
			    </div>
			    <div class="card-body"> 
			        <div class="form-group">
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
			                    @foreach ($actionableDisclosuresList as $key => $value)
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
			    </div>
			</div>

           	<div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">3.2 Does your institution have a Patent Portfolio?</h6>
			    </div>
			    <div class="card-body"> 
                    <div class="form-group">
                        {!! Form::select(
                            'questions['.$questionId.'][patent_portfolio]', 
                            ['' => 'Please Select'] + $yesNo, 
                            null, 
                            [
                                'class' => 'form-control policy-select', 
                                'data-question-id' => $questionId,
                                'wire:model' => 'questions.'.$questionId.'.patent_portfolio'
                            ]
                        ) !!}

                        @error("questions.{$questionId}.patent_portfolio")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

                        @php 
                            $questionIdMain = $questionId;
                            $questionId++; 
                        @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['patent_portfolio']) && $questions[$questionIdMain]['patent_portfolio'] == 'Yes' ? '' : 'display: none;' }}">
                        
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
								@foreach($patentPortfolioList as $key => $value)
								    <tr bgcolor="{{($key == 1) ? '#f4f6f9' : ''}}">
								        <th>{!! $value !!}</th>
								        @foreach (getYears() as $year)
								            <td>
								            	@if ($key != 1)
									                <input class="form-control" oninput="formatNumber(this)" type="text" wire:model="questions.{{ $questionId }}.{{ $year }}" @if(!in_array($key,[0])) wire:blur="updateParentPortfolioTotal({{$year}})" @endif @if($key==0) readonly @endif>
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

                    <div class="form-group">
                        <label class="control-label">3.2.2 In the review period, 2019 to 2023, has your institution abandoned any <span data-toggle=tooltip data-placement=top title='A first application for a patent that does not claim priority from any other application.'>NEW PATENT APPLICATIONS</span>?</label>

                        {!! Form::select(
                            'questions['.$questionId.'][patent_applications]', 
                            ['' => 'Please Select'] + $yesNo, 
                            null, 
                            [
                                'class' => 'form-control policy-select', 
                                'data-question-id' => $questionId,
                                'wire:model' => 'questions.'.$questionId.'.patent_applications'
                            ]
                        ) !!}

                        @error("questions.{$questionId}.patent_applications")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

                        @php 
                            $questionIdMain = $questionId;
                            $questionId++; 
                        @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['patent_applications']) && $questions[$questionIdMain]['patent_applications'] == 'Yes' ? '' : 'display: none;' }}">
                        
			            <table class="table table-bordered full-borader">
			                <thead>
			                    <tr>
			                        <th>Reason</th>
			                        <th>Number of <span data-toggle=tooltip data-placement=top title='A first application for a patent that does not claim priority from any other application.'>NEW PATENT APPLICATIONS</span> abandoned for this reason (Enter 0 if not applicable)</th>
			                    </tr>
			                </thead>
			                <tbody>
				                @if(count($patentApplicationsReasonsList) > 0)
				                    @foreach($patentApplicationsReasonsList as $index => $reasons)
				                        <tr>
					                        <th>{!! $reasons !!}</th>
			                                <td>
			                                	<input class="form-control" oninput="formatNumber(this)" type="text" wire:model="questions.{{ $questionId }}">
	                                            @error("questions.{$questionId}")
						                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
						                        @enderror
			                                </td>
					                    </tr>
				                        @php $questionId++; @endphp
				                    @endforeach
				                @endif
			                </tbody>
			            </table>
                    </div>

                    <div class="form-group">
		            	<label for="patent_applications" class="control-label">3.2.3 Indicate in the table below the total number of <span data-toggle=tooltip data-placement=top title='A patent in respect of an invention that has been granted in any territory.'>GRANTED PATENTS</span> for the period 2019 to 2023.</label>
		                <ul>
		                    <li>3.2.3.1 Of the total number of <span data-toggle=tooltip data-placement=top title='A patent in respect of an invention that has been granted in any territory.'>GRANTED PATENTS</span>, please specify the number granted in each region or country listed below. For each region, count each individual member state or country where a patent was granted or validated as a separate granted right.</li>
		                </ul>

		                <label for="patent_applications" class="control-label"> <i>For example: ARIPO Member States: Count each individual ARIPO member state where a patent was granted as a separate granted right. This includes patents granted through ARIPO filings and also patents granted via direct filings in any ARIPO member state (e.g. Kenya).</i></br><small class="text-danger">Note : Please confirm the amount once you have typed it.</small></label>           
			      
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
								@foreach($patentsGrantedList as $key => $value)
									<tr bgcolor="{{($key == 1) ? '#f4f6f9' : ''}}">
								        <th>{!! $value !!}</th>
								        @foreach (getYears() as $year)
								            <td>
								            	@if ($key != 1)
									                <input class="form-control" oninput="formatNumber(this)" type="text" wire:model="questions.{{ $questionId }}.{{ $year }}" @if(!in_array($key,[0])) wire:blur="updatePatentsGrantedTotal({{$year}})" @endif @if($key==0) readonly @endif>
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

		            <div class="form-group">
		            	<label class="control-label">3.2.4 PATENT FAMILY(/IES)</label>
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
			                    @foreach ($patentFamilyList as $key => $value)
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
		            	<label class="control-label">3.2.5 Single-Jurisdiction Patents</label>
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
			                    @foreach ($singleJurisdictionPatentsList as $key => $value)
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
	            </div>
           	</div>

           	<div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">3.3 Does your institution have a <span data-toggle=tooltip data-placement=top title='A mark associated with a product/service resulting from R&D, that can be used in the course of trade to distinguish that product/service from those offered by other vendors.'>TRADE MARK</span> Portfolio for products/services associated with IP?</h6>
			    </div>
			    <div class="card-body"> 
                    <div class="form-group">
                        {!! Form::select(
                            'questions['.$questionId.'][trademark_portfolio]', 
                            ['' => 'Please Select'] + $yesNo, 
                            null, 
                            [
                                'class' => 'form-control policy-select', 
                                'data-question-id' => $questionId,
                                'wire:model' => 'questions.'.$questionId.'.trademark_portfolio'
                            ]
                        ) !!}

                        @error("questions.{$questionId}.trademark_portfolio")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

                        @php 
                            $questionIdMain = $questionId;
                            $questionId++; 
                        @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['trademark_portfolio']) && $questions[$questionIdMain]['trademark_portfolio'] == 'Yes' ? '' : 'display: none;' }}">
                        
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
			                    @foreach ($tradeMarkPortfolioList as $key => $value)
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
                </div>
            </div>
            
            <div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">3.4 Does your institution have a <span data-toggle=tooltip data-placement=top title='A design can be registered to protect the distinctive appearance of a product, including its shape, configuration, pattern or ornamentation, provided it is new and original. '>DESIGN</span> Portfolio?</h6>
			    </div>
			    <div class="card-body"> 
                    <div class="form-group">
                        {!! Form::select(
                            'questions['.$questionId.'][design_portfolio]', 
                            ['' => 'Please Select'] + $yesNo, 
                            null, 
                            [
                                'class' => 'form-control policy-select', 
                                'data-question-id' => $questionId,
                                'wire:model' => 'questions.'.$questionId.'.design_portfolio'
                            ]
                        ) !!}

                        @error("questions.{$questionId}.design_portfolio")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

                        @php 
                            $questionIdMain = $questionId;
                            $questionId++; 
                        @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['design_portfolio']) && $questions[$questionIdMain]['design_portfolio'] == 'Yes' ? '' : 'display: none;' }}">
                        
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
			                    @foreach ($designPortfolioList as $key => $value)
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
                </div>
            </div>
  	
  			<div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">3.5 Does your institution have a <span data-toggle=tooltip data-placement=top title='A registration of a plant breeders’ right that has been granted in any territory.'>PLANT BREEDERS RIGHTS</span> Portfolio?</h6>
			    </div>
			    <div class="card-body"> 
                    <div class="form-group">
                        {!! Form::select(
                            'questions['.$questionId.'][rights_portfolio]', 
                            ['' => 'Please Select'] + $yesNo, 
                            null, 
                            [
                                'class' => 'form-control policy-select', 
                                'data-question-id' => $questionId,
                                'wire:model' => 'questions.'.$questionId.'.rights_portfolio'
                            ]
                        ) !!}

                        @error("questions.{$questionId}.rights_portfolio")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

                        @php 
                            $questionIdMain = $questionId;
                            $questionId++; 
                        @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['rights_portfolio']) && $questions[$questionIdMain]['rights_portfolio'] == 'Yes' ? '' : 'display: none;' }}">
                        
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
			                    @foreach ($plantBreedersList as $key => $value)
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
                </div>
            </div>
	    </div>
	    <div class="card-footer">
	    	@include('common.footer-buttons', ['route' => route('user.list'), 'type' => 'create', 'is_hide_back' => 1])
	    </div>
	</div>
</form>