@extends('layout.main')
@section('changepassword')
<div class="left">
    @include('sidebar')
</div> 
@if (session('success'))
<div class="danger-alert">
    {{ session('success') }}
</div>
@endif
<div class="right">
    <h3>Change Password</h3>
    <div class="addtable">
        <p class="add">Change Password</p>
        <form method="post" action="{{url('changepassword')}}">
            {{ csrf_field() }}
            <table class="innertable">
                <tr>
                    <td align="right">Enter Old Password</td>
                    <td><input type="text" name="oldpass"/></td>
                </tr>
                <tr>
                    <td align="right">Enter New Password</td>
                    <td><input type="text" name="newpass"/></td>
                </tr>
                <tr>
                    <td align="right">Confirm New Password</td>
                    <td><input type="text" name="cnewpass"/></td>
                </tr>
            </table>
            <input type="Submit" value="Save" name="save" class="save"/>
            <input type="button" value="Cancel" class="cancel"/>
        </form>
    </div>
</div>
@endsection		