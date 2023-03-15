<?php

namespace App\Http\Controllers;

use App\Filters\DatasetSearch;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateDataSetRequest;
use App\Models\DataSet;

class DataSetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return DatasetSearch::apply($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('uploaded_file');
        if ($file) {
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();
            // Manual checking filesize and extension
            checkUploadedFileProperties($extension, $fileSize);
            $location = 'uploads';
            $file->move($location, $filename);
            $filepath = public_path($location . "/" . $filename);

            $dataSet = csvToArray($filepath);
            for ($i = 0; $i < count($dataSet); $i++) {
                if ($i == 0) {
                    continue;
                }
                DataSet::firstOrCreate($dataSet[$i]);
            }

            return 'The DataSet uploaded successfully';
        }
            return 'There was some server errors';
    }

    /**
     * Display the specified resource.
     */
    public function show(DataSet $dataSet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataSet $dataSet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataSetRequest $request, DataSet $dataSet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataSet $dataSet)
    {
        //
    }

}
