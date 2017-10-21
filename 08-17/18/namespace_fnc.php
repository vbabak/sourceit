<?php

namespace A {

    $a = 10;

    // function strlen(string $s): bool
    // {
    //     // echo __METHOD__;
    //     return true;
    // }

    // var_dump(strlen('123'));

    const C = 'C';

    class User
    {
        public $name = 'user 1';
    }
}

namespace B {

    use A\User as User1; // import class + alias - new User1
    use A\User; // import class - new User
    use A as A1; // import namespace + alias

    $u1 = new User1;
    var_dump($u1);

    $u = new User();
    var_dump($u);

    $user = new \A\User();
    var_dump($user);

    $ua1 = new A1\User();
    var_dump($ua1);

    // echo A\strlen('123'); // error
    // var_dump(\A\C);
}

namespace A {
    $user = new User();
    var_dump($user);
}