<div class="action-buttons">
    <a href="{{route('institution.show',['id' => $institution->id])}}" class="btn btn-info btn-sm" wire:navigate><i class="fa fa-eye"></i></a>
    <a href="{{route('institution.edit',['id' => $institution->id])}}" class="btn btn-primary btn-sm" wire:navigate><i class="fa fa-edit" aria-hidden="true"></i></a>
    <button class="btn btn-danger btn-sm deleteRecord" data-id="{{$institution->id}}" data-url="{{route('institution.destroy',['id' => $institution->id])}}" data-table="institutionsTable"><i class="fa fa-trash"></i></button>
</div>