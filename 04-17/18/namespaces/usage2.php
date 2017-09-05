<?php

namespace Application;

include_once "global.php";
include_once "application.php";

app(); // call from current namespace
namespace\app(); // call from current namespace
__NAMESPACE__. '\\' .app(); // call from current namespace
