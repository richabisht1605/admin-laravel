@extends('layout.main')
@section('pagesummary')
    <div class="left">
        @include('sidebar')
    </div>
    <div class="right">
        <h3>Page Manager</h3>
        <p class="thisline">This section displays the list of Pages</p>
        <p align="center" class="clickline"><a href="">Click here </a> to create <a href=""> New Page</a></p>
        <form method="post" action="{{Route('search.page')}}">
            {{ csrf_field() }}
            <table class="searchtable">
                <tr>
                    <td colspan="2">Search</td>
                </tr>
                <tr>
                    <td colspan="2">Search By Page Name:
                        <input type="text" name="search"/>
                        <button type="submit">Search</button>
                    </td>
                </tr>
            </table>
        </form>
        <p>Page 1 of 2, showing 4 records out of 8 total, starting on record 1, ending on 4</p>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Page Name</th>
                <th>Page Content</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($data as $row)
                <tr align="center">
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->content}}</td>
                    <td>{{$row->status}}</td>
                    <td><a href="{{'edit-data/'.$row->id}}"><i class="fas fa-edit"></i>
                    </a></td>
                    <td><a href="{{'delete-data/'.$row->id}}" class="delete"><i class="fas fa-trash-alt"></i>
                    </a></td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6">{{$data->links('pagi')}}</td>
            </tr>
        </table>
    </div>
@endsection