@extends('layout.main')
	
@section('login-form')

<br>
@if (session('success'))
<div class="danger-alert">
    {{ session('success') }}
</div>
@endif
<br/>
<form action="{{Route('login.post')}}" method="post">
    {{ csrf_field() }}
    <!-- login table starts here -->
    <table class="logintable">
        <tr>
            <td></td>
            <td class="Login">Login</td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td>Username</td>
            <td>
                <input type="text" name="name" />
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="password" name="password" />
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="save" value="Login" /></td>
        </tr>
    </table>
    <!-- login table ends here -->
</form>
@endsection