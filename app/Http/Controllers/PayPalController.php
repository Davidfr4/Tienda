<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Pedidos;
use Cookie;

class PayPalController extends Controller
{
    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return view('transaction');
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "EUR",
                        "value" =>$request->input('comprar')
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    $formulario = $request->only("id_usuario","name","email","precio_total","pais","provincia","ciudad","codigoPostal", "calle","portal","piso");
                    
                    $string = implode("/",$formulario);
                    Cookie::queue('pedido', $string, 120);
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('cart.list')
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->route('cart.list')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }        
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        $cadena = Cookie::get('pedido');
        $informacion = explode('/', $cadena);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            app(CartController::class)->clearAllCart();
             Pedidos::create(
                array_merge(
                    [
                     "id_usuario" => $informacion[0],
                     "name" => $informacion[1],
                     "email" => $informacion[2],
                     "precio_total" => $informacion[3],
                     "pais" => $informacion[4],
                     "provincia" => $informacion[5],
                     "ciudad" => $informacion[6],
                     "codigoPostal" => $informacion[7],
                     "calle" => $informacion[8],
                     "portal" => $informacion[9],
                     "piso" => $informacion[10],
                    ]
                )
            );
            return redirect()
                ->route('cart.list')
                ->with('success', 'Pago completado.');
        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('createTransaction')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    public function pago()
    {
        $cartItems = \Cart::getContent();
        return view('pago', compact('cartItems'));
    }
}
