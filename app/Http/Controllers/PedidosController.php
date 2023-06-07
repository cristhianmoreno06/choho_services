<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class PedidosController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getOrders(): JsonResponse
    {
        $orders = Pedido::all();

        return response()->json(['orders' => $orders]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getOrdersDetail(Request $request): JsonResponse
    {
        $ordersDetail = Pedido::whereId($request->get('order_id'))->with('city')->first();

        return response()->json(['ordersDetail' => $ordersDetail]);
    }

    /**
     * @return JsonResponse
     */
    public function getProducts(): JsonResponse
    {
        $ordersDetail = Producto::all();

        return response()->json(['products' => $ordersDetail]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function createOrUpdateOrder(Request $request): JsonResponse
    {
        try {
            return $this->createOrder($request);

        } catch (Throwable $throwable) {
            return $this->setResponse(
                'Creación o Actualización de orden',
                'No se ha podido crear o actualizar la orden',
                $throwable->getMessage(),
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function createOrder(Request $request): JsonResponse
    {
        try {
            if (is_null($request->get('id'))) {
                $order = new Pedido();
            } else {
                $order = Pedido::whereId($request->get('id'))->first();
            }

            $order->fecha_pedido = $request->get('fecha_pedido');
            $order->prefijo = $request->get('prefijo');
            $order->num_pedido = $request->get('num_pedido');
            $order->nit = $request->get('nit');
            $order->razon_social = $request->get('razon_social');
            $order->id_ciudad = $request->get('city');
            $order->vendedor = $request->get('vendedor');
            $order->save();

            if (!$order->save()) {
                return $this->setResponse(
                    'Registro de pedido',
                    'La orden no ha sido registrada satisfactoriamente',
                    $order,
                    Response::HTTP_NO_CONTENT
                );
            }

            if (is_null($order->id)) {
                return $this->setResponse(
                    'Registro de pedido',
                    'El pedido ha sido registrado satisfactoriamente',
                    $order,
                    Response::HTTP_OK
                );
            } else {
                return $this->setResponse(
                    'Actualización de pedido',
                    'El pedido ha sido actualizado satisfactoriamente',
                    $order,
                    Response::HTTP_OK
                );

            }

        } catch (Throwable $throwable) {
            return $this->setResponse(
                'Datos de la pedido',
                'Error al crear o eliminar el pedido',
                $throwable->getMessage() . ' linea = ' . $throwable->getLine(),
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }


    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        try {
            $order_id = $request->get('order_id');
            Pedido::whereId($order_id)->delete();
            return $this->setResponse(
                'Eliminación de pedido',
                'El pedido ha sido eliminado satisfactoriamente',
                $request->all(),
                Response::HTTP_OK
            );
        } catch (Throwable $throwable) {
            return $this->setResponse(
                'Eliminación de pedido',
                'No se ha podido eliminar el pedido',
                $throwable->getMessage(),
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * Método para el mapeo de respuesta tipo Json
     * @param string $title
     * @param string $text
     * @param mixed $detail
     * @param int $status
     * @return JsonResponse
     */
    public function setResponse(string $title, string $text, $detail, int $status): JsonResponse
    {
        return response()->json([
            'title' => $title,
            'text' => $text,
            'detail' => $detail
        ], $status);
    }
}
