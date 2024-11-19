<div class="content-wrapper">

    @include('common.header', [
        'menu' => $menu,
        'breadcrumb' => [
            ['route' => getRoleWiseHomeUrl(), 'title' => getRoleWiseHomeLabel()],
            ['route' => route('reporting.list'), 'title' => 'Reporting'],
            ['route' => route('institution.show',['id' => $institution->id]), 'title' => $institution->institutionName],
        ],
        'active' => 'View'
    ])

    <section class="container-fluid questionnaire-portal">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        @include('common.card-header', ['title' => 'View ' . $menu])
                    </div>
                    <div class="card-body">

                        <div class="progress-container progress-bar-striped">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="{{$percentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$percentage}}%;">
                                <span class="progress-text">{{$percentage}}% Completed</span>
                            </div>
                        </div>

                        <div class="container-progressbar questionnaires">
                            <ul class="progressbar">
                                <a href="{{route('reporting.show',['id' => $institutionId, 'section_id' => 1])}}" class="{{ $sectionId == 1 || $sectionId > 1 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">SECTION 1</span>
                                </a>
                                <a href="{{route('reporting.show',['id' => $institutionId, 'section_id' => 2])}}"  class="{{ $sectionId == 2 || $sectionId > 2 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">SECTION 2</span>
                                </a>
                                <!-- <a href="{{route('reporting.show',['id' => $institutionId, 'section_id' => 3])}}"  class="{{ $sectionId == 3 || $sectionId > 3 ? 'active' : '' }}" wire:navigate>
                                    <span class="name">SECTION 3</span>
                                </a> -->
                                <a href="{{route('reporting.show',['id' => $institutionId, 'section_id' => 3])}}"  class="{{ $sectionId == 3 || $sectionId > 3 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">SECTION 3A</span>
                                </a>
                                <a href="{{route('reporting.show',['id' => $institutionId, 'section_id' => 4])}}"  class="{{ $sectionId == 4 || $sectionId > 4 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">SECTION 3B</span>
                                </a>
                                <a href="{{route('reporting.show',['id' => $institutionId, 'section_id' => 5])}}"  class="{{ $sectionId == 5 || $sectionId > 5 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">SECTION 4A</span>
                                </a>
                                <a href="{{route('reporting.show',['id' => $institutionId, 'section_id' => 6])}}"  class="{{ $sectionId == 6 || $sectionId > 6 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">SECTION 4B</span>
                                </a>
                                <a href="{{route('reporting.show',['id' => $institutionId, 'section_id' => 7])}}"  class="{{ $sectionId == 7 || $sectionId > 7 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">SECTION 5</span>
                                </a>
                                <a href="{{route('reporting.show',['id' => $institutionId, 'section_id' => 8])}}"  class="{{ $sectionId == 8 || $sectionId > 8 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">SECTION 6</span>
                                </a>
                            </ul>
                        </div>
                     
                        @switch($sectionId)
                            @case(1)
                                @livewire('reporting.sections.section-one-form', ['institutionId' => $institutionId])
                                @break
                            @case(2)
                                @livewire('reporting.sections.section-two-form', ['institutionId' => $institutionId])
                                @break
                            @case(3)
                                @livewire('reporting.sections.section-three-a-form', ['institutionId' => $institutionId])
                                @break
                            @case(4)
                                @livewire('reporting.sections.section-three-b-form', ['institutionId' => $institutionId])
                                @break
                            @case(5)
                                @livewire('reporting.sections.section-four-a-form', ['institutionId' => $institutionId])
                                @break
                            @case(6)
                                @livewire('reporting.sections.section-four-b-form', ['institutionId' => $institutionId])
                                @break
                            @case(7)
                                @livewire('reporting.sections.section-five-form', ['institutionId' => $institutionId])
                                @break
                            @case(8)
                                @livewire('reporting.sections.section-six-form', ['institutionId' => $institutionId])
                                @break
                            @case(9)
                                @livewire('reporting.sections.section-completed', ['institutionId' => $institutionId])
                                @break
                            @default
                                @livewire('reporting.sections.section-one-form', ['institutionId' => $institutionId])
                        @endswitch
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