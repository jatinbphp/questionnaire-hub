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
                    <h6 class="text-bold mb-0">5.1 Have any START-UP/SPIN OUT COMPANIES been formed to commercialise an ACTIONABLE DISCLOSURE and NON-IPR ACT disclosures during the reporting period 2019 to 2023?</h6>
                </div>
                <div class="card-body"> 
                    <div class="form-group">
                        @if(isset($questions[$questionId]['actionable_disclosure_5_1'])) 
                            {{$yes_no[$questions[$questionId]['actionable_disclosure_5_1']]}}
                        @endif

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
                                                    @if(isset($questions[$questionId][$year]))
                                                        {{$questions[$questionId][$year]}}
                                                    @endif
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
                                        <td>
                                            @if(!empty($questions[$questionId]['type'])) 
                                                {{$questions[$questionId]['type']}}
                                            @endif
                                        </td>
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

                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['actionable_disclosure_5_1']) && $questions[$questionIdMain]['actionable_disclosure_5_1'] == 'Yes' ? '' : 'display: none;' }}">
                        <label class="control-label w-100">5.8. Please provide the total revenue received by your institution from START-UP/SPIN-OUT COMPANIES:</label>

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

                    <div class="form-group">
                        <label class="control-label w-100">5.9. Have any START-UP/SPIN OUT COMPANIES been formed to commercialise an ACTIONABLE DISCLOSURE and NON-IPR ACT DISCLOSURES since 2008?</label>

                        @if(isset($questions[$questionId]['actionable_disclosure_5_9'])) 
                            {{$yes_no[$questions[$questionId]['actionable_disclosure_5_9']]}}
                        @endif

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
                                                @if(isset($questions[$questionId]))
                                                    {{$questions[$questionId]}}
                                                @endif
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

                    <div class="form-group">
                        <label class="control-label w-100">5.14. Did any product or service based on a DISCLOSURE (or that used a process in a DISCLOSURE) enter commercial use (i.e. product or service sold) during the period 2019 to 2023?</label>
                        @if(isset($questions[$questionId]['actionable_disclosure_5_14'])) 
                            {{$yes_no[$questions[$questionId]['actionable_disclosure_5_14']]}}
                        @endif

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
                                                    @if(isset($questions[$questionId][$year]))
                                                        {{$questions[$questionId][$year]}}
                                                    @endif
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
    </div>
</form>