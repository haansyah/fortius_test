<?php
if (!function_exists('uploadDocument')) {
    function uploadDocument($file, $prefix, $name)
    {
        $time = time();
        $filename = NULL;
        $filename = strtoupper($prefix . '_' . $name. $time) . '.' . $file->extension();
        $file->move(public_path('storage/'), $filename);
        return $filename;
    }
}
