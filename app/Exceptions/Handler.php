<?php

namespace App\Exceptions;

use App\Http\Response\ApiCode;
use App\Models\ExceptionError;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Foundation\Http\Exceptions\MaintenanceModeException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    public $logId;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * UnauthorizedHttpException
     *
     * @param Throwable $exception
     * @return bool
     */
    protected function isUnauthorizedHttpException(Throwable $exception)
    {
        return $exception instanceof UnauthorizedHttpException ||
            $exception instanceof AuthenticationException ||
            $exception instanceof UnauthorizedException;

    }

    /**
     * ValidationException
     *
     * @param Throwable $exception
     * @return bool
     */
    protected function isValidationException(Throwable $exception)
    {
        return $exception instanceof ValidationException;
    }

    /**
     * AuthorizationException
     *
     * @param Throwable $exception
     * @return bool
     */
    protected function isAuthorizationException(Throwable $exception)
    {
        return $exception instanceof AuthorizationException;
    }

    /**
     * ThrottleRequestsException
     *
     * @param Throwable $exception
     * @return bool
     */
    protected function isThrottleRequestsException(Throwable $exception)
    {
        return $exception instanceof ThrottleRequestsException;
    }

    protected function isNotFoundHttpException(Throwable $exception)
    {
        return $exception instanceof NotFoundHttpException;
    }

    /**
     * @param Throwable $exception
     */
    protected function exceptionError(Throwable $exception)
    {
        if (!$this->isUnauthorizedHttpException($exception) && !$this->isValidationException($exception) &&
        !$this->isThrottleRequestsException($exception) && !$this->isNotFoundHttpException($exception)) {
            try {
                $log = ExceptionError::create([
                    'message' => $exception->getMessage(),
                    'code' => $exception->getCode(),
                    'file' => $exception->getFile(),
                    'line' => $exception->getLine(),
                    'trace' => $exception->getTrace()
                ]);
                $this->setLogId($log->getId());
            } catch (\Exception $e) {

            }
        }
    }

    /**
     * @return mixed
     */
    public function getLogId()
    {
        return $this->logId;
    }

    /**
     * @param mixed $logId
     */
    public function setLogId($logId): void
    {
        $this->logId = $logId;
    }

    /**
     * 定义默认的环境变量
     *
     * @return array
     */
    protected function context()
    {
        return array_merge(parent::context(), [

        ]);
    }

    /**
     * Report or log an exception.
     *
     * @param \Throwable $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        $this->exceptionError($exception);

        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        Log::error($request);
        Log::error($exception);
        App::setLocale($request->header('lang', config('app.locale')));
        if ($this->isUnauthorizedHttpException($exception)) {
            return ResponseBuilder::asError(ApiCode::HTTP_UNAUTHORIZED)
                ->withHttpCode(ApiCode::HTTP_UNAUTHORIZED)
                ->withData()
                ->build();
        }
        if ($this->isValidationException($exception)) {
            return ResponseBuilder::asError(ApiCode::HTTP_UNPROCESSABLE_ENTITY)
                ->withHttpCode(ApiCode::HTTP_UNPROCESSABLE_ENTITY)
                ->withData($exception->errors())
                ->build();
        }
        if ($this->isAuthorizationException($exception)) {
            return ResponseBuilder::asError(ApiCode::HTTP_FORBIDDEN)
                ->withHttpCode(ApiCode::HTTP_FORBIDDEN)
                ->withData()
                ->build();
        }
        if ($this->isThrottleRequestsException($exception)) {
            return ResponseBuilder::asError(ApiCode::HTTP_TOO_MANY_REQUEST)
                ->withHttpCode(ApiCode::HTTP_TOO_MANY_REQUEST)
                ->withData()
                ->build();
        }
        if ($this->isNotFoundHttpException($exception)) {
            return ResponseBuilder::asError(ApiCode::HTTP_NOT_FOUND)
                ->withHttpCode(ApiCode::HTTP_NOT_FOUND)
                ->withData()
                ->build();
        }
        if ($exception instanceof MaintenanceModeException) {
            $response = ResponseBuilder::asError(ApiCode::HTTP_SERVICE_UNAVAILABLE)
                ->withHttpCode(ApiCode::HTTP_SERVICE_UNAVAILABLE) ->withData();
            if ($exception->getMessage() !== '') $response->withMessage($exception->getMessage());
            return $response->build();
        }
        if (App::environment('local')) {
            return parent::render($request, $exception);
        }
        return ResponseBuilder::asError(ApiCode::HTTP_INTERNAL_SERVER_ERROR)
            ->withHttpCode(ApiCode::HTTP_INTERNAL_SERVER_ERROR)
            ->withData([
                'errorId' => (string) $this->getLogId()
            ])
            ->build();
    }
}
