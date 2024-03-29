<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Purchase;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    public function index()
    {
        $cart = Auth::user()->carts;
        if ($cart->isEmpty()) {
            return response()->json([
                "data" => 'is empty'
            ]);
        } else {
            foreach ($cart as $c) {
                foreach ($c->product as $p) {
                    if ($c->quantity > $p->stock) {
                        return response()->json([
                            "data" => Auth::user()->carts
                        ], 404);
                    } else {
                        return response()->json([
                            "data" => Auth::user()->carts
                        ], 200);
                    }
                }
            }

        }
    }

    public function store(Product $id)
    {
        $exist = false;
        $a = Auth::user()->carts;
        foreach ($a as $c) {
            if ($c->product[0]->id === $id->id) {
                $exist = true;
                return response()->json([
                    "data" => [
                        'محصولی با این نام در سبد خرید شما موجود است'
                    ]
                ], 404);
                break;
            }
        }
        if (!$exist) {
            $cart = new Cart([
                'quantity' => 1
            ]);
            $cart->save();
            $cart->user()->attach(Auth::user());
            $cart->product()->sync($id);
            return response()->json([
                'data' => [
                    'با موفقیت به سبد خرید اضافه شد'
                ]
            ], 200);
        }


    }

    public function edit(Request $r, Cart $id)
    {

        $carts = Auth::user()->carts;
        foreach ($carts as $c) {


            if ($r->quantity > $id->product[0]->stock) {
                return response()->json([
                    'data' => 'بیش از تعداد موجود در انبار انتخاب کردید'
                ], 401);
                break;
            } else {
                if ($c->id === $id->id) {
                    $c->quantity = $r->quantity;
                    $c->save();
                    return response()->json(200);
                    break;
                }
            }
        }

    }

    public function destroy(Cart $id)
    {
        $id->delete();
    }

    public function discount(Request $r)
    {
        $find = Auth::user()->purchases->where('offCode', $r->discount)->values()->all();
        if (count($find) > 0) {
            Auth::user()->discount += 1;
            Auth::user()->save();
            $offCode = Auth::user()->purchases->where('offCode', $r->discount)->values()[0];
            $offCode->offCode = 0;
            $offCode->save();
        } else {
            return response()->json([
                "data" => "failed"
            ], 404);
        }

    }

    public function payment()
    {
        $cart = Auth::user()->carts;
        $total = 0;
        foreach ($cart as $c) {
            foreach ($c->product as $p) {
                $total += $c->quantity * $p->price;
            }
        }
        $total -= Auth::user()->discount * 5000;
        ///if purchased Or not///


        if ($total) {
            foreach ($cart as $ca) {
                $purchase = new Purchase([
                    'quantity' => $ca->quantity,
                    'trackingCode' => uniqid(),
                    'offCode' => uniqid()
                ]);


                foreach ($ca->product as $p) {
                    $pro = Product::find($p->id);
                    $pro->stock -= $ca->quantity;
                    $pro->sell += 1;
                    $pro->visit += 1;
                    $pro->star += 1;
                    $pro->save();
                    $purchase->user()->associate(Auth::user());
                    $purchase->save();
                }
                Auth::user()->carts()->delete();
            }
            return response()->json([
                "data" => "success"
            ], 200);
        } else {
            return response()->json([
                "data" => "failed"
            ], 404);
        }


    }

    public function track(Request $r)
    {
        $track = Purchase::all()->where('trackingCode', $r->track);
        if ($track->count() < 1) {
            return response()->json([
                'data' => ['موردی با این شناسه پیدا نشد']
            ], 200);
        } else {

            foreach ($track as $t) {
                return response()->json([
                    'data' => $t->status
                ], 200);
            }
        }

    }

}

