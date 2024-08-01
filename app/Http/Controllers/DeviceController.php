<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeDeviceRequest;
use App\Http\Resources\DeviceResource;
use App\Models\Device;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    use HttpResponses;
    public function index()
    {
        return DeviceResource::collection(Device::all());
    }

    public function store(storeDeviceRequest $request)
    {
        $device = Device::create($request->validated());
        return new DeviceResource($device);
    }

    public function show(Device $device)
    {
        return new DeviceResource($device);
    }

    public function update(Request $request, Device $device)
    {
        $device->update($request->all());
        return new DeviceResource($device);
    }

    public function destroy(Device $device)
    {
        $device->delete();
        return response()->json(['message' => 'The Device has been deleted']);
    }
}
