@include('layout.header')
<!-- inner container3 ends here -->
<div class="innercontainer3">
    @yield('login-form')
    @yield('pagesummary')
    @yield('pageadd')
    @yield('categorysummary')
    @yield('addcategory')
    @yield('productsummary')
    @yield('addproduct')
    @yield('changepassword')
</div>
<!-- inner container3 ends here -->
@include('layout.footer')