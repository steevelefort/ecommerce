<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Libs\Common;
use App\Models\Product;
use App\Models\ProductManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class ProductController extends Controller
{
  public function viewAll() {
    //$products = ProductManager::getAllProducts();
    $products = Product::all();
    return view("product.products") 
      ->with("products", $products);
  }

  public function detail($id){
    //$product = ProductManager::getProductById($id) ;
    try {
      $product = Product::findOrFail($id);
      return view("product.detail") ->with("product", $product);
    } catch (\Exception $e) {
      return abort(404);
    }
  }

  public function createForm() {
    return view("product.create");
  }

  public function postForm(ProductRequest $request) {
    // On créé le produit dans la base de données
    $product = Product::create($request->all());

    // Maintenant qu'on a l'ID du produit, on stocke l'image
    if ($request->image != null) {
      $image = $product->id . '.' . $request->image->extension();
      $request->file('image')->move(public_path('images'), $image);
      $product->image = $image;
      $product->save();
    }
    
    // Nous n'avons pas de vue à retourner, on redirige donc vers l'accueil
    return redirect('/'); 
  }


  public function modifyForm($id) {
    try {
      $product = Product::findOrFail($id);
      return view("product.modify") ->with("product", $product);
    } catch (\Exception $e) {
      return abort(404);
    }
  }

  public function putForm($id, ProductRequest $request) {
    try {
      $product = Product::findOrFail($id);
      $product->name = $request->input("name");
      $product->description = $request->input("description");
      $product->price = $request->input("price");
      $product->vat = $request->input("vat");
      if ($request->image != null) {
        unlink(public_path('images')."/".$product->image);
        $image = $product->id . '.' . $request->image->extension();
        $request->file('image')->move(public_path('images'), $image);
        $product->image = $image;
      }
      $product->save();
      return redirect('/'); 
    } catch (\Exception $e) {
      error_log($e->getMessage());
      return abort(404);
    }
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
            $total += $product->quantity*$product->price;
            $vat += Common::computeVAT($total, $product->vat);
        }
        return view("cart.index")
            ->withTotal($total)
            ->withVat($vat);
    }

}
