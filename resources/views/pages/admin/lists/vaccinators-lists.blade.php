@extends('layouts.main')

@include('templates.navigation')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-12 mt-4">
            <h5 class="text-muted text-center mb-4 text-heading">List of Vaccinators</h5>
            <div class="table-responsive shadow-sm bg-white p-0 rounded border border-gray">

                <table class="table table-hover mb-0 pb-0" style="min-width: 1300px !important;">
                    <thead class="text-secondary bg-light">
                        <tr>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="user" class="pb-1 mr-1 text-primary"></i>
                                FULL NAME
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="users" class="pb-1 mr-1 text-primary"></i>
                                POSITION
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="user-check" class="pb-1 mr-1 text-primary"></i>
                                ROLE
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="home" class="pb-1 mr-1 text-primary"></i>
                                FACILITY
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="credit-card" class="pb-1 mr-1 text-primary"></i>
                                PRC
                            </td>
                            <td class="border-bottom-0 border-top-0" colspan="2">
                                <i data-feather="edit-3" class="pb-1 mr-1 text-primary"></i>
                                ACTIONS
                            </td>
                        </tr>
                    </thead>
                    <tbody style="font-weight: 100 !important;" class="text-secondary">
                        @forelse ($vaccinators as $vaccinator)
                            <tr class="border-bottom-1">
                                <td class="pt-2 pb-0">{{ $vaccinator->fullname() }}</td>
                                <td class="pt-2 pb-0">{{ $vaccinator->position }}</td>
                                <td class="pt-2 pb-0">{{ $vaccinator->role }}</td>
                                <td class="pt-2 pb-0">{{ $vaccinator->facility->facility_name }}</td>
                                <td class="pt-2 pb-0">{{ $vaccinator->prc }}</td>
                                <td class="pt-2 pb-0" colspan="2">
                                    <div class="d-flex justify-content-start">
                                        <a href="{{route('vaccinator.edit',$vaccinator)}}" class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{ route('vaccinator.destroy', $vaccinator->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure? Deleting this vaccinator will remove all transaction associated to this information.')" class="btn btn-sm btn-danger ml-1">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="border-bottom-1">
                                <td colspan="11" class="text-center text-gray">No record found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
    <div class="mt-2">
    {{$vaccinators->links()}}
    </div>
</div>


@endsection
