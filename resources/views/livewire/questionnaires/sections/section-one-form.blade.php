<form wire:submit.prevent="store">
    <input type="hidden" wire:model="submit_type">
    <div class="card card-info">
        <div class="card-header">
            <h6 class="text-bold mb-0">
                SECTION 1: TECHNOLOGY TRANSFER INSTITUTIONAL LANDSCAPE
                @include('common.questionnaires_status', ['completedStatus' => $completedStatus])
            </h6>
        </div>
        <div class="card-body"> 
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h6 class="text-bold mb-0">1.1 Factors of <span data-toggle="tooltip" data-placement="top" title="An activity associated with the identification, documentation, evaluation, protection, marketing and commercialisation of technology, as well as IP management, in general.">TECHNOLOGY TRANSFER</span>: Please rate the importance, as well as the extent to which these factors are present and functioning within your institution and environment</h6>
                </div>
                <div class="card-body"> 
                    <div class="form-group">
                        <table class="table table-bordered black-border">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="black-bottom"></th>
                                    <th colspan="3" class="text-center black-bottom black-right black-left">Importance</th>
                                    <th colspan="3" class="text-center black-bottom">Present and Functioning</th>
                                </tr>
                                <tr>
                                    <th class="text-center black-bottom black-left">Not Important</th>
                                    <th class="text-center black-bottom">Moderately Important</th>
                                    <th class="text-center black-bottom">Very Important</th>
                                    <th class="text-center black-bottom black-left">Not Present</th>
                                    <th class="text-center black-bottom">Partially Functioning</th>
                                    <th class="text-center black-bottom">Functioning Effectively</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @php
                                    $rowId = 1;
                                    $questionId = 1;
                                @endphp

                                @foreach($factorsList as $key => $value)
                                    @if(count($value) > 0)
                                        <tr bgcolor="#f4f6f9">
                                            <th colspan="9" class="black-top black-bottom">{!!$key!!}</th>
                                        </tr>
                                        @foreach($value as $key_factor => $factor)
                                            <tr>
                                                <th class="black-right" @if ($errors->has("questions.{$questionId}.importance") || $errors->has("questions.{$questionId}.present")) rowspan="2" @endif>
                                                    {!! $factor !!}<br>
                                                </th>

                                                @for ($i = 1; $i <= 3; $i++)
                                                    <td class="text-center align-middle @if($i==3) black-right @endif" @if (!$errors->has("questions.{$questionId}.importance") && $errors->has("questions.{$questionId}.present")) rowspan="2" @endif>
                                                        <div class="radio-wrapper">
                                                            <label for="example-{{ $rowId }}-{{ $i }}">
                                                                <input id="example-{{ $rowId }}-{{ $i }}" type="radio" value="{{ $i }}" wire:model="questions.{{ $questionId }}.importance">
                                                            </label>
                                                        </div>
                                                    </td>
                                                @endfor

                                                @for ($i = 4; $i <= 6; $i++)
                                                    <td class="text-center align-middle" @if (!$errors->has("questions.{$questionId}.present") && $errors->has("questions.{$questionId}.importance")) rowspan="2" @endif>
                                                        <div class="radio-wrapper">
                                                            <label for="example-{{ $rowId }}-{{ $i }}">
                                                                <input id="example-{{ $rowId }}-{{ $i }}" type="radio" value="{{ $i }}" wire:model="questions.{{ $questionId }}.present">
                                                            </label>
                                                        </div>
                                                    </td>
                                                @endfor                                    
                                            </tr>

                                            @if ($errors->has("questions.{$questionId}.importance") || $errors->has("questions.{$questionId}.present"))
                                                <tr>
                                                    @error("questions.{$questionId}.importance")
                                                        <td class="text-center" colspan="3"><small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small></td>
                                                    @enderror

                                                    @error("questions.{$questionId}.present")
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
                    <h6 class="text-bold mb-0">1.2 Does your institution have a policy or guideline that addresses the following aspects/ provisions?</h6>
                </div>
                <div class="card-body"> 
                    <div class="form-group">
                        <ul class="list-unstyled">
                            <li>1.2.1 Please select in drop down box: Policy in place, Guideline in place, or No policy or guideline in place.</li>
                            <li>1.2.2 If Policy or Guideline is in place, please answer:</li>
                            <li>
                                <ul class="list-unstyled" style="padding-left: 20px;">
                                    <ll class="d-block">1.2.2.1 Is the relevant policy or guideline approved by the Board/Council?</ll>
                                    <ll class="d-block">1.2.2.2 Is the policy/ guideline broadly adopted and in use?</ll>
                                    <ll class="d-block">1.2.2.3 Is the policy/ guideline adequate or effective?</ll>
                                </ul>
                            </li>
                        </ul>

                        <p>Note: The listed aspects or provisions could all be within the same policy or guideline document</p>
                    
                        <table class="table table-bordered full-borader">
                            <thead>
                                <tr>
                                    <th class="text-center">Aspects/Provisions</th>
                                    <th class="text-center">1.2.1 Policy/Guideline in place or not</th>
                                    <th class="text-center">1.2.2.1 Approved by Board/Council</th>
                                    <th class="text-center">1.2.2.2 Broadly adopted and in use</th>
                                    <th class="text-center">1.2.2.3 Adequate/Effective</th>
                                </tr>
                            </thead>

                            @php
                                $textAspectsProvisions = [
                                    '1.2.1 IP ownership',
                                    '1.2.2 Calculation and distribution of <span data-toggle="tooltip" data-placement="top" title="An amount allocated and distributed by an institution to an IP CREATOR in terms of section 10 of the IPR Act and/or an IP ENABLER in terms of that institution’s policies. ">BENEFIT SHARE</span>',
                                    '1.2.3 Research Pricing/Costing',
                                    '1.2.4 Conflict of Interest',
                                    '1.2.5 Private work',
                                    '1.2.6 Commercialisation of IP',
                                    '1.2.7 Creation of <span data-toggle="tooltip" data-placement="top" title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span>',
                                    '1.2.8 Investment in <span data-toggle="tooltip" data-placement="top" title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span>',
                                    '1.2.9 Allocation of equity to founders and institution in <span data-toggle="tooltip" data-placement="top" title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span>',
                                    '1.2.10 Research Data Management',
                                ];
                            @endphp
                            <tbody>
                                @if(count($textAspectsProvisions)>0)
                                    @foreach($textAspectsProvisions as $index_key => $item)

                                        @php
                                        $index = $index_key + 1;
                                        @endphp
                                        <tr>
                                            <th>
                                                {!! $item !!}
                                            </th>
                                            <td>
                                                {!! Form::select(
                                                    "questions[{$questionId}][policy]", 
                                                    ['' => 'Please Select'] + $policy_guideline, 
                                                    null, 
                                                    [
                                                        'class' => 'form-control policy-select', 
                                                        'data-question-id' => $questionId,
                                                        'wire:model' => 'questions.'.$questionId.'.policy'
                                                    ]
                                                ) !!}

                                                @error("questions.{$questionId}.policy")
                                                    <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                                                @enderror
                                            </td>
                                            <td>
                                                <div class="additional-fields-{{$questionId}}" style="{{ isset($questions[$questionId]['policy']) && in_array($questions[$questionId]['policy'], ['1', '2']) ? '' : 'display: none;' }}">
                                                    {!! Form::select(
                                                        "questions[{$questionId}][board]", 
                                                        ['' => 'Please Select'] + $yes_no, 
                                                        null, 
                                                        [
                                                            'class' => 'form-control', 
                                                            'wire:model' => "questions.{$questionId}.board"
                                                        ]
                                                    ) !!}

                                                    @error("questions.{$questionId}.board")
                                                        <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                                                    @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="additional-fields-{{$questionId}}" style="{{ isset($questions[$questionId]['policy']) && in_array($questions[$questionId]['policy'], ['1', '2']) ? '' : 'display: none;' }}">
                                                    {!! Form::select(
                                                        "questions[{$questionId}][broadly]", 
                                                        ['' => 'Please Select'] + $yes_no, 
                                                        null, 
                                                        [
                                                            'class' => 'form-control', 
                                                            'wire:model' => "questions.{$questionId}.broadly"
                                                        ]
                                                    ) !!}

                                                    @error("questions.{$questionId}.broadly")
                                                        <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                                                    @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="additional-fields-{{$questionId}}" style="{{ isset($questions[$questionId]['policy']) && in_array($questions[$questionId]['policy'], ['1', '2']) ? '' : 'display: none;' }}">
                                                    {!! Form::select(
                                                        "questions[{$questionId}][adequate]", 
                                                        ['' => 'Please Select'] + $yes_no, 
                                                        null, 
                                                        [
                                                            'class' => 'form-control', 
                                                            'wire:model' => "questions.{$questionId}.adequate"
                                                        ]
                                                    ) !!}

                                                    @error("questions.{$questionId}.adequate")
                                                        <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                                                    @enderror
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $questionId++;
                                        @endphp
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card card-info card-outline">
                <div class="card-header">
                    <h6 class="text-bold mb-0">1.3 Does the policy of your institution provide more than the minimum <span data-toggle="tooltip" data-placement="top" title="An amount allocated and distributed by an institution to an IP CREATOR in terms of section 10 of the IPR Act and/or an IP ENABLER in terms of that institution’s policies. ">BENEFIT SHARE</span> to <span data-toggle="tooltip" data-placement="top" title="A person as defined in the IPR Act, who is involved in the conception of intellectual property, specifically one who is identifiable as such for the purposes of obtaining statutory protection and enforcement of intellectual property rights, where applicable.">IP CREATORS</span>, as prescribed by the IPR Act (20% of the gross revenue (up to R1 million) and 30% of the nett revenue thereafter)?</h6>
                </div>
                <div class="card-body"> 
                    <div class="form-group">
                        {!! Form::select(
                            'questions['.$questionId.'][revenue]', 
                            ['' => 'Please Select'] + $yes_no, 
                            null, 
                            [
                                'class' => 'form-control policy-select', 
                                'data-question-id' => $questionId,
                                'wire:model' => 'questions.'.$questionId.'.revenue'
                            ]
                        ) !!}

                        @error("questions.{$questionId}.revenue")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

                        @php
                            $questionIdMain13 = $questionId;
                            $questionId++;
                        @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain13}}" style="{{ isset($questions[$questionIdMain13]['revenue']) && $questions[$questionIdMain13]['revenue'] == 'Yes' ? '' : 'display: none;' }}">
                        
                        <label for="gross_revenue" class="control-label">1.3.1 what percentage of gross revenue is allocated to <span data-toggle="tooltip" data-placement="top" title="A person as defined in the IPR Act, who is involved in the conception of intellectual property, specifically one who is identifiable as such for the purposes of obtaining statutory protection and enforcement of intellectual property rights, where applicable.">IP CREATORS</span>?</label>

                        <input type="text" oninput="formatNumber(this)" class="form-control" wire:model="questions.{{ $questionId }}.gross_revenue" placeholder="Please Enter">

                        @error("questions.{$questionId}.gross_revenue")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

                        @php $questionId++; @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain13}}" style="{{ isset($questions[$questionIdMain13]['revenue']) && $questions[$questionIdMain13]['revenue'] == 'Yes' ? '' : 'display: none;' }}">

                        <label for="nett_revenue" class="control-label">1.3.2 what percentage of nett revenue is allocated to <span data-toggle="tooltip" data-placement="top" title="A person as defined in the IPR Act, who is involved in the conception of intellectual property, specifically one who is identifiable as such for the purposes of obtaining statutory protection and enforcement of intellectual property rights, where applicable.">IP CREATORS</span>?</label>

                        <input type="text" oninput="formatNumber(this)" class="form-control" wire:model="questions.{{ $questionId }}.nett_revenue" placeholder="Please Enter">
                        
                        @error("questions.{$questionId}.nett_revenue")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

                        @php $questionId++; @endphp
                    </div>
                </div>
            </div>
            
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h6 class="text-bold mb-0">1.4 Does your institution’s policy or guideline provide for benefit sharing with <span data-toggle="tooltip" data-placement="top" title="A person who does not meet established legal requirements to qualify as an IP CREATOR but who is recognised by an institution as having contributed to the development and/or commercialisation of the IP.">IP ENABLERS</span>?</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        {!! Form::select(
                            'questions['.$questionId.'][institution_policy_ip_enablers]',
                            ['' => 'Please Select'] + $yes_no, 
                            null,
                            [
                                'class' => 'form-control policy-select', 
                                'data-question-id' => $questionId,
                                'wire:model' => 'questions.'.$questionId.'.institution_policy_ip_enablers' // Livewire binding
                            ]
                        ) !!}

                        @error("questions.{$questionId}.institution_policy_ip_enablers")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

                        @php
                            $questionIdMain14 = $questionId;
                            $questionId++;
                        @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain14}}" style="{{ isset($questions[$questionIdMain14]['institution_policy_ip_enablers']) && $questions[$questionIdMain14]['institution_policy_ip_enablers'] == 'Yes' ? '' : 'display: none;' }}">
                        <label for="provision" class="control-label">1.4.1 Is the portion allocated to <span data-toggle="tooltip" data-placement="top" title="A person who does not meet established legal requirements to qualify as an IP CREATOR but who is recognised by an institution as having contributed to the development and/or commercialisation of the IP.">IP ENABLERS</span> derived from the <span data-toggle="tooltip" data-placement="top" title="An amount allocated and distributed by an institution to an IP CREATOR in terms of section 10 of the IPR Act and/or an IP ENABLER in terms of that institution’s policies. ">BENEFIT SHARE</span> pool due to <span data-toggle="tooltip" data-placement="top" title="A person as defined in the IPR Act, who is involved in the conception of intellectual property, specifically one who is identifiable as such for the purposes of obtaining statutory protection and enforcement of intellectual property rights, where applicable.">IP CREATORS</span> or does the institution have a separate provision or category for <span data-toggle="tooltip" data-placement="top" title="A person who does not meet established legal requirements to qualify as an IP CREATOR but who is recognised by an institution as having contributed to the development and/or commercialisation of the IP.">IP ENABLERS</span>?</label>

                        {!! Form::select(
                            'questions['.$questionId.'][provision]',
                            ['' => 'Please Select'] + $ip_enablers_share,
                            null,
                            [
                                'class' => 'form-control', 
                                'wire:model' => 'questions.'.$questionId.'.provision'
                            ]
                        ) !!}

                        @error("questions.{$questionId}.provision")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

                        @php $questionId++; @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain14}}" style="{{ isset($questions[$questionIdMain14]['institution_policy_ip_enablers']) && $questions[$questionIdMain14]['institution_policy_ip_enablers'] == 'Yes' ? '' : 'display: none;' }}">
                        <label for="portion_accruing" class="control-label">1.4.2 Do the <span data-toggle="tooltip" data-placement="top" title="A person as defined in the IPR Act, who is involved in the conception of intellectual property, specifically one who is identifiable as such for the purposes of obtaining statutory protection and enforcement of intellectual property rights, where applicable.">IP CREATORS</span> decide on the portion accruing to the <span data-toggle="tooltip" data-placement="top" title="A person who does not meet established legal requirements to qualify as an IP CREATOR but who is recognised by an institution as having contributed to the development and/or commercialisation of the IP.">IP ENABLERS</span>?</label>

                        {!! Form::select(
                            'questions['.$questionId.'][portion_accruing]',
                            ['' => 'Please Select'] + $yes_no,
                            null,
                            [
                                'class' => 'form-control', 
                                'wire:model' => 'questions.'.$questionId.'.portion_accruing'
                            ]
                        ) !!}

                        @error("questions.{$questionId}.portion_accruing")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

                        @php $questionId++; @endphp
                    </div>
                </div>
            </div>
            
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h6 class="text-bold mb-0">1.5 Select the most appropriate description for the approval processes within your institution to form a <span data-toggle="tooltip" data-placement="top" title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span></h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        @foreach($appropriate as $value => $label)
                            <div class="form-check">
                                {!! Form::radio(
                                    'questions['.$questionId.'][company]',
                                    $value, // Value attribute
                                    null, // Checked attribute (null means unchecked by default)
                                    [
                                        'class' => 'form-check-input', 
                                        'id' => 'company_' . $value, 
                                        'wire:model' => 'questions.'.$questionId.'.company' // Livewire binding
                                    ]
                                ) !!}
                                {!! Form::label('company_' . $value, $label, ['class' => 'form-check-label']) !!}
                            </div>
                        @endforeach

                        @error("questions.{$questionId}.company")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

                        @php $questionId++; @endphp
                    </div>
                </div>
            </div>
            
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h6 class="text-bold mb-0">1.6 Select the most appropriate description for the approval processes within your institution to conclude an <span data-toggle="tooltip" data-placement="top" title="A LICENCE, OPTION or ASSIGNMENT or combination of these as applicable that is executed with the purpose of commercialising IP.">IP TRANSACTION</span></h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        @foreach($appropriate as $value => $label)
                            <div class="form-check">
                                {!! Form::radio(
                                    'questions['.$questionId.'][ip_transaction]', // Name
                                    $value,
                                    null,
                                    [
                                        'class' => 'form-check-input', 
                                        'id' => 'ip_transaction_' . $value, 
                                        'wire:model' => 'questions.'.$questionId.'.ip_transaction' // Livewire binding
                                    ]
                                ) !!}

                                {!! Form::label('ip_transaction_' . $value, $label, ['class' => 'form-check-label']) !!}
                            </div>
                        @endforeach

                        @error("questions.{$questionId}.ip_transaction")
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
