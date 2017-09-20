<?php

function scan_directory_recursive($path, $nesting_level = 0): array
{
    $result = [];
    if (!file_exists($path)) {
        return $result;
    }
    $files = scandir($path);
    $item = [
        'type' => '',
        'name' => '',
        'path' => '',
        'level' => $nesting_level,
        'children' => []
    ];
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }
        $file_path = $path . DIRECTORY_SEPARATOR . $file;
        $item['name'] = $file;
        $item['path'] = $file_path;
        if (is_dir($file_path)) {
            $item['type'] = 'd';
            $item['children'] = scan_directory_recursive($file_path, $nesting_level + 1);
        } else {
            $item['type'] = 'f';
        }
        $result[] = $item;
    }
    return $result;
}

$files_list = scan_directory_recursive('/vagrant');

$files_list_serialized = serialize($files_list);

print_r($files_list);
