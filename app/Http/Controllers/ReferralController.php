<?php

namespace App\Http\Controllers;

use App\Models\Refer;
use App\Rules\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class ReferralController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('create', 'store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Builder $dataTable)
    {
        $refers = Refer::orderBy('updated_at', 'desc')->get();

        $refersCollect = collect();

        foreach ($refers as $refer) {
            $refersCollect->push([
                'id' => $refer->id,
                'name' => $refer->name,
                'email' => $refer->email,
                'phone' => $refer->phone,
                'mobile' => $refer->mobile,
                'by_name' => $refer->by_name,
                'by_email' => $refer->by_email,
                'by_phone' => $refer->by_phone,
                'created_at' => $refer->created_at->format('d-m-Y'),
            ]);
        }


        if (request()->ajax()) {
            return DataTables::collection($refersCollect)
                ->addColumn('action', function ($refer) {
                    return '<a href="' . route('admin.referrals.delete', $refer['id']) . '" class="btn btn-xs btn-danger" onclick="return confirm(' . "'Are you sure?'" . ')"><i class="fa fa-trash"></i></a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $dataTable->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'ID'],
            ['data' => 'name', 'name' => 'name', 'title' => 'Name'],
            ['data' => 'email', 'name' => 'email', 'title' => 'Email'],
            ['data' => 'phone', 'name' => 'phone', 'title' => 'Phone'],
            ['data' => 'mobile', 'name' => 'mobile', 'title' => 'Mobile'],
            ['data' => 'by_name', 'name' => 'by_name', 'title' => 'By Name'],
            ['data' => 'by_email', 'name' => 'by_email', 'title' => 'By Email'],
            ['data' => 'by_phone', 'name' => 'by_phone', 'title' => 'By Phone'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Refer At'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false],
        ])->parameters([
            'order' => [
                [8, 'desc']
            ]
        ]);

        return view('admin.referrals.index', compact('dataTable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('referral');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'mobile' => ['required', new Phone()],
            'email' => 'required|email',
            'by_email' => 'required|email',
            'by_phone' => ['required', new Phone()],
        ]);

        try {


            Mail::raw('You are welcome to https://www.etaxplanner.com/ the invitation submitted by ' . $request->by_name, function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Refer a Friends!');
            });

            $referral = Refer::create($request->all());


            return redirect()->route('referrals.create')->with('success', 'Your Referral Code is: ' . $request->mobile);
        } catch (\Exception $e) {
            return redirect()->route('referrals.create')->with('danger', 'Something went wrong, please try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete(Refer $refer)
    {
        $refer->delete();
        return redirect()->route('admin.referrals.index')->with('success', 'Referral Deleted Successfully');
    }
}
