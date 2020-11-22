<?php

namespace App\Http\Controllers\Api;

use DataTables;
use App\Models\Endpoint;
use App\Altcore\Helpers\Select2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\EndpointRequest;
use App\Http\Resources\EndpointResource;
use App\Altcore\Helpers\AltAuth;

class EndpointController extends Controller
{
    protected $model = Endpoint::class;

    protected $relationships = [];

    protected $scope = "Endpoint";

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->_check->authorize($this->scope."-index");
        $query = Endpoint::query();

        $this->loadRelationships($query);

        switch ($request->format) {
            case 'select2':
                return Select2::of(
                    $query->orderBy('id'),
                    'id',
                    'name'
                );

            case "datatable":
                return DataTables::of($query)
                    ->make(true);
            default:
                    return EndpointResource::collection($query->paginate());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EndpointRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EndpointRequest $request)
    {
        $request->_check->authorize($this->scope."-store");
        $endpoint = new Endpoint();

        $endpoint->fill(
            $request->_form->data([
                'name',
            ])
        );

        $endpoint->save();

        return [
            'message' => "Endpoint [{$endpoint->name}] berhasil dibuat",
            'data' => $endpoint,
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Endpoint  $endpoint
     * @return \Illuminate\Http\Response
     */
    public function show(Endpoint $endpoint)
    {
        request()->_check->authorize($this->scope.'-show');
        $this->loadRelationships($endpoint);

        return ['data' => $endpoint];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EndpointRequest  $request
     * @param  \App\Endpoint  $endpoint
     * @return \Illuminate\Http\Response
     */
    public function update(EndpointRequest $request, Endpoint $endpoint)
    {
        $request->_check->authorize($this->scope."-update");
        $name = $endpoint->name;

        $endpoint->fill(
            $request->_form->data([
                'name',
            ])
        );

        $endpoint->save();

        return [
            'message' => "Endpoint [{$name}] berhasil diubah",
            'data' => $endpoint,
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Endpoint  $endpoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Endpoint $endpoint)
    {
        request()->_check->authorize($this->scope.'-destroy');
        request()->_form->delete($endpoint);
        $endpoint->delete();

        return [
            'message' => "Endpoint [{$endpoint->name}] berhasil dihapus",
            'data' => $endpoint,
        ];
    }
}
