<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Libs\Common;
use App\Models\ProductManager;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function viewAll() {
    $products = ProductManager::getAllProducts();
    return view("product.products") 
      ->with("products", $products);
  }

  public function detail($id){
    $product = ProductManager::getProductById($id) ;
    return view("product.detail")
      ->with("product", $product);
  }

  public function createForm() {
    return view("product.create");
  }

  public function postForm(ProductRequest $request) {
    return "Coucou";
  }


    public function addToCart(Request $request, $id) {
        $product = ProductManager::getProductById($id) ;
        $cart = $request->session()->get('cart',[]);

        if ($product!==null) {
            $found = false;
            foreach ($cart as $line) {
                if ($line->id == $id) {
                    $line->quantity++;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $product->quantity = 1;
                array_push($cart,$product);
            }
            $request->session()->put('cart',$cart);
            return redirect(url('/cart'));
        } else {
            return view("error")
                ->with("code",404)
                ->with("message","Ce produit n'existe pas");
        }
    }


    public function viewCart(Request $request){
        $cart = $request->session()->get('cart',[]);

        $total = 0;
        $vat = 0;
        foreach ($cart as $product) {
            $total = $product->quantity*$product->price;
            $vat = Common::computeVAT($total, $product->vat);
        }
        return view("cart.index")
            ->withTotal($total)
            ->withVat($vat);
    }

}
