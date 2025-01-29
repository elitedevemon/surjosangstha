<?php

function image($image, $path)
{
  $image->store($path, 'public');
}