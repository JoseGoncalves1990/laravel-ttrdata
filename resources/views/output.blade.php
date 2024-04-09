<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  <title>Demo TTR Data</title>

  <meta name="description" content="Demo TTR Data">
  <meta name="author" content="pixelcave">
  <meta name="robots" content="index, follow">

  <!-- Icons -->
  <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
  <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

  <!-- Modules -->
  @yield('css')
  @vite(['resources/sass/main.scss', 'resources/js/oneui/app.js'])

  <!-- Alternatively, you can also include a specific color theme after the main stylesheet to alter the default color theme of the template -->
  {{-- @vite(['resources/sass/main.scss', 'resources/sass/oneui/themes/amethyst.scss', 'resources/js/oneui/app.js']) --}}
  @yield('js')

@section('js')
<script src="{{ asset('js/pages/be_forms_validation.min.js') }}"></script>
<script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
@endsection

</head>

  <body>
    <div id="page-container" class="page-header-dark main-content-boxed">

      <!-- Header -->
      <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
          <!-- Left Section -->
          <div class="d-flex align-items-center">
            <!-- Logo -->
            <a class="fw-semibold fs-5 tracking-wider text-dual me-3" href="/"> Demo TTR Data </a>
            <!-- END Logo -->
          </div>
          <!-- END Left Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Loader -->
        <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary-lighter">
          <div class="content-header">
            <div class="w-100 text-center">
              <i class="fa fa-fw fa-circle-notch fa-spin text-primary"></i>
            </div>
          </div>
        </div>
        <!-- END Header Loader -->
      </header>
      <!-- END Header -->

      <!-- Main Container -->
      <main id="main-container">

        <!-- Page Content -->
        <div class="content">
          <!-- Hero -->
          <div class="block block-rounded">
            <div class="block-content block-content-full">
              <div class="py-4 text-center">
                <h1 class="h3 fw-bold mb-1">
                  Output
                </h1>
                <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                  Diferença entre os dois CSVs
                </h2>
              </div>
            </div>
          </div>
          <!-- END Hero -->

          <!-- Dummy content -->
          <div class="row">
            <div class="col-sm-4">
              <div class="block block-rounded">
                <div class="block-content">
                  <h5>Linhas do ficheiro novo que são exactamente iguais ao ficheiro antigo</h5>
                  <p>
                    @if(isset($linhasDuplicadas))
                      @foreach ($linhasDuplicadas as $indice =>$linha)
                        @if($indice > 0)                   
                            - {{ $indice + 1 }}  
                        @endif
                      @endforeach
                    @endif
                  </p>
                  <p class="text-center py-6"></p>    
                  <a type="button" class="btn btn-info me-1 mb-3" href= "/media/csv/csv_duplicados.csv">
                    <i class="fa fa-fw fa-download me-1"></i> Download
                  </a>        
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="block block-rounded">
                <div class="block-content">
                <h5>Linhas inseridas novas no ficheiro novo</h5>
                  <p>
                  @if(isset($linhasInseridasNovas))
                    @foreach ($linhasInseridasNovas as $indice =>$linha)
                      @if($indice > 0)                   
                         - {{ $indice + 1 }} 
                      @endif
                    @endforeach
                    @endif
                  </p>  
                  <p class="text-center py-6"></p>
                  <a type="button" class="btn btn-info me-1 mb-3" href= "/media/csv/csv_novosInseridos.csv">
                    <i class="fa fa-fw fa-download me-1"></i> Download
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="block block-rounded">
                <div class="block-content">
                <h5>Linhas do ficheito antigo que foram actualizadas</h5>
                  <p>
                  @if(isset($linhasAtuliazadas))
                    @foreach ($linhasAtuliazadas as $indice =>$linha)
                      @if($indice > 0)                   
                         - {{ $indice + 1 }} 
                      @endif
                    @endforeach
                  @endif
                  </p>  
                  <p class="text-center py-6"></p>
                  <a type="button" class="btn btn-info me-1 mb-3" href= "/media/csv/csv_linhas_actualidas.csv">
                    <i class="fa fa-fw fa-download me-1"></i> Download
                  </a>
                </div>
              </div>
            </div>
          <!-- END Dummy content -->
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->

      <!-- Footer -->
      <footer id="page-footer" class="bg-body-extra-light">
        <div class="content py-3">
          <div class="row fs-sm">
            <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
              Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="https://pixelcave.com" target="_blank">pixelcave</a>
            </div>
            <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
              <a class="fw-semibold" href="https://pixelcave.com/products/oneui" target="_blank">OneUI 5.9</a> &copy; <span data-toggle="year-copy"></span>
            </div>
          </div>
        </div>
      </footer>
      <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!--
        OneUI JS

        Core libraries and functionality
        webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="assets/js/oneui.app.min.js"></script>
  </body>
</html>