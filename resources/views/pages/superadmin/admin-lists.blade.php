@extends('layouts.main')

@include('templates.navigation')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-12 mt-4">
            <h5 class="text-muted text-center mb-4">List of Admins</h5>
            <div class="table-responsive shadow-sm bg-white p-0 rounded border border-gray">

                <table class="table table-hover mb-0 pb-0">
                    <thead class="text-secondary bg-light">
                        <tr>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="user" class="pb-1 mr-1 text-primary"></i>
                                FULL NAME
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="key" class="pb-1 mr-1 text-primary"></i>
                                USERNAME
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="navigation" class="pb-1 mr-1 text-primary"></i>
                                MUNICIPALITY
                            </td>
                            <td class="border-bottom-0 border-top-0" colspan="2">
                                <i data-feather="edit-3" class="pb-1 mr-1 text-primary"></i>
                                ACTIONS
                            </td>
                        </tr>
                    </thead>
                    <tbody style="font-weight: 100 !important;" class="text-secondary">

                        @forelse ($users as $user)
                            <tr class="border-bottom-1">
                                <td class="pt-2 pb-0">{{ $user->fullnameFormal() }}</td>
                                <td class="pt-2 pb-0">{{ $user->username }}</td>
                                <td class="pt-2 pb-0">{{ $user->municipality->name }}</td>
                                <td class="pt-2 pb-0" colspan="2">
                                    <div class="d-flex justify-content-start">
                                        <a href="{{route('')}}" class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{ route('admin.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure? Deleting this will delete all transactions associated with this account.')" class="btn btn-sm btn-danger ml-1">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        <tr class="border-bottom-1">
                            <td colspan="7" class="text-center text-gray">No record found</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-2">
        {{$users->links()}}
    </div>
</div>

{{-- <script>
    $(document).ready(function(){
        const deleteBtn=$(".delete-admin");

        deleteBtn.click(function(e){
            e.preventDefault()
            let userId=$(this).data('userid');
            showDeleteConfirmation('Deleting this admin cannot be reverted back and will delete all transactions associated with this account').then((result) => {
                if (result.isConfirmed) {
                    
                }
            })
        })

    });



</script> --}}


@endsection
