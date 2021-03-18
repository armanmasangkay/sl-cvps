@extends('layouts.main')

@include('templates.navigation')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-12 mt-4">
            <h5 class="text-muted text-center mb-4 text-heading">List of Facilities</h5>
            <div class="table-responsive shadow-sm bg-white p-0 rounded border border-gray">

                <table class="table table-hover mb-0 pb-0">
                    <thead class="text-secondary bg-light">
                        <tr>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="home" class="pb-1 mr-1 text-primary"></i>
                                FACILITY NAME
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
                        @forelse ($facilities as $facility)
                            <tr class="border-bottom-1">
                                <td class="pt-2 pb-0">{{ $facility->facility_name }}</td>
                                <td class="pt-2 pb-0">{{ $facility->municipality->name }}</td>
                                <td class="pt-2 pb-0" colspan="2">
                                    <div class="d-flex justify-content-start">
                                        <a href="{{route('facility.edit',$facility)}}" class="btn btn-sm btn-info pl-1"><i data-feather="edit" class="pt-1 pb-2"></i>Edit&nbsp;</a>
                                        <form action="{{ route('facility.destroy', $facility->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger ml-1 pl-1"><i data-feather="x" class="pt-1 pb-2"></i>Delete&nbsp;</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="border-bottom-1">
                                <td colspan="5" class="text-center text-gray">No record found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-2">
        {{$facilities->links()}}
    </div>
</div>

@endsection
