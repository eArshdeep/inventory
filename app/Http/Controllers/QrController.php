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
}
