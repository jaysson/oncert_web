<?php

class AttachmentController extends BaseController
{
    public function store($certification_id, $session_id)
    {
        $rules = ['session_id' => 'required', 'file' => 'required'];
        $inputData = Input::all();
        $inputData['session_id'] = $session_id;
        $validator = Validator::make($inputData, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator->errors());
        } else {
            $attachment = new Attachment($inputData);
            $attachment->fill($inputData);
            $attachment->save();
            Notification::success('Successfully uploaded the attachment!');
            return Redirect::back();
        }
    }
}