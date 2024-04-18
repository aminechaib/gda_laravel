<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use DB;
class ExcelController extends Controller
{
    public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls',
        ]);

        // Get the uploaded file
        $file = $request->file('excel_file');

       // Load the Excel file using PhpSpreadsheet
       $spreadsheet = IOFactory::load($file->getPathname());

       // Get the active sheet (first sheet)
       $sheet = $spreadsheet->getActiveSheet();

       // Prepare a batch array to store row data
       $batchData = [];

       // Iterate through each row starting from the second row
       foreach ($sheet->getRowIterator(2) as $row) {
           $cellIterator = $row->getCellIterator();
           $cellIterator->setIterateOnlyExistingCells(false);

           $rowData = [];
           foreach ($cellIterator as $cell) {
               $rowData[] = $cell->getValue();
           }

           // Add row data to the batch array
           $batchData[] = [
               'reference' => $rowData[0],
               'designation' => $rowData[1],
               'marque' => $rowData[2],
               'prix' => $rowData[3],
               'fournisseur' => $rowData[4],
               'date' => $rowData[5],
               // Add more fields as needed
           ];

           // Insert batch data to the database every 100 rows
           if (count($batchData) >= 100) {
               Piece::insert($batchData);
               $batchData = []; // Reset batch data array
           }
       }

       // Insert remaining batch data if any
       if (!empty($batchData)) {
           Piece::insert($batchData);
       }

       // Return a response
       return redirect()->route('dashboard')->with('success', 'File imported successfully.');
   }
}