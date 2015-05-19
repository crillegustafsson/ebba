<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade;
use Barryvdh\DomPDF\ServiceProvider;
use App;
use Carbon\Carbon;
use dompdf;
use View;
use PDF;
use App\Receipt;
use App\ReceiptProduct;
use dompdf_config;
use Mail;
use Redirect;

use Illuminate\Http\Request;

class PrintController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{

		$customer = Receipt::where('customers_id', $id)->join('customers', 'customers.id', '=', 'receipts.customers_id')->first();
		$last = $customer->orderBy('created_at', 'desc')->first();
		
		$order = ReceiptProduct::join('products', 'products.id', '=', 'receipt_products.products_id')->where('receipts_id', $last->id)->get();

		$pdftext = 'hej';
		$html = View::make('system/pdf', compact('order', 'customer', 'last'));
 		$pdf = App::make('dompdf');

        $pdf->loadHTML($html);
        
        
        //niklassonv@hotmail.com
        
     
            $date = Carbon::now()->format('M-d-Y');

              if (!is_dir($date)) {
                 // dir doesn't exist, make it
                 mkdir($date);
              
                }
     
    	 file_put_contents($date . '/' . $customer->orgnr . '.pdf', $pdf->stream('pdf'));
            
     		Mail::send('system/ordermail', ['key' => 'value'], function($message) use ($date, $customer)
     		{
     		    $message->to('vicnik13@student.hh.se', 'blox')->subject('Följesedel - Engelholms Glass');
    		    
     		    $message->attach('http://bloxsolution.se/'. $date . '/' . $customer->orgnr . '.pdf' );
                
     		});
    
   
        
        
        
    //     file_put_contents('order.pdf', $pdf->stream('pdf'));     
    //  		Mail::send('system/ordermail', ['key' => 'value'], function($message) use ($date)
    //  		{
    //  		    $message->to('joawal13@student.hh.se', 'blox')->subject('Följesedel - Engelholms Glass');
    		    
    //  		    $message->attach('http://bloxsolution.se/order' . $date . '.pdf');
                
    //  		});
	
      return Redirect::to('kundinformation/' . $id);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		return view('system/ordermail');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
