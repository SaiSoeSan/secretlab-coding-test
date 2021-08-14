<?php

namespace App\Http\Controllers;

use App\Models\ApiModel;
use Illuminate\Http\Request;

class ApiModelController extends Controller
{

    public function RecordActions(Request $request, $key = null)
    {
        if ($key === null) {
            // save data
            if ($request->isMethod('post')) {
                $all_request = $request->all();
                if (count($request->all())) {
                    //api
                    foreach ($all_request as $key => $value) {
                        $result = ApiModel::updateOrInsert(
                            ['mykey' => $key],
                            [
                                'myvalue' => $value,
                                'timestamp' => time(),
                            ])->first()->only('mykey', 'myvalue', 'timestamp');

                        $data['data'] = $result;
                        $data['success'] = true;
                    }

                } else {
                    $data['message'] = 'Missing post request data!';
                    $data['success'] = false;
                }
            } else {
                $data['success'] = false;
                $data['message'] = 'Invalid request method!';
            }
        } else {
            // get data
            if ($request->isMethod('get')) {
                if ($request->has('timestamp')) {
                    $data['data'] = ApiModel::where('timestamp', $request->timestamp)->first();
                } else {
                    $data['data'] = ApiModel::where('mykey', $key)->first();
                }
                $data['success'] = true;
            } else {
                $data['success'] = false;
                $data['message'] = 'Invalid request method!';
            }
        }

        return response()->json($data);
    }

    public function GetAllRecords(Request $request)
    {
        try {
            $data['data'] = ApiModel::all();
            $data['success'] = true;
            return response()->json($data);
        } catch (RequestException $e) {
            return response()->json("Invalid request method!");
        }
    }

}
