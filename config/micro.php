<?php 

return [
  'key' => [
    'service_key'     => '',
    'service_secret'  => ''
  ],
  'url' => [
    'auth'  => 'https://satuakun.id',
  ],
  'check_role'      => false, // jika true, maka role authorize akan digunakan
  'role_always_true' => [ // nama nama role yang akan selalu menjadi true saat permission check
    'superuser',
    'superadmin',
    'admin',
    'developer'
  ]
];