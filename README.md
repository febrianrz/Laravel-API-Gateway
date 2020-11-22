
<p  align="center"><a  href="https://alterindonesia.com"  target="_blank"><img  src="https://alterindonesia.com/front/images/logo.png"  width="150"></a></p>

  

<p  align="center">

<a  href="https://packagist.org/packages/laravel/framework"><img  src="https://img.shields.io/packagist/l/laravel/framework"  alt="License"></a>

</p>

  

## Laravel API Gateway

API Gateway for microservices with admin panel and path configuration.
  
## How it works

This app just like proxy for API microservices, ex:
i have 2 microservice:
1. Service for Product List (http://localhost:8001)
2. Service for Checkout (http://localhost:8002)

with API Gateway, we just need 1 domain for proxy to local service, ex:

```json
    https://apitest.com/product/...
    https://apitest.com/checkout/...
```

the path **product** and **checkout** stored on database and we just poiting to other URL.


### Premium Partners

 

-  **[Alter Indonesia](https://alterindonesia.com/)**

-  **[Satuakun.id](https://satuakun.id)**

## Contributing

 Untuk mencoba microservice Laravel ini dan ikut berkontribusi dalam pengembangannya, silahkan email ke febrianrz@gmail.com.

## Packagist
Mohon maaf, saat ini belum tersedia packagistnya, karena belum sempat deploy kesana, terima kasih.

 
## License

  

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Laravel-API-Gateway
