<div class="content-wrapper">

    @include('common.header', [
        'menu' => $menu,
        'breadcrumb' => [
            ['route' => getRoleWiseHomeUrl(), 'title' => getRoleWiseHomeLabel()],
            ['route' => route('institution.list'), 'title' => 'Institutions']
        ],
        'active' => 'Add'
    ])

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        @include('common.card-header', ['title' => 'Add ' . $menu])
                    </div>
                    <form wire:submit.prevent="store">
                        <div class="card-body">
                            @include ('livewire.institutions.institution-form')
                        </div>
                        <div class="card-footer">
                            @include('common.footer-buttons', ['route' => route('institution.list'), 'type' => 'create'])
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>