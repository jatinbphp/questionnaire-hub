<div class="content-wrapper">

    @include('common.header', [
        'menu' => $menu,
        'breadcrumb' => [
            ['route' => getRoleWiseHomeUrl(), 'title' => getRoleWiseHomeLabel()],
        ],
        'active' => 'Add'
    ])
  
    <section class="container-fluid questionnaire-portal">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        @include('common.card-header', ['title' => 'Add / Edit ' . $menu])
                    </div>
                    <div class="card-body">

                        <div class="progress-container progress-bar-striped">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="{{$percentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$percentage}}%;">
                                <span class="progress-text">{{$percentage}}% Completed</span>
                            </div>
                        </div>

                        <div class="container-progressbar questionnaires">
                            <ul class="progressbar">
                                <a href="{{route('questionnaire',['id' => 1])}}" class="{{ $sectionId == 1 || $sectionId > 1 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">
                                        SECTION 1 
                                        @if(isset($workingUsers[1]))
                                            <h6>{!!$workingUsers[1]!!}</h6>
                                        @endif
                                        @if(isset($accessDenied[1]))
                                            <h6 class="text-danger text-bold">Access Denied</h6>
                                        @endif

                                        @if (in_array(Auth::user()->role, ['submitter']))
                                            @if(isset($sectionStatus[1]) &&  $sectionStatus[1]==1)
                                                <h6><span class="badge bg-success">Verified</span></h6>
                                            @else 
                                                <h6><span class="badge bg-danger">Pending</span></h6>
                                            @endif
                                        @endif
                                    </span>
                                </a>
                                <a href="{{route('questionnaire',['id' => 2])}}"  class="{{ $sectionId == 2 || $sectionId > 2 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">
                                        SECTION 2
                                        @if(isset($workingUsers[2]))
                                            <h6>{!!$workingUsers[2]!!}</h6>
                                        @endif
                                        @if(isset($accessDenied[2]))
                                            <h6 class="text-danger text-bold">Access Denied</h6>
                                        @endif

                                        @if (in_array(Auth::user()->role, ['submitter']))
                                            @if(isset($sectionStatus[2]) &&  $sectionStatus[2]==1)
                                                <h6><span class="badge bg-success">Verified</span></h6>
                                            @else 
                                                <h6><span class="badge bg-danger">Pending</span></h6>
                                            @endif
                                        @endif
                                    </span>
                                </a>
                                <a href="{{route('questionnaire',['id' => 3])}}"  class="{{ $sectionId == 3 || $sectionId > 3 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">
                                        SECTION 3A
                                        @if(isset($workingUsers[3]))
                                            <h6>{!!$workingUsers[3]!!}</h6>
                                        @endif
                                        @if(isset($accessDenied[3]))
                                            <h6 class="text-danger text-bold">Access Denied</h6>
                                        @endif

                                        @if (in_array(Auth::user()->role, ['submitter']))
                                            @if(isset($sectionStatus[3]) &&  $sectionStatus[3]==1)
                                                <h6><span class="badge bg-success">Verified</span></h6>
                                            @else 
                                                <h6><span class="badge bg-danger">Pending</span></h6>
                                            @endif
                                        @endif
                                    </span>
                                </a>
                                <a href="{{route('questionnaire',['id' => 4])}}"  class="{{ $sectionId == 4 || $sectionId > 4 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">
                                        SECTION 3B
                                        @if(isset($workingUsers[4]))
                                            <h6>{!!$workingUsers[4]!!}</h6>
                                        @endif
                                        @if(isset($accessDenied[4]))
                                            <h6 class="text-danger text-bold">Access Denied</h6>
                                        @endif

                                        @if (in_array(Auth::user()->role, ['submitter']))
                                            @if(isset($sectionStatus[4]) &&  $sectionStatus[4]==1)
                                                <h6><span class="badge bg-success">Verified</span></h6>
                                            @else 
                                                <h6><span class="badge bg-danger">Pending</span></h6>
                                            @endif
                                        @endif
                                    </span>
                                </a>
                                <a href="{{route('questionnaire',['id' => 5])}}"  class="{{ $sectionId == 5 || $sectionId > 5 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">
                                        SECTION 4A
                                        @if(isset($workingUsers[5]))
                                            <h6>{!!$workingUsers[5]!!}</h6>
                                        @endif
                                        @if(isset($accessDenied[5]))
                                            <h6 class="text-danger text-bold">Access Denied</h6>
                                        @endif

                                        @if (in_array(Auth::user()->role, ['submitter']))
                                            @if(isset($sectionStatus[5]) &&  $sectionStatus[5]==1)
                                                <h6><span class="badge bg-success">Verified</span></h6>
                                            @else 
                                                <h6><span class="badge bg-danger">Pending</span></h6>
                                            @endif
                                        @endif
                                    </span>
                                </a>
                                <a href="{{route('questionnaire',['id' => 6])}}"  class="{{ $sectionId == 6 || $sectionId > 6 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">
                                        SECTION 4B
                                        @if(isset($workingUsers[6]))
                                            <h6>{!!$workingUsers[6]!!}</h6>
                                        @endif
                                        @if(isset($accessDenied[6]))
                                            <h6 class="text-danger text-bold">Access Denied</h6>
                                        @endif

                                        @if (in_array(Auth::user()->role, ['submitter']))
                                            @if(isset($sectionStatus[6]) &&  $sectionStatus[6]==1)
                                                <h6><span class="badge bg-success">Verified</span></h6>
                                            @else 
                                                <h6><span class="badge bg-danger">Pending</span></h6>
                                            @endif
                                        @endif
                                    </span>
                                </a>
                                <a href="{{route('questionnaire',['id' => 7])}}"  class="{{ $sectionId == 7 || $sectionId > 7 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">
                                        SECTION 5
                                        @if(isset($workingUsers[7]))
                                            <h6>{!!$workingUsers[7]!!}</h6>
                                        @endif
                                        @if(isset($accessDenied[7]))
                                            <h6 class="text-danger text-bold">Access Denied</h6>
                                        @endif

                                        @if (in_array(Auth::user()->role, ['submitter']))
                                            @if(isset($sectionStatus[7]) &&  $sectionStatus[7]==1)
                                                <h6><span class="badge bg-success">Verified</span></h6>
                                            @else 
                                                <h6><span class="badge bg-danger">Pending</span></h6>
                                            @endif
                                        @endif
                                    </span>
                                </a>
                                <a href="{{route('questionnaire',['id' => 8])}}"  class="{{ $sectionId == 8 || $sectionId > 8 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">
                                        SECTION 6
                                        @if(isset($workingUsers[8]))
                                            <h6>{!!$workingUsers[8]!!}</h6>
                                        @endif
                                        @if(isset($accessDenied[8]))
                                            <h6 class="text-danger text-bold">Access Denied</h6>
                                        @endif

                                        @if (in_array(Auth::user()->role, ['submitter']))
                                            @if(isset($sectionStatus[8]) &&  $sectionStatus[8]==1)
                                                <h6><span class="badge bg-success">Verified</span></h6>
                                            @else 
                                                <h6><span class="badge bg-danger">Pending</span></h6>
                                            @endif
                                        @endif
                                    </span>
                                </a>
                                <!-- <a href="{{route('questionnaire',['id' => 10])}}"  class="{{ $sectionId == 10 || $sectionId > 10 ? 'active' : '' }}" wire:navigate>
                                    <span class="name">COMPLETE</span>
                                </a> -->
                            </ul>
                        </div>

                        @if($percentageSubmitter != 100)
                            @php
                                $baseNamespace = $anyOneIsWorking == 0 ? 'questionnaires' : 'reporting';
                                $sectionFormMap = [
                                    1 => "{$baseNamespace}.sections.section-one-form",
                                    2 => "{$baseNamespace}.sections.section-two-form",
                                    3 => "{$baseNamespace}.sections.section-three-a-form",
                                    4 => "{$baseNamespace}.sections.section-three-b-form",
                                    5 => "{$baseNamespace}.sections.section-four-a-form",
                                    6 => "{$baseNamespace}.sections.section-four-b-form",
                                    7 => "{$baseNamespace}.sections.section-five-form",
                                    8 => "{$baseNamespace}.sections.section-six-form",
                                    9 => "{$baseNamespace}.sections.section-completed",
                                ];
                            @endphp

                            @livewire($sectionFormMap[$sectionId] ?? "{$baseNamespace}.sections.section-one-form", ['institutionId' => $institutionId])
                        @else
                            @if($sectionId==1)
                                @livewire("reporting.sections.section-one-form", ['institutionId' => $institutionId])
                            @elseif($sectionId==2)
                                @livewire("reporting.sections.section-two-form", ['institutionId' => $institutionId])
                            @elseif($sectionId==3)
                                @livewire("reporting.sections.section-three-a-form", ['institutionId' => $institutionId])
                            @elseif($sectionId==4)
                                @livewire("reporting.sections.section-three-b-form", ['institutionId' => $institutionId])
                            @elseif($sectionId==5)
                                @livewire("reporting.sections.section-four-a-form", ['institutionId' => $institutionId])
                            @elseif($sectionId==6)
                                @livewire("reporting.sections.section-four-b-form", ['institutionId' => $institutionId])
                            @elseif($sectionId==7)
                                @livewire("reporting.sections.section-five-form", ['institutionId' => $institutionId])
                            @elseif($sectionId==8)
                                @livewire("reporting.sections.section-six-form", ['institutionId' => $institutionId])
                            @else
                                @livewire("reporting.sections.section-one-form", ['institutionId' => $institutionId])
                            @endif        
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="loading-spinner-main" wire:loading.flex wire:target="startLoading">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>