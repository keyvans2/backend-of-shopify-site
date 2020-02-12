<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Test;
use App\Bought;
use App\Cat;
use Gate;

class productController extends Controller
{
public function index()
{
    $pros=product::all();
    $cats=Cat::all();
    // $p= Product::first();
    // echo $p->cats()->get();
    if(Auth()->check()){
        $cart=Auth()->user()->carts()->get();
   
        $emptyMsg='Cart is empty';
        if(!$cart->isEmpty()){
            return view('proPage',compact('pros','cart','cats'));
        }
        else{
            return view('proPage',compact('pros','emptyMsg','cats'));
        }
    }
    else{
        return view('proPage',compact('pros'));
    }
   
  
}

public function store(Request $r)
{
   $pro=new product(['name'=>$r->name,'price'=>$r->price]);
   $pro->user()->associate(auth()->id());
   $pro->save();
   $pro->cats()->attach($r->cat);
   return redirect()->back();
}

public function ToCart(Request $r)
{

    $cart=new Cart();
    $check= Auth()->user()->carts()->where('name',$r->name)->get();
    
 
    if($check->count() > 0){
  
        return 'item exists';
       
    }
    else{
        $cart->name=$r->name;
        $cart->price=$r->price;
        $cart->quantity=$r->quantity;
        $cart->save();
        $user=auth()->id();
        $cart->users()->attach($user);
        return('success');
    }
  
    
    // return redirect()->back();
    
   
}

public function delete(Request $r)
{
    $m='hi';
    $cart=new Cart();
    $cart->where('id',$r->id)->delete();
    $all= Cart::all();
    if($all->isEmpty()){
        return $m;
    }

}


public function showCarts()
{
    $cart=Auth()->user()->carts()->get();
    $emptyMsg='Cart is empty';
    // echo $cart;
    if(!$cart->isEmpty()){
        return $cart;
    }
    else{
        return $emptyMsg;
    }

}
public function finalize()
{
    $cart=Auth()->user();
    foreach ($cart->carts as $c) {
        $bought=new Bought();
        $crt=new Cart();
        $bought->name=$c->name;
        $bought->price=$c->price;
        $bought->proCode=rand(10000,999999);
        $bought->save();
        $user=Auth()->id();
        $bought->users()->attach($user);
        Auth()->user()->carts()->delete();
        $c->users()->detach($user);
    }

    //     // echo number_format($c->sum('price'));
    //     // break;
    // }
    $crt=new Cart();
    // $f=$bought->all();
   
    return redirect('showProPage');
    // $r=rand(10);
    // dd($r);
}
public function buyed()
{
  if(Gate::allows('isAdmin')){
    if(Auth()->check()){
        $all=Auth()->user()->boughts()->get();
        return view('buyed',compact('all'));
     }
     else{
        return redirect('login');
     }
  }

}
    public function testF($proCode)
    {
        $bought=new Bought();
        $r= $bought->where('id','LIKE',$proCode)->get();
        echo $r;
    }

    public function searchView()
    {
        $cat=new Cat;
        $cats=$cat->all();
        return view('search',compact('cats'));
    }

    public function goSearch(Request $r)
    {
    //     $cats=new Cat;
    //    $f= $cats::first();
    //    echo ($f->products) ;
        $pro=new Product;
        $fetch= $pro->where('name','like',  '%' . $r->data .'%'); 
        if($fetch->count()>0) {
           return $fetch->with('cats')->get();
        }
        else{
            return 'not found';  
        }
    }
    public function resultSearch($id)
    {
        $pro=new Product;
        $f= $pro->where('name','like','%'.$id.'%')->get(); 
        return view('resultSearch',compact('f','id'));
    }

}
