<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>API </title>
  </head>
  <body>
    <div class="container">
    <h1 class="text-primary">Identify the Company</h1>
    <form action="{{route('search')}}" method="get">
<div class="input-group mb-3">
  <input type="text" class="form-control" name='search'id="search_data" placeholder="Company's Name" aria-label="Company's name" aria-describedby="button-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit" id="button_search">Search</button>
  </div>
</div>
</form>
@yield('main')
</div>
</body>

<!-- <script>
    const search_button = document.querySelector('#button_search');
    const search_text=document.querySelector('#search_data');

    search_button.addEventListener('click',getData);
    function getData(){
        let response = fetch("api/company_search/"+ search_text.value,{
            headers: {
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
  },
        })
        .then(response => {
        console.log(response);
    })
    .catch(error => {
        // handle the error
    });
    }
</script> -->
</html>