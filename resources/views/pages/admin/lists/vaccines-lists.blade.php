@extends('layouts.main')

@include('templates.navigation')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-12 mt-4">
            <h5 class="text-muted text-center mb-4 text-heading">List of Vaccines</h5>
            <div class="table-responsive shadow-sm bg-white p-0 rounded border border-gray">

                <table class="table table-hover mb-0 pb-0">
                    <thead class="text-secondary bg-light">
                        <tr>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="hash" class="pb-1 mr-1 text-primary"></i>
                                BATCH NO
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="hash" class="pb-1 mr-1 text-primary"></i>
                                LOT NO
                            </td>
                            <td class="border-bottom-0 border-top-0">
                                <i data-feather="home" class="pb-1 mr-1 text-primary"></i>
                                MANUFACTURER
                            </td>
                            <td class="border-bottom-0 border-top-0" colspan="2">
                                <i data-feather="edit-3" class="pb-1 mr-1 text-primary"></i>
                                ACTIONS
                            </td>
                        </tr>
                    </thead>
                    <tbody style="font-weight: 100 !important;" class="text-secondary">
                        @forelse ($vaccines as $vaccine)
                            <tr class="border-bottom-1">
                                <td class="pt-2 pb-0">{{$vaccine->batch_number}}</td>
                                <td class="pt-2 pb-0">{{$vaccine->lot_number}}</td>
                                <td class="pt-2 pb-0">{{$vaccine->vaccine_manufacturer}}</td>
                                <td class="pt-2 pb-0" colspan="2">
                                    <div class="d-flex justify-content-start">
                                        <a href="{{route('vaccine.edit',$vaccine)}}" class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{ route('vaccine.destroy', $vaccine->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger ml-1">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="border-bottom-1">
                                <td colspan="6" class="text-center text-gray">No record found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-2">
        {{$vaccines->links()}}
    </div>
</div>

@endsection
