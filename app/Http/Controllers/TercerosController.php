<?php

namespace App\Http\Controllers;

use App\Models\Tercero;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class TercerosController extends Controller
{

    /**
     * @return JsonResponse
     */
    public function getTerceros(): JsonResponse
    {
        $terceros = Tercero::all();

        return response()->json(['terceros' => $terceros]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getTercerosDetail(Request $request): JsonResponse
    {
        $tercerosDetail = Tercero::whereId($request->get('user_id'))->with('city')->first();

        return response()->json(['tercerosDetail' => $tercerosDetail]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function createOrUpdateTercero(Request $request): JsonResponse
    {
        try {
            return $this->createTercero($request);

        } catch (Throwable $throwable) {
            return $this->setResponse(
                'Creación o Actualización de tercero',
                'No se ha podido crear o actualizar el tercero',
                $throwable->getMessage(),
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function createTercero(Request $request): JsonResponse
    {
        try {
            if (is_null($request->get('id'))) {
                $tercero = new Tercero();
            } else {
                $tercero = Tercero::whereId($request->get('id'))->first();
            }

            $tercero->nit = $request->get('nit');
            $tercero->razon_social = $request->get('razon_social');
            $tercero->tipo = $request->get('tipo');
            $tercero->activo = $request->get('activo');
            $tercero->save();

            if (!$tercero->save()) {
                return $this->setResponse(
                    'Registro de tercero',
                    'El tercero no ha sido registrado satisfactoriamente',
                    $tercero,
                    Response::HTTP_NO_CONTENT
                );
            }

            if (is_null($tercero->id)) {
                return $this->setResponse(
                    'Registro de tercero',
                    'El tercero ha sido registrado satisfactoriamente',
                    $tercero,
                    Response::HTTP_OK
                );
            } else {
                return $this->setResponse(
                    'Actualización de tercero',
                    'El tercero ha sido actualizado satisfactoriamente',
                    $tercero,
                    Response::HTTP_OK
                );

            }

        } catch (Throwable $throwable) {
            return $this->setResponse(
                'Datos del tercero',
                'Error al crear o eliminar el tercero',
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
            $tercero_id = $request->get('user_id');
            Tercero::whereId($tercero_id)->delete();
            return $this->setResponse(
                'Eliminación de tercero',
                'El tercero ha sido eliminado satisfactoriamente',
                $request->all(),
                Response::HTTP_OK
            );
        } catch (Throwable $throwable) {
            return $this->setResponse(
                'Eliminación de tercero',
                'No se ha podido eliminar el tercero',
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
