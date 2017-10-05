<?php

namespace App\Http\Controllers\V1;

use Dingo\Api\Routing\Helpers;
use Dingo\Api\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Exceptions\ResourceException;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class Controller extends BaseController
{
    use Helpers;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const PAGINATE = 20;
    const FEPAGINATE = 6;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
    }

    /**
     * Override valiate funtion
     *
     * @param Request $request
     * @param array $rules
     * @param array $messages
     * @param array $customAttributes
     *
     * @throws \App\Exceptions\ResourceException
     */
    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = [])
    {
        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages, $customAttributes);

        if ($validator->fails()) {
            return $this->responseError($validator->errors(), 400);
        }
    }

    /**
     * Return an error response.
     *
     * @param string $message
     * @param int $statusCode
     *
     * @throws \App\Exceptions\ResourceException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseError($message, $statusCode)
    {
        if ($message instanceof MessageBag) {
            $message = array_values($message->messages())[0][0];
        }
        throw new ResourceException($statusCode, $message, $message);
    }

    /**
     * Return a success response.
     *
     * @param object $data
     * @param string $message
     * @param int $statusCode
     *
     * @throws \App\Exceptions\ResourceException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseSuccess($data = null, $message = null, $statusCode = 200)
    {
        return response()->json([
            'status_code' => $statusCode,
            'message' => is_null($message) ? __('messages.success') : $message,
            'data' => $data,
        ]);
    }

    /**
     * Return a 404 not found error.
     *
     * @param string $message
     *
     * @throws \App\Exceptions\ResourceException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseNotFound($message = 'Not Found')
    {
        return $this->responseError($message, 404);
    }

    /**
     * Return a 400 bad request error.
     *
     * @param string $message
     *
     * @throws \App\Exceptions\ResourceException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseBadRequest($message = 'Bad Request')
    {
        return $this->responseError($message, 400);
    }

    /**
     * Return a 403 forbidden error.
     *
     * @param string $message
     *
     * @throws \App\Exceptions\ResourceException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseForbidden($message = 'Forbidden')
    {
        return $this->responseError($message, 403);
    }

    /**
     * Return a 500 internal server error.
     *
     * @param string $message
     *
     * @throws \App\Exceptions\ResourceException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseInternal($message = 'Internal Error')
    {
        return $this->responseError($message, 500);
    }

    /**
     * Return a 401 unauthorized error.
     *
     * @param string $message
     *
     * @throws \App\Exceptions\ResourceException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseUnauthorized($message = null)
    {
        if ($message == null) {
            $message = __('messages.unauthorized');
        }

        return $this->responseError($message, 401);
    }

    /**
     * Return a 405 method not allowed error.
     *
     * @param string $message
     *
     * @throws \App\Exceptions\ResourceException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseMethodNotAllowed($message = 'Method Not Allowed')
    {
        return $this->responseError($message, 405);
    }


    /**
     * @param null $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function reponseUnverified($message = null, $statusCode = 200)
    {
        return $this->responseError($message, $statusCode);
    }

    protected function getPaginate(Request $request)
    {
        return ($request->has('limit'))
            ? ($request->get('limit') <= self::PAGINATE ? intval($request->get('limit')) : self::PAGINATE)
            : self::PAGINATE;
    }

    /**
     * generate token for reset password
     * @param  string $prefix  unique key
     * @return string
     */
    public function generateUniqueToken($prefix)
    {
        return md5(uniqid($prefix, true));
    }

    /**
     * check using ThrottlesLogins
     * @return bool
     */
    public function isUsingThrottlesLoginsTrait()
    {
        return in_array(
            ThrottlesLogins::class, class_uses_recursive(get_class($this))
        );
    }

    protected function getFEPaginate(Request $request)
    {
        return ($request->has('limit'))
            ? ($request->get('limit') <= self::FEPAGINATE ? intval($request->get('limit')) : self::FEPAGINATE)
            : self::FEPAGINATE;
    }
}
