<?php

namespace App\DataTables;

// use App\App\Product;

use App\Product;
use Facade\Ignition\ErrorPage\Renderer;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\HtmlString;

class ProductDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        return datatables()
            ->eloquent($query)
            ->addColumn('logo', function ($product) {
                return new HtmlString('<img src="' . $product->logo . '" alt="Logo" class="img-thumbnail">');
            })
            ->addColumn('Action', function ($product ) {
                $product_id = $product->id;
                return new HtmlString('<button onclick="editProduct(' . $product_id . ')" class="btn btn-primary btn-sm">Edit</button>');
                
            })
            // ->addColumn('Action', function ($product) {
            //     return '<button onclick="editProduct()" class="btn btn-primary btn-sm">Eit</button>';
            // })
            ->addColumn('Delete', function ($product) {
                $product_id = $product->id;
                return new HtmlString('<button onclick="deleteProduct(' . $product_id . ')" class="btn btn-primary btn-sm">Delete</button>');
           })

    //        ->addColumn('View', function ($product) {
    //         $product_id = $product->id;
    //         return new HtmlString('<button onclick="(' . $product_id . ')" class="btn btn-primary btn-sm">Delete</button>');
    //    })

            // ->addColumn('Action', function ($product) {
            //     return '<button  onclick="openSwal()" class="btn btn-danger btn-sm">Delete</button>';
            // })
         

           


            ->rawColumns(['logo','Action','Delete']);
        
        // return datatables()            
        //     ->eloquent($query) ;

    }
   
    /**
     * Get query source of dataTable.
     *
     * @param \App\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {   
        return $this->builder()
                    ->setTableId('product-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->dom('Bfrtip')
                    ->orderBy(0);
                    
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            'id',
            'product_name',
            'product_code',
            'details',
            'brand',
             'logo',
             'Action',
             'Delete',
            //  'View'
             
            
        ];
       
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Product_' . date('YmdHis');
    }
}
