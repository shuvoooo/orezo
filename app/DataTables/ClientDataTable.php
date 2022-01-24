<?php

namespace App\DataTables;

use App\Models\Invoice;
use App\Models\PersonalInformation;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ClientDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $users = User::where('role', 'user')->get();
        $userList = collect();

        foreach ($users as $user) {
            $personInfo = PersonalInformation::where('user_id', $user->id)->orderBy('created_at', 'DESC')->first();
            $userList->push([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $personInfo->phone ?? '',
                'created_at' => $user->created_at->format('d/m/Y'),
            ]);
        }


        return datatables()->collection($userList)->addColumn('action', function ($user) {


            $invoice_link = Invoice::where('user_id', $user['id'])->where('year', request('year') ?? date('Y'))->orderBy('created_at', 'DESC')->first();


            $invoice_link = $invoice_link ? route('admin.invoice.edit', ['user' => $invoice_link->user_id, 'year' => request('year') ?? date('Y')]) : '#';

            return view('datatables.client_action', ['user' => $user, 'invoice_link' => $invoice_link]);

        })->rawColumns(['action']);
    }


    public function html()
    {
        return $this->builder()
            ->setTableId('client-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
            //Button::make('export'),
            //Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );

    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('name'),
            Column::make('email'),
            Column::make('phone'),
            Column::make('created_at')->title('Reg Date'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'User_' . date('YmdHis');
    }
}
