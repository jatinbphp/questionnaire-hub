<div class="content-wrapper">

    @include('common.header', [
        'menu' => $menu,
        'breadcrumb' => [
            ['route' => getRoleWiseHomeUrl(), 'title' => getRoleWiseHomeLabel()],
            ['route' => route('reporting.list'), 'title' => 'Reporting'],
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
                        <!--<div class="container-progressbar questionnaires">
                            <ul class="progressbar">
                                <a href="{{route('advance.list',['section_id' => 1])}}" class="{{ $sectionId == 1 || $sectionId > 1 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">SECTION 1</span>
                                </a>
                                <a href="{{route('advance.list',['section_id' => 2])}}"  class="{{ $sectionId == 2 || $sectionId > 2 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">SECTION 2</span>
                                </a>
                                <a href="{{route('advance.list',['section_id' => 3])}}"  class="{{ $sectionId == 3 || $sectionId > 3 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">SECTION 3A</span>
                                </a>
                                <a href="{{route('advance.list',['section_id' => 4])}}"  class="{{ $sectionId == 4 || $sectionId > 4 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">SECTION 3B</span>
                                </a>
                                <a href="{{route('advance.list',['section_id' => 5])}}"  class="{{ $sectionId == 5 || $sectionId > 5 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">SECTION 4A</span>
                                </a>
                                <a href="{{route('advance.list',['section_id' => 6])}}"  class="{{ $sectionId == 6 || $sectionId > 6 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">SECTION 4B</span>
                                </a>
                                <a href="{{route('advance.list',['section_id' => 7])}}"  class="{{ $sectionId == 7 || $sectionId > 7 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">SECTION 5</span>
                                </a>
                                <a href="{{route('advance.list',['section_id' => 8])}}"  class="{{ $sectionId == 8 || $sectionId > 8 ? 'active' : '' }}" wire:navigate wire:click="startLoading">
                                    <span class="name">SECTION 6</span>
                                </a>
                            </ul>
                        </div>-->
                     
                        @switch($sectionId)
                            @case(1)
                                @livewire('advance-stats.sections.section-one-form', ['institutionId' => 0])
                                @break
                            @case(2)
                                @livewire('advance-stats.sections.section-two-form', ['institutionId' => 0])
                                @break
                            @case(3)
                                @livewire('advance-stats.sections.section-three-a-form', ['institutionId' => 0])
                                @break
                            @case(4)
                                @livewire('advance-stats.sections.section-three-b-form', ['institutionId' => 0])
                                @break
                            @case(5)
                                @livewire('advance-stats.sections.section-four-a-form', ['institutionId' => 0])
                                @break
                            @case(6)
                                @livewire('advance-stats.sections.section-four-b-form', ['institutionId' => 0])
                                @break
                            @case(7)
                                @livewire('advance-stats.sections.section-five-form', ['institutionId' => 0])
                                @break
                            @case(8)
                                @livewire('advance-stats.sections.section-six-form', ['institutionId' => 0])
                                @break
                            @case(9)
                                @livewire('advance-stats.sections.section-completed', ['institutionId' => 0])
                                @break
                            @default
                                @livewire('advance-stats.sections.section-one-form', ['institutionId' => 0])
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