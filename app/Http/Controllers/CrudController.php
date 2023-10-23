<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddPage;
use App\Models\Category;
use App\Models\Product;
use App\Models\Login;
class CrudController extends Controller
{
    public function insert_page(Request $request){
        $validatedData = $request->validate([
            'name'=>'required|string',
            'content'=>'required|string',
        ]);
        $add=new AddPage;
        $id = $request->get('id');
        if ($id){
            $findrec = AddPage::find($id);
            if ($findrec) {
                if ($request->isMethod('post')) {
                    $findrec->name= $request->get('name');
                    $findrec->content = $request->get('content');
                    $findrec->status = $request->has('status') ? 1 : 0;
                    $findrec->save();
                }
            }
        }
        else{
            if($request->isMethod('post')){
                $add->name=$request->get('name');
                $add->content=$request->get('content');
                $add->status = $request->has('status') ? 1 : 0;
                $add->save();
            }
        }
        return redirect('page-summary');
    }
    public function delete_data_page($id){
        $ob=AddPage::find($id);
        $ob->delete();
        return redirect('/page-summary');
    }
    public function edit_display_page($id)
    {
        $findrec=AddPage::where('id',$id)->get();
        return view('pageadd',compact('findrec'));
    }
    public function search_page(Request $request){
        if($request->isMethod('post')){
            $search=$request->get('search');
            $data=AddPage::where('name','LIKE','%'.$search.'%')->paginate(6);
        }
        return view('pagesummary',compact('data'));
    }
    public function insert_category(Request $request){
        $validatedData = $request->validate([
            'catname'=> 'required|string',
        ]);
        $addcategory=new Category;
        $id = $request->get('id');
        if ($id){
            $findrec_category = Category::find($id);
            if ($findrec_category) {
                if ($request->isMethod('post')) {
                    $findrec_category->categoryname= $request->get('catname');
                    $findrec_category->save();
                }
            }
        }
        else{
            if($request->isMethod('post')){
                $addcategory->categoryname=$request->get('catname');
                $addcategory->save();
            }
        }
        return redirect('/category-summary');
    }
    public function delete_data_category($id){
        $category_delete=Category::find($id);
        $category_delete->delete();
        return redirect('/category-summary');
    }
    public function edit_display_category($id)
    {
        $findrec_category=Category::where('id',$id)->get();
        return view('categoryadd',compact('findrec_category'));
    }
    public function search_category(Request $request){
        if($request->isMethod('post')){
            $search_category=$request->get('search_category');
            $catdata=Category::where('categoryname','LIKE','%'.$search_category.'%')->paginate(6);
        }
        return view('categorysummary',compact('catdata'));
    }
    public function insert_product(Request $request){
        $validatedData = $request->validate([
            'category_id' => 'required|integer',
            'pname' => 'required|string',
            'pdesc' => 'required|string',
            'pprice' => 'required|integer',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $customName =  time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->move('product_images', $customName, 'public');
        }
        if($request->isMethod('post')){
            $product = new Product;
            $product->category_id = $request->get('category_id');
            $product->pname = $request->get('pname');
            $product->pdesc = $request->get('pdesc');
            $product->pprice = $request->get('pprice');
            $product->pstock = $request->get('pstock');
            $product->product_image = $imagePath;
            $product->save();
        }
        return redirect('product-summary');
    }

    public function delete_data_product($id){
        $product_delete=Product::find($id);
        $product_delete->delete();
        return redirect('/product-summary');
    }
    public function edit_data_product($id){
        $findrec_product=Product::where('id',$id)->get();
        return view('productadd',compact('findrec_product'));
    }
    public function edit_product(Request $request,$id=''){
        $update=Product::find($id);
        if($request->isMethod('post')){
          $update->pname=$request->get('pname');   
          $update->pdesc=$request->get('pdesc');   
          $update->pprice=$request->get('pprice');
          $update->save();   
        }
        return redirect('/product-summary');
    }
    public function change_password(Request $request){
        // $data = new Login;
        if($request->isMethod('post'))
        {
            $oldpw = $request->get('oldpass');
            $newpw = $request->get('newpass');
            $cnewp = $request->get('cnewpass');
            if($newpw == $cnewp){
                $data = Login::where('password',$oldpw)->first();
                if(isset($data))
                {
                    $data->password = $newpw;
                    $data->save();
                    return redirect('/change-password')->withSuccess("Password Updated Successfully");
                }
                else
                {
                    return redirect('/change-password')->withSuccess("Old Password not match");
                }
                
            }
            else
            {
                return redirect('/change-password')->withSuccess( "New password and Confirm new password does not match");
            }    
                
        }
    }
    public function search_product(Request $request){
        if($request->isMethod('post')){
            $search_product=$request->get('s_product');
            $products=Product::where('pname','LIKE','%'.$search_product.'%')->paginate(6);
        }
        return view('productsummary',compact('products'));
    }
}
