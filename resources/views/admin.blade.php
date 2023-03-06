@extends('layouts.app')

@section('content')

<body>
<v-row>
  <v-col>

     

      
    </v-system-bar>

    <v-navigation-drawer

      app
    >
      <v-sheet
        color="grey lighten-4"
        class="pa-4 text-center
        "
      >
      
        <img
        src="/images/img/core-img/logo.png"></img>

   

      </v-sheet>

      <v-divider></v-divider>

      <v-list>
        <v-list-item
          link
        >
          <v-list-item-content>
            <v-list-item-title>
              <a class="nav-link" href="{{ route('admin.index') }}">Recepti</a>
                          
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item
          link
        >
          <v-list-item-content>
            <v-list-item-title>
              <a class="nav-link" href="{{ route('admin.kategorije') }}">Kategorije</a>
                          
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
  </v-col>
  <v-col cols="9">
            @yield('sadrzaj')
        </v-col>
</v-row>


</body>

@endsection