<?php

$files[] = "/vagrant/.git";
$results = [];

$max_iterations = 1000;
$i = 0;
while(count($files)) {
    $i++;
    $file = array_shift($files);
    $results[$file] = $file;
    if (is_dir($file)) {
        $files_tmp = scandir($file);
        foreach ($files_tmp as $file_tmp) {
            if ($file_tmp == '.' || $file_tmp == '..') {
                continue;
            }
            $files[] = $file . DIRECTORY_SEPARATOR . $file_tmp;
        }
    }
    if ($i > $max_iterations) {
        break;
    }
}

ksort($results);
print_r($results);

/*

$next_dir = false;

$file_path = "/vagrant/08-17/";
  $arr_level = [];
  $ind_arr_level = -1;

  $arr_pos_level = [];
  $pos_level = 2;

  $ind_arr_level++;
  $arr_level[$ind_arr_level] = scandir($file_path);

  while ($ind_arr_level >= 0)
  {
    $next_dir = false;

    for ($i = $pos_level ; (($i < count($arr_level[$ind_arr_level])) || (!$next_dir)) ; $i++)
    {

      if (is_dir($arr_level[$ind_arr_level][$i]))
      {
        $arr_pos_level[$ind_arr_level] = $i;
        $pos_level = 2;

        $ind_arr_level++;
        $arr_level[$ind_arr_level] = scandir($file_path);

        $next_dir = true;

      }

      else
      {
        continue;

          var_dump($arr_level);
      };  //  end  else  if ($arr_level[$ind_arr_level][i] == "dir")
    
    };  //  end  while ($i = 0; i < count($arr_level[$ind_arr_level]); i++)

    if (!$next_dir)
    {
      $ind_arr_level--;
      if ($ind_arr_level >= 0)
      {
        $pos_level = $arr_pos_level[$ind_arr_level] + 1;

      };  //  end  if ($ind_arr_level >= 0)

    };  //  end  if (!next_dir)

  };  //  end  while ($ind_arr_level >= 0)

*/
