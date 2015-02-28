<?php

namespace Api;

use Oneducation\Api\ResponseTrait;


class CertificationsController extends \BaseController
{
    use ResponseTrait;

    public function index()
    {
        if ($certifications = \Certification::all()) {
            return $this->respondWithData($certifications);
        } else {
            return $this->respondWithError('Empty', Response::HTTP_NOT_FOUND);
        }
    }

    public function show($id)
    {
        if ($examBelogToCertification = \Exam::where('certification_id', $id)) {
            return $this->respondWithData($examBelogToCertification->get());
        } else {
            return $this->respondWithError('Empty', Response::HTTP_NOT_FOUND);
        }
    }
}