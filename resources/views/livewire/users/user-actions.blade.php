<div class="action-buttons">
    <a href="{{route('user.show',['id' => $user->id])}}" class="btn btn-info btn-sm" wire:navigate><i class="fa fa-eye"></i></a>
    <a href="{{route('user.edit',['id' => $user->id])}}" class="btn btn-primary btn-sm" wire:navigate><i class="fa fa-edit" aria-hidden="true"></i></a>
    <button class="btn btn-danger btn-sm deleteRecord" data-id="{{$user->id}}" data-url="{{route('user.destroy',['id' => $user->id])}}" data-table="usersTable"><i class="fa fa-trash"></i></button>
</div>