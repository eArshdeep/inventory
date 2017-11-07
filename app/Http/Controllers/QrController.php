<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;

class QRController extends Controller
{
    /**
     * Display the current QR label
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $context = [
        'show_back' => true,
        'back_url' => '/collection/' . $id
      ];

      $collection = Collection::find($id);
      $qr_code = $collection->qr_code;
      return view('scenes.qr.show')
        ->with('qr_code', $qr_code)
        ->with('context', $context);
    }

    /**
     * Generate and display a new QR label
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $context = [
        'show_back' => true,
        'back_url' => '/collection/' . $id
      ];

      $collection = Collection::find($id);
      $qr_code = uniqid();
      $collection->qr_code = $qr_code;
      $collection->save();
      return view('scenes.qr.create')
        ->with('qr_code', $qr_code)
        ->with('context', $context);
    }

    /**
     * Return scan view
     *
     * @return \Illuminate\Http\Response
     */
    public function scan()
    {
      $context = [
        'show_back' => true,
        'back_url' => '/'
      ];

      return view('scenes.qr.scan')->with('context', $context);
    }

    /**
     * Validate if scanned code matches a collection than redirect
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request)
    {
      // validate
      $this->validate($request, [
        'code' => 'required|size:13',
      ]);

      // handle
      $code = $request->input('code');

      // find
      $collection = Collection::where('qr_code', $code)->first();

      // return if error
      if (!count($collection))
      {
        return redirect()->route('scan')->with('error', 'Code is invalid');
      }

      // return if success
      return redirect()->route('collection.show', ['id' => $collection->id])->with('success', 'Scan successful.');
    }

}
