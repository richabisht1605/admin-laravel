@extends('layout.main')
@section('addcategory')
<div class="left">
    @include('sidebar')
</div> 
<div class="right">
    <h3>Category Manager</h3>
    <div class="addtable">
        <p class="add">Add Category</p>
        <form method="post" action="{{Route('insert.category')}}">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{isset($findrec_category[0]->id) ? $findrec_category[0]->id:''}}">
            <table class="innertable">
                <tr>
                    <td align="right">Category Name</td>
                    <td><input type="text" name="catname" value="{{isset($findrec_category[0]->categoryname) ? $findrec_category[0]->categoryname:''}}" /></td>
                </tr>
            </table>
            <input type="Submit" value="Save" name="save" class="save"/>
            <input type="button" value="Cancel" class="cancel"/>
        </form>
    </div>
</div>
@endsection