@extends('layout.main')
@section('addproduct')
<div class="left">
    @include('sidebar')
</div> 
<div class="right">
    <h3>Product Manager</h3>
    <div class="addtable">
        <p class="add">Add Product</p>
        <form method="post" enctype="multipart/form-data" action={{isset($findrec_product) ? url('edit-product/'.$findrec_product[0]->id):Route('insert.product')}}>
            {{ csrf_field() }}
            {{-- <input type="hidden" name="id" value="{{isset($findrec_product[0]->id) ? $findrec_product[0]->id:''}}"> --}}
            <table class="innertable">
                @if ((request()->routeIs('product_add')))
                    <tr>    
                        <td align="right">Select Category</td>
                        <td>
                            <select name="category_id">
                                <option>&lt;select category&gt;</option>
                                @foreach ($categories as $rows)
                                    <option value="{{ $rows->id }}">{{$rows->categoryname}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                @endif
                <tr>
                    <td align="right">Product Name</td>
                    <td><input type="text" name="pname" value="{{isset($findrec_product[0]->pname) ? $findrec_product[0]->pname:''}}"/></td>
                </tr>
                <tr>
                    <td align="right">Product Description</td>
                    <td><input type="text" name="pdesc" value="{{isset($findrec_product[0]->pdesc) ? $findrec_product[0]->pdesc:''}}"/></td>
                </tr>
                <tr>
                    <td align="right">Product Price</td>
                    <td><input type="text" name="pprice" value="{{isset($findrec_product[0]->pprice) ? $findrec_product[0]->pprice:''}}"/></td>
                </tr>
                @if ((request()->routeIs('product_add')))
                    <tr>
                        <td align="right">Product Image</td>
                        <td><input type="file" name="product_image"/></td>
                    </tr>
                    <tr>
                        <td align="right">Product Stock</td>
                        <td><input type="text" name="pstock"/></td>
                    </tr>
                @endif
            </table>
            <input type="Submit" value="Save" name="save" class="save"/>
            <input type="button" value="Cancel" class="cancel"/>
        </form>
    </div>
</div>
@endsection	