<?php
namespace App\Http\Controllers;

use App\Datatable;
use Illuminate\Http\Request;
use Datatables;
use Validator;

class EditableDataTablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        return view('admin.examples.editable_table');
    }

    public function data()
    {
        $tables = Datatable::get(['id','firstname', 'lastname','points','notes']);

        return Datatables::of($tables)
            ->add_column('edit', '<a class="edit" href="javascript:;">Edit</a>')
            ->add_column('delete', '<a class="delete" href="#" data-target="#deleteConfirmModal" data-toggle="modal">Delete</a>')
            ->rawColumns(['edit','delete'])
            ->make(true);
    }

    public function store(Request $request)
    {
        if($request->ajax()) {
            Datatable::create($request->except('_token'));
        }
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:3',
            'points' => 'required|integer',
            'notes' => 'required',
        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make($request->all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return $validator->errors()->all();
        }

        $table = Datatable::find($id);

        $table->update($request->except('_token'));
        return 'success';

    }

    public function destroy($id)
    {
        $row=Datatable::find($id);
        $row->delete();
        return $row->id;
    }
}
