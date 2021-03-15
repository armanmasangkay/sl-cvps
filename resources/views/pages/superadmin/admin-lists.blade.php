@extends('layouts.main')

@include('templates.navigation')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-12 mt-4">
            <div class="table-responsive shadow-sm bg-white pt-3 pl-3 pr-3">
                <table class="table table-bordered table-hover">
                    <thead class="text-secondary">
                        <tr>
                            <td class="pt-1 pb-1 border-bottom-0">ID</td>
                            <td class="pt-1 pb-1 border-bottom-0">FIRST NAME</td>
                            <td class="pt-1 pb-1 border-bottom-0">LAST NAME</td>
                            <td class="pt-1 pb-1 border-bottom-0">USERNAME</td>
                            <td class="pt-1 pb-1 border-bottom-0">MUNICIPALITY</td>
                            <td class="pt-1 pb-1 border-bottom-0" colspan="2">ACTIONS</td>
                        </tr>
                    </thead>
                    <tbody style="font-weight: 100 !important;" class="text-secondary">
                        <tr>
                            <td class="pt-1 pb-1">1</td>
                            <td class="pt-1 pb-1">Jun Vic</td>
                            <td class="pt-1 pb-1">Cadayona</td>
                            <td class="pt-1 pb-1">cadz@admin-slcvps</td>
                            <td class="pt-1 pb-1">Bontoc</td>
                            <td class="pt-1 pb-1" colspan="2">
                                <div class="d-flex justify-content-between">
                                    <form action="" method="post">
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>      
</div>

@endsection