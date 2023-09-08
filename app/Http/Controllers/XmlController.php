<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class XmlController extends Controller
{
    public function downloadXml()
    {
        $data = session('data');

        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><Ads target="МойСкладТестовоеЗадание" formatVersion="3"/>');

        foreach ($data['rows'] as $row) {
            $ad = $xml->addChild('Ad');
            $ad->addChild('id', $row['id']);
            $ad->addChild('accountId', $row['accountId']);
            $ad->addChild('updated', $row['updated']);
            $ad->addChild('name', $row['name']);
            $ad->addChild('code', $row['code']);
            $ad->addChild('externalCode', $row['externalCode']);
            $ad->addChild('salePrice0', $row['salePrices'][0]['value']);
            $ad->addChild('salePrice1', $row['salePrices'][1]['value']);
        }

        $filename = 'test.xml';
        $path = 'public/' . $filename;

        Storage::put($path, $xml->asXML());

        $downloadLink = Storage::url($path);

        return response()->stream(
            function () use ($path) {
                readfile(storage_path('app/' . $path));
            },
            200,
            [
                'Content-Type' => 'application/xml; charset=UTF-8',
                'Content-Disposition' => 'attachment; filename=data.xml',
            ]
        );
    }
}

