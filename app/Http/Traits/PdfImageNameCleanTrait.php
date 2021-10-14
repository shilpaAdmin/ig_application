<?php
namespace App\Http\Traits;

trait PdfImageNameCleanTrait {
    
    public function getPdfImageNameClean($filename) {

        $filename = str_replace(' ', '-', $filename); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '',$filename); // Removes special chars.
    }
}