<?php

function image($image, $path)
{
  $path = $image->store($path, 'public');
  return $path;
}