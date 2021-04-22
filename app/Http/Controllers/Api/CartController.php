<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Transformers\CartTransformer;
use App\Repositories\CartRepository;

class CartController extends Controller
{
    private $cartTransformer;
    private $cartRepository;

    /**
     * CartController constructor
     * 
     * @param CartRepository  $cartRepository
     * @param CartTransformer $cartTransformer
     */
    public function __construct(CartRepository  $cartRepository,  
                                CartTransformer $cartTransformer)
    {
        $this->cartTransformer = $cartTransformer;
        $this->cartRepository  = $cartRepository;
    }

    /**
     * Store a product in cart of authenticaed user.
     *
     * @param  \Illuminate\Http\AddCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCartRequest $request)
    {
        // Will return only validated data

        $validated = $request->validated();

        $message = $this->cartRepository->create($validated);

        return [
            'status'  => 'success',
            'message' => $message
        ];
    }

    /**
     * Display all the products in cart of authenticated user.
     *
     * @return array
     */
    public function show()
    {
        $cart = $this->cartRepository->userCart();

        $data = $this->cartTransformer->transformCollection($cart, [], $includeExtras=true);

        return [
            'status' => 'success',
            'data'   => $data
        ];
    }

    /**
     * Update the quantity of product stored in cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return arrays
     */
    public function update(UpdateCartRequest $request, $id)
    {
        // Will return only validated data

        $validated = $request->validated();

        $this->cartRepository->update($request->all(), $id);

        return [
            'status' => 'success',
            'message' => 'Selected product quantity updated in cart.',
        ];

    }


    /**
     * Remove the specified product from cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cartRepository->delete($id);

        return [
            'status' => 'success',
            'message' => 'Selected product removed from cart.',
        ];
    }

}