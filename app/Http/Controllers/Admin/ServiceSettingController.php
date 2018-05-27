<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServiceSetting;


class ServiceSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = ServiceSetting::all();
        return view('admin.serviceSetting.index')->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.serviceSetting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new ServiceSetting;

        $service->title = $request->title;
        $service->code = $request->code;
        $service->type = $request->type;
        $service->service_charge = $request->service_charge;
        $service->minimum_value = $request->minimum_value;
        $service->maximum_value = $request->maximum_value;
        $service->percentage_commission = $request->percentage_commission;
        $service->api_provider = $request->api_provider;
        $service->enable = $request->enable;

        $service->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = ServiceSetting::find($id);
        return view('admin.serviceSetting.create')->with('service', $service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = ServiceSetting::find($id);
        
        $service->title = $request->title;
        $service->code = $request->code;
        $service->type = $request->type;
        $service->service_charge = $request->service_charge;
        $service->minimum_value = $request->minimum_value;
        $service->maximum_value = $request->maximum_value;
        $service->percentage_commission = $request->percentage_commission;
        $service->api_provider = $request->api_provider;
        $service->enable = $request->enable;

        $service->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = ServiceSetting::find($id);
    }
}
