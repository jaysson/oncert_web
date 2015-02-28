<?php

namespace oneducation\Api;

use Illuminate\Http\Response;

/**
 * Class ResponseTrait
 * @package Wicva\Api
 */
trait ResponseTrait
{
    /**
     * @param $data
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data, $status = Response::HTTP_OK)
    {
        return \Response::json($data, $status);
    }

    /***/
    public function respondWithData($data)
    {
        return $this->respond(['data' => $data]);
    }

    /**
     * @param $data
     * @param $paginator
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithPagination($data, $paginator)
    {
        $pagination = array(
            'total' => $paginator->getTotal(),
            'per_page' => $paginator->getPerPage(),
            'current_page' => $paginator->getCurrentPage(),
            'total_pages' => $paginator->getLastPage()
        );

        return $this->respond(array('data' => $data, 'pagination' => $pagination));
    }

    /**
     * @param string $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithError($message = 'There was some error', $code = Response::HTTP_BAD_REQUEST)
    {
        return $this->respond(array('error' => array('code' => $code, 'messages' => $message)), $code);
    }

    /**
     * @param string $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithSuccess($message = 'Operation completed successfully.', $code = 200)
    {
        return $this->respond(array('success' => array('code' => $code, 'message' => $message)), $code);
    }
} 